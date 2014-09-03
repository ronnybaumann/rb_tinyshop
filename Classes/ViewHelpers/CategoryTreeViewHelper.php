<?php
namespace RB\RbTinyshop\ViewHelpers;

class CategoryTreeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	protected $categoryTree;
	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RB\RbTinyshop\Domain\Model\Category> $categorys
	 *
	 * @return string
	 */
	public function render(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categorys) {
		$this->buildCategoryTree($categorys, 0);
		return $this->categoryTree;
	}
	
	protected function buildCategoryTree (\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categorys, $minLevel, $level = 0) {
		$level++;
		$this->categoryTree .= '<ul>';
		foreach ($categorys as $key => $category) {
			$subCategorys = $category->getSubCategorys();
			
			if ($subCategorys->count() > 0) {
				$this->categoryTree .= '<li class="hasSub">';
			}
			else {
				$this->categoryTree .= '<li>';
			}
			
			if($level > $minLevel) {
				$this->categoryTree .=  $category->getTitle() . '|' . ($level-1);
			}
			
			if ($subCategorys->count() > 0) {
				$this->buildCategoryTree($subCategorys, $minLevel, $level);
			}
			
			$this->categoryTree .= '</li>';
		}
		$this->categoryTree .= '</ul>';
	}
}