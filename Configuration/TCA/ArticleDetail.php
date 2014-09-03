<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_rbtinyshop_domain_model_articledetail'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_rbtinyshop_domain_model_articledetail']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, article_number, description, main_image, price, images',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, article_number, description;;;richtext:rte_transform[mode=ts_links], main_image, price, images, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_rbtinyshop_domain_model_articledetail',
				'foreign_table_where' => 'AND tx_rbtinyshop_domain_model_articledetail.pid=###CURRENT_PID### AND tx_rbtinyshop_domain_model_articledetail.sys_language_uid IN (-1,0)',
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

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_articledetail.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'article_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_articledetail.article_number',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required,unique'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_articledetail.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'main_image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_articledetail.main_image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'mainImage',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'price' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_articledetail.price',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_rbtinyshop_domain_model_price',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_articledetail.images',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_rbtinyshop_domain_model_image',
				'foreign_field' => 'articledetail',
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
		
	),
);
