<?php 
namespace RB\RbTinyshop\Utility\Price;

class CalculationUtility implements \TYPO3\CMS\Core\SingletonInterface {
	
	protected function getBasketRawTotal($basket) {
		$total = 0;
		if($basket instanceof \RB\RbTinyShop\Domain\Model\Basket) {
			foreach ($basket->getBasketPositions() as $key => $basketPosition) {
				$total += $basketPosition->getTotal();
			}
		}
		else {
			foreach ($basket['basketPositions'] as $key => $basketPosition) {
				$total += $basketPosition->getTotal();
			}
		}
		return $total;
	}
}