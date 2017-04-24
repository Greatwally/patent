<?php
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory – Jtag objects Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

class TableCustomFields extends JTable
{
  var $id;
  var $user_id;
  var $field_name;
  var $field_label;
  var $field_value;
  
  function __construct(&$db)
	{
		parent::__construct('#__jtmb_custom_fields', 'id', $db);
	}
}