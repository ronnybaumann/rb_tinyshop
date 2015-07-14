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
 * ArticleAttribute
 */
class ArticleAttribute extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * AttributeGroup
     *
     * @var \RB\RbTinyshop\Domain\Model\AttributeGroup
     * @lazy
     */
    protected $attributeGroup = NULL;

    /**
     * Attribute
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Attribute>
     * @lazy
     */
    protected $attributes = NULL;

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
        $this->attributes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the attributeGroup
     *
     * @return \RB\RbTinyshop\Domain\Model\AttributeGroup $attributeGroup
     */
    public function getAttributeGroup() {
        return $this->attributeGroup;
    }

    /**
     * Sets the attributeGroup
     *
     * @param \RB\RbTinyshop\Domain\Model\AttributeGroup $attributeGroup
     * @return void
     */
    public function setAttributeGroup(\RB\RbTinyshop\Domain\Model\AttributeGroup $attributeGroup) {
        $this->attributeGroup = $attributeGroup;
    }

    /**
     * Adds a Attribute
     *
     * @param \RB\RbTinyshop\Domain\Model\Attribute $attribute
     * @return void
     */
    public function addAttribute(\RB\RbTinyshop\Domain\Model\Attribute $attribute) {
        $this->attributes->attach($attribute);
    }

    /**
     * Removes a Attribute
     *
     * @param \RB\RbTinyshop\Domain\Model\Attribute $attributeToRemove The Image to be removed
     * @return void
     */
    public function removeAttribute(\RB\RbTinyshop\Domain\Model\Attribute $attributeToRemove) {
        $this->attributes->detach($attributeToRemove);
    }

    /**
     * Returns the attributes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Attribute> $attributes
     */
    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * Sets the attributes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Attribute> $attributes
     * @return void
     */
    public function setAttributes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attributes) {
        $this->attributes = $attributes;
    }

}