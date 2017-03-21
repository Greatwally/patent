<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory – Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
$user = & JFactory::getUser();
//if (!$user->authorize('com_components', 'manage')) {
//	$mainframe->redirect('index.php', JText::_('ALERTNOTAUTH'));
//}

require_once(JPATH_COMPONENT . DS . 'controller.php');

//$controller_class = 'JTagMemberDorectoryControllerAdmin';
//$controller = new $controller_class();

$controller = new JTagMemberDirectoryController();

$controller->execute(JRequest::getVar('task', 'browseList'));
$controller->redirect();
