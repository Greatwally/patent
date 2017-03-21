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
// For Editing Members Details from FrontEnd
// Started on Sept 28, 2012 by Pratik 

defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.view');

class jtagmemberdirectoryVieweditmemberdetail extends JViewLegacy
{

  function display($tpl = null)
  {

    $member = NULL;
    $app = & JFactory::getApplication();
    $template = $app->getTemplate();
    
    JFactory::getDocument()->addStyleSheet(JURI::root().'components/com_jtagmembersdirectory/assets/css/styles.css');
    if (file_exists(JURI::root().'components/com_jtagmembersdirectory/assets/css/'.$template.'.css'))
    {
      JFactory::getDocument()->addStyleSheet(JURI::root().'components/com_jtagmembersdirectory/assets/css/'.$template.'.css');
    }
    
    $countries = require_once (JPATH_COMPONENT . DS . 'helpers' . DS . 'countries.php');

    require_once (JPATH_COMPONENT.DS.'models'.DS.'categories.php');
	$categoriesModel = new JtagMemberDirectoryModelCategories;
    $categories = $categoriesModel->getCategories();
        
    
    $this->assign('countries', $countries);
    $this->assign('categories',$categories);
    
    //$this->assignRef('member',);
    parent::display($tpl);
  }
}
