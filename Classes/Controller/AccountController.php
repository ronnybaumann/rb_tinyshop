<?php
namespace RB\RbTinyshop\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Ronny Baumann <ronnybaumann80@gmail.com>, aritso - Internet Solutions
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * AccountController
 */
class AccountController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * feSessionStorage
	 *
	 * @var \RB\RbTinyshop\Utility\Session\Storage\FeSessionStorage
	 * @inject
	 */
	protected $feSessionStorage = NULL;
	
	/**
	 * userRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository = NULL;
	
	/**
	 * addressRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\AddressRepository
	 * @inject
	 */
	protected $addressRepository = NULL;
	
	/**
	 * userGroupRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\UserGroupRepository
	 * @inject
	 */
	protected $userGroupRepository = NULL;
	
	/**
	 * pamentRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\PaymentRepository
	 * @inject
	 */
	protected $paymentRepository = NULL;
	
	/**
	 * shippingRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\ShippingRepository
	 * @inject
	 */
	protected $shippingRepository = NULL;
	
	/**
	 * persistenceManager
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager;
	
	/**
	 * allow creation for subproperties billingaddress and shippingaddress
	 *
	 * @return void
	 */
	public function initializeCreateAction() {
		if ($this->arguments->hasArgument('newUser')) {
			$this->arguments->getArgument('newUser')->getPropertyMappingConfiguration()->allowCreationForSubProperty('billingAddress');
			$this->arguments->getArgument('newUser')->getPropertyMappingConfiguration()->allowCreationForSubProperty('shippingAddress');
		}
	}
	
	/**
	 * action login
	 *
	 * @return void
	 */
	public function loginAction() {
		$arguments = $this->request->getArguments();
		if(!$this->feSessionStorage->getUser()->user['uid']) {
			if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['felogin']['loginFormOnSubmitFuncs'])) {
				$_params = array();
				foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['felogin']['loginFormOnSubmitFuncs'] as $funcRef) {
					list($onSub, $hid) = \TYPO3\CMS\Core\Utility\GeneralUtility::callUserFunction($funcRef, $_params, $this);
					$onSubmitAr[] = $onSub;
					$extraHiddenAr[] = $hid;
				}
			}

			if (count($onSubmitAr)) {
				$onSubmit = implode('; ', $onSubmitAr).'; return true;';
			}
			
			if (count($extraHiddenAr)) {
				$extraHidden = implode(LF, $extraHiddenAr);
			}
			
			if($arguments['loginForm'] == 'submit') {
				$this->addFlashMessage('Bitte überprüfen Sie Ihren Benutzernamen und Ihr Passwort', 'Login fehlgeschlagen', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
			}
			 
			$this->view->assign('onSubmit', $onSubmit);
			$this->view->assign('extraHidden', $extraHidden);
			$this->view->assign('arguments', $arguments);
		}
		elseif($this->feSessionStorage->has('redirectAction') && $this->feSessionStorage->has('redirectController')) {
			$this->redirect($this->feSessionStorage->read('redirectAction'), $this->feSessionStorage->read('redirectController'), 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
		else {
			$this->redirect('account', 'Account', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
	}
	
	/**
	 * action login
	 *
	 * @return void
	 */
	public function accountAction() {
		$this->feSessionStorage->remove('redirectAction');
		$this->feSessionStorage->remove('redirectController');
		if(!$this->feSessionStorage->getUser()->user['uid']) {
			$this->redirect('login', 'Account', 'RbTinyshop', array('pluginName' => 'Tinyshop', 'redirectAction' => 'account', 'redirectController' => 'Account'), $this->settings['shopRootId']);
		}
		else {
			$user = $this->userRepository->findByUid($this->feSessionStorage->getUser()->user['uid']);
			$this->view->assign('user', $user);
		}
	}
	
	/**
	 * action register
	 *
	 * @param \RB\RbTinyshop\Domain\Model\User $newUser
	 * @ignorevalidation $newUser
	 * @return void
	 */
	public function registerAction(\RB\RbTinyshop\Domain\Model\User $newUser = NULL) {
		$newUser = new \RB\RbTinyshop\Domain\Model\User;
		$payments = $this->paymentRepository->findAll();
		$shippings = $this->shippingRepository->findAll();
		
		$this->view->assign('payments', $payments);
		$this->view->assign('shippings', $shippings);
		$this->view->assign('newUser', $newUser);
	}
	
	/**
	 * action create
	 * 
	 * @param \RB\RbTinyshop\Domain\Model\User $newUser
	 * @return void
	 */
	public function createAction(\RB\RbTinyshop\Domain\Model\User $newUser) {
		$userGroup = $this->userGroupRepository->findByUid($this->settings['uidUserGroupNewUser']);
		$newUser->addUsergroup($userGroup);
		$newUser->setPid($this->settings['storagePidUsers']);
		
		// fill TYPO3 standard fields with billing data
		$billingAddress = $newUser->getBillingAddress();
		$newUser->setCompany($billingAddress->getCompany());
		$newUser->setName($billingAddress->getFirstname() . ' ' . $billingAddress->getLastname());
		$newUser->setFirstName($billingAddress->getFirstname());
		$newUser->setLastName($billingAddress->getLastname());
		$newUser->setAddress($billingAddress->getStreet() . ' ' . $billingAddress->getStreetNumber());
		$newUser->setZip($billingAddress->getPostcode());
		$newUser->setCity($billingAddress->getCity());
		$newUser->setCountry($billingAddress->getCountry());
		
		// salt password
		$newUser->setPassword($this->saltPassword($newUser->getPassword()));
		
		$this->userRepository->add($newUser);
		$this->persistenceManager->persistAll();
		$this->loginAfterRegister($newUser);
		
		if($this->feSessionStorage->has('redirectAction') && $this->feSessionStorage->has('redirectController')) {
			$this->redirect($this->feSessionStorage->read('redirectAction'), $this->feSessionStorage->read('redirectController'), 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
		else {
			$this->redirect('account');
		}
	}
	
	/**
	 * action edit
	 *
	 * @param \RB\RbTinyshop\Domain\Model\User $user
	 * @ignorevalidation $user
	 * @return void
	 */
	public function editAction(\RB\RbTinyshop\Domain\Model\User $user) {
		$payments = $this->paymentRepository->findAll();
		$shippings = $this->shippingRepository->findAll();
		
		$this->view->assign('payments', $payments);
		$this->view->assign('shippings', $shippings);
		$this->view->assign('user', $user);
	}
	
	/**
	 * action edit
	 *
	 * @param \RB\RbTinyshop\Domain\Model\User $user
	 * @ignorevalidation $user
	 * @return void
	 */
	public function editBillingShippingAddressAction(\RB\RbTinyshop\Domain\Model\User $user) {
		$this->view->assign('user', $user);
	}
	
	/**
	 * action edit
	 *
	 * @param \RB\RbTinyshop\Domain\Model\User $user
	 * @ignorevalidation $user
	 * @return void
	 */
	public function editPaymentShippingAction(\RB\RbTinyshop\Domain\Model\User $user) {
		$payments = $this->paymentRepository->findAll();
		$shippings = $this->shippingRepository->findAll();
		
		$this->view->assign('payments', $payments);
		$this->view->assign('shippings', $shippings);
		$this->view->assign('user', $user);
	}
	
	/**
	 * action update
	 *
	 * @param \RB\RbTinyshop\Domain\Model\User $user
	 * @return void
	 */
	public function updateAction(\RB\RbTinyshop\Domain\Model\User $user) {
		$this->userRepository->update($user);
		$this->persistenceManager->persistAll();
		
		if($this->feSessionStorage->has('redirectAction') && $this->feSessionStorage->has('redirectController')) {
			$this->redirect($this->feSessionStorage->read('redirectAction'), $this->feSessionStorage->read('redirectController'), 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
		else {
			$this->redirect('account');
		}
	}
	
	/**
	 * action forgotPassword
	 *
	 * @param string $email
	 * @return void
	 */
	public function forgotPasswordAction($email = NULL) {
		$user = $this->userRepository->findOneByUsername($email);
		if($user instanceof \RB\RbTinyshop\Domain\Model\User) {
			$newPassword = $this->getNewPassword();
			if($this->sendForgotPasswordMail($newPassword, $user->getEmail(), $user->getName())){
				$user->setPassword($this->saltPassword($newPassword));
				$this->userRepository->update($user);
				$this->persistenceManager->persistAll();
				$this->redirect('login');
			}
			else {
				$this->addFlashMessage('Beim erstellen des Passwortes ist ein Fehler aufgetreten', 'Fehler');
			}
		}
	}
	
	/**
	 * Login User after registration
	 *
	 * @param \RB\RbTinyshop\Domain\Model\User $user
	 * @return void
	 */
	protected function loginAfterRegister($user) {
		$GLOBALS['TSFE']->fe_user->checkPid = '';
		$info = $GLOBALS['TSFE']->fe_user->getAuthInfoArray();
		$user = $GLOBALS['TSFE']->fe_user->fetchUserRecord($info['db_user'], $user->getUsername());
		$GLOBALS['TSFE']->fe_user->createUserSession($user);
	}
	
	protected function saltPassword($password) {
		$saltedPassword = '';
		if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('saltedpasswords')) {
			if (\TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility::isUsageEnabled('FE')) {
				$objInstanceSaltedPw = \TYPO3\CMS\Saltedpasswords\Salt\SaltFactory::getSaltingInstance();
				$saltedPassword = $objInstanceSaltedPw->getHashedPassword($password);
			}
		}
		else {
			$saltedPassword = md5($password);
			$newUser->setPassword(md5($newUser->getPassword()));
		}
		return $saltedPassword;
	}
	
	protected function getNewPassword($passwordLength = 8) {
		mt_srand();
		$newPassword = '';
		$allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$randomMax = strlen($allowedCharacters) - 1;
		
		for($i = 0; $i < $passwordLength; $i++) {
			$newPassword .= $allowedCharacters[mt_rand(0, $randomMax)];
		}
		
		return $newPassword;
	}
	
	protected function sendForgotPasswordMail($newPassword, $toMail, $toName) {
		$message = new \TYPO3\CMS\Core\Mail\MailMessage();
		$message->setFrom(array($this->settings['shopMail'] => $this->settings['shopMailName']));
		$message->setTo(array($toMail => $toName));
		$message->setBody('Ihr neues Passwort lautet: ' . $newPassword . '. Bitte ändern Sie aus Sicherheitsgründen dieses Passwort in Ihrem Benutzerkonto.');
		$message->send();
		
		if($message->isSent()) {
			return true;
		} else {
			return false;
		}
		
	}
}