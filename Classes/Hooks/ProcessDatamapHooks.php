<?php 
namespace RB\RbTinyshop\Hooks;

class ProcessDatamapHooks {
	/**
	 * waits for TCEmain commands and looks for changed pages, if found further
	 * changes take place to determine whether the cache needs to be updated
	 *
	 * @param string $status TCEmain operation status, either 'new' or 'update'
	 * @param string $table The DB table the operation was carried out on
	 * @param mixed $recordId The record's uid for update records, a string to look the record's uid up after it has been created
	 * @param array $updatedFields Array of changed fiels and their new values
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $tceMain TCEmain parent object
	 * @return void
	 */
	public function processDatamap_postProcessFieldArray ($status, $table, $recordId, array $updatedFields, \TYPO3\CMS\Core\DataHandling\DataHandler $tceMain) {
	}
}