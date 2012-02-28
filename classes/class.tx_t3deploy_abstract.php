<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Tryweb V.O.F <support@tryweb.nl>
*  All rights reserved
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Controller that handles database actions of the t3deploy process inside TYPO3.
 *
 * @package t3deploy
 * @author Oliver Hader <oliver.hader@aoemedia.de>
 *
 */
class tx_t3deploy_abstract {

	/**
	 * Prints the output message
	 *
	 * @param	string		$message for output
	 */	
	protected function printMessage($message, $status=0, $exit = true) {
		echo($message . PHP_EOL);
		if($exit) exit($status);
	}
}