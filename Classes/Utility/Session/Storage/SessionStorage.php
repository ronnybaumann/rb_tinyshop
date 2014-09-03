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
 *
 *
 * @see http://robertlemke.de/blog/posts/2010/08/19/session-handling-and-object-serialization
 * TODO: We have deal with this issues still in this implementation. It is not yet implemented
 */
class SessionStorage implements StorageInterface {
 
    /**
     *
     * @var
     */
    protected $concreteSessionManager = NULL;
    /**
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager = NULL;
 
    /**
     * @return void
     */
    protected function initializeConcreteSessionManager() {
        if (TYPO3_MODE === 'FE') {
            $this->concreteSessionManager = $this->objectManager->get('\RB\RbTinyshop\Utility\Session\Storage\FeSessionStorage');
        } else {
            $this->concreteSessionManager = $this->objectManager->get('\RB\RbTinyshop\Utility\Session\Storage\BeSessionStorage');
        }
    }
 
    /**
     *
     * @param mixed $data
     * @return true
     */
    public function  isSerializable($data) {
        return $this->concreteSessionManager->isSerializable($data);
    }
 
    /**
     *
     * @param string $key
     */
    public function read($key, $type = 'ses') {
        return $this->concreteSessionManager->read($key, $type);
    }
 
    /**
     * Write data to session
     * @param string $key
     * @param mixed $data
     */
    public function write($key, $data, $type = 'ses') {
        $this->concreteSessionManager->write($key, $data, $type);
    }
 
    /**
     *
     * @param string $key
     * @return boolean
     */
    public function has($key, $type = 'ses') {
        return $this->concreteSessionManager->has($key, $type);
    }
 
    /**
     *
     * @param string $key
     */
    public function remove($key, $type = 'ses') {
        $this->concreteSessionManager->remove($key, $type);
    }
 
    /**
     * @param object
     * @param string
     */
    public function storeObject($object, $key = NULL, $type = 'ses') {
        $this->concreteSessionManager->storeObject($object, $key, $type);
    }
 
    /**
     * @param string
     * @return mixed
     */
    public function getObject($key, $type = 'ses') {
        return $this->concreteSessionManager->getObject($key, $type);
    }
 
    /**
     *
     * @return object
     */
    public function  getUser() {
        return $this->concreteSessionManager->getUser();
    }
 
    /**
     *
     * @return AbstractSessionStorage
     */
    public function getConcreteSessionManager() {
        return $this->concreteSessionManager;
    }
}