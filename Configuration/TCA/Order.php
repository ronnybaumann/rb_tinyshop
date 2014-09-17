<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_rbtinyshop_domain_model_order'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_rbtinyshop_domain_model_order']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, order_state, crdate, payment, transaction, shipping, feuser, billing_address, shipping_address, order_positions, order_partial_prices, total',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, order_state, crdate, payment, transaction, shipping, feuser, billing_address, shipping_address, order_positions, order_partial_prices, total, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rbtinyshop_domain_model_order',
				'foreign_table_where' => 'AND tx_rbtinyshop_domain_model_order.pid=###CURRENT_PID### AND tx_rbtinyshop_domain_model_order.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'crdate' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_order.crdate',
			'config' => Array (
				'type' => 'none',
				'format' => 'datetime',
				'eval' => 'datetime',
	
			)
		),
		'payment' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_order.payment',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'readOnly' =>1
			)
		),
		'transaction' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_order.transaction',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'readOnly' =>1
			)
		),
		'shipping' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_order.shipping',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'readOnly' =>1
			)
		),
		'total' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_order.total',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
		'order_state' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_orderstate',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_rbtinyshop_domain_model_orderstate',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'feuser' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_user',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'fe_users',
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
					'levelLinksPosition' => 'none',
					'showSynchronizationLink' => 0,
					'showPossibleLocalizationRecords' => 0,
					'showAllLocalizationLink' => 0
				),
				'behaviour' => array(
					'enableCascadingDelete' => false
				),
			),
		),
		'billing_address' => array(
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
					'levelLinksPosition' => 'none',
					'showSynchronizationLink' => 0,
					'showPossibleLocalizationRecords' => 0,
					'showAllLocalizationLink' => 0
				),
			),
		),
		'shipping_address' => array(
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
					'levelLinksPosition' => 'none',
					'showSynchronizationLink' => 0,
					'showPossibleLocalizationRecords' => 0,
					'showAllLocalizationLink' => 0
				),
			),
		),
		'order_positions' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_order.order_positions',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_rbtinyshop_domain_model_orderposition',
				'foreign_field' => 'order_id',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'order_partial_prices' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_order.order_partial_prices',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_rbtinyshop_domain_model_orderpartialprice',
				'foreign_field' => 'order_id',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'order_id' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
