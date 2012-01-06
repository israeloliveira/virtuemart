<?php
/**
*
* Controller for the front end Manufacturerviews
*
* @package	VirtueMart
* @subpackage User
* @author Oscar van Eijk
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* @version $Id: manufacturer.php 2420 2010-06-01 21:12:57Z oscar $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

// Load the controller framework
jimport('joomla.application.component.controller');

/**
 * VirtueMart Component Controller
 *
 * @package		VirtueMart
 */
class VirtueMartControllerVendor extends JController
{

	function __construct() {

		parent::__construct();

		$view = $this->getView('vendor', 'html');
		$view->setLayout('default');
		/* Load the backend models */
		/* Push a model into the view */
// 		$this->addModelPath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtuemart' . DS . 'models');
		/*Vendor functions */
// 		$view->setModel( $this->getModel( 'vendor', 'VirtuemartModel',true ));

		/* Display it all */
// 		$view->display();


// 		$this->registerTask('browse','category');
	}

	function tos() {
		$view = $this->getView('vendor', 'html');
		$view->setLayout('tos');

		/* Display it all */
		$view->display();
	}

	public function contact() {
		$view = $this->getView('vendor', 'html');
		$view->setLayout('contact');

		/* Display it all */
		$view->display();
	}

	function details(){
		$view = $this->getView('vendor', 'html');
		$view->setLayout('details');

		/* Display it all */
		$view->display();
	}

}

// No closing tag
