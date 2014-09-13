<?php 
namespace RB\RbTinyshop\Utility\Price;

class CalculationUtility implements \TYPO3\CMS\Core\SingletonInterface {
	
	/**
	 * userRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository = NULL;
	
	/**
	 * feSessionStorage
	 *
	 * @var \RB\RbTinyshop\Utility\Session\Storage\FeSessionStorage
	 * @inject
	 */
	protected $feSessionStorage = NULL;
	
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
	
	/**
	 * adds additinal costs to given raw basket total
	 *
	 * @param float $total
	 * @return float
	 */
	public function addAdditionalCost($total) {
		if($userUid = $this->feSessionStorage->getUser()->user['uid']) {
			$user = $this->userRepository->findByUid($userUid);
			if($user instanceof \RB\RbTinyshop\Domain\Model\User) {
				$payment = $user->getPayment();
				$shipping = $user->getShipping();
		
				$hasPaymentCost = false;
				$hasShippingCost = false;
		
				if($shipping->getValue() > 0 || $payment->getValue() < 0) {
					$hasPaymentCost = true;
				}
		
				if($shipping->getValue() > 0 || $payment->getValue() < 0) {
					$hasShippingCost = true;
				}
		
				//add absolute costs
				if($hasPaymentCost) {
					if($payment->getValueType() === 'absolute') {
						$total += $payment->getValue();
					}
				}
		
				if($hasShippingCost) {
					if($shipping->getValueType() === 'absolute') {
						$total += $shipping->getValue();
					}
				}
		
				//add relative costs after adding absolute costs
				if($hasPaymentCost) {
					if($payment->getValueType() === 'relative') {
						$totalOnePercent = $total / 100;
						if($payment->getValue() > 0) {
							$totalAdd = $totalOnePercent * $payment->getValue();
							$totalAdd = round($totalAdd, 2);
							$total += $totalAdd;
						}
		
						if($payment->getValue() < 0) {
							$totalSub = $totalOnePercent * ($payment->getValue() * -1);
							$totalSub = round($totalSub, 2);
							$total -= $totalSub;
						}
					}
				}
		
				if($hasShippingCost) {
					if($shipping->getValueType() === 'relative') {
						$totalOnePercent = $total / 100;
						if($shipping->getValue() > 0) {
							$totalAdd = $totalOnePercent * $shipping->getValue();
							$totalAdd = round($totalAdd, 2);
							$total += $totalAdd;
						}
							
						if($shipping->getValue() < 0) {
							$totalSub = $totalOnePercent * ($shipping->getValue() * -1);
							$totalSub = round($totalSub, 2);
							$total -= $totalSub;
						}
					}
				}
			}
		}
		return $total;
	}
	
	/**
	 * returns partial prices for basket
	 *
	 * @param float $total
	 * @param float $rawTotal
	 * @return array
	 */
	public function getPartialPrices($total, $rawTotal) {
		$partialPrices = array();
		$tax = 19;
		$partialPrices['taxIncluded'] = round($total / (100 + $tax) * $tax, 2);
		$partialPrices['priceWithoutTax'] = $total - $partialPrices['taxIncluded'];
		$rawTotalOrg = $rawTotal;
		
		if($userUid = $this->feSessionStorage->getUser()->user['uid']) {
			$user = $this->userRepository->findByUid($userUid);
			if($user instanceof \RB\RbTinyshop\Domain\Model\User) {
				$payment = $user->getPayment();
				$shipping = $user->getShipping();
		
				$hasPaymentCost = false;
				$hasShippingCost = false;
		
				if($shipping->getValue() > 0 || $payment->getValue() < 0) {
					$hasPaymentCost = true;
				}
		
				if($shipping->getValue() > 0 || $payment->getValue() < 0) {
					$hasShippingCost = true;
				}
		
				//add absolute costs
				if($hasPaymentCost) {
					if($payment->getValueType() === 'absolute') {
						$partialPrices['payment']['absolute'] = $payment->getValue();
						$rawTotal += $partialPrices['payment']['absolute'];
					}
				}
		
				if($hasShippingCost) {
					if($shipping->getValueType() === 'absolute') {
						$partialPrices['shipping']['absolute'] = $shipping->getValue();
						$rawTotal += $partialPrices['shipping']['absolute'];
					}
				}
		
				//add relative costs after adding absolute costs
				if($hasPaymentCost) {
					if($payment->getValueType() === 'relative') {
						$totalOnePercent = $rawTotal / 100;
						if($payment->getValue() > 0) {
							$totalAdd = $totalOnePercent * $payment->getValue();
							$partialPrices['payment']['relative'] = round($totalAdd, 2);
							$rawTotal += $partialPrices['payment']['relative'];
						}
		
						if($payment->getValue() < 0) {
							$totalSub = $totalOnePercent * ($payment->getValue() * -1);
							$partialPrices['payment']['relative'] = round($totalSub, 2);
							$rawTotal -= $partialPrices['payment']['relative'];
							$partialPrices['payment']['relative'] *= -1;
						}
					}
				}
		
				if($hasShippingCost) {
					if($shipping->getValueType() === 'relative') {
						$totalOnePercent = $rawTotal / 100;
						if($shipping->getValue() > 0) {
							$totalAdd = $totalOnePercent * $shipping->getValue();
							$partialPrices['shipping']['relative'] = round($totalAdd, 2);
							$rawTotal += $partialPrices['shipping']['relative'];
						}
							
						if($shipping->getValue() < 0) {
							$totalSub = $totalOnePercent * ($shipping->getValue() * -1);
							$partialPrices['shipping']['relative'] = round($totalSub, 2);
							$rawTotal -= $partialPrices['shipping']['relative'];
							$partialPrices['shipping']['relative'] *= -1;
						}
					}
				}
			}
		}
		
		if($rawTotalOrg != $rawTotal) {
			$partialPrices['rawTotal'] = $rawTotalOrg;
		}
		
		return $partialPrices;
	}
	
	public function getOrderPartialPrices($total, $rawTotal) {
		$orderParitalPrices = array();
		$orderParitalPricePosition = 0;
		$partialPrices = $this->getPartialPrices($total, $rawTotal);
		
		
		if(isset($partialPrices['rawTotal'])) {
			$orderParitalPrices[$orderParitalPricePosition]['title'] = 'Warenkorb';
			$orderParitalPrices[$orderParitalPricePosition]['value'] = $partialPrices['rawTotal'];
			$orderParitalPrices[$orderParitalPricePosition]['position'] = $orderParitalPricePosition;
			$orderParitalPricePosition++;
		}
		
		if(isset($partialPrices['payment']['absolute'])) {
			$orderParitalPrices[$orderParitalPricePosition]['title'] = 'Kosten Zahlungsart';
			$orderParitalPrices[$orderParitalPricePosition]['value'] = $partialPrices['payment']['absolute'];
			$orderParitalPrices[$orderParitalPricePosition]['position'] = $orderParitalPricePosition;
			$orderParitalPricePosition++;
		}
		
		if(isset($partialPrices['shipping']['absolute'])) {
			$orderParitalPrices[$orderParitalPricePosition]['title'] = 'Kosten Versandart';
			$orderParitalPrices[$orderParitalPricePosition]['value'] = $partialPrices['shipping']['absolute'];
			$orderParitalPrices[$orderParitalPricePosition]['position'] = $orderParitalPricePosition;
			$orderParitalPricePosition++;
		}
		
		if(isset($partialPrices['payment']['relative'])) {
			$orderParitalPrices[$orderParitalPricePosition]['title'] = 'Kosten Zahlungsart';
			$orderParitalPrices[$orderParitalPricePosition]['value'] = $partialPrices['payment']['relative'];
			$orderParitalPrices[$orderParitalPricePosition]['position'] = $orderParitalPricePosition;
			$orderParitalPricePosition++;
		}
		
		if(isset($partialPrices['shipping']['relative'])) {
			$orderParitalPrices[$orderParitalPricePosition]['title'] = 'Kosten Versandart';
			$orderParitalPrices[$orderParitalPricePosition]['value'] = $partialPrices['shipping']['relative'];
			$orderParitalPrices[$orderParitalPricePosition]['position'] = $orderParitalPricePosition;
			$orderParitalPricePosition++;
		}
		
		if(isset($partialPrices['priceWithoutTax'])) {
			$orderParitalPrices[$orderParitalPricePosition]['title'] = 'Netto';
			$orderParitalPrices[$orderParitalPricePosition]['value'] = $partialPrices['priceWithoutTax'];
			$orderParitalPrices[$orderParitalPricePosition]['position'] = $orderParitalPricePosition;
			$orderParitalPricePosition++;
		}
		
		if(isset($partialPrices['taxIncluded'])) {
			$orderParitalPrices[$orderParitalPricePosition]['title'] = 'MwSt.(19%)';
			$orderParitalPrices[$orderParitalPricePosition]['value'] = $partialPrices['taxIncluded'];
			$orderParitalPrices[$orderParitalPricePosition]['position'] = $orderParitalPricePosition;
			$orderParitalPricePosition++;
		}
		
		return $orderParitalPrices;
	}
}