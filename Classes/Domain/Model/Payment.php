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
 * Payment
 */
class Payment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 */
	protected $title = '';
	
	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';
	
	/**
	 * value
	 *
	 * @var float
	 */
	protected $value = 0.0;
	
	/**
	 * valueType
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 */
	protected $valueType = '';
	
	/**
	 * paymentIdentifier
	 *
	 * @var string
	 */
	protected $paymentIdentifier = '';

    /**
     * title
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * title
     * @param string $title
     */
    public function setTitle($title){
        $this->title = $title;
    }

    /**
     * description
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * description
     * @param string $description
     */
    public function setDescription($description){
        $this->description = $description;
    }

    /**
     * value
     * @return float
     */
    public function getValue(){
        return $this->value;
    }

    /**
     * value
     * @param float $value
     */
    public function setValue($value){
        $this->value = $value;
    }

    /**
     * valueType
     * @return string
     */
    public function getValueType(){
        return $this->valueType;
    }

    /**
     * valueType
     * @param string $valueType
     */
    public function setValueType($valueType){
        $this->valueType = $valueType;
    }

    /**
     * paymentIdentifier
     * @return string
     */
    public function getPaymentIdentifier(){
        return $this->paymentIdentifier;
    }

    /**
     * paymentIdentifier
     * @param string $paymentIdentifier
     */
    public function setPaymentIdentifier($paymentIdentifier){
        $this->paymentIdentifier = $paymentIdentifier;
    }

}