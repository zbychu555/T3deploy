<?php
$extensionPath = TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3deploy');
return array(
	'tx_t3deploy_dispatch' => $extensionPath . 'classes/class.tx_t3deploy_dispatch.php',
	'tx_t3deploy_databaseController' => $extensionPath . 'classes/class.tx_t3deploy_databaseController.php',
	'tx_t3deploy_cacheController' => $extensionPath . 'classes/class.tx_t3deploy_cacheController.php',
);

?>