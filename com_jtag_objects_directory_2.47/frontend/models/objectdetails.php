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
// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.model');

class jtagobjectdirectoryModelobjectDetails extends JModelLegacy
{
  function getData($id)
  {
 	  // if data hasn't already been obtained, load it
    if (empty($this->_data))
    {
        $query = $this->_buildQuery($id);
        
        $this->getDBO()->setQuery($query);
        $this->_data = $this->getDBO()->loadObject();
    }
    
    return $this->_data;
  }
  
  function _buildQuery($id)
  {
    /*Start- Snehal Kulkarni- 05/09/2012 -Retrive Email from database */
    $sql = 'SELECT id, user_id, profile_picture , first_name, last_name,Email, display_last_name,
      object_profile, country, city, state,  phone_no,facebook_page, twitter_page, object_profile
      FROM `#__jtmb_objects_directory` c WHERE id = '.$id.' LIMIT 1';
  /*End- Snehal Kulkarni- 05/09/2012 -Retrive Email from database */
    
    return $sql;
  }
  
  function retrieveGalleryImages($id)
  {
  	$db =& JFactory::getDBO();
  	
  	$query= "SELECT * FROM #__jtmb_gallery_images WHERE user_id=".$id;
  	$db->setQuery($query);
  	return $db->loadAssocList();
  }

 function getOrCreateOption($id=null) {
       
          $query = 'SELECT * FROM `#__jtmb_display_options';
	  $this->_db->setQuery($query);
         $this->display = $this->_db->loadObject();          
       return $this->display;
    }
 function getattachments($id)
  {
 $sql ='SELECT user_id FROM #__jtmb_objects_directory WHERE id = '.$id;
   $this->_db->setQuery($sql);
   $row=$this->_db->loadObjectList();
   $uid=$row[0]->user_id;
      $query = "SELECT * FROM `#__jtmb_attachment` WHERE user_id=$uid";
	  $this->_db->setQuery($query);
         $this->attachment = $this->_db->loadObjectList();  
   // print_r($this->attachment); exit;       
       return $this->attachment;
   }
  
 function retrive_custom($id=null)
{
      $sql ='SELECT user_id FROM #__jtmb_objects_directory WHERE id = '.$id;
   $this->_db->setQuery($sql);
   $row=$this->_db->loadObjectList();
   $uid=$row[0]->user_id;
   $query = 'SELECT distinct c.field_name, c.field_label, d.field_value, c.display_nr_cf FROM #__jtmb_custom_fields c LEFT JOIN #__jtmb_custom_maps_objects  d ON d.user_id ='.$uid.' AND c.field_label=d.field_label ';

      $this->_db->setQuery($query);
      return $this->_db->loadObjectList();
}
/* Added by Priyanka Bhorkade on 28th Dec 2012. Functionality to delete indivisual gallary images */ 
function delete_gallery($array, $user_id){
$user =& JFactory::getUser();

if($user_id == $user->id){

foreach($array as $arrID){

	$sql = 'DELETE from `#__jtmb_gallery_images` where image_id = '.$arrID;
//die(var_dump($sql));
	  $this->_db->setQuery($sql);
   $this->_db->query(); 
	}
}

}
/*END*/ 

function custom()
{

 $sql ='SELECT * FROM #__jtmb_custom_fields';
   $this->_db->setQuery($sql);
   $row=$this->_db->loadObjectList();
  return $row;
}
function getassignedcat($mid)
{
   $sql = " SELECT c.id, c.user_id, c.name, c.Email, c.phone_no, GROUP_CONCAT( DISTINCT b.name ) AS cat
FROM `#__jtmb_objects_directory` c
LEFT JOIN `#__jtmb_assigned_categories` d ON c.id = d.objectid
LEFT JOIN `#__jtmb_categories` b ON d.cat_id = b.id where c.deleted_at='0' AND c.id='$mid'";
   $this->_db->setQuery($sql);
   $row=$this->_db->loadObject();
//print_r($row);
  return $row;
}
  
}
