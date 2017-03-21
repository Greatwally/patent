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

jimport('joomla.application.component.model');

class jtagmemberdirectoryModeluserslist extends JModelLegacy
{
  function retrieveUsers($filter = '')
  {
/* Start-Snehal Kulkarni-05/09/2012-Retrive Email and Register Date from database*/
    $query = 'SELECT u.id, u.username, u.name,u.email,u.registerDate, md.id AS md_profile FROM #__users u';
    $query .= ' LEFT JOIN #__jtmb_members_directory md ON u.id = md.user_id';
/* End-Snehal Kulkarni-05/09/2012-Retrive Email and Register Date from database*/
//    $query .= ' WHERE md.id IS NULL';
    if ($filter != '')
    {
      $query .= ' WHERE (u.username LIKE "%'.$filter.'%" OR u.name LIKE "%'.$filter.'%")';
    }
//    $query .= 'ORDER BY u.username ASC';
    $query .= ' LIMIT 10';
    
    $this->_db->setQuery($query);
    
    return $this->_db->loadAssocList();
  }
}
