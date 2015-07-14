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
 * OrderAttribute
 */
class OrderAttribute extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * groupUid
     *
     * @var int
     */
    protected $groupUid;

    /**
     * groupTitle
     *
     * @var string
     * @validate NotEmpty
     */
    protected $groupTitle = '';

    /**
     * attributeUid
     *
     * @var int
     */
    protected $attributeUid;

    /**
     * attributeTitle
     *
     * @var string
     * @validate NotEmpty
     */
    protected $attributeTitle = '';

    /**
     * Returns the groupUid
     *
     * @return string $groupUid
     */
    public function getGroupUid() {
        return $this->groupUid;
    }

    /**
     * Sets the groupUid
     *
     * @param string $groupUid
     * @return void
     */
    public function setGroupUid($groupUid) {
        $this->groupUid = $groupUid;
    }

    /**
     * Returns the groupTitle
     *
     * @return string $groupTitle
     */
    public function getGroupTitle() {
        return $this->groupTitle;
    }

    /**
     * Sets the groupTitle
     *
     * @param string $groupTitle
     * @return void
     */
    public function setGroupTitle($groupTitle) {
        $this->groupTitle = $groupTitle;
    }

    /**
     * Returns the attributeUid
     *
     * @return string $attributeUid
     */
    public function getAttributeUid() {
        return $this->attributeUid;
    }

    /**
     * Sets the attributeUid
     *
     * @param string $attributeUid
     * @return void
     */
    public function setAttributeUid($attributeUid) {
        $this->attributeUid = $attributeUid;
    }

    /**
     * Returns the attributeTitle
     *
     * @return string $attributeTitle
     */
    public function getAttributeTitle() {
        return $this->attributeTitle;
    }

    /**
     * Sets the attributeTitle
     *
     * @param string $attributeTitle
     * @return void
     */
    public function setAttributeTitle($attributeTitle) {
        $this->attributeTitle = $attributeTitle;
    }
}