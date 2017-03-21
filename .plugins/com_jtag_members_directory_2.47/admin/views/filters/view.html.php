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
      
class jtagmemberdirectoryViewfilters extends JViewLegacy
{
  function display($tpl = null)
  {
   
    self::_addToolbar();
     parent::display($tpl);
  }
 function _addToolbar()
  {
    JToolBarHelper::title(JText::_('JTOOL_BAR_HELPER_DISPLAY_OPTIONS'));
    JToolBarHelper::preferences('com_jtagmembersdirectory');
    JToolBarHelper::divider();
    JToolBarHelper::apply('save_displayoptions', 'Save');
    JToolBarHelper::cancel('cancel');
  }
  
}
  //<!--End-Snehal Kulkarni-Added For multiple categories- 08-11-2012 -->
