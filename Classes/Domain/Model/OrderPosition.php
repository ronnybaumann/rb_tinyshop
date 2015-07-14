<?php
namespace RB\RbTinyshop\Domain\Model;

use \TYPO3\CMS\Extbase\Validation\Validator\NotEmptyValidator;
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
 * OrderPosition
 */
class OrderPosition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';
	
	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $articleNumber = '';
	
	/**
	 * price
	 *
	 * @var float
	 * @validate NotEmpty
	 */
	protected $price = 0.0;
	
	/**
	 * quantity
	 *
	 * @var float
	 * @validate NotEmpty
	 */
	protected $quantity = 1.0;

    /**
     * orderAttributes
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderAttribute>
     * @lazy
     * @cascade remove
     */
    protected $orderAttributes = NULL;

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
        $this->orderAttributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
	
	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Returns the articleNumber
	 *
	 * @return string $articleNumber
	 */
	public function getArticleNumber() {
		return $this->articleNumber;
	}
	
	/**
	 * Sets the articleNumber
	 *
	 * @param string $articleNumber
	 * @return void
	 */
	public function setArticleNumber($articleNumber) {
		$this->articleNumber = $articleNumber;
	}
	
	/**
	 * Returns the price
	 *
	 * @return float $price
	 */
	public function getPrice() {
		return $this->price;
	}
	
	/**
	 * Sets the price
	 *
	 * @param float $price
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
	}
	
	/**
	 * Returns the quantity
	 *
	 * @return float $quantity
	 */
	public function getQuantity() {
		return $this->quantity;
	}
	
	/**
	 * Sets the quantity
	 *
	 * @param float $quantity
	 * @return void
	 */
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}
	
	/**
	 * Returns the price
	 *
	 * @return float $price
	 */
	public function getTotal() {
		return $this->price * $this->quantity;
	}

    /**
     * Adds a OrderAttribute
     *
     * @param \RB\RbTinyshop\Domain\Model\OrderAttribute $orderAttribute
     * @return void
     */
    public function addOrderAttribute(\RB\RbTinyshop\Domain\Model\OrderAttribute $orderAttribute) {
        $this->orderAttributes->attach($orderAttribute);
    }

    /**
     * Removes a OrderAttribute
     *
     * @param \RB\RbTinyshop\Domain\Model\OrderAttribute $orderAttributeToRemove The OrderAttribute to be removed
     * @return void
     */
    public function removeOrderAttribute(\RB\RbTinyshop\Domain\Model\OrderAttribute $orderAttributeToRemove) {
        $this->orderAttributes->detach($orderAttributeToRemove);
    }

    /**
     * Returns the orderAttributes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderAttribute> $orderAttributes
     */
    public function getOrderAttributes() {
        return $this->orderAttributes;
    }

    /**
     * Sets the orderAttributes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\OrderAttribute> $orderAttributes
     * @return void
     */
    public function setOrderAttributes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $orderAttributes) {
        $this->orderAttributes = $orderAttributes;
    }
}