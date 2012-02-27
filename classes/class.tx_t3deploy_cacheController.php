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
	 * object <t3lib_TCEmain>
	 */
	protected $TCE;
	
	/**
	 * Creates this object.
	 */
	public function __construct() {
				
		$this->setTCE();
        // this seems to initalized a BE-User
        $this->TCE->start(Array(),Array());	
	}
	
	/**
	 * Updates the database structure.
	 *
	 * @param array $arguments Optional arguemtns passed to this action
	 * @return void
	 */
	public function clearcacheAction(){
		
		// The option all clears all Tables, IF the user has the TSconfig settings or is admin. We don't want a CLI user with Admin priveledges!!!!
		$this->TCE->clear_cacheCmd('all');
		
		// The BE user (_cli_t3deploy) needs to be ADMIN to run this command via clear_cacheCmd, therefor we run the removeCacheFiles directly
		$this->TCE->removeCacheFiles();
	}
	
	/**
	 * Sets the TCEmain object
	 * 
	 * #return void
	 */
	private function setTCE(){
		$this->TCE = t3lib_div::makeInstance('t3lib_TCEmain');
	}
	
	/**
	 *	Gets the TCEmain object
	 * 
	 * @return t3lib_TCEmain $TCE
	 */
	public function getTCE(){
		return $this->TCE;
	}
}