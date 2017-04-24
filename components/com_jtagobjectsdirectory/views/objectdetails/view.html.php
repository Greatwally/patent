<?php
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory � Jtag objects Directory
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

class jtagobjectdirectoryViewobjectDetails extends JViewLegacy
{
  function display($tpl = null)
  {
    $app = & JFactory::getApplication();
    $template = $app->getTemplate();
    
    JFactory::getDocument()->addStyleSheet(JURI::root().'components/com_jtagobjectsdirectory/assets/css/styles.css');
    if (file_exists(JURI::root().'components/com_jtagobjectsdirectory/assets/css/'.$template.'.css'))
    {
      JFactory::getDocument()->addStyleSheet(JURI::root().'components/com_jtagobjectsdirectory/assets/css/'.$template.'.css');
    }
    
    $countries = require_once (JPATH_COMPONENT . DS . 'helpers' . DS . 'countries_list.php');
    $this->assign('countries', $countries);

    parent::display($tpl);
  }
}
