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

class TableMembersDirectory extends JTable
{
  var $id;
  var $user_id;
  var $profile_picture;
  var $name;
/*Start- Snehal Kulkarni-05/09/2012*/
  var $email;
/*End- Snehal Kulkarni-05/09/2012*/
  var $category;
//  var $last_name;
//  var $display_last_name;
  var $country;
  var $city;
  var $display_city;
  var $state;
  var $phone_no;
  var $display_phone_no;
  var $facebook_page;
  var $display_facebook_page;
  var $twitter_page;
  var $display_twitter_page;
  var $member_profile;
  var $display_in_frontend;
  //Added by Pratik Munot on Oct 11,2012
  var $allow_edit;
  var $display_nr_email;
  var $display_nr_country;
  var $display_nr_city;
  var $display_nr_state;
  var $display_nr_phone_no;
  var $display_nr_facebook;
  var $display_nr_twitter;  
  //end
  var $display_gallery;
  
  /**
   * Contains user data from joomla users table
   * 
   * @var array $userdata
   */
  var $user;
  
  /**
   * Collection of custom fields objects. If custom fields are less than allowed array is filled with TableCustomFields objects
   * 
   * @var array Collection of custom fields rows
   */
  var $custom_fields;
  var $ordering;
  /**
   * Number of custom fields allowed.
   */
  const CF_ALLOWED = 10;
  
  function __construct(&$db)
	{
		parent::__construct('#__jtmb_members_directory', 'id', $db);
    $this->_retrieveUser();
   
	}
  
  function load($keys = NULL, $reset = true)
  {
    parent::load($keys, $reset);
    
    $this->_retrieveUser();
 

  }
  
  function bind($from, $ignore = array())
  {

    parent::bind($from, $ignore);
    
    $this->_retrieveUser();
  
  }
  
  function _retrieveUser()
  {
    if (!$this->user_id)
    {
      $this->user = new stdClass();
      $this->user->username = '';
      $this->user->registerDate = '';
      return;
    }
	/*Start- Snehal Kulkarni-05/09/2012-Retrive email and RegisterDate from database*/
    $query = 'SELECT username,email, registerDate FROM `#__users` WHERE id = '.$this->user_id.' LIMIT 1';
	/*End- Snehal Kulkarni-05/09/2012-Retrive email and RegisterDate from database*/
    $this->_db->setQuery($query);
        
    $this->user = $this->_db->loadObject();
  }
  
 
  
}

?>
