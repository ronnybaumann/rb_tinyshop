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
 * Basket
 */
class Basket extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * userUid
	 *
	 * @var int
	 */
	protected $userUid;
	
	/**
	 * total
	 *
	 * @var float
	 */
	protected $total = 0.0;
	
	/**
	 * basketPositions
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\BasketPosition>
	 * @lazy
	 */
	protected $basketPositions = NULL;
	
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
		$this->basketPositions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	/**
	 * Returns the userUid
	 *
	 * @return float $userUid
	 */
	public function getUserUid() {
		return $this->userUid;
	}
	
	/**
	 * Sets the userUid
	 *
	 * @param float $userUid
	 * @return void
	 */
	public function setUserUid($userUid) {
		$this->userUid = $userUid;
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
	 * Adds a BasketPosition
	 *
	 * @param \RB\RbTinyshop\Domain\Model\BasketPosition $basketPosition
	 * @return void
	 */
	public function addBasketPosition(\RB\RbTinyshop\Domain\Model\BasketPosition $basketPosition) {
		$this->basketPositions->attach($basketPosition);
	}
	
	/**
	 * Removes a BasketPosition
	 *
	 * @param \RB\RbTinyshop\Domain\Model\BasketPosition $basketPositionToRemove The BasketPosition to be removed
	 * @return void
	 */
	public function removeBasketPosition(\RB\RbTinyshop\Domain\Model\BasketPosition $basketPositionToRemove) {
		$this->basketPositions->detach($basketPositionToRemove);
	}
	
	/**
	 * Returns the basketPositions
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\BasketPosition> $basketPositions
	 */
	public function getBasketPositions() {
		return $this->basketPositions;
	}
	
	/**
	 * Sets the basketPositions
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\BasketPosition> $basketPositions
	 * @return void
	 */
	public function setBasketPositions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $basketPositions) {
		$this->basketPositions = $basketPositions;
	}

}