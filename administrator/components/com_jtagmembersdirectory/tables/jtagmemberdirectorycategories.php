<?php
/**
 * Joomla! 1.5 component Jtagminicart
 *
 * @version $Id: jtagmemberdirectory.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage Jtagmemberdirectory
 * @license GNU/GPL
 *
 * Jtag Member
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class TableJtagMemberDirectoryCategories extends JTable
{

	var $id = null;
	var $name = null;
	var $description = null;
	var $published = null;
	var $ordering = null;

	function __construct( & $db) {

		parent::__construct('#__jtmb_categories', 'id', $db);
	}

	function check() {
                
		if (trim($this->name) == '') {
			$this->setError(JText::_( 'JTAGMINICART_CAT.ERR.NAME_MISSING'));
                	return false;
		}


		return true;

	}

	function bind($array, $ignore = '')	{

		if (key_exists('params', $array) && is_array($array['params']))
		{
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = $registry->toString();
		}

		if (key_exists('plugins', $array) && is_array($array['plugins']))
		{
			$registry = new JRegistry();
			$registry->loadArray($array['plugins']);
			$array['plugins'] = $registry->toString();
		}

		return parent::bind($array, $ignore);
	}
function load($keys = NULL, $reset = true)
  {
    parent::load($keys,$reset);
    
    $this->_retrieveCat();
   
  }
  function _retrieveCat()
  {
      //if (!$this->cat_id)
      //{
      //$this->category = new stdClass();
      //$this->category->name = '';
	  //$this->user->registerDate = '';
      //return;
      //}
 if($this->cat_id == null){
    		$query = 'SELECT * FROM `#__jtmb_categories` LIMIT 1';
			$this->_db->setQuery($query);
			$this->category = $this->_db->loadObject();
    	}
  }

}
