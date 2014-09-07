<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Tinyshop',
	'TinyShop'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Menu',
	'Tinyshop Menüs'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'RB.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'tinyshop',	// Submodule key
		'',						// Position
		array(
			'Article' => 'show',
			'TinyShop' => 'home',
			'Basket' => 'show, addItem, removeItem, confirm',
			'Order' => 'list, show',
			'Category' => 'show',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_tinyshop.xlf',
		)
	);

}

$pluginSignature = str_replace('_','',$_EXTKEY) . '_menu';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_menu.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TinyShop');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Page', 'TinyShop Page Layout');

// configure linkhandler
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSconfig('
	options.saveDocView.tx_rbtinyshop_domain_model_article = 1
	options.saveDocView.tx_rbtinyshop_domain_model_category = 1
');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
RTE.default.tx_linkhandler {
	tx_rbtinyshop_domain_model_article {
		label = Artikel
		listTables = tx_rbtinyshop_domain_model_article
	}
	tx_rbtinyshop_domain_model_category {
		label = Kategorie
		listTables = tx_rbtinyshop_domain_model_category
	}
}

mod.tx_linkhandler {
	tx_rbtinyshop_domain_model_article {
		label = Artikel
		listTables = tx_rbtinyshop_domain_model_article
		previewPageId = 1
	}
	tx_rbtinyshop_domain_model_category {
		label = Kategorie
		listTables = tx_rbtinyshop_domain_model_category
		previewPageId = 1
	}
}
');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_tinyshop', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_tinyshop.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_tinyshop');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_tinyshop'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_tinyshop',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,categorys,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TinyShop.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_tinyshop.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_category', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_category.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_category');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_category'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_category',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,image,sub_categorys,articles,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_category.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_article', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_article.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_article');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_article'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_article',
		'label' => 'article_detail',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'categorys,article_detail,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Article.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_article.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_articledetail', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_articledetail.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_articledetail');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_articledetail'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_articledetail',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,main_image,price,images,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/ArticleDetail.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_articledetail.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_price', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_price.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_price');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_price'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_price',
		'label' => 'price',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'price,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Price.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_price.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_image', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_image.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_image');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_image'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_image',
		'label' => 'image',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'image,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Image.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_image.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_basket', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_basket.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_basket');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_basket'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_basket',
		'label' => 'total',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => false,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'total,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Basket.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_basket.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_basketposition', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_basketposition.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_basketposition');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_basketposition'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_basketposition',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'article_details,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/BasketPosition.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_basketposition.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_order', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_order.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_order');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_order'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_order',
		'label' => 'total',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'total,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Order.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_order.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_orderposition', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_orderposition.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_orderposition');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_orderposition'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_orderposition',
		'label' => 'article_number',
		'label_alt' => 'title, price, quantity',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/OrderPosition.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_orderposition.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_orderstate', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_orderstate.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_orderstate');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_orderstate'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_orderstate',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => false,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title, description, order_state,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/OrderState.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_orderstate.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_address', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_address.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_address');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_address'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address',
		'label' => 'lastname',
		'label_alt' => 'firstname, company',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'firstname, lastname, company,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Address.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_address.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_payment', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_payment.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_payment');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_payment'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_payment',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => false,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title, description,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Payment.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_payment.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rbtinyshop_domain_model_shipping', 'EXT:rb_tinyshop/Resources/Private/Language/locallang_csh_tx_rbtinyshop_domain_model_shipping.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rbtinyshop_domain_model_shipping');
$GLOBALS['TCA']['tx_rbtinyshop_domain_model_shipping'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_shipping',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => false,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title, description,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Shipping.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_rbtinyshop_domain_model_shipping.gif'
	),
);

$feUserColumns = array(
	'tx_rbtinyshop_domain_model_user_billingaddress' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_user.billing_address',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_rbtinyshop_domain_model_address',
			'minitems' => 0,
			'maxitems' => 1,
			'eval' => 'required',
			'appearance' => array(
				'enabledControls' => array(
					'info' => false,
					'new' => true,
					'dragdrop' => false,
					'sort' => false,
					'hide' => false,
					'delete' => false
				),
				'collapseAll' => 1,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 0,
				'showPossibleLocalizationRecords' => 0,
				'showAllLocalizationLink' => 0
			),
		),
	),
	'tx_rbtinyshop_domain_model_user_shippingaddress' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_user.shipping_address',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_rbtinyshop_domain_model_address',
			'minitems' => 0,
			'maxitems' => 1,
			'eval' => 'required',
			'appearance' => array(
				'enabledControls' => array(
					'info' => false,
					'new' => true,
					'dragdrop' => false,
					'sort' => false,
					'hide' => false,
					'delete' => false
				),
				'collapseAll' => 1,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 0,
				'showPossibleLocalizationRecords' => 0,
				'showAllLocalizationLink' => 0
			),
		),
	),
	'tx_rbtinyshop_domain_model_user_payment' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_payment',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'tx_rbtinyshop_domain_model_payment',
			'minitems' => 0,
			'maxitems' => 1,
		),
	),
	'tx_rbtinyshop_domain_model_user_shipping' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_shipping',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'tx_rbtinyshop_domain_model_shipping',
			'minitems' => 0,
			'maxitems' => 1,
		),
	),
	'tx_rbtinyshop_domain_model_user_differshipping' => array(
		'config' => array(
			'type' => 'passthrough',
		),
	),
);

\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('fe_users');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('fe_users', 'tx_rbtinyshop_domain_model_user_billingaddress, tx_rbtinyshop_domain_model_user_shippingaddress, tx_rbtinyshop_domain_model_user_payment, tx_rbtinyshop_domain_model_user_shipping', '', 'after:usergroup');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $feUserColumns, 1);