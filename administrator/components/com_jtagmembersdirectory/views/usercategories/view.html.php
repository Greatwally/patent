  <!--Start-Snehal Kulkarni-Added For multiple categories- 08-11-2012 -->
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
      
class jtagmemberdirectoryViewusercategories extends JViewLegacy
{
  function display($tpl = null)
  {
    JFactory::getDocument()->addScript(JURI::root().'administrator/components/com_jtagmembersdirectory/assets/js/jquery.js');
    JFactory::getDocument()->addScript(JURI::root().'administrator/components/com_jtagmembersdirectory/assets/js/selecttransfer.js');
    self::_addToolbar();
     parent::display($tpl);
  }
 function _addToolbar()
  {
    JToolBarHelper::title(JText::_('JTOOL_BAR_HELPER_ASSIGN_CATEGORY'));
    JToolBarHelper::preferences('com_jtagmembersdirectory');
    JToolBarHelper::divider();
    JToolBarHelper::apply('assigncat', 'Save');
  }
  
}
  //<!--End-Snehal Kulkarni-Added For multiple categories- 08-11-2012 -->
