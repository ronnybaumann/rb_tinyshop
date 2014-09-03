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
 * $Id: FeSessionStorage.php 77 2011-12-17 15:44:24Z schreiberten $
 *
 *
 * @see http://robertlemke.de/blog/posts/2010/08/19/session-handling-and-object-serialization
 * TODO: We have deal with this issues still in this implementation. It is not yet implemented
 */
class FeSessionStorage extends AbstractSessionStorage {
 
    /**
     * Read session data
     * @param string $key
     * @return mixed
     */
    public function read($key, $type = 'ses') {
        $sessionData = $this->getFeUser()->getKey($type, $this->getKey($key));
        if ($sessionData == '') {
            return '';
        }
        return $sessionData;
    }
 
    /**
     * Has some key or not
     * @param string $key
     * @return boolean
     */
    public function has($key, $type = 'ses') {
        $sessionData = $this->getFeUser()->getKey($type, $this->getKey($key));
        if ($sessionData == '') {
            return FALSE;
        }
        return TRUE;
    }
 
    /**
     * Write data to session
     * @param string $key
     * @param mixed $data
     * @return void
     */
    public function write($key, $data, $type = 'ses') {        
        $this->getFeUser()->setKey($type, $this->getKey($key), $data);
        $this->getFeUser()->storeSessionData();
    }
 
    /**
     * Remove data from session
     * @param string $key
     * @return void
     */
    public function remove($key, $type = 'ses') {
        if ($this->has($key, $type)) {
            $this->write($key, NULL, $type);
        }
    }
 
    /**
     *
     * @param string $type
     */
    protected function setUserDataChanged($type = 'ses') {
        switch ($type) {
            case 'ses':
                $this->getFeUser()->sesData_change = 1;
                break;
            case 'user':
                $this->getFeUser()->userData_change = 1;
                break;
            default:
                $this->getFeUser()->sesData_change = 1;
                break;
        }
    }
 
    /**
     *
     * @return \TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication
     */
    protected function getFeUser() {
        return $GLOBALS['TSFE']->fe_user;
    }
 
    /**
     *
     * @return \TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication
     */
    public function getUser() {
        return $this->getFeUser();
    }
 
}