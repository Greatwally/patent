<?php
/**
 * Joomla! 1.5 component Jtagminicart
 *
 * @version $Id: controller.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage Jtagmemberdirectory
 * @license GNU/GPL
 *
 * Jtag Memberdirectory
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
jimport( 'joomla.application.component.controller' );

/**
 * Jtagminicart Controller
 *
 * @package Joomla
 * @subpackage Jtagmemberdirectory
 */
class JTagMemberDirectoryControllerAdduser extends JControllerLegacy {

        function __construct($config = array())
	{
		parent::__construct($config);      
                
              
	}
   
	  function display()
	{ 
		 
		 JRequest::setVar('view', 'adduser');
		 parent::display();
	}  
}
?>
