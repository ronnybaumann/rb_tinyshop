<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'RB.' . $_EXTKEY,
	'Tinyshop',
	array(
		'TinyShop' => 'home',
		'Category' => 'show',
		'Article' => 'show',
		'Basket' => 'show, addItem, removeItem, confirm',
		'Account' => 'login,account,userOrders,register,create,edit,update,editBillingShippingAddress,editPaymentShipping,forgotPassword',
		'Order' => 'placeOrder, finish'
	),
	// non-cacheable actions
	array(
		'TinyShop' => '',
		'Category' => '',
		'Article' => '',
		'Basket' => 'show, addItem, removeItem, confirm',
		'Account' => 'login,account,userOrders,register,create,edit,update,editBillingShippingAddress,editPaymentShipping,forgotPassword',
		'Order' => 'placeOrder, finish'
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'RB.' . $_EXTKEY,
	'Menu',
	array(
		'Menu' => 'main',

	),
	// non-cacheable actions
	array(
		'Menu' => '',
	)
);

//Hooks
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'RB\\RbTinyshop\\Hooks\\ProcessDatamapHooks';