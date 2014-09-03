<?php 
namespace RB\RbTinyshop\ViewHelpers\Widget;

class MenuViewHelper extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper {
	
	/**
	 * @var \RB\RbTinyshop\ViewHelpers\Widget\Controller\MenuController
	 * @inject
	 */
	protected $controller;
	
	/**
	 * @param \RB\RbTinyshop\Domain\Model\Category $category
	 * @param string $action
	 *
	 * @return string
	 */
	public function render(\RB\RbTinyshop\Domain\Model\Category $category = NULL, $action = 'mainMenu') {
		return $this->initiateSubRequest();
	}
}