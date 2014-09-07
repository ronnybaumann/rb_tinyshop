<?php
namespace RB\RbTinyshop\Domain\Model;


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
 * User
 */
class User extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser {
	
	/**
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\EmailValidator
	 */
	protected $username = '';
	
	/**
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\PasswordValidator
	 */
	protected $password = '';
	
	/**
	 * @var string
	 */
	protected $passwordConfirm = '';
	
	/**
	 * billingAddress
	 *
	 * @var \RB\RbTinyshop\Domain\Model\Address
	 * @lazy
	 */
	protected $billingAddress = NULL;
	
	/**
	 * shippingAddress
	 *
	 * @var \RB\RbTinyshop\Domain\Model\Address
	 * @lazy
	 */
	protected $shippingAddress = NULL;
	
	/**
	 * payment
	 *
	 * @var \RB\RbTinyshop\Domain\Model\Payment
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @lazy
	 */
	protected $payment = NULL;
	
	/**
	 * shipping
	 *
	 * @var \RB\RbTinyshop\Domain\Model\Shipping
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @lazy
	 */
	protected $shipping = NULL;
	
	/**
	 * @var boolean
	 */
	protected $differShipping = FALSE;
	
	/**
	 * Returns the billingAddress
	 *
	 * @return \RB\RbTinyshop\Domain\Model\Address $billingAddress
	 */
	public function getBillingAddress() {
		return $this->billingAddress;
	}
	
	/**
	 * Sets the billingAddress
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Address $billingAddress
	 * @return void
	 */
	public function setBillingAddress(\RB\RbTinyshop\Domain\Model\Address $billingAddress) {
		$this->billingAddress = $billingAddress;
	}
	
	/**
	 * Returns the shippingAddress
	 *
	 * @return \RB\RbTinyshop\Domain\Model\Address $shippingAddress
	 */
	public function getShippingAddress() {
		return $this->shippingAddress;
	}
	
	/**
	 * Sets the shippingAddress
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Address $shippingAddress
	 * @return void
	 */
	public function setShippingAddress(\RB\RbTinyshop\Domain\Model\Address $shippingAddress) {
		$this->shippingAddress = $shippingAddress;
	}
	
	/**
	 * Returns the payment
	 *
	 * @return \RB\RbTinyshop\Domain\Model\Payment $payment
	 */
	public function getPayment() {
		return $this->payment;
	}
	
	/**
	 * Sets the payment
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Payment $payment
	 * @return void
	 */
	public function setPayment(\RB\RbTinyshop\Domain\Model\Payment $payment) {
		$this->payment = $payment;
	}
	
	/**
	 * Returns the shipping
	 *
	 * @return \RB\RbTinyshop\Domain\Model\Shipping $shipping
	 */
	public function getShipping() {
		return $this->shipping;
	}
	
	/**
	 * Sets the shipping
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Shipping $shipping
	 * @return void
	 */
	public function setShipping(\RB\RbTinyshop\Domain\Model\Shipping $shipping) {
		$this->shipping = $shipping;
	}

    /**
     * Sets passwordConfirm
     * 
     * @return string
     */
    public function getPasswordConfirm(){
        return $this->passwordConfirm;
    }

    /**
     * Sets passwordConfirm
     * 
     * @param string $passwordConfirm
     */
    public function setPasswordConfirm($passwordConfirm){
        $this->passwordConfirm = $passwordConfirm;
    }
    
    /**
     * Sets differShipping
     * 
     * @param boolean $differShipping
     * @return void
     */
    public function setDifferShipping($differShipping) {
    	$this->differShipping = $differShipping;
    }
    
    /**
     * Sets differShipping
     * 
     * @return boolean
     */
    public function getDifferShipping() {
    	return $this->differShipping;
    }
}