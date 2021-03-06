<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_rbtinyshop_domain_model_orderposition'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_rbtinyshop_domain_model_orderposition']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, article_number, price, quantity, order_attributes',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, article_number, price, quantity, order_attributes, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_rbtinyshop_domain_model_orderposition',
				'foreign_table_where' => 'AND tx_rbtinyshop_domain_model_orderposition.pid=###CURRENT_PID### AND tx_rbtinyshop_domain_model_orderposition.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_orderposition.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'article_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_orderposition.article_number',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'price' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_orderposition.price',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
		'quantity' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_orderposition.quantity',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			)
		),
        'order_attributes' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rb_tinyshop/Resources/Private/Language/locallang_db.xlf:tx_rbtinyshop_domain_model_orderposition.order_attributes',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_rbtinyshop_domain_model_orderattribute',
                'foreign_field' => 'orderposition',
                'minitems' => 0,
                'maxitems' => 9999,
                'appearance' => array(
                    'enabledControls' => array(
                        'info' => false,
                        'new' => false,
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
	),
);
