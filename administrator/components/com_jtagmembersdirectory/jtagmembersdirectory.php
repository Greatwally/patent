<?php
/**
 * Joomla! 1.5 component Jtagminicart
 *
 * @version $Id: jtagminicart.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage Jtagminicart
 * @license GNU/GPL
 *
 * Jtag Minicart
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
//JFactory::getDocument()->addStyleSheet(JURI::root() . 'administrator/components/' . JRequest::getVar('option') . '/assets/css/jtag_dashboard.css');

/*
 * Define constants for all pages
 */
// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';
require_once JPATH_COMPONENT.DS.'controllers'.DS.'categories.php';
require_once(JPATH_COMPONENT . DS . 'dashboard.php');
require_once JPATH_COMPONENT.DS.'controllers'.DS.'filters.php';
require_once JPATH_COMPONENT.DS.'controllers'.DS.'adduser.php';
require_once JPATH_COMPONENT.DS.'controllers'.DS.'Users.php';


// Load the admin HTML view
//require_once (JPath::clean(JPATH_ADMINISTRATOR.'/components/com_media/helpers/media.php'));

//Added by Shilpa on 5th March
$task = JRequest::getString('task');

$cmd = JRequest::getCmd('task', null);
//Added by Shilpa on 5th March
$option = strtolower(JRequest::getCmd('option'));
if (strpos($cmd, '.') != false)
{
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);

	// Define the controller name and path
	$controllerName	= strtolower($controllerName);
	$controllerPath	= JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php';

	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath)) {
		require_once($controllerPath);
	} else {
		JError::raiseError(500, 'Invalid Controller');
	}
}
elseif(JRequest::getCmd( 'c', NULL )) 
{
     $controllerName =  JRequest::getCmd( 'c', NULL );
     $menuItem = 'Members';
}
else
{
	// Base controller, just set the task :)
	$controllerName = 'Members';
	$task = $cmd;
        if('jtag_dashboard'==$task)
        $menuItem = 'Dashbord';
        else
        $menuItem = 'Members';
}


$controllerClass = 'JtagMemberDirectoryController'.ucfirst($controllerName);

addSubmenu($menuItem);


if (class_exists($controllerClass))
{
	$controller = new $controllerClass();
} 
 else 
    {
            JError::raiseError(500, $controllerClass);
    }


//require_once(JPATH_COMPONENT . DS . 'dashboard.php'); 
// Perform the Request task
$controller->execute($task);
$controller->redirect();

/// JtagminicartController
//echo get_class($controller);exit();
function addSubmenu($menuItem)
{
    // JSubMenuHelper::addEntry(JText::_('JTAG_BACKEND_MENU_DASHBOARD'), 'index.php?option=com_jtagmembersdirectory&c=dashbord',$menuItem=='Dashbord');
     JSubMenuHelper::addEntry(JText::_('JTAG_BACKEND_MENU_MEMBERS'), 'index.php?option=com_jtagmembersdirectory&c=members',$menuItem=='Members');
     JSubMenuHelper::addEntry(JText::_('JTAG_BACKEND_MENU_CATEGORIES'), 'index.php?option=com_jtagmembersdirectory&c=categories',$menuItem=='Categories');
     
/*Priyanka Bhorkade 08-01-2013 To add the today's registered users to jtag members. */
JSubMenuHelper::addEntry('Users', 'index.php?option=com_jtagmembersdirectory&c=Users',$menuItem=='Users');
/* end */

     JSubMenuHelper::addEntry(JText::_('JTAG_BACKEND_MENU_FILTERS'), 'index.php?option=com_jtagmembersdirectory&c=filters',$menuItem=='filters');
      
      $db = & JFactory::getDBO();
      $query = "SELECT allow_nonregistered_users_from_frontend FROM #__jtmb_display_options";
      $db->setQuery($query);
      $cs = $db->loadObject();
      if($cs->allow_nonregistered_users_from_frontend == 1||empty($cs))
      {
      		//JSubMenuHelper::addEntry(JText::_('Requests'), 'index.php?option=com_jtagmembersdirectory&c=adduser',$menuItem=='Adduser');
      }
}
?>
