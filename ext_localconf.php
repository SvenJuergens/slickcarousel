<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:slickcarousel/Configuration/PageTS/PageTS.typoscript">'
);

/***************
 * Make the extension configuration accessible
 */

    $extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
    );
    $slickcarouselPackageConfiguration = $extensionConfiguration->get('slickcarousel');


// Disable default Content Elements

if ($slickcarouselPackageConfiguration['disable_slickcarouselbasic']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(slickcarouselbasic)');
}
if ($slickcarouselPackageConfiguration['disable_slickcarousel']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(slickcarousel)');
}
if ($slickcarouselPackageConfiguration['disable_slickcarouselbgimg']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(slickcarouselbgimg)');
}
if ($slickcarouselPackageConfiguration['disable_slickcarouselsync']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('TCEFORM.tt_content.CType.removeItems := addToList(slickcarouselsync)');
}
