<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Tryweb V.O.F <support@tryweb.nl>
*  All rights reserved
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

t3lib_div::requireOnce(PATH_t3lib . 'class.t3lib_install.php');

/**
 * Controller that handles database actions of the t3deploy process inside TYPO3.
 *
 * @package t3deploy
 * @author Oliver Hader <oliver.hader@aoemedia.de>
 *
 */
class tx_t3deploy_cacheController {

	/**
	 * Creates this object.
	 */
	public function __construct() {
		
		$this->install = t3lib_div::makeInstance('t3lib_install');
		$this->setLoadedExtensions($GLOBALS['TYPO3_LOADED_EXT']);
		$this->setConsideredTypes($this->getUpdateTypes());
		
		
		$TCE = t3lib_div::makeInstance('t3lib_TCEmain');
        // this seems to initalized a BE-User
        $TCE->start(Array(),Array());
        // so this line does not throw an error any more
        $TCE->clear_cache('tt_news',$oneRecordId);
		
		/*function clearpagecache($pid_list) {
$tce = t3lib_div::makeInstance('t3lib_TCEmain');
$pid_array = explode(',', $pid_list);
foreach ($pid_array as $pid) {
$tce->clear_cacheCmd($pid);
}
}
		 * 
		 * <?php 

define("PATH_typo3conf", dirname(dirname(dirname(__FILE__)))."/"); 
define("PATH_site", dirname(PATH_typo3conf)."/"); 
define("PATH_typo3", PATH_site."typo3/");       // Typo-configuraton path 
define("PATH_t3lib", PATH_site."t3lib/"); 
define('TYPO3_MODE','BE'); 
ini_set('error_reporting', E_ALL ^ E_NOTICE); 

require_once (PATH_t3lib.'class.t3lib_div.php'); 
require_once (PATH_t3lib.'class.t3lib_extmgm.php'); 
require_once (PATH_t3lib.'class.t3lib_tcemain.php'); 

require_once(PATH_t3lib.'config_default.php'); 

if (!defined ("TYPO3_db")) die ("The configuration file was not included."); 
require_once(PATH_t3lib.'class.t3lib_db.php');          // The database library 
$TYPO3_DB = t3lib_div::makeInstance('t3lib_db'); 
$TYPO3_DB->sql_pconnect (TYPO3_db_host, TYPO3_db_username, TYPO3_db_password); 
$TYPO3_DB->sql_select_db (TYPO3_db); 

$tce = t3lib_div::makeInstance('t3lib_TCEmain'); 
$tce->clear_cacheCmd(40);  // ID of the page for which to clear the cache 

?> 
		 */
	
	}
}