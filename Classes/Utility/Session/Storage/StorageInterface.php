<?php
namespace RB\RbTinyshop\Utility\Session\Storage;
/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Sebastian Schreiber
 *  Contact: me@schreibersebastian.de
 *  All rights reserved
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * ************************************************************* */
 
/**
 *
 * @package TYPO3
 * @subpackage ssch_fluid_extbase_helper
 *
 * @author Sebastian Schreiber <me@schreibersebastian.de>
 *
 * $Id: $
 */

interface StorageInterface extends \TYPO3\CMS\Core\SingletonInterface {
 
    /**
     * @param mixed $data
     */
    public function isSerializable($data);
 
    /**
     * @param string $key
     * @param string $type
     */
    public function read($key, $type = '');
 
    /**
     * @param string $key
     * @param mixed $data
     * @param string $type
     */
    public function write($key, $data, $type = '');
 
    /**
     * @param string $key
     * @param string $type
     */
    public function remove($key, $type = '');
 
    /**
     * @param string $key
     * @param string $type
     */
    public function has($key, $type = '');
 
    /**
     * @param object $object
     * @param string $key
     * @param string $type
     */
    public function storeObject($object, $key = NULL, $type = '');
 
    /**
     * @param string
     * @return mixed
     */
    public function getObject($key, $type = '');
 
    /**
     * @return object
     */
    public function getUser();
}