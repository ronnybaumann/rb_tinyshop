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
 * Article
 */
class Article extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * categorys
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Category>
	 * @lazy
	 */
	protected $categorys = NULL;

	/**
	 * articleDetail
	 *
	 * @var \RB\RbTinyshop\Domain\Model\ArticleDetail
	 * @lazy
	 */
	protected $articleDetail = NULL;

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
		$this->categorys = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Category
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\RB\RbTinyshop\Domain\Model\Category $category) {
		$this->categorys->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\RB\RbTinyshop\Domain\Model\Category $categoryToRemove) {
		$this->categorys->detach($categoryToRemove);
	}

	/**
	 * Returns the categorys
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Category> $categorys
	 */
	public function getCategorys() {
		return $this->categorys;
	}

	/**
	 * Sets the categorys
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Category> $categorys
	 * @return void
	 */
	public function setCategorys(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categorys) {
		$this->categorys = $categorys;
	}

	/**
	 * Returns the articleDetail
	 *
	 * @return \RB\RbTinyshop\Domain\Model\ArticleDetail $articleDetail
	 */
	public function getArticleDetail() {
		return $this->articleDetail;
	}

	/**
	 * Sets the articleDetail
	 *
	 * @param \RB\RbTinyshop\Domain\Model\ArticleDetail $articleDetail
	 * @return void
	 */
	public function setArticleDetail(\RB\RbTinyshop\Domain\Model\ArticleDetail $articleDetail) {
		$this->articleDetail = $articleDetail;
	}

}