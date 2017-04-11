<?php

if ((int)TYPO3_version == 7) {
    $showitem_default_01 = '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,';
    $showitem_default_02 = '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                                    layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:layout_formlabel,
                                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                                    hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
                                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,
                            --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories
                            ';
}
if ((int)TYPO3_version == 8) {
    $showitem_default_01 = '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                            ';
    $showitem_default_02 = '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                                --palette--;;language,
                            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                                --palette--;;hidden,
                                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                                    categories,
                            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                                    rowDescription,
                            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
                            ';
}

$slick_default_fields = array(
    'slickdefault' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slides',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'slickdefault',
            array(
                'collapseAll' => 1,
                'maxitems' => 99,
                'foreign_types' => array(
                    '0' => array(
                        'showitem' => '
    										--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
    										--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
                        'showitem' => '
    										--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;slickslider,
    										--palette--;;filePalette'
                    ),
                )
            ),
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ),
    'tx_slickcarouselbgimg' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slickcarouselbging.title',
        'config' => array(
            'type' => 'inline',
            'foreign_table' => 'tx_slickcarouselbgimg',
            'foreign_field' => 'tt_content',
            'maxitems' => 999,
            'appearance' => array(
                'collapseAll' => true,
                'useSortable' => true,
                'showSynchronizationLink' => false,
                'showAllLocalizationLink' => true,
                'showPossibleLocalizationRecords' => false,
                'showRemovedLocalizationRecords' => false,
                'expandSingle' => true,
                'enabledControls' => array(
                    'localize' => true,
                ),
            ),
            'behaviour' => array(
                'mode' => 'select',
                'localizeChildrenAtParentLocalization' => true,
            ),
        ),
    ),
    'slickheight' => array(
        'label' => 'LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slickcarouselbging.height',
        'config' => array(
            'type' => 'input',
            'size' => '3',
            'eval' => 'trim',
            'max' => '240',
            'default' => '0.5'
        ),
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $slick_default_fields);

// Dropdown Slick CE's - START

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Slickcarousel',
        '--div--'
    ],
    '--div--',
    'before'
);

// Dropdown Slick CE's - END

// Slick Basic - START

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slickcarouselbasic.title',
        'slickcarouselbasic',
        'EXT:slickcarousel/slick.svg'
    ],
    '--div--',
    'after'
);

$GLOBALS['TCA']['tt_content']['types']['slickcarouselbasic'] = array(
    'showitem' => $showitem_default_01 . '
		header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.div_formlabel,
		slickdefault;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slides,
		--div--;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
		pi_flexform;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
		--div--;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
		' . $showitem_default_02,
);

$GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds'][',slickcarouselbasic'] =
    'FILE:EXT:slickcarousel/Configuration/FlexForms/slick-basic.xml';

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['slickcarouselbasic'] = 'slickicon';

// Slick Basic - END

// Slick Sync - START

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slickcarouselsync.title',
        'slickcarouselsync',
        'EXT:slickcarousel/slick.svg'
    ],
    '--div--',
    'after'
);

$GLOBALS['TCA']['tt_content']['types']['slickcarouselsync'] = array(
    'showitem' => $showitem_default_01 . '
		header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.div_formlabel,
		slickdefault;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slides,
		--div--;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
		pi_flexform;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
		--div--;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
        ' . $showitem_default_02,
);

$GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds'][',slickcarouselsync'] =
    'FILE:EXT:slickcarousel/Configuration/FlexForms/slick-synked.xml';

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['slickcarouselsync'] = 'slickicon';

// Slick Sync - END

// Slick Expert - START

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slickcarousel.title',
        'slickcarousel',
        'EXT:slickcarousel/slick.svg'
    ],
    '--div--',
    'after'
);

$GLOBALS['TCA']['tt_content']['types']['slickcarousel'] = array(
    'showitem' => $showitem_default_01 . '
		header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.div_formlabel,
		slickdefault;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slides,
		--div--;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
		pi_flexform;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
	    ' . $showitem_default_02,
);

$GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds'][',slickcarousel'] =
    'FILE:EXT:slickcarousel/Configuration/FlexForms/slick-responsive.xml';

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['slickcarousel'] = 'slickicon';

// Slick Expert - END

// Slick Text - START

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slickcarouselbging.title',
        'slickcarouselbgimg',
        'EXT:slickcarousel/slick.svg'
    ],
    '--div--',
    'after'
);

$GLOBALS['TCA']['tt_content']['types']['slickcarouselbgimg'] = array(
    'showitem' => $showitem_default_01 . '
		header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.div_formlabel,
		slickheight;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slickcarouselbging.height,
		tx_slickcarouselbgimg;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:slickcarouselbging.title,
		--div--;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
		pi_flexform;LLL:EXT:slickcarousel/Resources/Private/Language/be_locallang.xlf:settings,
        ' . $showitem_default_02,
);

$GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds'][',slickcarouselbgimg'] =
    'FILE:EXT:slickcarousel/Configuration/FlexForms/slick-responsive.xml';

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['slickcarouselbgimg'] = 'slickicon';

// Slick Text - END
