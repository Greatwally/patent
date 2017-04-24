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

if ( !defined( 'DS')) define('DS', DIRECTORY_SEPARATOR);

jimport('joomla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class JtagobjectDirectoryModelCategories extends JModelLegacy
{
    
    var $_id = null;
	var $_data = null;
        
	function store($data)
	{
		$row =  $this->getTable('jtagobjectdirectorycategories');
		
		if (!$row->bind($data)) {
			$this->setError($row->getErrors());
			return false;
		}

		if (!$row->id) {
                     	$row->ordering = $this->getNextItem()+1;
        }

		if (!$row->check()) {		   
			$this->setError($row->getError());
			return false;
		}

		if (!$row->store()) {
			$this->setError($row->getErrors());
			return false;
		}
		
		$cache =   JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean ('com_jtagobjectsdirectory');

		return true;
	}      
    
    function getCategories() {
		$db =   JFactory::getDBO();
		$query="SELECT * from #__jtmb_categories WHERE  trash=0";
	 	$db->setQuery($query);
		$mitems = $db->loadObjectList();
		return $mitems;
	}

    function getNextItem() {
        $db =   JFactory::getDBO();
        $query = "SELECT COUNT(*) FROM #__jtmb_categories WHERE  trash=0 ";
        $db->setQuery($query);
        return  $result = $db->loadResult();
    }
    
    
	function getData() {

		$mainframe =  JFactory::getApplication();
		$option = JRequest::getCmd('option');
		$view = JRequest::getCmd('view');
		$db =   JFactory::getDBO();
		$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart = $mainframe->getUserStateFromRequest($option.$view.'.limitstart', 'limitstart', 0, 'int');
		$search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
		$search = JString::strtolower($search);
		$filter_order = $mainframe->getUserStateFromRequest($option.$view.'filter_order', 'filter_order', 'c.ordering', 'cmd');
		$filter_order_Dir = $mainframe->getUserStateFromRequest($option.$view.'filter_order_Dir', 'filter_order_Dir', '', 'word');
		$filter_trash = $mainframe->getUserStateFromRequest($option.$view.'filter_trash', 'filter_trash', 0, 'int');
		$filter_state = $mainframe->getUserStateFromRequest($option.$view.'filter_state', 'filter_state', -1, 'int');

		$query = "SELECT  * FROM #__jtmb_categories as c WHERE  c.id > 0 ";

		if ($filter_trash > -1){
			$query .= " AND c.trash={$filter_trash}";
		}
		
        if ($search) {
	 		$query .= " AND LOWER( c.name ) LIKE ".$db->Quote('%'.$db->escape($search, true).'%', false);
        }

		if ($filter_state > -1) {
			$query .= " AND c.published={$filter_state}";
		}

		$query .= " ORDER BY {$filter_order} {$filter_order_Dir}";
		
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		
		$categories = array();             
        $categories = $rows ;

        if (isset($categories))
			$total = count($categories);
		else 
			$total = 0;
		
		jimport('joomla.html.pagination');
		$pageNav = new JPagination($total, $limitstart, $limit);
		$categories = @array_slice($categories, $pageNav->limitstart, $pageNav->limit);
		
		return $categories;
	}
        
	function getTotal() {
		$mainframe =  JFactory::getApplication();
		$option = JRequest::getCmd('option');
		$view = JRequest::getCmd('view');
		$db =   JFactory::getDBO();
		$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart = $mainframe->getUserStateFromRequest($option.'.limitstart', 'limitstart', 0, 'int');
		$search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
		$search = JString::strtolower($search);
		$filter_trash = $mainframe->getUserStateFromRequest($option.$view.'filter_trash', 'filter_trash', 0, 'int');
		$filter_state = $mainframe->getUserStateFromRequest($option.$view.'filter_state', 'filter_state', 1, 'int');

		$query = "SELECT COUNT(*) FROM  #__jtmb_categories WHERE  id > 0";

		if (!$filter_trash){
			$query .= " AND trash=0";
		}

		if ($search) {
			$query .= " AND LOWER( name ) LIKE ".$db->Quote('%'.$db->escape($search, true).'%', false);
		}

		if ($filter_state > -1) {
			$query .= " AND published={$filter_state}";
		}

		$db->setQuery($query);
		$total = $db->loadResult();
		return $total;

	}
        
	function orderup() {    
		$mainframe =  JFactory::getApplication();
		$cid = JRequest::getVar('cid');
		$row =   JTable::getInstance('jtagobjectdirectorycategories', 'Table');
        $row->load($cid[0]);
        $row->move(-1, 'trash=0');
		$params =  JComponentHelper::getParams('com_jtagobjectsdirectory');

		if(!$params->get('disableCompactOrdering'))
			$row->reorder(' trash=0');
	          
        $cache =   JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$msg = JText::_(JTAG_CATEGORY_NEW_ORDERING_SAVED);
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', $msg);
	}

	function orderdown() {
		$mainframe =  JFactory::getApplication();
		$cid = JRequest::getVar('cid');
		$row =   JTable::getInstance('jtagobjectdirectorycategories', 'Table');
		$row->load($cid[0]);
		$row->move(1, '  trash=0');
		$params =  JComponentHelper::getParams('com_jtagobjectsdirectory');
		
		if(!$params->get('disableCompactOrdering'))
			$row->reorder(' trash=0');
                
        $cache =   JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$msg = JText::_(JTAG_CATEGORY_NEW_ORDERING_SAVED);
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', $msg);
	}
        
    function publish() {
		$mainframe =  JFactory::getApplication();
		$cid = JRequest::getVar('cid');
		$row =   JTable::getInstance('jtagobjectdirectorycategories', 'Table');
          
		foreach ($cid as $id) {
			$row->load($id);
			$row->publish($id, 1);
		}

		$cache =  JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories');
	}
	
	function unpublish() {
		$mainframe =  JFactory::getApplication();
		$cid = JRequest::getVar('cid');
		$row =   JTable::getInstance('jtagobjectdirectorycategories', 'Table');

		foreach ($cid as $id) {
			$row->load($id);
			$row->publish($id, 0);
			}

        $cache =   JFactory::getCache('com_jtagmembesrdirectory');
		$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories');
	}

    function restore() {
		$mainframe =  JFactory::getApplication();
		$db =   JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		$row =   JTable::getInstance('jtagobjectdirectorycategories', 'Table');
		$warning = false;

		foreach ($cid as $id) {
			$row->load($id);
			$row->trash = 0;
			$row->store();
		}

		$cache =   JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', JText::_(JTAG_CATEGORY_CALENDER_RESTORED));
	}
        
	function trash() {
		$mainframe =  JFactory::getApplication();
		$db =   JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		$row =   JTable::getInstance('jtagobjectdirectorycategories', 'Table');

		JArrayHelper::toInteger($cid);

		$categories = @array_unique($cid);
		JArrayHelper::toInteger($categories);
		$sql = @implode(',',$categories);
		$db =   JFactory::getDBO();

            
		$query = "UPDATE #__jtmb_categories SET trash=1  WHERE id IN ({$sql})";
		$db->setQuery($query);
		$db->query();

		$cache =   JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', JText::_('JTAG_CATEGORY_MOVED_TO_TRASH'));
	}  

	function remove() {
		$mainframe =  JFactory::getApplication();
		jimport('joomla.filesystem.file');
		$db =   JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		JArrayHelper::toInteger($cid);
		$row =   JTable::getInstance('jtagobjectdirectorycategories', 'Table');
        $warningItems = false;
		$cid = array_reverse($cid);
		
		for ($i = 0; $i < sizeof($cid); $i++) {
			$row->load($cid[$i]);
                           
			$query = "SELECT COUNT(*) FROM #__jtmb_object_categories WHERE cat_id={$cid[$i]}";
			$db->setQuery($query);
			$num = $db->loadResult();

			if ($num > 0 ){
				$warningItems = true;
			} 

            if ($num==0){
               	$row->delete($cid[$i]);
			}
		}
		
		$cache =   JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();

		if ($warningItems){
			$mainframe->enqueueMessage(JText::_(JTAG_CATEGORY_WARNING_SOME_CAT_NOT_DELETED), 'notice');
		}
              
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', JText::_(JTAG_CATEGORY_DELETE_MESSAGE));
	}
}
