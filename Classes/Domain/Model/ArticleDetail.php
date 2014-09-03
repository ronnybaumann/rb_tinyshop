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
 * ArticleDetail
 */
class ArticleDetail extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';
	
	/**
	 * title
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\ArticleNumberValidator
	 */
	protected $articleNumber = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * mainImage
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $mainImage = NULL;

	/**
	 * price
	 *
	 * @var \RB\RbTinyshop\Domain\Model\Price
	 * @lazy
	 */
	protected $price = NULL;

	/**
	 * images
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Image>
	 * @lazy
	 * @cascade remove
	 */
	protected $images = NULL;

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
		$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the mainImage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $mainImage
	 */
	public function getMainImage() {
		return $this->mainImage;
	}

	/**
	 * Sets the mainImage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $mainImage
	 * @return void
	 */
	public function setMainImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $mainImage) {
		$this->mainImage = $mainImage;
	}

	/**
	 * Returns the price
	 *
	 * @return \RB\RbTinyshop\Domain\Model\Price $price
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * Sets the price
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Price $price
	 * @return void
	 */
	public function setPrice(\RB\RbTinyshop\Domain\Model\Price $price) {
		$this->price = $price;
	}

	/**
	 * Adds a Image
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Image $image
	 * @return void
	 */
	public function addImage(\RB\RbTinyshop\Domain\Model\Image $image) {
		$this->images->attach($image);
	}

	/**
	 * Removes a Image
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Image $imageToRemove The Image to be removed
	 * @return void
	 */
	public function removeImage(\RB\RbTinyshop\Domain\Model\Image $imageToRemove) {
		$this->images->detach($imageToRemove);
	}

	/**
	 * Returns the images
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Image> $images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Sets the images
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Image> $images
	 * @return void
	 */
	public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images) {
		$this->images = $images;
	}

}