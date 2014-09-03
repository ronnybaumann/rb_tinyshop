<?php
namespace RB\RbTinyshop\ViewHelpers\Widget\Controller;

class MenuController extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController {
	/**
	 * @var \RB\RbTinyshop\Domain\Model\Category
	 */
	protected $category;
	
	/**
	 * @var string
	 */
	protected $action;
	
	/**
	 * categoryRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;
	
	/**
	 * Initialize the action and get correct configuration
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->category = $this->widgetConfiguration['category'];
		$this->action = $this->widgetConfiguration['action'];
	}
	
	/**
	 * index action
	 *
	 * @return void
	 */
	public function indexAction() {
		if($this->action == 'mainMenu') {
			$categorys = $this->categoryRepository->findByCategory(0);
		}
		
		if($this->action == 'subMenu') {
			if($this->category === NULL) {
				$categorys = $this->categoryRepository->findByCategory(0);
			}
			else {
				$categorys = $this->categoryRepository->findByCategory($this->category);
			}
		}
		$this->view->assign('action', $this->action);
		$this->view->assign('categorys', $categorys);
	}
}