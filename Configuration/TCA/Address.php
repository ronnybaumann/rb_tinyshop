<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_rbtinyshop_domain_model_address'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_rbtinyshop_domain_model_address']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, company, salutation, firstname, lastname, street, street_number, postcode, city, country',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, company, salutation, firstname, lastname, street, street_number, postcode, city, country, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_rbtinyshop_domain_model_address',
				'foreign_table_where' => 'AND tx_rbtinyshop_domain_model_address.pid=###CURRENT_PID### AND tx_rbtinyshop_domain_model_address.sys_language_uid IN (-1,0)',
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
		'company' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.company',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'salutation' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.salutation',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'firstname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'lastname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'street' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.street',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'street_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.street_number',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'postcode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.postcode',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'city' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'country' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_address.country',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
	),
);