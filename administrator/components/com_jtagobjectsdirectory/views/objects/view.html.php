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

jimport('joomla.application.component.view');

class jtagobjectdirectoryViewobjects extends JViewLegacy
{
  function display($tpl = null)
  {
    $this->_addToolbar();
      	$mainframe =  JFactory::getApplication();
        $option = JRequest::getCmd('option');
	$view   = JRequest::getCmd('view');
        $document   =   JFactory::getDocument();
        $items =& $this->get('Data');
 	$pagination =& $this->get('Pagination');
        $search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
	$search = JString::strtolower($search);
        $email = $mainframe->getUserStateFromRequest($option.$view.'email', 'email', '', 'string');
        $phone = $mainframe->getUserStateFromRequest($option.$view.'phone', 'phone', '', 'int');
        $cat = $mainframe->getUserStateFromRequest($option.$view.'category', 'category', '', 'string');
                $cat = JString::strtolower($cat);
    // push data into the template
        $lists = array ();
	$lists['search'] = $search;
        $lists['email'] = $email;
        $lists['phone'] = $phone;
        $lists['cat'] = $cat;
    $this->assignRef('items', $items);
    $this->assignRef('pagination', $pagination);
    
    /* Call the state object */
		$state =& $this->get( 'state' );
    
    /* Get the values from the state object that were inserted in the model's construct function */
		$lists['order_Dir'] = $state->get( 'filter_order_Dir' );
		$lists['order']     = $state->get( 'filter_order' );
    
    $this->assignRef( 'lists', $lists );
    
    parent::display($tpl);
  }
  
  function _addToolbar()
  {
    JToolBarHelper::preferences( 'com_jtagobjectsdirectory' );
    JToolBarHelper::title(JText::_('JTAG_BACKEND_OBJECTS_LIST_TITLE'));
    JToolBarHelper::addNew('object');
    JToolBarHelper::deleteList(JTAG_CONFIRM_DELETE_MESSAGE, 'deleteobjects');
/* Start - Snehal Kulkarni- Import all users -date-06/09/2012*/
     JToolBarHelper::addNew('addAll',JText::_(JTAG_IMPORT_ALL_objectS));
/* End - Snehal Kulkarni- Import all users -date-06/09/2012*/

/* Start - Snehal Kulkarni- Import groups -date-15/10/2012*/
   JToolBarHelper::addNew('addGroups',JText::_("Import groups"));
/* End - Snehal Kulkarni- Import groups-date-15/10/2012*/
  }
}
