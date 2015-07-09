<?php
namespace RB\RbTinyshop\Controller;


use TYPO3\Flow\Package\Exception\ProtectedPackageKeyException;
use TYPO3\CMS\Extbase\Mvc\Web\Response;
use TYPO3\CMS\Extbase\Mvc\Web\Request;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;
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
class BackendController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * articleRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\ArticleRepository
	 * @inject
	 */
	protected $articleRepository = NULL;
	
	/**
	 * categoryRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;
	
	/**
	 * persistenceManager
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager;
	
	/**
	 * jsonEncodeService
	 *
	 * @var \RB\RbTinyshop\Service\JsonEncodeService
	 * @inject
	 */
	protected $jsonEncodeService = NULL;
	
	/**
	 * feSessionStorage
	 *
	 * @var \RB\RbTinyshop\Utility\Session\Storage\FeSessionStorage
	 * @inject
	 */
	protected $feSessionStorage = NULL;
	
	/**
	 * template
	 *
	 * @var \TYPO3\CMS\Backend\Template\DocumentTemplate
	 * @inject
	 */
	protected $template = NULL;
	
	/**
	 * action show
	 *
	 * @return void
	 */
	public function listAction() {
		//print_r($this->configurationManager->getConfiguration('Framework'));exit;
		// add js
		$this->template->getPageRenderer()->addJsFile($this->getPublicPath('Libs/angular.js'));
		$this->template->getPageRenderer()->addJsFile($this->getPublicPath('Libs/angular-route.js'));
		$this->template->getPageRenderer()->addJsFile($this->getPublicPath('Libs/angular-animate.js'));
		$this->template->getPageRenderer()->addJsFile($this->getPublicPath('Libs/angular-ui-tree.js'));
		$this->template->getPageRenderer()->addJsFile($this->getPublicPath('Libs/dirPagination.js'));
		$this->template->getPageRenderer()->addJsFile($this->getPublicPath('Libs/loading-bar.js'));
		$this->template->getPageRenderer()->addJsFile($this->getPublicPath('App/App.js'));
		
		//add css
		$this->template->getPageRenderer()->addCssFile($this->getPublicPath('Libs/bootstrap/css/bootstrap-united.min.css'));
		$this->template->getPageRenderer()->addCssFile($this->getPublicPath('Libs/loading-bar.css'));
		$this->template->getPageRenderer()->addCssFile($this->getPublicPath('Libs/angular-ui-tree.min.css'));
		$this->template->getPageRenderer()->addCssFile($this->getPublicPath('Libs/tree.css'));
		$this->template->getPageRenderer()->addCssFile($this->getPublicPath('App/App.css'));
		
		//assign view variables
		$this->view->assign('editLink', $this->getPopUpEditLink('tx_rbtinyshop_domain_model_article', '41'));
	}
	
	/**
	 * action popClose
	 *
	 * @return void
	 */
	public function popCloseAction() {
		print '<script type="text/javascript">
			/*<![CDATA[*/
				self.close();
				window.opener.$scope.refreshData();
			/*]]>*/
			</script>';exit;
	}
	
	/**
	 * AjaxHandler getArticleByCategoryJson
	 *
	 * @return void
	 */
	public function getArticleByCategoryJson() {
		$categoryId = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('cid');
		$categoryRepository = $this->getAjaxRepository('RB\\RbTinyshop\\Domain\\Repository\\CategoryRepository');
		$category = $categoryRepository->findByUid($categoryId);

		$articleRepository = $this->getAjaxRepository('RB\\RbTinyshop\\Domain\\Repository\\ArticleRepository');
		$articles = $articleRepository->findByCategory($category);
		
		$resonse = new Response();
		$resonse->setContent(json_encode($this->articlesToArray($articles), JSON_PRETTY_PRINT));
		$resonse->send();
	}
	
	/**
	 * AjaxHandler getCategoryTreeJson
	 *
	 * @return string
	 */
	public function getCategoryTreeJson() {
		$categoryRepository = $this->getAjaxRepository('RB\\RbTinyshop\\Domain\\Repository\\CategoryRepository');
		$categorys = $categoryRepository->findByCategory(0);

		$resonse = new Response();
		$resonse->setContent(json_encode($this->categorysToArray($categorys), JSON_PRETTY_PRINT));
		$resonse->send();
	}
	
	/**
	 * AjaxHandler moveRecordAjax
	 *
	 * @return string
	 */
	public function moveRecordAjax() {
		$table = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('table');
		$uid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('uid');
		$moveBehindUid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('moveBehindUid');
		
		$this->moveRecord($table, $uid, $moveBehindUid);
	}
	
	/**
	 * AjaxHandler updateCategoryParentAjaxAction
	 *
	 * @return string
	 */
	public function updateCategoryParentAjax() {
		$data = json_decode(file_get_contents('php://input'));
		
		$objectManager = new \TYPO3\CMS\Extbase\Object\ObjectManager();
		$persistenceManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
		$categoryRepository = $this->getAjaxRepository('RB\\RbTinyshop\\Domain\\Repository\\CategoryRepository');
		
		$category = $categoryRepository->findByUid($data->cid);
		
		if($category instanceof \RB\RbTinyshop\Domain\Model\Category) {
			$category->setCategory($data->pid);
		}
		
		$categoryRepository->update($category);
		$persistenceManager->persistAll();
		
		//$this->moveRecord('tx_rbtinyshop_domain_model_category', $moveId, $moveBehind);
		
		$count = 0;
		$moveBehind = 0;
		foreach ($data->modelValue as $value) {
			if($count > 0) {
				$this->moveRecord('tx_rbtinyshop_domain_model_category', $value->id, $moveBehind);
			}
			$moveBehind = $value->id;
			$count++;
		}
		
		$resonse = new Response();
		$resonse->setContent(json_encode(array('cid' => $data->cid, 'pid' => $data->pid, 'success' => true), JSON_PRETTY_PRINT));
		$resonse->send();
	}
	
	protected function getAjaxRepository($repositoryClass) {
		$objectManager = new \TYPO3\CMS\Extbase\Object\ObjectManager();
		$backendConfigurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\BackendConfigurationManager');
		$queryGenerator = $objectManager->get('TYPO3\\CMS\\Core\\Database\\QueryGenerator');
		
		$typoScriptSetup = $backendConfigurationManager->getTypoScriptSetup();
		$recursiveStoragePids = $queryGenerator->getTreeList($typoScriptSetup['module.']['tx_rbtinyshop.']['persistence.']['storagePid'], $typoScriptSetup['module.']['tx_rbtinyshop.']['persistence.']['recursive'], 0, 1);
		$storagePids = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $recursiveStoragePids);
		
		$repository = $objectManager->get($repositoryClass);
		$repository->setStoragePageIds($storagePids);
		
		return $repository;
	}
	
	protected function moveRecord($table, $uid, $moveBehindUid) {
		\TYPO3\CMS\Core\Utility\GeneralUtility::_GETset(array($table => array($uid => array('move' => -$moveBehindUid))), 'cmd');
		$simpleDataHandlerController = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Controller\\SimpleDataHandlerController');
		$simpleDataHandlerController->initClipboard();
		$simpleDataHandlerController->main();
		$simpleDataHandlerController->finish();
	}
	
	/**
	 * typo3/ajax.php?ajaxID=ptxAjax&extensionName=RbTinyshop&pluginName=RbTinyshopRbTinyshop_RbTinyshopTinyshop&controllerName=Backend&actionName=updateCategoryParentAjax
	 * 
	 * moduleName: RbTinyshopRbTinyshop_RbTinyshopTinyshop
	 * action: tx_rbtinyshop_rbtinyshoprbtinyshop_rbtinyshoptinyshop[action]=popClose
	 * controller: tx_rbtinyshop_rbtinyshoprbtinyshop_rbtinyshoptinyshop[controller]=Backend
	 *
	 */
	protected function getPopUpEditLink($table, $uid, $onlyOnClick = false, $title = 'Bearbeiten', $width = 1024, $height =  768) {
		//see class: \TYPO3\CMS\Backend\Controller\EditDocumentController line 1213
		//see class: \TYPO3\CMS\Backend\Utility\BackendUtility line 3043
		
		$returnUrl = \TYPO3\CMS\Backend\Utility\BackendUtility::getModuleUrl('RbTinyshopRbTinyshop_RbTinyshopTinyshop', array('tx_rbtinyshop_rbtinyshoprbtinyshop_rbtinyshoptinyshop[action]' => 'popClose', 'tx_rbtinyshop_rbtinyshoprbtinyshop_rbtinyshoptinyshop[controller]' => 'Backend'));
		$href = 'alt_doc.php?edit[' . $table . '][' . $uid . ']=edit';
		$href .= '&returnUrl=' . urlencode($returnUrl);
		
		if($onlyOnClick) {
			return $href;
		}
		
		$aOnClick = 'vHWin=window.open(\'' . $href . '\', \'' . $title . '\', \'width=' . $width . 'px, height=' . $height . 'px, status=0, fullscreen=yes, menubar=0, scrollbars=1, resizable=1\');vHWin.focus();return false;';
		$editLink = '<a href="#" onclick="' . htmlspecialchars($aOnClick) . '" title="' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.openInNewWindow', TRUE) . '">' . IconUtility::getSpriteIcon('actions-document-open') . '</a>';
		return $editLink;
	}
	
	protected function categorysToArray($categorys) {
		$categorysArray = array();
		$count = 0;
		
		foreach ($categorys as $category) {
			
			if($category->getSubCategorys()->count() > 0) {
				$categorysArray[$count]['id'] = $category->getUid();
				$categorysArray[$count]['title'] = $category->getTitle();
				$categorysArray[$count]['editLink'] = $this->getPopUpEditLink('tx_rbtinyshop_domain_model_category', $category->getUid(), true);
				$categorysArray[$count]['nodes'] = $this->categorysToArray($category->getSubCategorys());
			}
			else {
				$categorysArray[$count]['id'] = $category->getUid();
				$categorysArray[$count]['title'] = $category->getTitle();
				$categorysArray[$count]['editLink'] = $this->getPopUpEditLink('tx_rbtinyshop_domain_model_category', $category->getUid(), true);
				$categorysArray[$count]['nodes'] = array();
			}
			$count++;
		}
		
		return $categorysArray;
	}
	
	protected function articlesToArray($articles) {
		$articlesArray = array();
		$count = 0;
	
		foreach ($articles as $article) {
			if($article instanceof \RB\RbTinyshop\Domain\Model\Article) {
				$articlesArray[$count]['id'] = $article->getUid();
				$articlesArray[$count]['title'] = $article->getArticleDetail()->getTitle();
				$articlesArray[$count]['articleNumber'] = $article->getArticleDetail()->getArticleNumber();
				$articlesArray[$count]['price'] = $article->getArticleDetail()->getPrice()->getPrice();
				$articlesArray[$count]['description'] = $article->getArticleDetail()->getDescription();
				$articlesArray[$count]['editLink'] = $this->getPopUpEditLink('tx_rbtinyshop_domain_model_article', $article->getUid(), true);
			}
			$count++;
		}
	
		return $articlesArray;
	}
	
	protected function getPublicPath($file = '') {
		return \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('rb_tinyshop') . 'Resources/Public/Backend/' . $file;
	}
	
	protected function debug($object) {
		\TYPO3\CMS\Core\Utility\DebugUtility::debug($object);
	}
}