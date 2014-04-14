<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 AOE media GmbH <dev@aoemedia.de>
*  All rights reserved
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

if (!defined ('TYPO3_cliMode')) {
	die('Access denied: CLI only.');
}

echo \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tx_t3deploy_dispatch')->dispatch() . PHP_EOL;
