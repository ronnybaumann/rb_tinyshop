<?php
namespace RB\RbTinyshop\Domain\Validator;

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
 * Validator for object User
 *
 * @api
 */
class UserValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * userRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository = NULL;
	
	static protected $userErrors = array('passwordConfirm' => false, 'emailExists' => false);

	/**
	 * Checks if the user Model is valid
	 *
	 * If at least one error occurred, the result is FALSE.
	 *
	 * @param mixed $value The value that should be validated
	 * @return boolean TRUE if the value is valid, FALSE if an error occurred
	 */
	public function isValid($user) {
		if($user instanceof \RB\RbTinyshop\Domain\Model\User) {
			$userIsValid = true;
			$isUpdate = false;
			
			//fill email address with username value
			$user->setEmail($user->getUsername());
			
			//check if its an update action
			$userExist = $this->userRepository->findByUid($user->getUid());
			if($userExist instanceof \RB\RbTinyshop\Domain\Model\User) {
				$isUpdate = true;
			}
			
			//clone billing to shipping if differShipping is set
			if(!$user->getDifferShipping()) {
				if ($user->getBillingAddress() instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
					$user->getBillingAddress()->_loadRealInstance();
				}
				if($isUpdate) {
					$user->getShippingAddress()->setSalutation($user->getBillingAddress()->getSalutation());
					$user->getShippingAddress()->setCompany($user->getBillingAddress()->getCompany());
					$user->getShippingAddress()->setFirstname($user->getBillingAddress()->getFirstname());
					$user->getShippingAddress()->setLastname($user->getBillingAddress()->getLastname());
					$user->getShippingAddress()->setStreet($user->getBillingAddress()->getStreet());
					$user->getShippingAddress()->setStreetNumber($user->getBillingAddress()->getStreetNumber());
					$user->getShippingAddress()->setPostcode($user->getBillingAddress()->getPostcode());
					$user->getShippingAddress()->setCity($user->getBillingAddress()->getCity());
					$user->getShippingAddress()->setCountry($user->getBillingAddress()->getCountry());
				}
				else {
					$user->setShippingAddress(clone $user->getBillingAddress());
				}
			}
			
			//check passwordConfirm
			if(!$isUpdate) {	
				if($user->getPassword() !== $user->getPasswordConfirm()) {
					if(!UserValidator::$userErrors['passwordConfirm']) {
						$this->addError($this->translateErrorMessage('validator.password.notconfirm', 'rb_tinyshop'), time());
					}
					UserValidator::$userErrors['passwordConfirm'] = true;
					$userIsValid = false;
				}
			}
			
			//check email address already exists
			$userNameExist = $this->userRepository->findOneByUsername($user->getUsername());
			if($userNameExist instanceof \RB\RbTinyshop\Domain\Model\User) {
				if($userNameExist->getUid() !== $user->getUid()) {
					if(!UserValidator::$userErrors['emailExists']) {
						$this->addError($this->translateErrorMessage('validator.email.exist', 'rb_tinyshop'), time());
					}
					UserValidator::$userErrors['emailExists'] = true;
					$userIsValid = false;
				}
			}
			
			return $userIsValid;
		}
		else {
			$this->addError('The given Object is not a User.', time());
			return false;
		}
	}
}