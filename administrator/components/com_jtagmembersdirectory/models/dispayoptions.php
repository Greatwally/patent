<!--Start- Snehal Kulkarni-Added for filtering display options and custom fields-- 18th dec-2012-->
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

jimport('joomla.application.component.controller');
jimport('joomla.application.component.model');
jimport('joomla.filesystem.file');

class jtagmemberdirectoryModeldispayoptions extends JModelLegacy {

    /**
     * Contains member object for current model instance
     * 
     * @var TableDisplayOptions $_member
     */
    var $_dispayoptions;

    function getOrCreateOption($id=null) {
    
        /*if ($this->_member === null) {
            $this->_member = $this->getTable('DisplayOptions');

            if ($id) {
                $this->_member->load($id);
            }
        }
        return $this->_member;*/
       
        $query = 'SELECT * FROM `#__jtmb_display_options';
	$this->_db->setQuery($query);
         $this->display = $this->_db->loadObject();          
       return $this->display;
    }
 function getCustomfields($id=null)
    {
        
       if ($this->_dispayoptions === null) {
            $this->_dispayoptions = $this->getTable('DisplayOptions');

            if ($id) {
                $this->_dispayoptions->load();
            }
        }
        return $this->_dispayoptions;
    }     

    function save($data) {
        $this->_dispayoptions=&$this->getTable('DisplayOptions');
        $custom_fileds = $data['custom_fields'];
        unset($data['custom_fields']);
        $this->_dispayoptions->delete();
        $this->_dispayoptions->bind($data);     

        if (!$this->_dispayoptions->store()) {
            JError::raiseError(500, $member->getError());
            return false;
        }

        $this->_saveCustomFields($custom_fileds);

        return true;
    }

    function _saveCustomFields($fields, $user_id) {
        $query = 'DELETE FROM `#__jtmb_custom_fields`';
        $this->_db->setQuery($query);

        if (!$this->_db->query()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }


        foreach ($fields as $field) {
            if ($field['field_name']) {
            	//next line added by Pratik on Oct 11,2012
            	  
              
              

                if(!isset($field['display_nr_cf'])) $field['display_nr_cf'] = 0;
                if(!isset($field['allow_edit'])) $field['allow_edit'] = 0;
                //print_r($field);exit;
                $customField = $this->getTable('CustomFields');
                $customField->bind($field);
                $customField->user_id = $user_id;
                $customField->store();
            }
        }
    }
    
    function auto_sync(){
    	$query="select auto_sync from #__jtmb_display_options";
		$this->_db->setQuery($query);
		$row=$this->_db->loadObject();
		return $row;
    }

    function retrive_customFields($id)
{
    
   $sql ='SELECT user_id FROM #__jtmb_members_directory WHERE id = '.$id;
   $this->_db->setQuery($sql);
   $row=$this->_db->loadObjectList();
   $uid=$row[0]->user_id;
  if(!empty($uid))
{
   $query = 'SELECT distinct c.field_name, c.field_label, d.field_value, c.display_nr_cf, c.allow_edit FROM #__jtmb_custom_fields c LEFT JOIN #__jtmb_custom_maps_members  d ON d.user_id ='.$uid.' AND c.field_label=d.field_label ';

      $this->_db->setQuery($query);
}
  if(! $this->_db->loadObjectList())
  {
    $query = 'SELECT field_name, field_label, display_nr_cf, allow_edit FROM #__jtmb_custom_fields';
    $this->_db->setQuery($query);
    $this->_db->loadObjectList();
  }
      return $this->_db->loadObjectList();
     
  }
}
//End- Snehal Kulkarni-Added for filtering display options and custom fields-- 18th dec-2012>
