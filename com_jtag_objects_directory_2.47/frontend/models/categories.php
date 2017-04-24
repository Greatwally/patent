<?php
/**
 * Joomla! 1.5 component Jtagminicart
 *
 * @version $Id: jtagminicart.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage Jtagminicart
 * @license GNU/GPL
 *
 * Jtag Minicart
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class JtagobjectDirectoryModelCategories extends JModelLegacy
{
    
    var $_id = null;
	var $_data = null;
        
	function store($data)
	{
		$row =& $this->getTable('jtagobjectdirectorycategories');
		
		// Bind the form fields to the Cart Item
		if (!$row->bind($data)) 
                {
			$this->setError($row->getErrors());
			return false;
		}

		// if new item, order last in appropriate group
		if (!$row->id) {
                     	$row->ordering = $this->getNextItem()+1;
               }

		// Make sure the Cart Item table is valid
		if (!$row->check()) {
		   
			$this->setError($row->getError());
			return false;
		}

		// Store the JtagminiCart table to the database
		if (!$row->store()) {
			$this->setError($row->getErrors());
			return false;
		}
		
		//clear cache
		$cache = & JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean ('com_jtagobjectsdirectory');

		return true;
	}
    /*    function edit($data)
	{
		$row =& $this->getTable('jtagobjectdirectorycategories');
		
		// Bind the form fields to the Cart Item
		if (!$row->bind($data)) 
                {
			$this->setError($row->getErrors());
			return false;
		}

		// if new item, order last in appropriate group
		if (!$row->id) {
                     	$row->ordering = $this->getNextItem()+1;
               }

		// Make sure the Cart Item table is valid
		if (!$row->check()) {
		   
			$this->setError($row->getError());
			return false;
		}

		// Store the JtagminiCart table to the database
		if (!$row->store()) {
			$this->setError($row->getErrors());
			return false;
		}
		
		//clear cache
		$cache = & JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean ('com_jtagobjectsdirectory');

		return true;
	}   */
      
      
       // function getCategories($id) 
         function getCategories()
		{
		$db = & JFactory::getDBO();
		//if(is_numeric($id))
			/*
				$query =  "  SELECT m.*,s.cat_id as added FROM #__jtmb_categories m "
                         ."  LEFT JOIN #__jtmb_object_categories s  ON m.trash = 0 AND m.published = 1  AND  m.id = s.cat_id AND s.item_id = ".$id." "
                         ."  WHERE m.id > 0  and m.trash = 0 ORDER BY  ordering";*/
		
			$query="SELECT * from #__jtmb_categories WHERE  trash=0";
		 //else
			//$query = "SELECT m.*,NULL as added FROM #__jtmb_categories m WHERE id > 0  and trash = 0 ORDER BY  ordering";
			$db->setQuery($query);
			$mitems = $db->loadObjectList();
			return $mitems;
	}
      /*  function editCat() {
		$mainframe = &JFactory::getApplication();
		$db = & JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');

		JArrayHelper::toInteger($cid);

		$categories = @array_unique($cid);
		JArrayHelper::toInteger($categories);
		$sql = @implode(',',$categories);
		$db = & JFactory::getDBO();

		$query="SELECT * from #__jtmb_categories where id=";
		$db->setQuery($query);
		$row = $db->loadObjectList();
		return $row;
	
		//$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories');
	
	}   */
        function getNextItem()
        {
                   $db = & JFactory::getDBO();
                   $query = "SELECT COUNT(*) FROM #__jtmb_categories WHERE  trash=0 ";
                   $db->setQuery($query);
           return  $result = $db->loadResult();
        }
        
    
	function getData() {

		$mainframe = &JFactory::getApplication();
		$option = JRequest::getCmd('option');
		$view = JRequest::getCmd('view');
		$db = & JFactory::getDBO();
		$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart = $mainframe->getUserStateFromRequest($option.$view.'.limitstart', 'limitstart', 0, 'int');
		$search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
		$search = JString::strtolower($search);
		$filter_order = $mainframe->getUserStateFromRequest($option.$view.'filter_order', 'filter_order', 'c.ordering', 'cmd');
		$filter_order_Dir = $mainframe->getUserStateFromRequest($option.$view.'filter_order_Dir', 'filter_order_Dir', '', 'word');
		$filter_trash = $mainframe->getUserStateFromRequest($option.$view.'filter_trash', 'filter_trash', 0, 'int');
		$filter_state = $mainframe->getUserStateFromRequest($option.$view.'filter_state', 'filter_state', -1, 'int');

		$query = "SELECT  * FROM #__jtmb_categories as c WHERE  c.id>0 ";
//changed by sarika
		if ($filter_trash > -1){
			$query .= " AND c.trash={$filter_trash}";
		}
		
                if ($search) {
	 		$query .= " AND LOWER( c.name ) LIKE ".$db->Quote('%'.$db->getEscaped($search, true).'%', false);
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
		else $total = 0;
		jimport('joomla.html.pagination');
		$pageNav = new JPagination($total, $limitstart, $limit);
		$categories = @array_slice($categories, $pageNav->limitstart, $pageNav->limit);
		return $categories;
	}
        
	function getTotal() {

		$mainframe = &JFactory::getApplication();
		$option = JRequest::getCmd('option');
		$view = JRequest::getCmd('view');
		$db = & JFactory::getDBO();
		$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart = $mainframe->getUserStateFromRequest($option.'.limitstart', 'limitstart', 0, 'int');
		$search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
		$search = JString::strtolower($search);
		$filter_trash = $mainframe->getUserStateFromRequest($option.$view.'filter_trash', 'filter_trash', 0, 'int');
		$filter_state = $mainframe->getUserStateFromRequest($option.$view.'filter_state', 'filter_state', 1, 'int');

		$query = "SELECT COUNT(*) FROM  #__jtmb_categories ";

		if (!$filter_trash){
			$query .= " AND trash=0";
		}

		if ($search) {
			$query .= " AND LOWER( name ) LIKE ".$db->Quote('%'.$db->getEscaped($search, true).'%', false);
		}

		if ($filter_state > -1) {
			$query .= " AND published={$filter_state}";
		}

		$db->setQuery($query);
		$total = $db->loadResult();
		return $total;

	}
        
        function orderup() {
            
      
		$mainframe = &JFactory::getApplication();
		$cid = JRequest::getVar('cid');
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');
                $row->load($cid[0]);
                $row->move(-1, 'trash=0');
		$params = &JComponentHelper::getParams('com_jtagobjectsdirectory');
		if(!$params->get('disableCompactOrdering'))
			$row->reorder(' trash=0');
              
                $cache = & JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$msg = JText::_(JTAG_CATEGORY_NEW_ORDERING_SAVED);
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', $msg);
	}

	function orderdown() {

		$mainframe = &JFactory::getApplication();
		$cid = JRequest::getVar('cid');
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');
		$row->load($cid[0]);
		$row->move(1, '  trash=0');
		$params = &JComponentHelper::getParams('com_jtagobjectsdirectory');
		if(!$params->get('disableCompactOrdering'))
			$row->reorder(' trash=0');
                
                $cache = & JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$msg = JText::_(JTAG_CATEGORY_NEW_ORDERING_SAVED);
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', $msg);
	}
        
    function publish() {

		$mainframe = &JFactory::getApplication();
		$cid = JRequest::getVar('cid');
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');
          
		foreach ($cid as $id) {
			$row->load($id);
			$row->publish($id, 1);
		}
		$cache = & JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories');
	}
	
	function unpublish() {

		$mainframe = &JFactory::getApplication();
		$cid = JRequest::getVar('cid');
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');
		foreach ($cid as $id) {
			$row->load($id);
			$row->publish($id, 0);
			}
        $cache = & JFactory::getCache('com_jtagmembesrdirectory');
		$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories');
	}

    function restore() {

		$mainframe = &JFactory::getApplication();
		$db = & JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');
		$warning = false;
		foreach ($cid as $id) {
			$row->load($id);
			$row->trash = 0;
			$row->store();

		}
		$cache = & JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', JText::_(JTAG_CATEGORY_CALENDER_RESTORED));

	}
        
	function trash() {

		$mainframe = &JFactory::getApplication();
		$db = & JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');

		JArrayHelper::toInteger($cid);

		$categories = @array_unique($cid);
		JArrayHelper::toInteger($categories);
		$sql = @implode(',',$categories);
		$db = & JFactory::getDBO();

            
		$query = "UPDATE #__jtmb_categories SET trash=1  WHERE id IN ({$sql})";
		$db->setQuery($query);
		$db->query();

		$cache = & JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', JText::_('JTAG_CATEGORY_MOVED_TO_TRASH'));
	}  
     /* function editcat() {

		$mainframe = &JFactory::getApplication();
		$db = & JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');

		JArrayHelper::toInteger($cid);

		$categories = @array_unique($cid);
		JArrayHelper::toInteger($categories);
		$sql = @implode(',',$categories);
		$db = & JFactory::getDBO();

            
		$query = "select * from #__jtmb_categories WHERE id IN ({$sql})";
		$db->setQuery($query);
		$cat = $db->loadResult();

		//$cache = & JFactory::getCache('com_jtagobjectsdirectory');
		//$cache->clean();
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=category');
	}  */
	function remove() {

		$mainframe = &JFactory::getApplication();
		jimport('joomla.filesystem.file');
		$db = & JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		JArrayHelper::toInteger($cid);
		$row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');
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
		$cache = & JFactory::getCache('com_jtagobjectsdirectory');
		$cache->clean();

		if ($warningItems){
			$mainframe->enqueueMessage(JText::_(JTAG_CATEGORY_WARNING_SOME_CAT_NOT_DELETED), 'notice');
		}
              
		$mainframe->redirect('index.php?option=com_jtagobjectsdirectory&c=categories', JText::_(JTAG_CATEGORY_DELETE_MESSAGE));
	}
}
