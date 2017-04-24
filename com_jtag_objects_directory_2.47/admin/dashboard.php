<?php 
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory – Jtag objects Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');
class JTagobjectDirectoryControllerDashbord extends JControllerLegacy {

        function __construct($config = array())
	{
		parent::__construct($config);      
                
                // Register Extra tasks
		//$this->registerTask( 'list',  'list' );
   }
function display()
	{ 
		 
		 JRequest::setVar('view', 'jtag_dashboard');
		 parent::display();
	}
}
