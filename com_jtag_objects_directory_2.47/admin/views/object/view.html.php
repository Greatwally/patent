
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

class jtagobjectdirectoryViewobject extends JViewLegacy
{
  function display($tpl = null)
  {
    $this->_addToolbar();
    $this->setLayout('form');

 $version = new JVersion();
       switch($version->RELEASE)
{
  case "3.0" :
    //JHTML::_( 'behavior.mootools' ); // load mootools first
    JHtmlBehavior::framework();
    break;
  case "3.1" :
    //JHTML::_( 'behavior.mootools' ); // load mootools first
    JHtmlBehavior::framework();
    break;
  default :
    JHTML::_( 'behavior.mootools' ); // load mootools first
   
}
    JFactory::getDocument()->addScript(JURI::root().'administrator/components/com_jtagobjectsdirectory/assets/js/retrvusers.js');
    JFactory::getDocument()->addStyleSheet(JURI::root().'administrator/components/com_jtagobjectsdirectory/assets/css/styles.css');
    
    require_once (JPATH_COMPONENT . DS . 'helpers' . DS . 'countries.php');
    $this->_displayForm($tpl);
   // parent::display($tpl);

	    
  }
  function _displayForm($tpl)
	{
		$mainframe          = JFactory::getApplication();
       // $app                = JFactory::getApplication();
        //$option             = $app->get('scope');
		$db	=& JFactory::getDBO();
		$uri 	=& JFactory::getURI();
		$user 	=& JFactory::getUser();
		$model	=& $this->getModel();
		$document   =& JFactory::getDocument();
		//$component_params = &JComponentHelper::getParams($option);
		$lists = array();
        $cid	= JRequest::getVar( 'cid' );
		require_once (JPATH_COMPONENT.DS.'models'.DS.'categories.php');
		$categoriesModel = new JtagobjectDirectoryModelCategories;
        $id = NULL; 
		if(isset($cid[0]))$id=$cid[0];
		$categories = $categoriesModel->getCategories($id);
                     
		$editor = JFactory::getEditor();
        $this->assignRef('categories', 	$categories);
		
		parent::display($tpl);
	}
    
  function _addToolbar()
  {
    JToolBarHelper::preferences( 'com_jtagobjectsdirectory' );
    JToolBarHelper::title(JText::_('JTOOL_BAR_HELPER_ADD_NEW_object'));
    JToolBarHelper::apply('applyobject');
    JToolBarHelper::save('saveobject');
    JToolBarHelper::save2new('saveFormAndNew');
    JToolBarHelper::cancel('cancel');
  }
}
