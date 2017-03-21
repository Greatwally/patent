<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory � Jtag Members Directory
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
jimport('joomla.application.component.view');

class jtagmemberdirectoryViewmembergallery extends JViewLegacy
{
  function display($tpl = null)
  {
    $app = & JFactory::getApplication();
    $template = $app->getTemplate();
    
    JFactory::getDocument()->addScript(JURI::root() . 'components/com_jtagmembersdirectory/assets/js/jquery-1.4.1.js');
	JFactory::getDocument()->addStyleSheet(JURI::root().'components/com_jtagmembersdirectory/assets/css/base.css');
	
    if (file_exists(JURI::root().'components/com_jtagmembersdirectory/assets/css/'.$template.'.css'))
    {
      JFactory::getDocument()->addStyleSheet(JURI::root().'components/com_jtagmembersdirectory/assets/css/'.$template.'.css');
    }
    
    parent::display($tpl);
  }
}
