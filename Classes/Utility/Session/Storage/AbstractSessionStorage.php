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
* $Id: AbstractSessionStorage.php 94 2012-02-13 11:46:17Z schreiberten $
*
*
* @see http://robertlemke.de/blog/posts/2010/08/19/session-handling-and-object-serialization
* TODO: We have deal with this issues still in this implementation. It is not yet implemented
*/
abstract class AbstractSessionStorage implements StorageInterface {

	/**
	 * @var string
	 */
	protected $sessionNamespace = 'ssch_fluid_extbase_helper';

	/**
	 * Check whether the data is serializable or not
	 * @param mixed $data
	 * @return boolean
	 */
	public function isSerializable($data) {
		if (is_object($data) || is_array($data)) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 *
	 * @param string $key
	 */
	protected function getKey($key) {
		return $this->sessionNamespace . $key;
	}

	/**
	 * Writes a object to the session if the key is empty it used the classname
	 * @param object $object
	 * @param string $key
	 * @return  void
	 */
	public function storeObject($object, $key = NULL, $type = 'ses') {
		if (is_null($key)) {
			$key = get_class($object);
		}
		if ($this->isSerializable($object)) {
			$this->write($key, serialize($object), $type);
		} else {
			throw new InvalidArgumentException(sprintf('The object %s is not serializable.', get_class($object)));
		}
	}

	/**
	 * Writes something to storage
	 * @param string $key
	 * @return  object
	 */
	public function getObject($key, $type = 'ses') {
		return unserialize($this->read($key, $type));
	}

	/**
	 *
	 * @return string
	 */
	public function getSessionNamespace() {
		return $this->sessionNamespace;
	}

	/**
	 *
	 * @param string $sessionNamespace
	 */
	public function setSessionNamespace($sessionNamespace) {
		$this->sessionNamespace = $sessionNamespace;
	}

}