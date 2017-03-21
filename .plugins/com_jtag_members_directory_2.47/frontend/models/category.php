<?php
/**
 * Joomla! 1.5 component JtagMember
 *
 * @version $Id: jtagMember.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage JtagMember
 * @license GNU/GPL
 *
 * Jtag Member
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class JtagMemberDirectoryModelCategory extends JModelLegacy
{
    function getData() {

        $cid = JRequest::getVar('cid');
        $row = & JTable::getInstance('jtagmemberdirectorycategories', 'Table');
        $row->load($cid);
        return $row;
    }
  /*  function getOrCreateCategory($id = null) {
        if ($this->_category === null) {
            $this->_category= $this->getTable('jtagmemberdirectorycategories');

            if ($id) {
                $this->_category->load($id);
            }
        }
        return $this->_category;
    }*/
	function countCategoryItems($catid) {

        $db = & JFactory::getDBO();
        $catid = (int)$catid;
        $query = "SELECT COUNT(*) FROM #__jtmb_members_directory WHERE catid={$catid} AND trash=0 ";
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }
	 function getOrCreateCat($cat_id) {
       /* if ($this->_category === null) {
            $this->_category = $this->getTable('jtagmemberdirectorycategories');

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
