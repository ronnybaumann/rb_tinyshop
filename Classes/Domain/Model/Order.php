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
}