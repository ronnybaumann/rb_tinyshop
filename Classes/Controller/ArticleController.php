<?php
namespace RB\RbTinyshop\Controller;


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
 * ArticleController
 */
class ArticleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * articleRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\ArticleRepository
	 * @inject
	 */
	protected $articleRepository = NULL;
	
	/**
	 * feSessionStorage
	 *
	 * @var \RB\RbTinyshop\Utility\Session\Storage\FeSessionStorage
	 * @inject
	 */
	protected $feSessionStorage = NULL;

	/**
	 * action show
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Article $article
	 * @return void
	 */
	public function showAction(\RB\RbTinyshop\Domain\Model\Article $article, \RB\RbTinyshop\Domain\Model\Category $category = NULL) {
		//var_dump($this->feSessionStorage->read('activeCategory'));
		$this->view->assign('category', $category);
		$this->view->assign('article', $article);
	}

    protected function debug($variable) {
        return \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($variable);
    }

}