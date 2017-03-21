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

class TableJtagMemberDirectoryMemberCategories extends JTable
{

	var $id = null;
	var $name = null;
	var $description = null;
	var $published = null;
	var $ordering = null;

	function __construct( & $db) {

		parent::__construct('#__jtmb_member_categories', 'id', $db);
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

}
