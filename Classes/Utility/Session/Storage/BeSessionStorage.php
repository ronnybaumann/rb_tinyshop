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
 * $Id: BeSessionStorage.php 75 2011-12-09 14:26:47Z schreiberten $
 *
 *
 * @see http://robertlemke.de/blog/posts/2010/08/19/session-handling-and-object-serialization
 * TODO: We have deal with this issues still in this implementation. It is not yet implemented
 */
class BeSessionStorage extends AbstractSessionStorage {
 
    /**
     * Get session data
     * @param string $key
     * @return mixed
     */
    public function read($key, $type = '') {
        return $this->getBeUser()->getSessionData($this->getKey($key));
    }
 
    /**
     * Write data to session
     * @param string $key
     * @param mixed $data
     * @return void
     */
    public function write($key, $data, $type = '') {
        $this->getBeUser()->setAndSaveSessionData($this->getKey($key), $data);
    }
 
    /**
     * Remove data from session
     * @param string $key
     */
    public function remove($key, $type = '') {
        if ($this->has($key)) {
            unset($sesDat[$this->getKey($key)]);
            $this->getBeUser()->user['ses_data'] = (!empty($sesDat) ? serialize($sesDat) : '');
            $GLOBALS['TYPO3_DB']->exec_UPDATEquery($this->getBeUser()->session_table, 'ses_id=' . $GLOBALS['TYPO3_DB']->fullQuoteStr($this->getBeUser()->user['ses_id'], $this->getBeUser()->session_table), array('ses_data' => $this->getBeUser()->user['ses_data']));
        }
    }
 
    /**
     * Has key in session or not
     * @param string $key
     * @return boolean
     */
    public function has($key, $type = '') {
        $sesDat = unserialize($this->getBeUser()->user['ses_data']);
        return isset($sesDat[$this->getKey($key)]) ? TRUE : FALSE;
    }
 
    /**
     *
     * @return \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
     */
    protected function getBeUser() {
        return $GLOBALS['BE_USER'];
    }
 
    /**
     *
     * @return \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
     */
    public function getUser() {
        return $this->getBeUser();
    }
 
}