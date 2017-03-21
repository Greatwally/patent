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
// no direct access
defined('_JEXEC') or die;
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.model');

class jtagmemberdirectoryModelmembers extends JModelLegacy
{
  /**
   * Items total
   * @var integer
   */
  var $_total = null;
 
  /**
   * Pagination object
   * @var object
   */
  var $_pagination = null;
  
 public function __construct($config = array())
  {
    parent::__construct($config);

    // Get pagination request variables
 $version = new JVersion();
   switch($version->RELEASE)
{

 case "1.5" :
 $params =& JComponentHelper::getParams('com_jtagmembersdirectory');
     $limit = $params->getValue('pages');
     $sortby = $params->getValue('sortby');
     $order = $params->getValue('order');

 
 break;

 default :

    require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';
   $params = & JTagHelper::getComponentParameters('com_jtagmembersdirectory');
   $limit = $params->pages;
   $sortby = $params->sortby;
   $order = $params->order;
   $catwise=$params->category;
//print_r($catwise);exit;
     
    
  //print_r($sortby);exit;
}
  /*Start- snehal kulkarni -5-12-2012-- removing error from frontend */
    if(empty($limit))
   {
       $limit=2;
   }
     $limit=$limit; 
   

   if(empty($sortby))
    {
       $sortby="Name";
    
   }
    $sortby=$sortby; 
   
   if($order=='name')
   {
     $order='asc';
   }

   
    /*End- snehal kulkarni -5-12-2012-- removing error from frontend */
 
    $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
  
    // In case limit has been changed, adjust it
    $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
    
    $this->setState('limit', $limit);
	  $this->setState('limitstart', $limitstart);
          $this->setstate('sortby', $sortby);//Added by sarika
	  $this->setstate('order', $order);//Added by sarika
  }
  
  function getData()
  {

 	  // if data hasn't already been obtained, load it
    if (empty($this->_data))
    {
        $query = $this->_buildQuery();

        $query .= $this->_buildSearchQuery($this->_getCriteria());
	//$query .= ' ORDER BY name ASC';   // Added on 19-04-2012
        $query .= $this-> _Orderby();//Addedby sarika
   
      $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit')); 
     

    }
    return $this->_data;
  }
  
  function getTotal()
  {
     
    // Load the content if it doesn't already exist
     if (empty($this->_total)) {
        $query = $this->_buildQuery();

        $query .= $this->_buildSearchQuery($this->_getCriteria());

        $query .= $this-> _Orderby();//Addedby sarika
        $this->_total = $this->_getListCount($query);
    }
    return $this->_total;
  }

//start changes added by sarika
  function _Orderby()
  {
        
  	if($this->getState('sortby')=='phone_no')
  		$sql = ' ORDER BY ABS('.$this->getState('sortby').')';

        elseif($this->getState('sortby')=='Custom')
               $sql = ' ORDER BY ordering';
               
                  
  	else
  		$sql = ' ORDER BY '.$this->getState('sortby');
  	
  	$sql= $sql.' '.$this->getState('order');

  	return $sql;
  }
  //end changes

  
  function getPagination()
  {
    // Load the content if it doesn't already exist
    if (empty($this->_pagination)) {
        jimport('joomla.html.pagination');
        $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
    }
    return $this->_pagination;
  }
  
  function _buildQuery()
  {//comented by sarika
   // $sql = 'SELECT id, user_id, name, phone_no, member_since, member_profile, profile_picture
//      FROM `#__jtmb_members_directory` c ORDER BY name ASC'; 

// Order by name ASC Added by Kirti on 28March2012 to display user 
// names sorted alphabetically 
    
		//$where		= $this->_buildContentWhere();
		//$orderby	= $this->_buildContentOrderBy();
        $cat_id         =  JRequest::getVar('cat_id', 0, '', 'int');
		/*Start- Snehal Kulkarni- 05/09/2012 -Retrive Email from database */
		//$query = ' SELECT *'
		//	. ' FROM #__jtmb_members_directory as c INNER JOIN #__jtmb_assigned_categories AS b ';
           $query='SELECT DISTINCT c.id,c.user_id,c.profile_picture,c.name,c.Email,c.display_last_name,c.country,c.city,
c.state,c.phone_no,c.facebook_page,c.twitter_page,c.member_profile,c.display_in_frontend,c.allow_edit,c.hasGallery 
FROM #__jtmb_members_directory AS c';

//,#__jtmb_assigned_categories as b';
/*End- Snehal Kulkarni- 05/09/2012 -Retrive Email from database */
             //WHERE display_in_frontend=1
		return $query;

   // return $sql;
  }
  
  function _buildSearchQuery($criteria)
  {
$params = & JTagHelper::getComponentParameters('com_jtagmembersdirectory');
 $catwise=$params->category;

//print_r($catwise);exit;
        

   $sql=""; 
   if (isset($criteria['cat_id']))
    {
    		$sql .= ' INNER JOIN #__jtmb_assigned_categories AS b';
   }
 if (isset($criteria['cust_id']) || isset($criteria['customtext']))
    {
    		$sql .= ' INNER JOIN #__jtmb_custom_maps_members AS n';
   }
 $user =& JFactory::getUser();
  $userid=$user->id;
if($catwise==1 AND $userid!==0 )
{
 
//print_r($userid);exit;

  $query1='SELECT ca.cat_id FROM #__jtmb_assigned_categories ca LEFT JOIN #__jtmb_members_directory  cd ON ca.memberid=cd.id where cd.user_id='.$userid.' ';
                $this->_db->setQuery($query1);
		$catids=$this->_db->loadObject();
//print_r($catids);exit;
        foreach($catids as $catid)
 {
            $cat=$catid;
  }
//print_r($cat);exit;
 $sql  .= ' ,#__jtmb_assigned_categories AS b WHERE  b.cat_id ='.$cat.' AND c.id=b.memberid AND c.Published=1 ';

}
else
{
 $sql  .= ' WHERE c.display_in_frontend=1 AND deleted_at = 0 AND c.Published=1 ';
}
    if (isset($criteria['cat_id']))
    {
               
		 $sql .= ' AND b.cat_id = "'.$criteria['cat_id'].'" AND c.id=b.memberid';
	}
 if (isset($criteria['cust_id']))
    {
                 
		 $sql .= ' AND n.field_label = "'.$criteria['cust_id'].'" AND c.user_id=n.user_id';
     
	}
  if (isset($criteria['customtext']))
            {
               $sql .= ' AND n.field_value = "'.$criteria['customtext'].'" ';
             }
    if (empty($criteria))
    {
	   return $sql;
    }
    
    if(isset($criteria['alphabet']))
    {
     	$l = strtolower($criteria['alphabet']);
     	$u  = strtoupper($criteria['alphabet']);
     	
    	$sql .= ' AND c.name LIKE "'.$l.'%" OR "'.$u.'%"';	
    	return $sql;
    }
    if (isset($criteria['name']))
    {
          $name= iconv(mb_detect_encoding($criteria['name'], mb_detect_order(), true), "UTF-8", $criteria['name']);
      $sql .= ' AND c.name LIKE "%'.$name.'%"';
    }

  	if (isset($criteria['cat_id']))
    {
           
		 $sql .= ' AND b.cat_id = "'.$criteria['cat_id'].'" AND c.id=b.memberid';
    }

    if (isset($criteria['country']))
    {
       $country= iconv(mb_detect_encoding($criteria['country'], mb_detect_order(), true), "UTF-8", $criteria['country']);
      $sql .= ' AND c.country = "'.$country.'"';
    }
    
    if (isset($criteria['state']))
    {
      $state= iconv(mb_detect_encoding($criteria['state'], mb_detect_order(), true), "UTF-8", $criteria['state']);
      $sql .= ' AND c.state LIKE "%'.$state.'%"';
    }
    
    if (isset($criteria['city']))
    {
      $city= iconv(mb_detect_encoding($criteria['city'], mb_detect_order(), true), "UTF-8", $criteria['city']);
      $sql .= ' AND c.city LIKE "%'.$city.'%"';
    }
    
   // $sql = 'WHERE'.substr($sql, 4);
    //$sql = substr($sql, 4);
    
    return $sql;
  }
   function auto_sync(){
    	$query="select auto_sync from #__jtmb_display_options";
		$this->_db->setQuery($query);
		$row=$this->_db->loadObject();
		return $row;
    }
  function  getCategories()
        {
                $db = & JFactory::getDBO();
				$query = "SELECT id,name,description FROM #__jtmb_categories where trash=0";
				$db->setQuery($query);
				$mitems = $db->loadObjectList();
				return $mitems;
        }
        function retrive_custom()
{

   $query = 'SELECT distinct c.field_name, c.field_label, d.field_value, c.display_nr_cf,d.user_id FROM #__jtmb_custom_fields c LEFT JOIN #__jtmb_custom_maps_members  d ON c.field_label=d.field_label ';

      $this->_db->setQuery($query);
      return $this->_db->loadObjectList();
}

        
  function _getCriteria()
  {
    $criteria = array();
 
   	if($alphabet  = JRequest::getVar('alphabet'))
 	{
 		$criteria['alphabet'] = $alphabet;
 		return $criteria;
 	}
	if($cat_id = JRequest::getVar('cat_id'))
	{
	  $criteria['cat_id'] = $cat_id;
	}
    if ($v = JRequest::getString('name'))
    {
      $criteria['name'] = $v;
    }
	    
    if ($v = JRequest::getString('country'))
    {
      $criteria['country'] = $v;
    }
    
    if ($v = JRequest::getString('state'))
    {
      $criteria['state'] = $v;
    }
    
    if ($v = JRequest::getString('city'))
    {
      $criteria['city'] = $v;
    }
    
   if($cust_id = JRequest::getVar('cust_id'))
	{

         $criteria['cust_id'] = $cust_id;
	}
     if($customtext = JRequest::getVar('customtext'))
	{

         $criteria['customtext'] = $customtext;
	}
    
    return $criteria;
  }
  
function saverequest($id,$name,$username,$email)
 {

  $db = & JFactory::getDBO();
    $sqluid = "SELECT * FROM #__jtmb_member_request where user_id= '".$id."';";
                          $db->setQuery($sqluid); 
  		          $rowsuserid = $db->loadObjectList();
           if(empty($rowsuserid))
{
				$query = "INSERT INTO #__jtmb_member_request (user_id,email,name,username) VALUES ('$id','$email','$name','$username')";
				$db->setQuery($query);
   $db->query();
}

  
 }
 
 function checkMember()
 {
              $db = &JFactory::getDbo(); 
    	      $sqlquery = "SELECT user_id FROM  #__jtmb_members_directory ";
   	      $db->setQuery($sqlquery); 
    	      $rows = $db->loadObjectList();
    	      return $rows;
 }
 
 function  checkCustomField()
        {
                $db = & JFactory::getDBO();
				$query = "SELECT allow_nonregistered_users_from_frontend FROM #__jtmb_display_options";
				
				$db->setQuery($query);
				$cs = $db->loadObjectList();
				
				return $cs;
        }
         function addFromJoomla(){
		$db = &JFactory::getDBO();
		$sql = "select * from `#__users` where `id` NOT IN (select `user_id` from `#__jtmb_members_directory`) AND `block`=0";
		$db->setQuery($sql);
		$users = $db->loadObjectList();

	foreach($users as $user){
		$name = mysql_real_escape_string($user->name);
		$email = mysql_real_escape_string($user->email);
	  $sql = "INSERT INTO `#__jtmb_members_directory` (`user_id`, `name`,`Email`) VALUES ('$user->id', '$name', '$email')" ;
      $db->setQuery($sql);
   	  $db->query();
   	 }
    }

   function assignCategories($mid)
   {
       $db = & JFactory::getDBO();
        $query = "SELECT memberid,cat_id FROM #__jtmb_assigned_categories WHERE memberid=$mid";
       $db->setQuery($query);
       $mitems = $db->loadObjectList();
       return $mitems;
   }
}
