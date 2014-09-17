<?php 
namespace RB\RbTinyshop\Utility\Payment\PayPal;

$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('rb_tinyshop');
require_once $extensionPath . 'Classes/Utility/Payment/PayPal/vendor/autoload.php';

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Details;
use PayPal\Api\ItemList;
use PayPal\Api\Item;

class PayPalUtility implements \TYPO3\CMS\Core\SingletonInterface {
	
	/**
	 * Contains the settings of the current extension
	 *
	 * @var array
	 * @api
	 */
	protected $settings;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 */
	protected $configurationManager;
	
	/**
	 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
	 * @return void
	 */
	public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager) {
		$this->configurationManager = $configurationManager;
		$this->settings = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
	}
	
	/**
	 * returns totalvalue of all positions in basket
	 *
	 * @param string $total	       payment amount in DDD.DD format
	 * @param string $currency	   3 letter ISO currency code such as 'USD'
	 * @param string $paymentDesc  A description about the payment
	 * @param string $returnUrl	   The url to which the buyer must be redirected to on successful completion of payment
 	 * @param string $cancelUrl	   The url to which the buyer must be redirected to if the payment is cancelled
	 * @return \PayPal\Api\Payment
	 */
	public function payWithPayPal($total, $currency, $paymentDesc, $returnUrl, $cancelUrl) {
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		
		// Specify the payment amount.
		$amount = new Amount();
		$amount->setCurrency($currency);
		$amount->setTotal($total);

		//Item
		$item = new Item();
		$item->setCurrency($currency);
		$item->setName($paymentDesc);
		$item->setPrice($total);
		$item->setQuantity('1');
		
		//ItemList
		$itemList = new ItemList();
		$itemList->setItems(array($item));
		
		// ###Transaction
		// A transaction defines the contract of a
		// payment - what is the payment for and who
		// is fulfilling it. Transaction is created with
		// a `Payee` and `Amount` types
		$transaction = new Transaction();
		$transaction->setAmount($amount);
		$transaction->setItemList($itemList);
		
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($returnUrl);
		$redirectUrls->setCancelUrl($cancelUrl);
		
		$payment = new Payment();
		$payment->setRedirectUrls($redirectUrls);
		$payment->setIntent("sale");
		$payment->setPayer($payer);
		$payment->setTransactions(array($transaction));
		
		$payment->create($this->getApiContext());
		
		$transaction->setItemList(new ItemList(new Item()));
		return $payment;
	}
	
	/**
	 * Completes the payment once buyer approval has been
	 * obtained. Used only when the payment method is 'paypal'
	 *
	 * @param string $paymentId id of a previously created
	 * 		payment that has its payment method set to 'paypal'
	 * 		and has been approved by the buyer.
	 *
	 * @param string $payerId PayerId as returned by PayPal post
	 * 		buyer approval.
	 * @return \PayPal\Api\Payment
	 */
	public function executePayment($paymentId, $payerId) {
	
		$payment = Payment::get($paymentId, $this->getApiContext());
		$paymentExecution = new PaymentExecution();
		$paymentExecution->setPayerId($payerId);
		$payment = $payment->execute($paymentExecution, $this->getApiContext());
	
		return $payment;
	}
	
	/**
	 * Utility method that returns the first url of a certain
	 * type. Returns empty string if no match is found
	 *
	 * @param array $links
	 * @param string $type
	 * @return string
	 */
	public function getPayPalLink(array $links, $type) {
		foreach($links as $link) {
			if($link->getRel() == $type) {
				return $link->getHref();
			}
		}
		return "";
	}
	
	/**
	 * returns totalvalue of all positions in basket
	 *
	 * @return \PayPal\Rest\ApiContext
	 */
	protected function getApiContext() {
		$apiContext = new ApiContext(new OAuthTokenCredential(
				$this->settings['payment']['paypal'][$this->settings['payment']['paypal']['mode']]['clientId'],
				$this->settings['payment']['paypal'][$this->settings['payment']['paypal']['mode']]['clientSecret']
		));
		
		// Define the location of the sdk_config.ini file
		//define("PP_CONFIG_PATH", __DIR__);
		
		$config = array(
			'http.ConnectionTimeOut' => 30,
			'http.Retry' => 1,
			'mode' => $this->settings['payment']['paypal']['mode'],
			'log.LogEnabled' => true,
			'log.FileName' => $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'typo3temp/logs/paypal.log',
			'log.LogLevel' => 'INFO'
		);
		
		$apiContext->setConfig($config);
		
		// Alternatively pass in the configuration via a hashmap.
		// The hashmap can contain any key that is allowed in
		// sdk_config.ini
		/*
		 $apiContext->setConfig(array(
		 		'http.ConnectionTimeOut' => 30,
		 		'http.Retry' => 1,
		 		'mode' => 'sandbox',
		 		'log.LogEnabled' => true,
		 		'log.FileName' => '../PayPal.log',
		 		'log.LogLevel' => 'INFO'
		 ));
		*/
		return $apiContext;
	}
}