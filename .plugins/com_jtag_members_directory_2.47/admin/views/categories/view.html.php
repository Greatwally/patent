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
if ( !defined( 'DS')) define('DS', DIRECTORY_SEPARATOR);

jimport('joomla.application.component.view');

class JtagMemberDirectoryViewCategories extends JViewLegacy
{

	function display($tpl = null)
	{  
       	$mainframe =  JFactory::getApplication();
		$user   =   JFactory::getUser();
        $option = JRequest::getCmd('option');
		$view   = JRequest::getCmd('view');
        $document   =   JFactory::getDocument();
        
		$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart = $mainframe->getUserStateFromRequest($option.$view.'.limitstart', 'limitstart', 0, 'int');
		$filter_order = $mainframe->getUserStateFromRequest($option.$view.'filter_order', 'filter_order', 'c.ordering', 'cmd');
		$filter_order_Dir = $mainframe->getUserStateFromRequest($option.$view.'filter_order_Dir', 'filter_order_Dir', '', 'word');
		$filter_trash = $mainframe->getUserStateFromRequest($option.$view.'filter_trash', 'filter_trash', 0, 'int');
		$filter_category = $mainframe->getUserStateFromRequest($option.$view.'filter_category', 'filter_category', 0, 'int');
		$filter_state = $mainframe->getUserStateFromRequest($option.$view.'filter_state', 'filter_state', -1, 'int');
		$search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
		$search = JString::strtolower($search);
	 
        $model =   $this->getModel();
        $categories = $model->getData();
            
		require_once(JPATH_COMPONENT.DS.'models'.DS.'category.php');
		$categoryModel= new JtagMemberDirectoryModelCategory();

		$params =   JComponentHelper::getParams('com_jtagmembersdirectory');
		$this->assignRef('params', $params);
		if ($params->get('showItemsCounterAdmin')){
			for ($i=0; $i<sizeof($categories); $i++){
				$categories[$i]->numOfItems=$categoryModel->countCategoryItems($categories[$i]->id);
			}
		}
               
		$this->assignRef('rows', $categories);
		$total = $model->getTotal();
                    
		jimport('joomla.html.pagination');
		$pageNav = new JPagination($total, $limitstart, $limit);
		$this->assignRef('page', $pageNav);
                   
		$lists = array ();
		$lists['search'] = $search;
		$lists['order_Dir'] = $filter_order_Dir;
		$lists['order'] = $filter_order;

		$filter_trash_options[] = JHTML::_('select.option', 0, JText::_('JTAG_BACKEND_CATEGORY_FILTER_TRASH_OPTION_CURRENT'));
		$filter_trash_options[] = JHTML::_('select.option', 1, JText::_('JTAG_BACKEND_CATEGORY_FILTER_TRASH_OPTION_TRASHED'));
		$lists['trash'] = JHTML::_('select.genericlist', $filter_trash_options, 'filter_trash', 'onchange="this.form.submit();"', 'value', 'text', $filter_trash);

		$filter_state_options[] = JHTML::_('select.option', -1, JText::_('JTAG_BACKEND_CATEGORY_FILTER_STATE_OPTION_SELECT'));
		$filter_state_options[] = JHTML::_('select.option', 1, JText::_('JTAG_BACKEND_CATEGORY_FILTER_STATE_OPTION_PUBLISHED'));
		$filter_state_options[] = JHTML::_('select.option', 0, JText::_('JTAG_BACKEND_CATEGORY_FILTER_STATE_OPTION_UNPUBLISHED'));
		$lists['state'] = JHTML::_('select.genericlist', $filter_state_options, 'filter_state', 'onchange="this.form.submit();"', 'value', 'text', $filter_state);

		$this->assignRef('lists', $lists);
        JToolBarHelper::title(JText::_('JTAG_BACKEND_CATEGORY_TITLE'), 'jtagmember.jpg');
                
	

		if ($filter_trash == 1) {
			JToolBarHelper::custom('restore','restore.png','restore_f2.png','Restore', true);
			JToolBarHelper::deleteList('Are you sure you want to delete selected categories?', 'remove', 'Delete');
		}
		else {
			 JToolBarHelper::publishList();
             JToolBarHelper::unpublishList();
             JToolBarHelper::addNew();
             JToolBarHelper::trash('trash');
		}
                  
		$this->assignRef('filter_trash', $filter_trash); 
		parent::display($tpl);

	}
 

}
