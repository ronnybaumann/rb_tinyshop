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
 * OrderController
 */
class OrderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * persistenceManager
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager;
	
	/**
	 * userRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository = NULL;
	
	/**
	 * orderRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\OrderRepository
	 * @inject
	 */
	protected $orderRepository = NULL;
	
	/**
	 * orderStateRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\OrderStateRepository
	 * @inject
	 */
	protected $orderStateRepository = NULL;
	
	/**
	 * basketRepository
	 *
	 * @var \RB\RbTinyshop\Domain\Repository\BasketRepository
	 * @inject
	 */
	protected $basketRepository = NULL;
	
	/**
	 * ReflectionService instance
	 *
	 * @var \RB\RbTinyshop\Service\CloneService
	 * @inject
	 */
	protected $cloneService;
	
	/**
	 * action show
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Order $order
	 * @ignorevalidation $order
	 * @return void
	 */
	public function finishAction(\RB\RbTinyshop\Domain\Model\Order $order) {
		$this->debug($order);
		$this->view->assign('order', $order);
	}
	
	/**
	 * action show
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Order $order
	 * @return void
	 */
	public function placeOrderAction(\RB\RbTinyshop\Domain\Model\Basket $basket) {
		$orderFinished = true;
		$order = new \RB\RBTinyshop\Domain\Model\Order();
		$user = $this->userRepository->findByUid($basket->getUserUid());
		$orderState = $this->orderStateRepository->findByUid(1);
		
		//set new order values
		$order->setTotal($basket->getTotal());
		$order->setOrderState($orderState);
		$order->setPid($this->settings['storagePidOrder']);
		
		foreach ($basket->getBasketPositions() as $key => $basketPosition) {
			if($basketPosition instanceof \RB\RbTinyshop\Domain\Model\BasketPosition) {
				$orderPosition = new \RB\RbTinyshop\Domain\Model\OrderPosition();
				
				$orderPosition->setArticleNumber($basketPosition->getArticleNumber());
				$orderPosition->setPrice($basketPosition->getPrice());
				$orderPosition->setQuantity($basketPosition->getQuantity());
				$orderPosition->setTitle($basketPosition->getTitle());
				$orderPosition->setPid($this->settings['storagePidOrder']);
				
				$order->addOrderPosition($orderPosition);
			}
			else {
				$orderFinished = false;
			}
		}
		
		if($user instanceof \RB\RbTinyshop\Domain\Model\User) {
			if ($user->getBillingAddress() instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
				$user->getBillingAddress()->_loadRealInstance();
			}
			
			if ($user->getShippingAddress() instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
				$user->getShippingAddress()->_loadRealInstance();
			}
			
			$order->setBillingAddress($this->cloneService->copy($user->getBillingAddress()));
			$order->setShippingAddress($this->cloneService->copy($user->getShippingAddress()));
			
			$order->getBillingAddress()->setPid($this->settings['storagePidOrder']);
			$order->getShippingAddress()->setPid($this->settings['storagePidOrder']);
			
			$order->setFeuser($user);
		}
		else {
			$orderFinished = false;
		}
		
		//persist new order
		$this->orderRepository->add($order);
		$this->persistenceManager->persistAll();
		
		//delete basket
		if($orderFinished) {
			//$this->basketRepository->remove($basket);
			//$this->persistenceManager->persistAll();
			
			$this->redirect('finish', 'Order', 'RbTinyshop', array('pluginName' => 'Tinyshop', 'order' => $order), $this->settings['shopRootId']);
		}
		else {
			$this->redirect('confirm', 'Basket');
		}
	}
	
	protected function debug($variable) {
		return \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($variable);
	}
}