<?php
/**
 * Joomla! 1.5 component Jtagobject
 *
 * @version $Id: jtagobject.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage Jtagobject
 * @license GNU/GPL
 *
 * Jtag object
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class JtagobjectDirectoryModelCategory extends JModelLegacy
{
    function getData() {

        $cid = JRequest::getVar('cid');
        $row = & JTable::getInstance('jtagobjectdirectorycategories', 'Table');
        $row->load($cid);
        return $row;
    }
  /*  function getOrCreateCategory($id = null) {
        if ($this->_category === null) {
            $this->_category= $this->getTable('jtagobjectdirectorycategories');

            if ($id) {
                $this->_category->load($id);
            }
        }
        return $this->_category;
    }*/
	function countCategoryItems($catid) {

        $db = & JFactory::getDBO();
        $catid = (int)$catid;
        $query = "SELECT COUNT(*) FROM #__jtmb_objects_directory WHERE catid={$catid} AND trash=0 ";
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }
	 function getOrCreateCat($cat_id) {
       /* if ($this->_category === null) {
            $this->_category = $this->getTable('jtagobjectdirectorycategories');

            if ($id) {
                $this->_category->load($id);
            }
        }
        return $this->_category;
    }*/
	$query = 'SELECT name,description FROM `#__jtmb_categories` WHERE id = '.$this->cat_id.' LIMIT 1';
    $this->_db->setQuery($query);
        
    $this->category = $this->_db->loadObject();
}
}
