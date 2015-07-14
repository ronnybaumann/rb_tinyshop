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
	 * payPalUtility
	 *
	 * @var \RB\RbTinyshop\Utility\Payment\PayPal\PayPalUtility
	 * @inject
	 */
	protected $payPalUtility = NULL;
	
	/**
	 * calculationUtility
	 *
	 * @var \RB\RbTinyshop\Utility\Price\CalculationUtility
	 * @inject
	 */
	protected $calculationUtility = NULL;
	
	/**
	 * action show
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Order $order
	 * @ignorevalidation $order
	 * @return void
	 */
	public function finishAction(\RB\RbTinyshop\Domain\Model\Order $order) {
		$this->view->assign('order', $order);
	}
	
	/**
	 * action show
	 *
	 * @param \RB\RbTinyshop\Domain\Model\Order $order
	 * @param boolean $paymentSuccess
	 * @return void
	 */
	public function placeOrderAction(\RB\RbTinyshop\Domain\Model\Basket $basket, $paymentSuccess = false) {
		$orderFinished = true;
		$order = new \RB\RBTinyshop\Domain\Model\Order();
		$user = $this->userRepository->findByUid($basket->getUserUid());

		//do paypal payment
		if($user->getPayment()->getUid() == 4) {
			if($paymentSuccess == false) {
				$paymentUrl = 'http://www.tiny-shop.de/demoshop/?tx_rbtinyshop_tinyshop[basket]=' . $basket->getUid() . '&tx_rbtinyshop_tinyshop[action]=placeOrder&tx_rbtinyshop_tinyshop[controller]=Order';
				$payment = $this->payPalUtility->payWithPayPal('' . $basket->getTotal(), 'EUR', 'Ihre Bestellung bei tiny-shop.de',
						"$paymentUrl&tx_rbtinyshop_tinyshop[paymentSuccess]=true", "$paymentUrl&tx_rbtinyshop_tinyshop[paymentSuccess]=false");
					
				$this->feSessionStorage->write('paymentId', $payment->getId());
				
				header("Location: " . $this->payPalUtility->getPayPalLink($payment->getLinks(), "approval_url") );
				exit;
			}
			
			if($paymentSuccess == true) {
				
				if(isset($_GET['PayerID'])) {
					$paymentId = $this->feSessionStorage->read('paymentId');
					$payment = $this->payPalUtility->executePayment($paymentId, $_GET['PayerID']);
					
					if($payment->getState() == 'approved') {
						$orderState = $this->orderStateRepository->findByUid(2);
						$transactions = $payment->getTransactions();
						$orderTransaction = '';
						
						foreach ($transactions as $transactionKey => $transaction) {
							if($transaction instanceof  \PayPal\Api\Transaction) {
								foreach ($transaction->getRelatedResources() as $relatedResourceKey => $relatedResource) {
									if($relatedResource instanceof \PayPal\Api\RelatedResources) {
										if($orderTransaction == '') {
											$orderTransaction .= $relatedResource->getSale()->getId();
										}
										else {
											$orderTransaction .= '|' . $relatedResource->getSale()->getId();
										}
									}
								}
							}
						}
						$order->setTransaction($orderTransaction);
					}
				}
			}
		}
		
		if(!isset($orderState)) {
			$orderState = $this->orderStateRepository->findByUid(1);
		}
		
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

                foreach($basketPosition->getBasketAttributes() as $basketAttribute) {
                    if($basketAttribute instanceof \RB\RbTinyshop\Domain\Model\BasketAttribute) {
                        $orderAttribute = new \RB\RbTinyshop\Domain\Model\OrderAttribute();
                        $orderAttribute->setGroupUid($basketAttribute->getGroupUid());
                        $orderAttribute->setGroupTitle($basketAttribute->getGroupTitle());
                        $orderAttribute->setAttributeUid($basketAttribute->getAttributeUid());
                        $orderAttribute->setAttributeTitle($basketAttribute->getAttributeTitle());
                        $orderAttribute->setPid($this->settings['storagePidOrder']);

                        $orderPosition->addOrderAttribute($orderAttribute);
                    }
                    else {
                        $orderFinished = false;
                    }
                }
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
			
			$order->setShipping($user->getShipping()->getTitle());
			$order->setPayment($user->getPayment()->getTitle());
			
			$order->setFeuser($user);
		}
		else {
			$orderFinished = false;
		}
		
		//set partial prices
		$orderParitalPrices = $this->calculationUtility->getOrderPartialPrices($basket->getTotal(), $this->calculationUtility->getBasketRawTotal($basket));
			
		foreach ($orderParitalPrices as $key => $orderParitalPrice) {
			$orderParitalPriceModel = new \RB\RbTinyshop\Domain\Model\OrderPartialPrice();
			if($orderParitalPriceModel instanceof \RB\RbTinyshop\Domain\Model\OrderPartialPrice) {
				$orderParitalPriceModel->setTitle($orderParitalPrice['title']);
				$orderParitalPriceModel->setValue($orderParitalPrice['value']);
				$orderParitalPriceModel->setPosition($orderParitalPrice['position']);
					
				$order->addOrderPartialPrice($orderParitalPriceModel);
			}
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