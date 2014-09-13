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
 * Order
 */
class Order extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * crdate
	 *
	 * @var \DateTime|NULL
	 */
	protected $crdate = NULL;
	
	/**
	 * payment
	 *
	 * @var string
	 */
	protected $payment = NULL;
	
	/**
	 * shipping
	 *
	 * @var string
	 */
	protected $shipping = NULL;
	
	/**
	 * total
	 *
	 * @var float
	 */
	protected $total = 0.0;
	
	/**
	 * orderState
	 *
	 * @var \RB\RbTinyshop\Domain\Model\OrderState
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @lazy
	 */
	protected $orderState = NULL;
	
	/**
	 * orderPositions
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderPosition>
	 * @cascade remove
	 * @lazy
	 */
	protected $orderPositions = NULL;
	
	/**
	 * orderPartialPrices
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderPartialPrice>
	 * @cascade remove
	 * @lazy
	 */
	protected $orderPartialPrices = NULL;
	
	/**
	 * billingAddress
	 *
	 * @var \RB\RbTinyshop\Domain\Model\Address
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @cascade remove
	 * @lazy
	 */
	protected $billingAddress = NULL;
	
	/**
	 * shippingAddress
	 *
	 * @var \RB\RbTinyshop\Domain\Model\Address
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @cascade remove
	 * @lazy
	 */
	protected $shippingAddress = NULL;
	
	/**
	 * feuser
	 *
	 * @var \RB\RbTinyshop\Domain\Model\User
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @lazy
	 */
	protected $feuser = NULL;
	
	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}
	
	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->orderPositions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->orderPartialPrices = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	/**
	 * Sets the crdate value
	 *
	 * @param \DateTime $crdate
	 * @return void
	 */
	public function setCrdate(\DateTime $crdate) {
		$this->crdate = $crdate;
	}
	
	/**
	 * Returns the crdate value
	 *
	 * @return \DateTime
	 */
	public function getCrdate() {
		return $this->crdate;
	}
	
	/**
	 * Returns the payment
	 *
	 * @return float $payment
	 */
	public function getPayment() {
		return $this->payment;
	}
	
	/**
	 * Sets the payment
	 *
	 * @param float $payment
	 * @return void
	 */
	public function setPayment($payment) {
		$this->payment = $payment;
	}
	
	/**
	 * Returns the shipping
	 *
	 * @return float $shipping
	 */
	public function getShipping() {
		return $this->shipping;
	}
	
	/**
	 * Sets the shipping
	 *
	 * @param float $shipping
	 * @return void
	 */
	public function setShipping($shipping) {
		$this->shipping = $shipping;
	}
	

	/**
	 * Returns the total
	 *
	 * @return float $total
	 */
	public function getTotal() {
		return $this->total;
	}

	/**
	 * Sets the total
	 *
	 * @param float $total
	 * @return void
	 */
	public function setTotal($total) {
		$this->total = $total;
	}
	
	/**
	 * Returns the orderState
	 *
	 * @return \RB\RbTinyshop\Domain\Model\OrderState $orderState
	 */
	public function getOrderState() {
		return $this->orderState;
	}
	
	/**
	 * Sets the orderState
	 *
	 * @param \RB\RbTinyshop\Domain\Model\OrderState $orderState
	 * @return void
	 */
	public function setOrderState(\RB\RbTinyshop\Domain\Model\OrderState $orderState) {
		$this->orderState = $orderState;
	}
	
	/**
	 * Adds a OrderPosition
	 *
	 * @param \RB\RbTinyshop\Domain\Model\OrderPosition $orderPosition
	 * @return void
	 */
	public function addOrderPosition(\RB\RbTinyshop\Domain\Model\OrderPosition $orderPosition) {
		$this->orderPositions->attach($orderPosition);
	}
	
	/**
	 * Removes a OrderPosition
	 *
	 * @param \RB\RbTinyshop\Domain\Model\OrderPosition $orderPositionToRemove The BasketPosition to be removed
	 * @return void
	 */
	public function removeOrderPosition(\RB\RbTinyshop\Domain\Model\OrderPosition $orderPositionToRemove) {
		$this->orderPositions->detach($orderPositionToRemove);
	}
	
	/**
	 * Returns the orderPositions
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderPosition> $orderPositions
	 */
	public function getOrderPositions() {
		return $this->orderPositions;
	}
	
	/**
	 * Sets the orderPositions
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderPosition> $orderPositions
	 * @return void
	 */
	public function setOrderPositions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $orderPositions) {
		$this->orderPositions = $orderPositions;
	}
	
	/**
	 * Adds a OrderPartialPrice
	 *
	 * @param \RB\RbTinyshop\Domain\Model\OrderPartialPrice $orderPartialPrice
	 * @return void
	 */
	public function addOrderPartialPrice(\RB\RbTinyshop\Domain\Model\OrderPartialPrice $orderPartialPrice) {
		$this->orderPartialPrices->attach($orderPartialPrice);
	}
	
	/**
	 * Removes a OrderPartialPrice
	 *
	 * @param \RB\RbTinyshop\Domain\Model\OrderPartialPrice $orderPartialPriceToRemove The OrderPartialPrice to be removed
	 * @return void
	 */
	public function removeOrderPartialPrice(\RB\RbTinyshop\Domain\Model\OrderPartialPrice $orderPartialPriceToRemove) {
		$this->orderPartialPrices->detach($orderPartialPriceToRemove);
	}
	
	/**
	 * Returns the orderPartialPrices
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderPartialPrice> $orderPartialPrices
	 */
	public function getOrderPartialPrices() {
		return $this->orderPartialPrices;
	}
	
	/**
	 * Sets the orderPartialPrices
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderPartialPrice> $orderPartialPrices
	 * @return void
	 */
	public function setOrderPartialPrices(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $orderPartialPrices) {
		$this->orderPartialPrices = $orderPartialPrices;
	}
	
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
	 * Returns the feuser
	 *
	 * @return \RB\RbTinyshop\Domain\Model\User $feuser
	 */
	public function getFeuser() {
		return $this->feuser;
	}
	
	/**
	 * Sets the feuser
	 *
	 * @param \RB\RbTinyshop\Domain\Model\User $feuser
	 * @return void
	 */
	public function setFeuser(\RB\RbTinyshop\Domain\Model\User $feuser) {
		$this->feuser = $feuser;
	}
}