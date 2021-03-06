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

jimport('joomla.application.component.view');

class jtagmemberdirectoryViewadduser extends JViewLegacy
{
 function display($tpl = null)
  {
    $this->_addToolbar();
    
     
    parent::display($tpl);
  }
  
  function _addToolbar()
  {
    JToolBarHelper::preferences( 'com_jtagmembersdirectory' );
    JToolBarHelper::title(JText::_("Member Requests"));
    JToolBarHelper::publishList('accept','Accept');
    JToolBarHelper::unpublishList('reject','Reject','Do you want to reject this request?');
   // JToolBarHelper::deleteListX('Are you sure you want to reject this request?', 'reject');
 
  }

}
