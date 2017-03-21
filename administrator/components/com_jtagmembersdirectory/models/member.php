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

class jtagmemberdirectoryModelmember extends JModelLegacy {

    /**
     * Contains member object for current model instance
     * 
     * @var TableMembersDirectory $_member
     */
    var $_member;
   var $_galary;

    function getOrCreateMember($id = null) {
        if ($this->_member === null) {
            $this->_member = $this->getTable('MembersDirectory');

            if ($id) {
                $this->_member->load($id);
            }
        }
        return $this->_member;
    }

    function save($data) {
  $query = 'SELECT id FROM `#__jtmb_members_directory` where user_id= '.$data[user_id];
        $this->_db->setQuery($query);
        $rows =$this->_db->loadObjectList();


   //   print_r($rows);exit;
$rid=$rows[0]->id;
  if(!empty($rows[0]->id))
{
 
    $q = "UPDATE `#__jtmb_members_directory` SET `deleted_at` = 0 WHERE `id` = '$rid'";
    $this->_db->setQuery($q);

	$this->_db->query(); 
}
     //  print_r($data);exit;
        $custom_fileds = $data['custom_fields'];
          unset($data['custom_fields']);

        if ($data['id']) {
            $this->_member->load($data['id']);
        }
        $this->_member->bind($data);

//        $this->_member->member_since = $this->_member->user->registerDate;

        $this->_uploadPicture($data['delete_old_picture']);
       if($data['delete_old_galary'])       
        {
        $this->_deleteGalleryPicture($data['user_id']);
        } 
        if($data['attachment'])       
        {
        $this->_deleteAttachments($data['user_id']);
        }
        $this->_uploadGalleryPicture($data['user_id']);
        $this->_uploadAttachment($data['user_id']);
      
        $this->_member->hasGallery = 1;       
     

        if (!$this->_member->store()) {
            JError::raiseError(500, $this->_member->getError());
            return false;
        }

        $this->_saveCustomFields($custom_fileds, $data['user_id']);

        return true;
    }

    function _saveCustomFields($fields, $user_id) {

        $query = 'DELETE FROM `#__jtmb_custom_maps_members` WHERE user_id = ' . $user_id;
        $this->_db->setQuery($query);

        if (!$this->_db->query()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }
        $query = 'SELECT field_label FROM `#__jtmb_custom_fields';
	$this->_db->setQuery($query);
        $rows =$this->_db->loadObjectList();
    
         $i=0;
     if(!empty($fields))
       {
        foreach ($fields as $field) {
            if(!empty($field[field_value]))
            {
            $label= $rows[$i]->field_label;
            $sql = "INSERT INTO #__jtmb_custom_maps_members (user_id, field_label,field_value)
                               VALUES ('$user_id', '$label', '$field[field_value]')" ;
    			      $this->_db->setQuery($sql);
       
   		              $this->_db->query();
                    
             }
             $i++;

        }
      }
    }

    function _uploadPicture($force_delete_old = false) {
        $file = JRequest::getVar('jform_profile_picture', null, 'files', 'array');
        $dir = JPATH_COMPONENT_SITE . DS . 'assets' . DS . 'profile_pictures';

        if ($force_delete_old) {
            JFile::delete($dir . DS . $this->_member->profile_picture);
            JFile::delete($dir . DS . 'thumb' . DS . $this->_member->profile_picture);
            JFile::delete($dir . DS . 'small' . DS . $this->_member->profile_picture);
            $this->_member->profile_picture = '';
        }

        if (empty($file['name'])) {
            return;
        }
        $ext = JFile::getExt($file['name']);
        $filename = md5(time() . rand()) . '.' . $ext;

        $dest = $dir . DS . $filename;

        if ($this->_member->profile_picture) {
            JFile::delete($dir . DS . $this->_member->profile_picture);
            JFile::delete($dir . DS . 'thumb' . DS . $this->_member->profile_picture);
            JFile::delete($dir . DS . 'small' . DS . $this->_member->profile_picture);
            $this->_member->profile_picture = '';
        }

        if (strtolower($ext) == 'jpg' || strtolower($ext) == 'png' || strtolower($ext) == 'gif' || strtolower($ext) == 'jpeg') {
            if (JFile::upload($file['tmp_name'], $dest)) {
                $this->_member->profile_picture = $filename;
                $this->resizeImage(89, $dest, $dir . DS . 'thumb', $filename);
                $this->resizeImage(225, $dest, $dir . DS . 'small', $filename);
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
     function deletecustommap($id)
    { 
        $query = 'SELECT user_id FROM `#__jtmb_members_directory` where id= '.$id;
        $this->_db->setQuery($query);
        $rows =$this->_db->loadObjectList();
   
        $delquery = 'DELETE FROM `#__jtmb_custom_maps_members` WHERE user_id = ' . $rows[0]->user_id;
        $this->_db->setQuery($delquery);
        $this->_db->query();       
    }

  function selectgalary($uid)
{

  if(!empty($uid))
{
    $query = 'SELECT user_id FROM `#__jtmb_members_directory` where id='.$uid;
        $this->_db->setQuery($query);
        $rows =$this->_db->loadObjectList();
       
//print_r($rows);exit;
   $selquery = 'SELECT * FROM `#__jtmb_gallery_images` WHERE user_id='. $rows[0]->user_id;
        $this->_db->setQuery($selquery);
        $rowgal =$this->_db->loadObjectList();
   //print_r($rowgal);exit;
    return $rowgal;
}
}

  function selectattachments($uid)
{

  if(!empty($uid))
{
    $query = 'SELECT user_id FROM `#__jtmb_members_directory` where id='.$uid;
        $this->_db->setQuery($query);
        $rows =$this->_db->loadObjectList();
       
//print_r($rows);exit;
   $selquery = 'SELECT * FROM `#__jtmb_attachment` WHERE user_id='. $rows[0]->user_id;
        $this->_db->setQuery($selquery);
        $rowgal =$this->_db->loadObjectList();
   //print_r($rowgal);exit;
    return $rowgal;
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

function deletegal($uid)
{
      
      $query = 'SELECT user_id FROM `#__jtmb_members_directory` where id='.$uid;
        $this->_db->setQuery($query);
        $rows =$this->_db->loadObjectList();
    $this->_deleteGalleryPicture($rows[0]->user_id);
}

function softDelete($id){
	$query = "UPDATE `#__jtmb_members_directory` SET `deleted_at` = 1 WHERE `id` = '$id'";
    $this->_db->setQuery($query);
	$this->_db->query(); 
	return;
}

function move($direction)
	{
  $cid = JRequest::getVar('cid');
          $sel = 'SELECT ordering FROM `#__jtmb_members_directory` where id='.$cid[0];
        $this->_db->setQuery($sel);
        $rows =$this->_db->loadObject();
                $ord=$rows->ordering;

         $sql='SELECT id FROM `#__jtmb_members_directory` where ordering='.($ord+($direction));
          $this->_db->setQuery($sql);

        $row =$this->_db->loadObject();
                $id=$row->id;
        
           $query = sprintf('UPDATE `#__jtmb_members_directory` SET `ordering`= ordering + ('.$direction.') WHERE `id`= %d ', 
            $cid[0]);
    
           $this->_db->setQuery($query);
           $this->_db->query();
          $nxquery = sprintf('UPDATE `#__jtmb_members_directory` SET `ordering`= ordering - ('.$direction.') WHERE `id`=%d',$id);
    
           $this->_db->setQuery($nxquery);

           $this->_db->query();
	   return true;
	}
function saveorder($cid = array(), $order)
	{
		$row =& $this->getTable('MembersDirectory');

		// update ordering values
		for( $i=0; $i < count($cid); $i++ )
		{
			$row->load( (int) $cid[$i] );

			if ($row->ordering != $order[$i])
			{
				$row->ordering = $order[$i];
				if (!$row->store()) {
					$this->setError($this->_db->getErrorMsg());
					return false;
				}
			}
		}

		$row->reorder();
		return true;
	}


}
