<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory – Jtag Members Directory
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
function jtag_include_partial($view, $name, $params = array())
{
  $partial_file = JPATH_COMPONENT.DS.'views' . DS . $view . DS . 'tmpl' . DS . '_' . $name . '.php';

  if (!is_file($partial_file)) {
      JError::raiseError(500, JText::_($partial_file.' not found!') );
  }

  ob_start();

  extract($params);
  require($partial_file);

  $partial = ob_get_clean();
  echo $partial;
}  
