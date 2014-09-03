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
	 * basketPositionRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\BasketPositionRepository
	 * @inject
	 */
	protected $basketPositionRepository = NULL;
	
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
				$this->basketPositionRepository->add($basketPosition);
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
						$this->basketPositionRepository->remove($basketPosition);
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
		
		$this->redirect('show', 'Basket', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
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
				$total = $basket->getTotal();
			}
			else {
				$basketEmpty = true;
			}
			
		}
		else {
			if(count($basket['basketPositions']) > 0) {
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
			$this->view->assign('partialPrices', $this->getPartialPrices($total));
			$this->view->assign('basket', $basket);
		}
	}
	
	/**
	 * action show
	 *
	 * @return void
	 */
	public function confirmAction() {
		$basket = $this->getBasket();
		$this->feSessionStorage->remove('redirectAction');
		$this->feSessionStorage->remove('redirectController');
		if($userUid = $this->feSessionStorage->getUser()->user['uid']) {
			if($basket->getBasketPositions()->count() > 0) {
				$user = $this->userRepository->findByUid($userUid);
				$this->view->assign('partialPrices', $this->getPartialPrices($basket->getTotal()));
				$this->view->assign('basket', $basket);
				$this->view->assign('user', $user);
			}
			else {
				$this->redirect('show', 'Basket', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
			}
		}
		else {
			$this->feSessionStorage->write('redirectAction', 'confirm');
			$this->feSessionStorage->write('redirectController', 'Basket');
			$this->redirect('login', 'Account', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
	}
	
	/**
	 * action finish
	 *
	 * @return void
	 */
	public function finishAction(\RB\RbTinyshop\Domain\Model\Basket $basket) {
	
		if($basket === false) {
			$this->redirect('show', 'Basket', 'RbTinyshop', array('pluginName' => 'Tinyshop'), $this->settings['shopRootId']);
		}
	}
	
	protected function getBasket() {
		$sessionBasket = $this->feSessionStorage->getObject('basket');
		if($userUid = $this->feSessionStorage->getUser()->user['uid']) {
			$userBaskets = $this->basketRepository->findByUserUid($userUid);
			if($userBaskets->count() > 0 && $sessionBasket !== false) {
				foreach ($userBaskets as $key => $userBasket) {
					foreach ($userBasket->getBasketPositions() as $key => $value) {
						$this->basketPositionRepository->remove($value);
					}
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
				$this->persistenceManager->persistAll();
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
		$totals = 0;
		foreach ($basket->getBasketPositions() as $key => $basketPosition) {
			$total += ($basketPosition->getPrice() * $basketPosition->getQuantity());
		}
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
		$totals = 0;
		foreach ($basket->getBasketPositions() as $key => $basketPosition) {
			$total += $basketPosition->getTotal();
		}
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
		$total = 0;
		foreach ($basket['basketPositions'] as $key => $basketPosition) {
			$total += $basketPosition->getTotal();
		}
		$basket['total'] = $total;
		return $basket;
	}
	
	protected function getPartialPrices($total) {
		$partialPrices = array();
		$tax = 19;
		$partialPrices['taxIncluded'] = round($total / (100 + $tax) * $tax, 2);
		$partialPrices['priceWithoutTax'] = $total - $partialPrices['taxIncluded'];
		return $partialPrices;
	}
}