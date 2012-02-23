<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 BKWI <lhilgersom@bkwi.nl>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_fe.php');
require_once(PATH_t3lib.'class.t3lib_userauth.php');
require_once(PATH_tslib.'class.tslib_feuserauth.php');
require_once(PATH_t3lib.'class.t3lib_cs.php');
require_once(PATH_tslib.'class.tslib_content.php');
require_once(PATH_t3lib.'class.t3lib_tstemplate.php');
require_once(PATH_t3lib.'class.t3lib_page.php');

/**
 * Get configuration for the 'bkwi_notification' extension.
 *
 * @author	BKWI <lhilgersom@bkwi.nl>
 * @package	TYPO3
 * @subpackage	tx_bkwinotification
 */
class tx_bkwinotification_config {

	var $pid = 2;
	/**
	 * Get configuration array from EM for this extension
	 * @return	array	configuration array
	 */
	static function getEMConfig() {
		return unserialize($GLOBALS[TYPO3_CONF_VARS]['EXT']['extConf']['bkwi_notification']);
	}

	/**
	 * Get Page TS-Config array for this extension for the given page id.
	 *
	 * @param   int     $id: current page id
	 * @return  array   TSConfig array from mod.tx_{extKey} from pageTSC
	 */
	static function getTSConfig($id) {
		$rootLineStruct = t3lib_BEfunc::BEgetRootLine($id);
		// get TSconfig
		$pagesTSC = t3lib_BEfunc::getPagesTSconfig($id, $rootLineStruct);
#				t3lib_div::debug($pagesTSC);

		return $pagesTSC['mod.']['tx_bkwinotification.'];
	}
	
	function buildTSFE() {							
		$TSFEclassName = t3lib_div::makeInstanceClassName('tslib_fe');

		if (!is_object($GLOBALS['TT'])) {
			$GLOBALS['TT'] = new t3lib_timeTrack;
			$GLOBALS['TT']->start();
		}

		// Create the TSFE class.
		$GLOBALS['TSFE'] = new $TSFEclassName($GLOBALS['TYPO3_CONF_VARS'],$this->pid,'0',1,'','','','');
		$GLOBALS['TSFE']->connectToMySQL();
		$GLOBALS['TSFE']->initFEuser();
		$GLOBALS['TSFE']->fetch_the_id();
		$GLOBALS['TSFE']->getPageAndRootline();
		$GLOBALS['TSFE']->initTemplate();
		$GLOBALS['TSFE']->tmpl->getFileName_backPath = PATH_site;
		$GLOBALS['TSFE']->forceTemplateParsing = 1;
		$GLOBALS['TSFE']->getConfigArray();
//		$GLOBALS['TSFE']->config['config']['typolinkCheckRootline'] = TRUE;
	}
	/**
	 * Add enableFields to query for BE-processes because we cannot use cObj->enableFields when we're not in FE
	 * Includes deleted, hidden, starttime & endtime
	 * @param string $table, optional tablename, gets prepended to fieldnames
	 * @return string additional conditions for where clause
	 */
	static function BEenableFields($table='') {
		if ($table!='') $table .= '.';
		$where  = ' AND '.$table.'deleted=0';
		$where .= ' AND '. ($table=='fe_users.' ? $table.'disable=0' : $table.'hidden=0');
		$where .= ' AND ('.$table.'starttime=0 OR '.$table.'starttime<='.time().')';
		$where .= ' AND ('.$table.'endtime=0 OR '.$table.'endtime>='.time().')';
		return $where;
	}


}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bkwi_notification/classes/class.tx_bkwinotification_config.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bkwi_notification/classes/class.tx_bkwinotification_config.php']);
}
?>