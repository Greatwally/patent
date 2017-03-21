<?php
/* ------------------------------------------------------------------------
  # com_joomlatag_members_directory � Jtag Members Directory
  # ------------------------------------------------------------------------
  # author    Joomlatag.com
  # copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
  # Websites  http://www.joomlatag.com
  # Support   http://www.joomlatag.com/Forum/
  # @version  2.0
  # @license  http://www.joomlatag.com/Different-articles/software-license.html
  ------------------------------------------------------------------------- */
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.controller');
jimport('joomla.application.component.model');
jimport('joomla.filesystem.file');

class jtagmemberdirectoryModeleditmemberdetail extends JModelLegacy {
  
	var $tmp_member;

	function getMemberDetail($id)
	{
		$query = 'SELECT * FROM #__jtmb_members_directory WHERE id = '.$id.' LIMIT 1';
    	$this->_db->setQuery($query);
    	return $this->_db->loadObject();
	}

   function saveMemberDetail($data)
  {

    $query = 'SELECT id,field_label FROM #__jtmb_custom_fields';
     $this->_db->setQuery($query);
      $rows=$this->_db->loadAssocList();
     $delquery = 'DELETE FROM `#__jtmb_custom_maps_members` WHERE user_id = ' . $data['user_id'];
        $this->_db->setQuery($delquery);
         $this->_db->query();
 foreach ($data as $k => $v) {
     if(!is_numeric($k) ){  
if($k=="member_profile"){
		$v = str_replace('"','\"',$v);
	}
    
        $upds[] = '`' .$k. '`' .' = ' . '"' .$v. '"';
      }
      else{
        for($i=0;$i<=count($rows);$i++)
    {
         $label=$rows[$i][field_label];
    $val=$data[$i][value];
     $cfQuery = "INSERT INTO #__jtmb_custom_maps_members (user_id, field_label,field_value)
                               VALUES ('$data[user_id]', '$label', '$val')" ;
       /* $cfQuery = "UPDATE #__jtmb_custom_maps_members SET `field_value` = '".$data[$i]['value']."' WHERE `user_id` = ". $data['user_id'] ." AND `field_label`='".$rows[$i]['field_label']."'";*/
        $this->_db->setQuery($cfQuery);
        $this->_db->query();   
    }   
        
      }
    }
$array= implode(',',$upds);

$result =array_splice($upds,3,1);
$id=$data['user_id'];
$catid=$data['cat_id'];



 $selquery = 'SELECT `id` FROM #__jtmb_members_directory WHERE `user_id` = '.$id;
    $this->_db->setQuery($selquery);
    $pp = $this->_db->loadObject();
    $uid= $pp->id;

 $delquery = "DELETE FROM #__jtmb_assigned_categories WHERE `memberid` = ".$uid;
               $this->_db->setQuery($delquery);
                   $this->_db->query();  

foreach($catid as $cat)
{
 $catquery = "INSERT INTO #__jtmb_assigned_categories(`memberid`,`cat_id`) VALUES ('$uid','$cat') ";
    $this->_db->setQuery($catquery);
    $this->_db->query(); 

}
  
    $query = 'UPDATE #__jtmb_members_directory SET '. implode(',',$upds) . ' WHERE user_id ='. $data['user_id'];
    $this->_db->setQuery($query);
    $this->_db->query();      
   
   $this->_uploadPicture($data['delete_old_picture'],$data['user_id']);
    if($data['delete_old_galary'])       
        {
        $this->_deleteGalleryPicture($data['user_id']);
        } 
if($data['attachment'])       
        {
        $this->_deleteAttachments($data['user_id']);
        }
     $this->_uploadAttachment($data['user_id']);
    $this->_uploadGalleryPicture($data['user_id']);
    $query = 'UPDATE #__jtmb_members_directory SET `hasGallery`=1 WHERE user_id ='. $data['user_id'];
    $this->_db->setQuery($query);
    $this->_db->query();   
     
  }

  function getCustomFields($id)
  {
 
  if(!empty($id))
{
 $query1 = 'SELECT user_id FROM `#__jtmb_members_directory` where id='.$id;
        $this->_db->setQuery($query1);
        $rows =$this->_db->loadObject();
   $query = 'SELECT distinct c.field_name, c.field_label, d.field_value, c.display_nr_cf, c.allow_edit FROM #__jtmb_custom_fields c LEFT JOIN #__jtmb_custom_maps_members  d ON d.user_id ='. $rows->user_id.' AND c.field_label=d.field_label ';

      $this->_db->setQuery($query);
//print_r($this->_db->loadObjectList());
}
  if(! $this->_db->loadObjectList())
  {
    $query = 'SELECT field_name, field_label, display_nr_cf, allow_edit FROM #__jtmb_custom_fields';
    $this->_db->setQuery($query);
    $this->_db->loadObjectList();
  }
      return $this->_db->loadObjectList();
  }

  /*function _uploadPicture($force_delete_old = false, $id) 
  {

    $file = JRequest::getVar('jform_profile_picture', null, 'files', 'array');
    $dir = JPATH_COMPONENT_SITE . DS . 'assets' . DS . 'profile_pictures';
    
    $query = 'SELECT `profile_picture` FROM #__jtmb_members_directory WHERE `user_id` = '.$id;
    $this->_db->setQuery($query);
    $pp = $this->_db->loadObject();
    $profile_pic= $pp->profile_picture;
    
    if ($force_delete_old) {
    	
        JFile::delete($dir . DS . $profile_pic);
        JFile::delete($dir . DS . 'thumb' . DS . $profile_pic);
        JFile::delete($dir . DS . 'small' . DS . $profile_pic);
        $profile_pic = '';
    }
    if (empty($file['name'])) {
		 $query = "UPDATE #__jtmb_members_directory SET `profile_picture` = NULL WHERE `user_id` = ".$id;
    	   $this->_db->setQuery($query);
		   $this->_db->query();  
        return;
    }
    $ext = JFile::getExt($file['name']);
    $filename = md5(time() . rand()) . '.' . $ext;
    $dest = $dir . DS . $filename;
    

    if ($profile_pic) {
        JFile::delete($dir . DS . $profile_pic);
        JFile::delete($dir . DS . 'thumb' . DS . $profile_pic);
        JFile::delete($dir . DS . 'small' . DS . $profile_pic);
        $profile_pic = '';
    }
    if (strtolower($ext) == 'jpg' || strtolower($ext) == 'png' || strtolower($ext) == 'gif'|| strtolower($ext) == 'jpeg') {
        if (JFile::upload($file['tmp_name'], $dest)) {
           $this->resizeImage(89, $dest, $dir . DS . 'thumb', $filename);
           $this->resizeImage(225, $dest, $dir . DS . 'small', $filename);
           
           $query = "UPDATE #__jtmb_members_directory SET `profile_picture` = '".$filename."' WHERE `user_id` = ".$id;
    	   $this->_db->setQuery($query);
		   $this->_db->query();  
        } else {
            throw new Exception(JText::_(JTAG_ERROR_UPLOAD_FAIL));
        }
    } else {
        throw new Exception(JText::_(JTAG_ERROR_FILE_NOT_IMAGE));
    }
  }  */
  
   function _uploadPicture($force_delete_old = false, $id) 
  {


    $file = JRequest::getVar('jform_profile_picture', null, 'files', 'array');
    $dir = JPATH_COMPONENT_SITE . DS . 'assets' . DS . 'profile_pictures';
    
    $query = 'SELECT `profile_picture` FROM #__jtmb_members_directory WHERE `user_id` = '.$id;
    $this->_db->setQuery($query);
    $pp = $this->_db->loadObject();
    $profile_pic= $pp->profile_picture;
    
    if ($force_delete_old) {
       
            //print_r($force_delete_old);exit;
        JFile::delete($dir . DS . $profile_pic);
        JFile::delete($dir . DS . 'thumb' . DS . $profile_pic);
        JFile::delete($dir . DS . 'small' . DS . $profile_pic);
        $profile_pic = '';
     if (empty($file['name'])) {
                 $query = "UPDATE #__jtmb_members_directory SET `profile_picture` = NULL WHERE `user_id` = ".$id;
               $this->_db->setQuery($query);
                   $this->_db->query();  
        return;
    }
         
    }
  if(empty($pp))
  {
    if (empty($file['name'])) {
                 $query = "UPDATE #__jtmb_members_directory SET `profile_picture` = NULL WHERE `user_id` = ".$id;
               $this->_db->setQuery($query);
                   $this->_db->query();  
        return;
    }
  }
  if(!empty($pp) && empty($file['name']) )
 {
  return;
 }


    $ext = JFile::getExt($file['name']);
    $filename = md5(time() . rand()) . '.' . $ext;
    $dest = $dir . DS . $filename;
    

    if ($profile_pic) {
        JFile::delete($dir . DS . $profile_pic);
        JFile::delete($dir . DS . 'thumb' . DS . $profile_pic);
        JFile::delete($dir . DS . 'small' . DS . $profile_pic);
        $profile_pic = '';
    }
   if (strtolower($ext) == 'jpg' || strtolower($ext) == 'png' || strtolower($ext) == 'gif'|| strtolower($ext) == 'jpeg') {
        if (JFile::upload($file['tmp_name'], $dest)) {
           $this->resizeImage(89, $dest, $dir . DS . 'thumb', $filename);
           $this->resizeImage(225, $dest, $dir . DS . 'small', $filename);
           
           $query = "UPDATE #__jtmb_members_directory SET `profile_picture` = '".$filename."' WHERE `user_id` = ".$id;
               $this->_db->setQuery($query);
                   $this->_db->query();  
        } else {
            throw new Exception(JText::_(JTAG_ERROR_UPLOAD_FAIL));
        }
    } else {
        throw new Exception(JText::_(JTAG_ERROR_FILE_NOT_IMAGE));
    }
       
  }

  function resizeImage($widthSize, $file, $dir, $filename) {
      $ext = JFile::getExt($filename);
	$ext = strtolower($ext);
        switch ($ext) {
            case 'jpg':
            	ini_set('gd.jpeg_ignore_warning',1);
              $src = imagecreatefromjpeg($file);
              break;
          case 'gif':
              $src = imagecreatefromgif($file);
              break;
          case 'png':
              $src = imagecreatefrompng($file);
              break;
          default:
              return false;
      }

      list($width, $height) = getimagesize($file);

      $desired_height = floor($height * ($widthSize / $width));
      /* create a new, image */
      $tmp = imagecreatetruecolor($widthSize, $desired_height);
      /* copy source image at a resized size */
      imagecopyresized($tmp, $src, 0, 0, 0, 0, $widthSize, $desired_height, $width, $height);

      /* create the physical thumbnail image to its destination */
      switch ($ext) {
          case 'jpg':
              imagejpeg($tmp, $dir . DS . $filename, 100); //100 is the quality settings, values range from 0-100.
              break;
          case 'gif':
              imagegif($tmp, $dir . DS . $filename, 100); //100 is the quality settings, values range from 0-100.
              break;
          case 'png':
              imagepng($tmp, $dir . DS . $filename); //100 is the quality settings, values range from 0-100.
              break;
      }

      imagedestroy($src);
      imagedestroy($tmp);

      return true;
  }
     function _uploadGalleryPicture($user_id)
	{

	    $file = JRequest::getVar('jform_gallery_picture', null, 'files', 'array');
        $dir = JPATH_COMPONENT_SITE . DS . 'assets' . DS . 'gallery_pictures';
        $gallery_name =	"gname";
        
       	if($file['size'][0] == 0){
			return;
		}
		
       	$count = count($file['name']);
       	
		for($i=0; $i<$count; $i = $i + 1)
		{
        	$ext = JFile::getExt($file['name'][$i]);
        	
        	$filename = md5(time() . rand()) . '.' . $ext;

        	$dest = $dir . DS . $filename;

		    if (strtolower($ext) == 'jpg' || strtolower($ext) == 'png' || strtolower($ext) == 'gif' || strtolower($ext) == 'jpeg') {		    
		        if (JFile::upload($file['tmp_name'][$i], $dest)) {
					$query = "INSERT INTO #__jtmb_gallery_images (`user_id`,`gname`,`image`) VALUES (".$user_id.",'".$gallery_name."','".$filename."')";
					//die(var_dump($query));
        			$this->_db->setQuery($query);		
        			$this->_db->query();
		        } else {
		            throw new Exception(JText::_(JTAG_ERROR_UPLOAD_FAIL));
		        }
		    } else {
		        throw new Exception(JText::_(JTAG_ERROR_FILE_NOT_IMAGE));
		    }
		 } 
	}

  function _deleteGalleryPicture($user)
{
 $dir = JPATH_COMPONENT_SITE . DS . 'assets' . DS . 'gallery_pictures';
   $selquery = 'SELECT image FROM `#__jtmb_gallery_images` WHERE user_id='. $user;
        $this->_db->setQuery($selquery);
        $rowgal =$this->_db->loadObjectList();
    foreach($rowgal as $row)
{
 JFile::delete($dir . DS . $row->image);
  $row->image='';
  //print_r($row->image);exit;
}

   $delquery = 'DELETE FROM `#__jtmb_gallery_images` WHERE user_id = ' . $user;
   $this->_db->setQuery($delquery);
   $this->_db->query(); 
}
 function selectgalary($uid)
{

    $query = 'SELECT user_id FROM `#__jtmb_members_directory` where id='.$uid;
        $this->_db->setQuery($query);
        $rows =$this->_db->loadObject();
        // print_r($rows->user_id);exit;

    $selquery = 'SELECT * FROM `#__jtmb_gallery_images` WHERE user_id='. $rows->user_id;
        $this->_db->setQuery($selquery);
        $rowgal =$this->_db->loadObjectList();
 
    return $rowgal;
}

  function selectattachments($uid)
{

  if(!empty($uid))
{
        $query = 'SELECT user_id FROM `#__jtmb_members_directory` where id='.$uid;
        $this->_db->setQuery($query);
        $rows =$this->_db->loadObject();
//print_r($rows);exit;
   $selquery = 'SELECT * FROM `#__jtmb_attachment` WHERE user_id='. $rows->user_id;
        $this->_db->setQuery($selquery);
        $rowgal =$this->_db->loadObjectList();
   //print_r($rowgal);exit;
    return $rowgal;
}
}

function _deleteAttachments($user)
{

 $dir = JPATH_COMPONENT_SITE . DS . 'assets' . DS . 'attachments';
   $selquery = 'SELECT image FROM `#__jtmb_attachment` WHERE user_id='. $user;
        $this->_db->setQuery($selquery);
        $rowgal =$this->_db->loadObjectList();
    foreach($rowgal as $row)
{
 JFile::delete($dir . DS . $row->image);
  $row->image='';
  //print_r($row->image);exit;
}

   $delquery = 'DELETE FROM `#__jtmb_attachment` WHERE user_id = ' . $user;
   $this->_db->setQuery($delquery);
   $this->_db->query(); 

}
function _uploadAttachment($user_id)
	{
             
	    $file = JRequest::getVar('jform_attachment', null, 'files', 'array');
        $dir = JPATH_COMPONENT_SITE . DS . 'assets' . DS . 'attachments';
        $attachment =	"gname";
  //print_r($file['name']);exit;
       	if($file['size'][0] == 0){
			return;
		}
		
       	$count = count($file['name']);
       	
		
		for($i=0; $i<$count; $i = $i + 1)
		{
        	$ext = JFile::getExt($file['name'][$i]);
        	$filename = $file['name'][$i];
        	//$filename = md5(time() . rand()) . '.' . $ext;

        	$dest = $dir . DS . $filename;

		    if (strtolower($ext) == 'txt' || strtolower($ext) == 'pdf' || strtolower($ext) == 'doc' || strtolower($ext) == 'docx'||strtolower($ext) == 'odt'||strtolower($ext) == 'xls'||strtolower($ext) == 'jpg' || strtolower($ext) == 'png' || strtolower($ext) == 'gif' || strtolower($ext) == 'jpeg'||strtolower($ext) == 'xlsx') {		    
		        if (JFile::upload($file['tmp_name'][$i], $dest)) {
					$query = "INSERT INTO #__jtmb_attachment (`user_id`,`gname`,`image`) VALUES (".$user_id.",'".$attachment."','".$filename."')";
        			$this->_db->setQuery($query);		
        			$this->_db->query();
		        } else {
		            throw new Exception(JText::_(JTAG_ERROR_UPLOAD_FAIL));
		        }
		    } else {
		        throw new Exception(JText::_(JTAG_ERROR_FILE_TYPE));
		    }
		 } 
	}

}
