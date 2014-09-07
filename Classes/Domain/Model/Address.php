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
 * Address
 */
class Address extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * company
	 *
	 * @var string
	 * @copy clone
	 */
	protected $company = '';
	
	/**
	 * salutation
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @copy clone
	 */
	protected $salutation = '';
	
	/**
	 * firstname
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @copy clone
	 */
	protected $firstname = '';
	
	/**
	 * lastname
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @copy clone
	 */
	protected $lastname = '';
	
	/**
	 * street
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @copy clone
	 */
	protected $street = '';
	
	/**
	 * streetNumber
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @copy clone
	 */
	protected $streetNumber = '';
	
	/**
	 * postcode
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @copy clone
	 */
	protected $postcode = '';
	
	/**
	 * city
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @copy clone
	 */
	protected $city = '';
	
	/**
	 * country
	 *
	 * @var string
	 * @validate \RB\RbTinyshop\Validation\Validator\NotEmpty
	 * @copy clone
	 */
	protected $country = '';
	
    /**
     * company
     * @return string
     */
    public function getCompany(){
        return $this->company;
    }

    /**
     * company
     * @param string $company
     * @return void
     */
    public function setCompany($company){
        $this->company = $company;
    }

    /**
     * salutation
     * @return string
     */
    public function getSalutation(){
        return $this->salutation;
    }

    /**
     * salutation
     * @param string $salutation
     * @return void
     */
    public function setSalutation($salutation){
        $this->salutation = $salutation;
    }

    /**
     * firstname
     * @return string
     */
    public function getFirstname(){
        return $this->firstname;
    }

    /**
     * firstname
     * @param string $firstname
     * @return void
     */
    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }

    /**
     * lastname
     * @return string
     */
    public function getLastname(){
        return $this->lastname;
    }

    /**
     * lastname
     * @param string $lastname
     * @return void
     */
    public function setLastname($lastname){
        $this->lastname = $lastname;
    }

    /**
     * street
     * @return string
     */
    public function getStreet(){
        return $this->street;
    }

    /**
     * street
     * @param string $street
     * @return void
     */
    public function setStreet($street){
        $this->street = $street;
    }

    /**
     * streetNumber
     * @return string
     */
    public function getStreetNumber(){
        return $this->streetNumber;
    }

    /**
     * streetNumber
     * @param string $streetNumber
     * @return void
     */
    public function setStreetNumber($streetNumber){
        $this->streetNumber = $streetNumber;
    }

    /**
     * postcode
     * @return string
     */
    public function getPostcode(){
        return $this->postcode;
    }

    /**
     * postcode
     * @param string $postcode
     * @return void
     */
    public function setPostcode($postcode){
        $this->postcode = $postcode;
    }

    /**
     * city
     * @return string
     */
    public function getCity(){
        return $this->city;
    }

    /**
     * city
     * @param string $city
     * @return void
     */
    public function setCity($city){
        $this->city = $city;
    }

    /**
     * country
     * @return string
     */
    public function getCountry(){
        return $this->country;
    }

    /**
     * country
     * @param string $country
     * @return void
     */
    public function setCountry($country){
        $this->country = $country;
    }
}