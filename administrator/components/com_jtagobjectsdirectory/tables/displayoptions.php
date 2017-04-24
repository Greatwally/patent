<!--Start- Snehal Kulkarni-Added for filtering display options and custom fields-- 18th dec-2012-->
<?php
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory  Jtag objects Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

class TableDisplayOptions extends JTable
{

  var $id;
  var $display_phone_no;
  var $display_facebook_page;
  var $display_twitter_page;
  var $display_in_frontend;
  var $display_nr_email;
  var $display_email;
  var $display_nr_category;
  var $display_category;
  var $display_nr_country;
  var $display_country;
  var $display_nr_city;
  var $display_nr_state;
  var $display_state;
  var $display_nr_phone_no;
  var $display_nr_facebook;
  var $display_nr_twitter;
  var $display_nr_gallery;  
  var $display_profile;
  var $display_nr_profile;

  var $allowedit_email;
  var $allowedit_country;
  var $allowedit_category;
  var $allowedit_city;
  var $allowedit_state;
  var $allowedit_phone_no;
  var $allowedit_facebook_page;
  var $allowedit_twitter_page;
  var $allowedit_gallery;
  var $allowedit_profile;
  //end
  
  /**
   * Contains user data from joomla users table
   * 
   * @var array $userdata
   */
  var $display;
  
  /**
   * Collection of custom fields objects. If custom fields are less than allowed array is filled with TableCustomFields objects
   * 
   * @var array Collection of custom fields rows
   */
  var $custom_fields;
  
  /**
   * Number of custom fields allowed.
   */
  const CF_ALLOWED = 10;
  
  function __construct(&$db)
	{
		parent::__construct('#__jtmb_display_options', 'id', $db);
   // $this->_retrieveOptions();
    $this->_retrieveCustomFields();
	}
  
  function load($oid=null)
  {
    parent::load($oid);
    $this->_retrieveCustomFields();
  }
  
  function bind($from, $ignore = array())
  {
    //checkboxes workaround
//    if(!isset($from['display_last_name'])) $from['display_last_name'] = 0;
    if(!isset($from['display_city'])) $from['display_city'] = 0;
    if(!isset($from['display_phone_no'])) $from['display_phone_no'] = 0;
    if(!isset($from['display_facebook_page'])) $from['display_facebook_page'] = 0;
    if(!isset($from['display_twitter_page'])) $from['display_twitter_page'] = 0;
    if(!isset($from['cat_id'])) $from['cat_id'] = 0;
	//added by Pratik Munot
 	if(!isset($from['display_nr_email'])) $from['display_nr_email'] = 0;
    if(!isset($from['display_email'])) $from['display_email'] = 0;
    if(!isset($from['display_nr_category'])) $from['display_nr_category'] = 0;
    if(!isset($from['display_category'])) $from['display_category'] = 0;
    if(!isset($from['display_nr_country'])) $from['display_nr_country'] = 0;
    if(!isset($from['display_country'])) $from['display_country'] = 0;
    if(!isset($from['display_nr_city'])) $from['display_nr_city'] = 0;
    if(!isset($from['display_nr_state'])) $from['display_nr_state'] = 0;
    if(!isset($from['display_state'])) $from['display_state'] = 0;
    if(!isset($from['display_nr_phone_no'])) $from['display_nr_phone_no'] = 0;
    if(!isset($from['display_nr_facebook'])) $from['display_nr_facebook'] = 0;
    if(!isset($from['display_nr_twitter'])) $from['display_nr_twitter'] = 0;
     if(!isset($from['display_profile'])) $from['display_profile'] = 0;
    if(!isset($from['display_nr_profile'])) $from['display_nr_profile'] = 0;
    if(!isset($from['allowedit_email'])) $from['allowedit_email'] = 0;
    if(!isset($from['allowedit_country'])) $from['allowedit_country'] = 0;
    if(!isset($from['allowedit_category'])) $from['allowedit_category'] = 0;
    if(!isset($from['allowedit_city'])) $from['allowedit_city'] = 0;
    if(!isset($from['allowedit_state'])) $from['allowedit_state'] = 0;
    if(!isset($from['allowedit_phone_no'])) $from['allowedit_phone_no'] = 0;
    if(!isset($from['allowedit_facebook_page'])) $from['allowedit_facebook_page'] = 0;
    if(!isset($from['allowedit_twitter_page'])) $from['allowedit_twitter_page'] = 0;
    if(!isset($from['allowedit_gallery'])) $from['allowedit_gallery'] = 0;
   if(!isset($from['allowedit_profile'])) $from['allowedit_profile'] = 0;
    //end
    if(!isset($from['display_gallery'])) $from['display_gallery'] = 0; 
    if(isset($from['auto_sync'])) $from['auto_sync'] = 1;

$from['display_email'] = $from['display_email'] + $from['allowedit_email'];
unset($from['allowedit_email']);
$from['display_category'] = $from['display_category'] + $from['allowedit_category'];
unset($from['allowedit_category']);
$from['display_country'] = $from['display_country'] + $from['allowedit_country'];
unset($from['allowedit_country']);
$from['display_city'] = $from['display_city'] + $from['allowedit_city'];
unset($from['allowedit_city']);
$from['display_state'] = $from['display_state'] + $from['allowedit_state'];
unset($from['allowedit_state']);
$from['display_phone_no'] = $from['display_phone_no'] + $from['allowedit_phone_no'];
unset($from['allowedit_phone_no']);
$from['display_facebook_page'] = $from['display_facebook_page'] + $from['allowedit_facebook_page'];
unset($from['allowedit_facebook_page']);
$from['display_twitter_page'] = $from['display_twitter_page'] + $from['allowedit_twitter_page'];
unset($from['allowedit_twitter_page']);
$from['display_gallery'] = $from['display_gallery'] + $from['allowedit_gallery'];
unset($from['allowedit_gallery']);
$from['display_profile'] = $from['display_profile'] + $from['allowedit_profile'];
unset($from['allowedit_profile']);
    parent::bind($from, $ignore);
    
    $this->_retrieveCustomFields();
  }
  
  function _retrieveOptions()
  {
    	
    $query = 'SELECT * FROM `#__jtmb_display_options';
	
    $this->_db->setQuery($query);

    $this->display = $this->_db->loadObject();
 
        
  }
  
  function _retrieveCustomFields()
  {
       
  //  $fields = array();
    
 //  $k = $this->_tbl_key;

//    if ($this->$k)
  //  {
      $query = 'SELECT field_name, field_label, display_nr_cf, allow_edit FROM #__jtmb_custom_fields LIMIT '.self::CF_ALLOWED;

      $this->_db->setQuery($query);

      $fields = $this->_db->loadObjectList();
    //}

    if (count($fields) < self::CF_ALLOWED)
    {
      require_once 'customfields.php';
      while (count($fields) < self::CF_ALLOWED)
      {
        $fields[] = new TableCustomFields($this->_db);
      }
    }
        
    $this->custom_fields = $fields;
  }

function delete()
  {
      $query = 'DELETE  FROM `#__jtmb_display_options';
      $this->_db->setQuery($query);

      $this->_db->loadObject();
  }

}

?>
<!--End- Snehal Kulkarni-Added for filtering display options and custom fields-- 18th dec-2012-->
