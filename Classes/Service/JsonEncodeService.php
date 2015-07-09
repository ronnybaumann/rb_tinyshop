<?php 
namespace RB\RbTinyshop\Service;

use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Fluid\Core\ViewHelper\Exception;
class JsonEncodeService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * @var array
	 */
	protected $encounteredClasses = array();
	
	/**
	 * @param mixed $value Array or Traversable
	 * @param boolean $useTraversableKeys If TRUE, preserves keys from Traversables converted to arrays. Not recommended for ObjectStorages!
	 * @param boolean $preventRecursion If FALSE, allows recursion to occur which could potentially be fatal to the output unless managed
	 * @param mixed $recursionMarker Any value - string, integer, boolean, object or NULL - inserted instead of recursive instances of objects
	 * @param string $dateTimeFormat A date() format for converting DateTime values to JSON-compatible values. NULL means JS UNIXTIME (time()*1000)
	 * @return string
	*/
	public function getAsJson($value = NULL, $useTraversableKeys = FALSE, $preventRecursion = TRUE, $recursionMarker = NULL, $dateTimeFormat = NULL) {
		$json = $this->encodeValue($value, $useTraversableKeys, $preventRecursion, $recursionMarker, $dateTimeFormat);
		return $json;
	}
	
	/**
	 * @param string $value
	 * @param boolean $useTraversableKeys
	 * @param boolean $preventRecursion
	 * @param string $recursionMarker
	 * @param string $dateTimeFormat
	 * @throws Exception
	 * @return mixed
	 */
	protected function encodeValue($value, $useTraversableKeys, $preventRecursion, $recursionMarker, $dateTimeFormat) {
		if (TRUE === $value instanceof \Traversable) {
			// Note: also converts Extbase ObjectStorage to \YourVendor\Extname\Domain\Model\ObjectType[] which are later each converted
			$value = iterator_to_array($value, $useTraversableKeys);
		} elseif (TRUE === $value instanceof DomainObjectInterface) {
			// Convert to associative array,
			$value = $this->recursiveDomainObjectToArray($value, $preventRecursion, $recursionMarker);
		} elseif (TRUE === $value instanceof \DateTime) {
			$value = $this->dateTimeToUnixtimeMiliseconds($value, $dateTimeFormat);
		}
	
		// process output of initial conversion, catching any specially supported object types such as DomainObject and DateTime
		if (TRUE === is_array($value)) {
			$value = $this->recursiveArrayOfDomainObjectsToArray($value, $preventRecursion, $recursionMarker);
			$value = $this->recursiveDateTimeToUnixtimeMiliseconds($value, $dateTimeFormat);
		};
		$json = json_encode($value);
		if (JSON_ERROR_NONE !== json_last_error()) {
			throw new Exception('The provided argument cannot be converted into JSON.', 1358440181);
		}
		return $json;
	}
	
	/**
	 * Converts any encountered DateTime instances to UNIXTIME timestamps
	 * which are then multiplied by 1000 to create a JavaScript appropriate
	 * time stamp - ready to be loaded into a Date object client-side.
	 *
	 * Works on already converted DomainObjects which are at this point just
	 * associative arrays of values - which might be DateTime instances.
	 *
	 * @param array $array
	 * @param string dateTimeFormat
	 * @return array
	 */
	protected function recursiveDateTimeToUnixtimeMiliseconds(array $array, $dateTimeFormat) {
		foreach ($array as $key => $possibleDateTime) {
			if (TRUE === $possibleDateTime instanceof \DateTime) {
				$array[$key] = $this->dateTimeToUnixtimeMiliseconds($possibleDateTime, $dateTimeFormat);
			} elseif (TRUE === is_array($possibleDateTime)) {
				$array[$key] = $this->recursiveDateTimeToUnixtimeMiliseconds($array[$key], $dateTimeFormat);
			}
		}
		return $array;
	}
	
	/**
	 * Formats a single DateTime instance to whichever value is demanded by
	 * the format specified in $dateTimeFormat (DateTime::format syntax).
	 * Default format is NULL a JS UNIXTIME (time()*1000) is produced.
	 *
	 * @param \DateTime $dateTime
	 * @param string $dateTimeFormat
	 * @return integer
	 */
	protected function dateTimeToUnixtimeMiliseconds(\DateTime $dateTime, $dateTimeFormat) {
		if (NULL === $dateTimeFormat) {
			return intval($dateTime->format('U')) * 1000;
		}
		return $dateTime->format($dateTimeFormat);
	}
	
	/**
	 * Convert an array of possible DomainObject instances. The argument
	 * $possibleDomainObjects could also an associative array representation
	 * of another DomainObject - which means each value could potentially
	 * be another DomainObject, an ObjectStorage of DomainObjects or a simple
	 * value type. The type is checked and another recursive call is used to
	 * convert any nested objects.
	 *
	 * @param Tx_Extbase_DomainObject_DomainObjectInterface[] $domainObjects
	 * @param boolean $preventRecursion
	 * @param mixed $recursionMarker
	 * @return array
	 */
	protected function recursiveArrayOfDomainObjectsToArray(array $domainObjects, $preventRecursion, $recursionMarker) {
		foreach ($domainObjects as $key => $possibleDomainObject) {
			if (TRUE === $possibleDomainObject instanceof DomainObjectInterface) {
				$domainObjects[$key] = $this->recursiveDomainObjectToArray($possibleDomainObject, $preventRecursion, $recursionMarker);
			} elseif (TRUE === $possibleDomainObject instanceof \Traversable) {
				$traversableAsArray = iterator_to_array($possibleDomainObject);
				$domainObjects[$key] = $this->recursiveArrayOfDomainObjectsToArray($traversableAsArray, $preventRecursion, $recursionMarker);
			}
		}
		return $domainObjects;
	}
	
	/**
	 * Convert a single DomainObject instance first to an array, then pass
	 * that array through recursive DomainObject detection. This will convert
	 * any 1:1, 1:n, n:1 and m:n relations.
	 *
	 * @param DomainObjectInterface $domainObject
	 * @param boolean $preventRecursion
	 * @param mixed $recursionMarker
	 * @return array
	 */
	protected function recursiveDomainObjectToArray(DomainObjectInterface $domainObject, $preventRecursion, $recursionMarker) {
		$hash = spl_object_hash($domainObject);
		if (TRUE === $preventRecursion && TRUE === in_array($hash, $this->encounteredClasses)) {
			return $recursionMarker;
		}
		$converted = ObjectAccess::getGettableProperties($domainObject);
		array_push($this->encounteredClasses, $hash);
		$converted = $this->recursiveArrayOfDomainObjectsToArray($converted, $preventRecursion, $recursionMarker);
		return $converted;
	}
}
?>