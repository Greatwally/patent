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
// No direct access
defined('_JEXEC') or die;
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.view');

class jtagmemberdirectoryViewbrowseList extends JViewLegacy
{
  function display($tpl = null)
  {
    //include helpers
    require_once (JPATH_COMPONENT . DS . 'helpers' . DS . 'partial.php');
    
    $this->setLayout('raw.default');
    
    parent::display($tpl);
  }
}
