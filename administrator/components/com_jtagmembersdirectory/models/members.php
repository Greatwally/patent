<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory � Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

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
    
//    global $mainframe, $option;
    $mainframe = JFactory::getApplication();
    $option = JRequest::getVar('option');
    
    // Get pagination request variables
    $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
    $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
    
    // In case limit has been changed, adjust it
    $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
     require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';
   $params = & JTagHelper::getComponentParameters('com_jtagmembersdirectory');
     $sortby = $params->sortby;
    $this->setState('limit', $limit);
	$this->setState('limitstart', $limitstart);
if($sortby=='Custom')
{
    	$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order',		'filter_order',		'c.ordering',	'cmd' );
}
else
{
   $filter_order     = $mainframe->getUserStateFromRequest(  $option.'members_directory_list.filter_order', 'filter_order', 'user_id', 'cmd' );
}
	  $filter_order_Dir = $mainframe->getUserStateFromRequest( $option.'members_directory_list.filter_order_Dir', 'filter_order_Dir', 'asc', 'word' ); 
    
    $this->setState('filter_order', $filter_order);
    $this->setState('filter_order_Dir', $filter_order_Dir);
  }
  
  function getData()
  {
 	  // if data hasn't already been obtained, load it
    if (empty($this->_data))
    {
        $query = $this->_buildQuery();
        $query .= $this->_buildContentOrderBy();
        
        $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
    }
   // die(var_dump($this->_data));

  return $this->_data;
  }
  
  function getTotal()
  {
    // Load the content if it doesn't already exist
    if (empty($this->_total)) {
        $query = $this->_buildQuery();
        $this->_total = $this->_getListCount($query);
    }
    
    return $this->_total;
  }
  
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
  {
              $db =   JFactory::getDBO();
/* Start - Snehal Kulkarni- 07/11/2012- Change query for multiple categories to single user*/
               $mainframe =  JFactory::getApplication();
		$option = JRequest::getCmd('option');
                $view = JRequest::getCmd('view');
                $search = $mainframe->getUserStateFromRequest($option.$view.'search', 'search', '', 'string');
		$search = JString::strtolower($search);
                $email = $mainframe->getUserStateFromRequest($option.$view.'email', 'email', '', 'string');
                $phone = $mainframe->getUserStateFromRequest($option.$view.'phone', 'phone', '', 'int');
                $cat = $mainframe->getUserStateFromRequest($option.$view.'category', 'category', '', 'string');
                $cat = JString::strtolower($cat);
		
 $sql = " SELECT c.id, c.user_id, c.name, c.Email, c.phone_no, GROUP_CONCAT( DISTINCT b.name ) AS cat,c.ordering,c.Published
FROM `#__jtmb_members_directory` c
LEFT JOIN `#__jtmb_assigned_categories` d ON c.id = d.memberid
LEFT JOIN `#__jtmb_categories` b ON d.cat_id = b.id where c.deleted_at='0'";
if ($search) {
	 		$sql .= " AND LOWER( c.name ) LIKE ".$db->Quote('%'.$db->escape($search, true).'%', false);
        } 
if ($email) {
	 		$sql .= " AND LOWER( c.Email ) LIKE ".$db->Quote('%'.$db->escape($email, true).'%', false);
        } 
if ($phone) {
	 		$sql .= " AND LOWER( c.phone_no ) LIKE ".$db->Quote('%'.$db->escape($phone, true).'%', false);
        } 
if ($cat) {
	 		$sql .= " AND LOWER( b.name ) LIKE ".$db->Quote('%'.$db->escape($cat, true).'%', false);
        } 
$sql .="GROUP BY c.id";
/* End - Snehal Kulkarni- 07/11/2012- Change query for multiple categories to single user*/

    return $sql;
  }
  
  function _buildContentOrderBy()
  {
	  global $mainframe, $option;
 
		$orderby = '';
		$filter_order     = $this->getState('filter_order');
		$filter_order_Dir = $this->getState('filter_order_Dir');
               
		/* Error handling is never a bad thing*/
		if(!empty($filter_order) && !empty($filter_order_Dir) ){
			$orderby = ' ORDER BY '.$filter_order.' '.$filter_order_Dir;
		}
              return $orderby;
  }
public function publish($cid = array(), $publish = 1)
	{

		$user 	=& JFactory::getUser();

		if (count( $cid ))
		{
			JArrayHelper::toInteger($cid);
		        $cids = implode( ',', $cid );

			$query = 'UPDATE `#__jtmb_members_directory`'
				. ' SET Published = '.(int) $publish
				. ' WHERE id IN ( '.$cids.' )';

			$this->_db->setQuery( $query );
			if (!$this->_db->query()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}




		return true;
	}


}
