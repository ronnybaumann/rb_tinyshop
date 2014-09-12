<?php 
namespace RB\RbTinyshop\Utility\Price;

class CalculationUtility implements \TYPO3\CMS\Core\SingletonInterface {
	
	/**
	 * returns totalvalue of all positions in basket
	 *
	 * @param \RB\RbTinyShop\Domain\Model\Basket $basket
	 * @return float
	 */
	public function getBasketRawTotal(\RB\RbTinyShop\Domain\Model\Basket $basket) {
		$total = 0;
		if($basket instanceof \RB\RbTinyShop\Domain\Model\Basket) {
			foreach ($basket->getBasketPositions() as $key => $basketPosition) {
				$total += $basketPosition->getTotal();
			}
		}
		return $total;
	}
}