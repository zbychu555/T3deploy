<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Tryweb V.O.F <support@tryweb.nl>
*  All rights reserved
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

t3lib_div::requireOnce(t3lib_extMgm::extPath('t3deploy'). 'classes/class.tx_t3deploy_abstract.php');
t3lib_div::requireOnce(PATH_t3lib . 'class.t3lib_install.php');

/**
 * Controller that handles database actions of the t3deploy process inside TYPO3.
 *
 * @package t3deploy
 * @author Oliver Hader <oliver.hader@aoemedia.de>
 *
 */
class tx_t3deploy_cacheController extends tx_t3deploy_abstract {

	/**
	 * object <t3lib_TCEmain>
	 */
	protected $TCE;
	
	/**
	 * Creates this object.
	 */
	public function __construct() {
				
		$this->setTCE();
        // this seems to initalized a BE
        $this->TCE->start(Array(),Array());
		// We need a admin user to clear the full cache
		$this->TCE->admin = TRUE;
	}
	
	/**
	 * Updates the database structure.
	 *
	 * @param array $arguments Optional arguemtns passed to this action
	 * @return void
	 */
	public function clearcacheAction(){
		
		// The option all clears all cache Tables & Files
		$this->TCE->clear_cacheCmd('all');
		$this->printMessage('T3Deploy: All Caches purged!', 0, FALSE);
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