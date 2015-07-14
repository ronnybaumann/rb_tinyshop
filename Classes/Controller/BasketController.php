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
     * attributeGroupRepository
     *
     * @var \RB\RbTinyshop\Domain\Repository\AttributeGroupRepository
     * @inject
     */
    protected $attributeGroupRepository = NULL;

    /**
     * attributeRepository
     *
     * @var \RB\RbTinyshop\Domain\Repository\AttributeRepository
     * @inject
     */
    protected $attributeRepository = NULL;
	
	/**
	 * feSessionStorage
	 *
	 * @var \RB\RbTinyshop\Utility\Session\Storage\FeSessionStorage
	 * @inject
	 */
	protected $feSessionStorage = NULL;
	
	/**
	 * feSessionStorage
	 *
	 * @var \RB\RbTinyshop\Utility\Price\CalculationUtility
	 * @inject
	 */
	protected $calculationUtility = NULL;
	
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
     * @param array $articleAttributes
	 * @return void
	 */
	public function addItemAction(\RB\RbTinyshop\Domain\Model\Article $article, $quantity = 1, $articleAttributes = array()) {
		$basket = $this->getBasket();
		$articleNumber = $this->getArticleNumber($article->getArticleDetail()->getArticleNumber(), $articleAttributes);
		
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
				$basketPosition = $this->getNewBasketPosition($article, $quantity, $articleAttributes);
				$basket->addBasketPosition($basketPosition);
			}
			
			if($this->feSessionStorage->getUser()->user['uid']) {
				$this->updateBasketRepository($basket);
			}
			else {
				$basket = $this->updateSessionBasket($basket);
			}
			
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
			if($this->feSessionStorage->getUser()->user['uid']) {
				foreach ($basket->getBasketPositions() as $key => $basketPosition) {
					if($basketPosition instanceof \RB\RbTinyshop\Domain\Model\BasketPosition) {
						if($basketPosition->getArticleNumber() === $articleNumber) {
							$basket->removeBasketPosition($basketPosition);
							$this->updateBasketRepository($basket);
							break;
						}
					}
				}
			}
			else {
				$newBasket = new \RB\RbTinyshop\Domain\Model\Basket();
				foreach ($basket->getBasketPositions() as $key => $basketPosition) {
					if($basketPosition instanceof \RB\RbTinyshop\Domain\Model\BasketPosition) {
						if($basketPosition->getArticleNumber() !== $articleNumber) {
							$newBasket->addBasketPosition($basketPosition);
						}
					}
				}
				$basket = $this->updateSessionBasket($newBasket);
			}
		}
		
		if($this->feSessionStorage->has('redirectAction') && $this->feSessionStorage->has('redirectController') && $this->feSessionStorage->getUser()->user['uid']) {
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
		$this->feSessionStorage->write('redirectAction', 'show');
		$this->feSessionStorage->write('redirectController', 'Basket');
		$basket = $this->getBasket();
		$basketEmpty = false;
		
		if($basket instanceof \RB\RbTinyshop\Domain\Model\Basket) {
			if($basket->getBasketPositions()->count() > 0) {
				if($this->feSessionStorage->getUser()->user['uid']) {
					$this->updateBasketRepository($basket);
				}
				else {
					$basket = $this->updateSessionBasket($basket);
				}
			}
			else {
				$basketEmpty = true;
			}
		}
		
		if($basketEmpty) {
			$this->addFlashMessage('Sie haben keine Artikel in Ihrem Warenkorb.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
		}
		else {
			$partialPrices = $this->calculationUtility->getPartialPrices($basket->getTotal(), $this->calculationUtility->getBasketRawTotal($basket));
			$this->view->assign('partialPrices', $partialPrices);
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
				$partialPrices = $this->calculationUtility->getPartialPrices($basket->getTotal(), $this->calculationUtility->getBasketRawTotal($basket));
				
				$this->view->assign('partialPrices', $partialPrices);
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
			$userBasket = $this->basketRepository->findOneByUserUid($userUid);

			if(!$userBasket || ($sessionBasket instanceof \RB\RbTinyshop\Domain\Model\Basket && $sessionBasket->getBasketPositions()->count() > 0)) {
				$emptyBasket = new \RB\RbTinyshop\Domain\Model\Basket();
				$emptyBasket->setPid($this->settings['storagePidBasket']);
				$emptyBasket->setUserUid($userUid);
			}
			
			if(!$sessionBasket && ! $userBasket) {
				$this->addBasketRepository($emptyBasket);
				return $emptyBasket;
			}
			
			if($sessionBasket && !$userBasket) {
				foreach ($sessionBasket->getBasketPositions() as $key => $basketPosition) {
					$emptyBasket->addBasketPosition($basketPosition);
				}
				$this->addBasketRepository($emptyBasket);
				$this->feSessionStorage->remove('basket');
				return $emptyBasket;
			}
			
			if((!$sessionBasket && $userBasket) || $sessionBasket->getBasketPositions()->count() == 0) {
				return $userBasket;
			}
			else {
				$this->basketRepository->remove($userBasket);
				$this->persistenceManager->persistAll();
				foreach ($sessionBasket->getBasketPositions() as $key => $basketPosition) {
					$emptyBasket->addBasketPosition($basketPosition);
				}
				$this->addBasketRepository($emptyBasket);
				$this->feSessionStorage->remove('basket');
				return $emptyBasket;
			}
		}
		else {
			if($sessionBasket === false) {
				$sessionBasket = new \RB\RbTinyshop\Domain\Model\Basket();
				$sessionBasket->setPid($this->settings['storagePidBasket']);
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
	protected function getNewBasketPosition(\RB\RbTinyshop\Domain\Model\Article $article, $quantity, $articleAttributes) {
		$image = $article->getArticleDetail()->getMainImage()->getOriginalResource()->getPublicUrl();
		
		$basketPosition = new \RB\RbTinyshop\Domain\Model\BasketPosition();
		$basketPosition->setTitle($article->getArticleDetail()->getTitle());
		$basketPosition->setPrice($article->getArticleDetail()->getPrice()->getPrice());
		$basketPosition->setQuantity($quantity);
		$basketPosition->setImage($image);
		$basketPosition->setArticleNumber($this->getArticleNumber($article->getArticleDetail()->getArticleNumber(), $articleAttributes));
		$basketPosition->setPid($this->settings['storagePidBasket']);

        foreach($articleAttributes as $groupUid => $attributeUid) {
            $basketPosition->addBasketAttribute($this->getNewBasketAttribute($groupUid, $attributeUid));
        }

        return $basketPosition;
	}

    /**
     * action addItem
     *
     * @param array $articleAttribute
     * @return \RB\RbTinyshop\Domain\Model\BasketAttribute
     */
    protected function getNewBasketAttribute($groupUid, $attributeUid) {
        $attributeGroup = $this->attributeGroupRepository->findByUid($groupUid);
        $attribute = $this->attributeRepository->findByUid($attributeUid);


        $basketAttribute = new \RB\RbTinyshop\Domain\Model\BasketAttribute();

        $basketAttribute->setGroupUid($groupUid);
        $basketAttribute->setGroupTitle($attributeGroup->getTitle());
        $basketAttribute->setAttributeUid($attributeUid);
        $basketAttribute->setAttributeTitle($attribute->getTitle());

        $basketAttribute->setPid($this->settings['storagePidBasket']);
        return $basketAttribute;
    }

    /**
     * action addItem
     *
     * @param string $articleNumber
     * @param array $articleAttributes
     * @return \RB\RbTinyshop\Domain\Model\BasketPosition
     */
    protected function getArticleNumber($articleNumber, $articleAttributes) {
        foreach($articleAttributes as $key => $value) {
            $articleNumber .= '-' . $key . '-' . $value;
        }
        return $articleNumber;
    }
	/**
	 * addBasketRepository
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Basket $basket
	 * @return void
	 */
	protected function addBasketRepository(\RB\RbTinyshop\Domain\Model\Basket $basket) {
		$total = $this->calculationUtility->getBasketRawTotal($basket);
		$total = $this->calculationUtility->addAdditionalCost($total);
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
		$total = $this->calculationUtility->getBasketRawTotal($basket);
		$total = $this->calculationUtility->addAdditionalCost($total);
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
		$total = $this->calculationUtility->getBasketRawTotal($basket);
		$total = $this->calculationUtility->addAdditionalCost($total);
		$basket->setTotal($total);
		$this->feSessionStorage->storeObject($basket, 'basket');
		return $basket;
	}
	
	protected function debug($variable) {
		return \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($variable);
	}
}