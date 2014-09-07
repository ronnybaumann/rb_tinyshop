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
 * BasketController
 */
class BasketController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * basketRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\BasketRepository
	 * @inject
	 */
	protected $basketRepository = NULL;
	
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
	 * persistenceManager
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager;
	
	/**
	 * action addItem
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Article $article
	 * @param float $quantity
	 * @return void
	 */
	public function addItemAction(\RB\RbTinyshop\Domain\Model\Article $article, $quantity = 1) {
		$basket = $this->getBasket();
		$articleNumber = $article->getArticleDetail()->getArticleNumber();
		
		if($basket instanceof \RB\RbTinyshop\Domain\Model\Basket) {
			$positionUpdated = false;
			foreach ($basket->getBasketPositions() as $key => $basketPosition) {
				if($basketPosition instanceof \RB\RbTinyshop\Domain\Model\BasketPosition) {
					if($basketPosition->getArticleNumber() === $articleNumber) {
						$basketPosition->setQuantity($basketPosition->getQuantity() + $quantity);
						$positionUpdated = true;
						break;
					}
				}
			}
			if($positionUpdated === false) {
				$basketPosition = $this->getNewBasketPosition($article, $quantity);
				$basket->addBasketPosition($basketPosition);
			}
			$this->updateBasketRepository($basket);
		}
		else {
			if(isset($basket['basketPositions'][$articleNumber])) {
				$basketPosition = $basket['basketPositions'][$articleNumber];
				$cartBasketPositionQuantity = $basketPosition->getQuantity();
				$basketPosition->setQuantity($cartBasketPositionQuantity + $quantity);
			}
			else {
				$basketPosition = $this->getNewBasketPosition($article, $quantity);
			}
			$basket['basketPositions'][$articleNumber] = $basketPosition;
			$basket = $this->updateSessionBasket($basket);
			$this->feSessionStorage->storeObject($basket, 'basket');
		}
		$this->redirect('show', 'Basket', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
	}
	
	/**
	 * action removeItem
	 *
	 * @param string $articleNumber
	 * @return void
	 */
	public function removeItemAction($articleNumber) {
		$basket = $this->getBasket();
		
		if($basket instanceof \RB\RbTinyshop\Domain\Model\Basket) {
			foreach ($basket->getBasketPositions() as $key => $basketPosition) {
				if($basketPosition instanceof \RB\RbTinyshop\Domain\Model\BasketPosition) {
					if($basketPosition->getArticleNumber() == $articleNumber) {
						$basket->removeBasketPosition($basketPosition);
						$this->updateBasketRepository($basket);
						break;
					}
				}
			}
			
		}
		else {
			if(isset($basket['basketPositions'][$articleNumber])) {
				unset($basket['basketPositions'][$articleNumber]);
			}
			$basket = $this->updateSessionBasket($basket);
			$this->feSessionStorage->storeObject($basket, 'basket');
		}
		
		if($this->feSessionStorage->has('redirectAction') && $this->feSessionStorage->has('redirectController')) {
			$this->redirect($this->feSessionStorage->read('redirectAction'), $this->feSessionStorage->read('redirectController'), 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
		else {
			$this->redirect('show', 'Basket', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
	}
	
	/**
	 * action show
	 *
	 * @return void
	 */
	public function showAction() {
		$basket = $this->getBasket();
		$basketEmpty = false;
		if($basket instanceof \RB\RbTinyshop\Domain\Model\Basket) {
			if($basket->getBasketPositions()->count() > 0) {
				$this->updateBasketRepository($basket);
				$total = $basket->getTotal();
			}
			else {
				$basketEmpty = true;
			}
		}
		else {
			if(count($basket['basketPositions']) > 0) {
				$this->updateSessionBasket($basket);
				$total = $basket['total'];
			}
			else {
				$basketEmpty = true;
			}
		}
		
		if($basketEmpty) {
			$this->addFlashMessage('Sie haben keine Artikel in Ihrem Warenkorb.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
		}
		else {
			$this->view->assign('partialPrices', $this->getPartialPrices($total, $this->getBasketRawTotal($basket)));
			$this->view->assign('basket', $basket);
		}
	}
	
	/**
	 * action show
	 *
	 * @return void
	 */
	public function confirmAction() {
		$this->feSessionStorage->write('redirectAction', 'confirm');
		$this->feSessionStorage->write('redirectController', 'Basket');
		$basket = $this->getBasket();
		if($userUid = $this->feSessionStorage->getUser()->user['uid']) {
			if($basket->getBasketPositions()->count() > 0) {
				$user = $this->userRepository->findByUid($userUid);
				$this->updateBasketRepository($basket);
				$this->view->assign('partialPrices', $this->getPartialPrices($basket->getTotal(), $this->getBasketRawTotal($basket)));
				$this->view->assign('basket', $basket);
				$this->view->assign('user', $user);
			}
			else {
				$this->redirect('show', 'Basket', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
			}
		}
		else {
			$this->redirect('login', 'Account', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
	}
	
	protected function getBasket() {
		$sessionBasket = $this->feSessionStorage->getObject('basket');
		if($userUid = $this->feSessionStorage->getUser()->user['uid']) {
			$userBaskets = $this->basketRepository->findByUserUid($userUid);
			if($userBaskets->count() > 0 && $sessionBasket !== false) {
				foreach ($userBaskets as $key => $userBasket) {
					$this->basketRepository->remove($userBasket);
				}
				$this->persistenceManager->persistAll();
			}
			
			if($sessionBasket) {
				$basketPersist = new \RB\RbTinyshop\Domain\Model\Basket();
				foreach ($sessionBasket['basketPositions'] as $key => $basketPosition) {
					$basketPosition->setPid($this->settings['storagePidBasket']);
					$basketPersist->addBasketPosition($basketPosition);
				}
				$basketPersist->setUserUid($userUid);
				$basketPersist->setPid($this->settings['storagePidBasket']);
				
				$this->addBasketRepository($basketPersist);
				$this->feSessionStorage->remove('basket');
			}
			
			if($basketPersist) {
				return $basketPersist;
			}
			elseif($userBaskets->count() > 0) {
				foreach ($userBaskets as $key => $userBasket) {
					return $userBasket;
				}
			}
			else {
				$emtyBasket = new \RB\RbTinyshop\Domain\Model\Basket();
				$emtyBasket->setUserUid($userUid);
				$emtyBasket->setPid($this->settings['storagePidBasket']);
				$this->addBasketRepository($emtyBasket);
				return $emtyBasket;
			}
		}
		else {
			if($sessionBasket === false) {
				$sessionBasket = array('basketPositions' => array());
			}
			return $sessionBasket;
		}
	}
	
	/**
	 * action addItem
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Article $article
	 * @param float $quantity
	 * @return \RB\RbTinyshop\Domain\Model\BasketPosition
	 */
	protected function getNewBasketPosition(\RB\RbTinyshop\Domain\Model\Article $article, $quantity) {
		$image = $article->getArticleDetail()->getMainImage()->getOriginalResource()->getPublicUrl();
		
		$basketPosition = new \RB\RbTinyshop\Domain\Model\BasketPosition();
		$basketPosition->setTitle($article->getArticleDetail()->getTitle());
		$basketPosition->setPrice($article->getArticleDetail()->getPrice()->getPrice());
		$basketPosition->setQuantity($quantity);
		$basketPosition->setImage($image);
		$basketPosition->setArticleNumber($article->getArticleDetail()->getArticleNumber());
		$basketPosition->setPid($this->settings['storagePidBasket']);
		return $basketPosition;
	}
	
	/**
	 * addBasketRepository
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Basket $basket
	 * @return void
	 */
	protected function addBasketRepository(\RB\RbTinyshop\Domain\Model\Basket $basket) {
		$total = $this->getBasketRawTotal($basket);
		$total = $this->addAdditionalCost($total);
		$basket->setTotal($total);
		$this->basketRepository->add($basket);
		$this->persistenceManager->persistAll();
	}
	
	/**
	 * updateBasketRepository
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Basket $basket
	 * @return void
	 */
	protected function updateBasketRepository(\RB\RbTinyshop\Domain\Model\Basket $basket) {
		$total = $this->getBasketRawTotal($basket);
		$total = $this->addAdditionalCost($total);
		$basket->setTotal($total);
		$this->basketRepository->update($basket);
		$this->persistenceManager->persistAll();
	}
	
	/**
	 * updateSessionBasket
	 *
	 * @param array $basket
	 * @return array $basket
	 */
	protected function updateSessionBasket($basket) {
		$total = $this->getBasketRawTotal($basket);
		$total = $this->addAdditionalCost($total);
		$basket['total'] = $total;
		return $basket;
	}
	
	protected function getPartialPrices($total, $rawTotal) {
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
	
	protected function addAdditionalCost($total) {
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