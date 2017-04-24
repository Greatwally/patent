<!--Start-Snehal Kulkarni-Assign multiple categories to single user-08-11-2012*/-->

<?php
/* ------------------------------------------------------------------------
  # com_joomlatag_objects_directory � Jtag objects Directory
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

class jtagobjectdirectoryModelassigncategories extends JModelLegacy
{
  function retrievecategories($userid)
  {
     $sql = "SELECT id FROM #__jtmb_objects_directory where user_id=$userid";
     $this->_db->setQuery($sql);
     $res = $this->_db->loadObject();
     $mid = $res->id;

     $sql = "SELECT objectid FROM #__jtmb_assigned_categories where objectid=$mid";
     $this->_db->setQuery($sql);
     $res = $this->_db->loadObject();

     $memid = $res->objectid;

    if(count($memid))
    {
      $catsql="SELECT id,name FROM #__jtmb_categories WHERE id NOT IN (Select CONCAT(cat_id) FROM #__jtmb_assigned_categories 
      where objectid = $mid ) and trash=0";
 
     }
     else
     {
      $catsql="SELECT id,name FROM #__jtmb_categories where trash=0";
     }
      $this->_db->setQuery($catsql);

     return $this->_db->loadAssocList();
  }

  function insertusers($userid,$catid)
   {
     $sql = "Select objectid,cat_id from #__jtmb_assigned_categories where objectid=(SELECT id FROM #__jtmb_objects_directory
     where user_id=$userid) AND cat_id = $catid";
     $this->_db->setQuery($sql);
     $res = $this->_db->loadAssocList();

     $sql ="INSERT INTO `#__jtmb_assigned_categories` (objectid, cat_id) VALUES ((SELECT id FROM #__jtmb_objects_directory
     where user_id= $userid),'$catid')" ;
     $this->_db->setQuery($sql);
     $this->_db->query();
     return;
   }

  function deleteuser($userid)
  {
    $sql ="DELETE FROM `#__jtmb_assigned_categories` WHERE objectid=(SELECT id FROM #__jtmb_objects_directory where user_id=$userid)" ;
    $this->_db->setQuery($sql);
    $this->_db->query();
  }
 
   function categaries($userid)
  {
    $sql = "SELECT id FROM #__jtmb_objects_directory where user_id=$userid";
    $this->_db->setQuery($sql);
    $res = $this->_db->loadObject();
    $mid = $res->id;

    $catsql="SELECT d.cat_id,c.name FROM #__jtmb_categories  as c, #__jtmb_assigned_categories as d where d.objectid = $mid and c.id= d.cat_id ";
    $this->_db->setQuery($catsql);
    $cat = $this->_db->loadAssocList();
 
    return $cat;
   }  

   function retriveobjectid($userid)
  {
    $sql = "SELECT id FROM #__jtmb_objects_directory where user_id=$userid";
    $this->_db->setQuery($sql);
    $res = $this->_db->loadObject();
    $mid = $res->id;

    return $mid;
  }

   function Deleteobjectcat($id)
  {
    $sql ="DELETE FROM `#__jtmb_assigned_categories` WHERE objectid=$id" ;
    $this->_db->setQuery($sql);
    $this->_db->query();
  }
  
  function showcategory($userid)
{ 
 
  $sqlquery="SELECT c.id, c.user_id, c.name, c.Email, c.phone_no, GROUP_CONCAT( DISTINCT b.name ) AS cat
  FROM `#__jtmb_objects_directory` c
  LEFT JOIN `#__jtmb_assigned_categories` d ON c.id = d.objectid
  LEFT JOIN `#__jtmb_categories` b ON d.cat_id = b.id WHERE d.objectid=$userid GROUP BY c.user_id";
  $this->_db->setQuery($sqlquery);
  $cat = $this->_db->loadAssocList();
 return $cat;
}
}

/*End-Snehal Kulkarni-Assign multiple categories to single user-08-11-2012*/
