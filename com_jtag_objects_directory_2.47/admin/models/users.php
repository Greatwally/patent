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

class JtagobjectDirectoryModelusers extends JModelLegacy
{
    function addToobjects($cid){

		$db = & JFactory::getDBO();
		
//print_r($cid);
		foreach($cid as $id){
			$sql = "SELECT * FROM `#__users` WHERE `id` = '$id'";
			$db->setQuery($sql);
			$newuse = $db->loadObjectList();
	//		print_r($newuse);

//			echo $newuse[0]->name;
			$sql = "SELECT max(`id`) FROM `#__jtmb_objects_directory`";
			$db->setQuery($sql);
			$cnt = $db->loadResult();
			$cnt=$cnt+1;
			
	$name= $newuse[0]->name; $email= $newuse[0]->email; $user_id = $newuse[0]->id;
			$sql = "INSERT INTO `#__jtmb_objects_directory`(`id`,`user_id`,`profile_picture`,`name`,`Email`)
VALUES ('$cnt','$id','','$name','$email')" ;

		$db->setQuery($sql);		
		$ret = $db->query();
		}
return $ret;
		
    }
    
    function getNewUsers(){
    	
		$db = & JFactory::getDBO();
		$sql = "SELECT * FROM `#__users`";
		$db->setQuery($sql);
		$users = $db->loadObjectList();
//		echo "model";
//		print_r($users);
//		exit();
		return $users;
    }
    
    function addFromJoomla(){
		$db = &JFactory::getDBO();
		$sql = "select * from `#__users` where `id` NOT IN (select `user_id` from `#__jtmb_objects_directory`) AND `block`=0";
		$db->setQuery($sql);
		$users = $db->loadObjectList();
//die(var_dump($users));
	foreach($users as $user){
		$name = mysql_real_escape_string($user->name);
		$email = mysql_real_escape_string($user->email);
	  $sql = "INSERT INTO `#__jtmb_objects_directory` (`user_id`, `name`,`Email`) VALUES ('$user->id', '$name', '$email')" ;
      $db->setQuery($sql);
   	  $db->query();
   	 }
    }
}
