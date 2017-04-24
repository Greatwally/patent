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
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
 require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';
$params = & JTagHelper::getComponentParameters('com_jtagobjectsdirectory');
 $v = $params->view; 
?>
 <?php if($v==0):  ?>
<?php jtag_include_partial($this->getName(), 'list', 
  array('users' => $this->users, 'pagination_data' => $this->pagination_data)); ?>
<?php elseif($v==2):  ?>
<?php jtag_include_partial($this->getName(), 'collage', 
  array('users' => $this->users, 'pagination_data' => $this->pagination_data)); ?>
<?php else: ?>
<?php jtag_include_partial($this->getName(), 'table', 
  array('users' => $this->users, 'pagination_data' => $this->pagination_data)); ?>
<?php endif;?>

