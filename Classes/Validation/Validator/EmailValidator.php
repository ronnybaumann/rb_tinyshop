<?php
namespace RB\RbTinyshop\Validation\Validator;

/***************************************************************
 *  Copyright notice
*
*  (c) 2010-2013 Extbase Team (http://forge.typo3.org/projects/typo3v4-mvc)
*  Extbase is a backport of TYPO3 Flow. All credits go to the TYPO3 Flow team.
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the text file GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Validator for not empty values.
*
* @api
*/
class EmailValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * This validator always needs to be executed even if the given value is empty.
	 * See AbstractValidator::validate()
	 *
	 * @var boolean
	 */
	protected $acceptsEmptyValues = FALSE;
	
	/**
	 * userRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository = NULL;

	/**
	 * Checks if the given property ($propertyValue) is not empty (NULL, empty string, empty array or empty object).
	 *
	 * If at least one error occurred, the result is FALSE.
	 *
	 * @param mixed $value The value that should be validated
	 * @return boolean TRUE if the value is valid, FALSE if an error occurred
	 */
	public function isValid($value) {
		if ($value === NULL) {
			$this->addError(
					$this->translateErrorMessage(
							'validator.notempty.null',
							'rb_tinyshop'
					), time());
		}
		if ($value === '') {
			$this->addError(
					$this->translateErrorMessage(
							'validator.notempty.empty',
							'rb_tinyshop'
					), time());
		}
		if (is_array($value) && empty($value)) {
			$this->addError(
					$this->translateErrorMessage(
							'validator.notempty.empty',
							'rb_tinyshop'
					), time());
		}
		if (is_object($value) && $value instanceof \Countable && $value->count() === 0) {
			$this->addError(
					$this->translateErrorMessage(
							'validator.notempty.empty',
							'rb_tinyshop'
					), time());
		}
		
		if(!$this->checkEmail($value)) {
			$this->addError($this->translateErrorMessage('validator.email.notvalid', 'rb_tinyshop'), 1347992453);
		}
	}
	
	protected function checkEmail($email) {
	    /**
	     * email validation
	     * criterien:
	     * erlaubte zeichen lokalteil
	     * ! -> 33, # -> 35, $ -> 36, % -> 37, & -> 38, ' -> 39, * -> 42, + -> 43, - -> 45, . -> 46, / -> 47, = -> 61, ? -> 63, ^ -> 94, _ -> 95, ` -> 96, { -> 123, | -> 124, } -> 125, ~ -> 126
	     * 0-9 -> 48-57,
	     * A-Z -> 65-90
	     * a-z -> 97-122
	     * zusammengefasst: 33, 35-39, 42-43, 45-57, 61, 63, 65-90, 94-126
	     * am anfang und ende sind . verboten
	     *
	     * host wird über checkdnsrr überprüft
	     */
	
	    if(empty($email) || !isset($email) || $email == false) {
	        return false;
	    }
	
	    $arrEmail = explode('@', $email);
	    $mailLocal = $arrEmail[0];
	    $mailLocalLen = strlen($mailLocal);
	    
	    if(count($arrEmail) != 2) {
	        return false;
	    }
	    
	    if(!checkdnsrr($arrEmail[1])) {
	        return false;
	    }
	    
	    if($mailLocal[0] == '.' || $mailLocal[$mailLocalLen-1] == '.') {
	        return false;
	    }
	
	    for($i = 0; $i < $mailLocalLen; $i++) {
	        $code = ord($mailLocal[$i]);
	        if($code == 33 || $code == 61 || $code == 63 || $code == 42 || $code == 43 || ($code >= 35 && $code <= 39) || ($code >= 45 && $code <= 57) || ($code >= 65 && $code <= 90) || ($code >= 94 && $code <= 126)) {
	            continue;
	        }
	        return false;
	    }
	    return true;
	}
}