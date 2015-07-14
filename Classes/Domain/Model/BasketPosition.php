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
 * BasketPosition
 */
class BasketPosition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
	 * mainImage
	 *
	 * @var string
	 */
	protected $image = '';

    /**
     * basketAttributes
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\BasketAttribute>
     * @lazy
     * @cascade remove
     */
    protected $basketAttributes = NULL;

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
        $this->basketAttributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the image
	 *
	 * @return string $image
	 */
	public function getImage() {
		return $this->image;
	}
	
	/**
	 * Sets the image
	 *
	 * @param string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
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
     * Adds a BasketAttribute
     *
     * @param \RB\RbTinyshop\Domain\Model\BasketAttribute $basketAttribute
     * @return void
     */
    public function addBasketAttribute(\RB\RbTinyshop\Domain\Model\BasketAttribute $basketAttribute) {
        $this->basketAttributes->attach($basketAttribute);
    }

    /**
     * Removes a BasketAttribute
     *
     * @param \RB\RbTinyshop\Domain\Model\BasketAttribute $basketAttributeToRemove The BasketAttribute to be removed
     * @return void
     */
    public function removeBasketAttribute(\RB\RbTinyshop\Domain\Model\BasketAttribute $basketAttributeToRemove) {
        $this->basketAttributes->detach($basketAttributeToRemove);
    }

    /**
     * Returns the basketAttributes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\BasketAttribute> $basketAttributes
     */
    public function getBasketAttributes() {
        return $this->basketAttributes;
    }

    /**
     * Sets the basketAttributes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\BasketAttribute> $basketAttributes
     * @return void
     */
    public function setBasketAttributes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $basketAttributes) {
        $this->basketAttributes = $basketAttributes;
    }
}