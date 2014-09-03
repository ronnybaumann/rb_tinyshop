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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 * @lazy
	 */
	protected $image = NULL;

	/**
	 * subCategorys
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Category>
	 * @lazy
	 * @cascade remove
	 */
	protected $subCategorys = NULL;

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
		$this->subCategorys = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Adds a Category
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Category $subCategory
	 * @return void
	 */
	public function addSubCategory(\RB\RbTinyshop\Domain\Model\Category $subCategory) {
		$this->subCategorys->attach($subCategory);
	}

	/**
	 * Removes a Category
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Category $subCategoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeSubCategory(\RB\RbTinyshop\Domain\Model\Category $subCategoryToRemove) {
		$this->subCategorys->detach($subCategoryToRemove);
	}

	/**
	 * Returns the subCategorys
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Category> $subCategorys
	 */
	public function getSubCategorys() {
		return $this->subCategorys;
	}

	/**
	 * Sets the subCategorys
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Category> $subCategorys
	 * @return void
	 */
	public function setSubCategorys(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $subCategorys) {
		$this->subCategorys = $subCategorys;
	}
}