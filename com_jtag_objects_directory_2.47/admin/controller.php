<?php
/**
 * Joomla! 1.5 component Jtagminicart
 *
 * @version $Id: controller.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage Jtagobjectdirectory
 * @license GNU/GPL
 *
 * Jtag objectdirectory
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
jimport( 'joomla.application.component.controller' );

/**
 * Jtagminicart Controller
 *
 * @package Joomla
 * @subpackage Jtagobjectdirectory
 */
class JTagobjectDirectoryControllerobjects extends JControllerLegacy {

        function __construct($config = array())
	{
		parent::__construct($config);      
                
                // Register Extra tasks
		$this->registerTask( 'add',  'display' );
		$this->registerTask( 'edit', 'edit' );
		$this->registerTask( 'list', 'display' );

		$this->registerTask('objects', 'objects');
        $this->registerTask('object', 'object');
        $this->registerTask('applyobject', 'applyobject');
        $this->registerTask('retrieveUsers', 'retrieveUsers');
        $this->registerTask('saveobject', 'saveobject');
        $this->registerTask('saveFormAndNew', 'saveFormAndNew');
        $this->registerTask('deleteobjects', 'deleteobjects');
        $this->registerTask('cancel', 'cancel');
        $this->registerTask('addobject', 'addobject');
        $this->registerTask('category', 'category');
        $model = $this->getModel('dispayoptions');
        $on = $model->auto_sync();
        if($on->auto_sync == 1){
        $this->importJoomlaUsers();
        }
    }
 
	function display()
	{
        switch($this->getTask())
		 {
             case 'objects':
				 {
			        JRequest::setVar('view', 'objects');
			     }
					 break;
          case 'object':
				{
                     JRequest::setVar('view', 'object');
					 $object = $this->getModel('object')->getOrCreateobject(JRequest::getInt('mid'));
                                          $galary=$this->getModel('object')->selectgalary(JRequest::getInt('mid'));
                                          $attachment= $this->getModel('object')->selectattachments(JRequest::getInt('mid'));
                                          $display = $this->getModel('dispayoptions');
                                         $custom = $display->retrive_customFields(JRequest::getInt('mid'));
                                        // print_r($custom);exit;
					 $view = $this->getView('object', 'html', 'jtagobjectdirectoryView');
					 $view->assign('object', $object);
                                         $view->assign('custom', $custom);
                                         $view->assign('galary', $galary);
                                         $view->assign('attachment', $attachment);
                                           JRequest::setVar('view', 'object');
                                         $model = $this->getModel('assigncategories'); 
                                          $catmodel = $model->showcategory(JRequest::getInt('mid')); 
                                          // die(var_dump($catmodel));    
                                          $view->assign('usercat', $catmodel);   
                }
					break;

            case 'category' :
                {
                     JRequest::setVar('view', 'category');
                 
                }break;

             case 'applyobject':
				{
						try 
							{
                                               
    						 $object = $this->_applyobjectChanges();
                                                 $link = JRoute::_('index.php?option=com_jtagobjectsdirectory&controller=jtagobjectsdirectory&task=object&mid=' .$object->id, false);
					        $this->setRedirect($link, JText::_('JTAG_object_SAVED_MESSAGE'));
							} 
						catch (Exception $e)
							{
								JError::raiseNotice(100, $e->getMessage());
							} 
                }
					break;
             case 'retrieveUsers':
				{
                    JRequest::setVar('view', 'userslist');
				        //force raw format
			        $document = &JFactory::getDocument();
			        $doc = &JDocument::getInstance('raw');
			        $document = $doc;
			        $document->setMimeEncoding('text/html');
			        $users = $this->getModel('userslist')->retrieveUsers(JRequest::getString('filter'));
			        $view = $this->getView('userslist', 'raw', 'jtagobjectdirectoryView');
			        $view->assign('users', $users);
                }
					break;
             case 'saveobject':
				{
                    try {
							 $this->_applyobjectChanges();
							 $link = JRoute::_('index.php?option=com_jtagobjectsdirectory', false);
							 $this->setRedirect($link, JText::_('JTAG_object_SAVED_MESSAGE'));
				        } 
					catch (Exception $e)
						{
				            JError::raiseNotice( 100, $e->getMessage() );
				        }  
                 }break;
             case 'saveFormAndNew':     
				{
                    try {
							 $this->_applyobjectChanges();
											        } 
					catch (Exception $e)
						{
				            JError::raiseNotice( 100, $e->getMessage() );
				        }  
                      JRequest::setVar('view', 'object');
                      $view = $this->getView('object', 'html', 'jtagobjectdirectoryView');
                      $display = $this->getModel('dispayoptions');
                          $custom = $display->retrive_customFields(JRequest::getInt('mid'));
                          $view->assign('custom', $custom);
                    JFactory::getApplication()->enqueueMessage(JText::_('JTAG_object_SAVED_MESSAGE'));
                 }
					break;
             case 'deleteobjects' :
				{
                                  
				 $ids = JRequest::getVar('cid');
                                 $modelcat = $this->getModel('assigncategories');
                                 $model = $this->getModel('object');

				 $object = $model->getTable('objectsDirectory');
					 foreach ($ids as $id)
						 {
                                                         $catmodel = $modelcat->Deleteobjectcat($id);
                                                         $model->deletecustommap($id);
                                                         $model->deletegal($id);
                             $model = $this->getModel('object');
                             $model->softDelete($id);
//							 $object->delete($id);
	     					}
			        $link = JRoute::_('index.php?option=com_jtagobjectsdirectory', false);
			        $this->setRedirect($link, JText::_('JTAG_object_DELETED_MESSAGE'));
                }
					break;
/* Start - Snehal Kulkarni- Import all users -date-06/09/2012*/
              case 'addAll'    :
                          {
                             $userid="";
    			$db = &JFactory::getDbo(); 
    			$sql = "UPDATE `#__jtmb_objects_directory` SET deleted_at = 0";
	   			$db->setQuery($sql);
	   			$db->query();
    			$sqlquery = "SELECT user_id FROM  #__jtmb_objects_directory ";
   				$db->setQuery($sqlquery); 
    			$rows1 = $db->loadObjectList();
   				 $userid =array();
    			 $total=count($rows1);
       			
          		$sql = "SELECT * FROM #__users ";
	  		$db->setQuery($sql); 
	  		$rows = $db->loadObjectList();
			
			$name =array();
      			$id =array();
			$email =array();
			$reg_date =array();
			if (count($rows))
			{
				
			foreach($rows AS $item) 
			{
			   $flag = 1;
   			   $id=$item->id;
  			   $name=$item->name;
  			   $email=$item->email;
                           $reg_date=$item->registerDate;
			if($total!== 0)
			{
			 foreach($rows1 AS $data) 
    			 {
			
    			 $userid=$data->user_id;
  			 if($userid===$id)
                         {
				$flag = 0;
                               $upsql = "UPDATE `#__jtmb_objects_directory` SET deleted_at = 0,name='$name',Email='$email' where user_id='$id' ";
	   			$db->setQuery($upsql);
	   			$db->query();
				break;  
			 }
			 }
			}
			if($flag===1)
			{
			
     		          $sql = "INSERT INTO #__jtmb_objects_directory (user_id, name,Email)
                           VALUES ('$id', '$name', '$email')" ;
    			$db->setQuery($sql);
                       
                         $db->query();
			}
			}
  		 	$link = JRoute::_('index.php?option=com_jtagobjectsdirectory', false);
		 	$this->setRedirect($link, JText::_('JTAG_object_ALL_object_IMPORTED_MESSAGE'));
			}

                    }  break;
            /* End - Snehal Kulkarni- Import all users -date-06/09/2012*/
             case 'cancel'     :
				{
				     $link = JRoute::_('index.php?option=com_jtagobjectsdirectory', false);
					 $this->setRedirect($link, JText::_('JTAG_object_OPERATION_CANCELLED'));
                } 
					break;
             case 'addobject'     :
				{
                    JRequest::checkToken() or jexit('Invalid Token');
                    $model = & $this->getModel('objects');
					$model->remove();
                } break;
          		
                        case 'add'     :
			{ 
                            
                                 JRequest::setVar('view', 'object');
								 $object = $this->getModel('object')->getOrCreateobject(JRequest::getInt('mid'));
							     $view = $this->getView('object', 'html', 'jtagobjectdirectoryView');
						         $view->assign('object', $object);
                              
			} break;
			
                        case 'edit'    :
			{
							 
							$mainframe = &JFactory::getApplication();
                            $cid = JRequest::getVar('cid');
						  $mainframe->redirect('index.php?option=com_jtagobjectsdirectory&view=object&cid='.$cid[0]);
							
			} break;
                    
			
                        case 'list':
			{
                            JRequest::setVar( 'view'  , 'objects' );
			}
                       
                        case 'accept':
                        {
                              $db = &JFactory::getDbo(); 
                              $ids = JRequest::getVar('cid');
                              $keys = array_keys($ids);
                              $reg_date=& JFactory::getDate();
                             //print_r($reg_date);exit;
                     
                              for($i=0;$i<=count($keys);$i++)
                              {
                                   $sql = "SELECT user_id,email,name,username FROM #__jtmb_object_request WHERE user_id='".$ids[$keys[$i]]."'";
	                           $db->setQuery($sql); 
	                           $rows = $db->loadObjectList();

                                   $name=$rows[0]->name;
                                   $username=$rows[0]->username;
                                   $email=$rows[0]->email;
                                   $userid=$rows[0]->user_id;
                                                // die(var_dump($rows));                  
                                  foreach($rows as $data)
                                  {
                            
    			            
                                    $del="DELETE FROM #__jtmb_object_request WHERE user_id ='".$ids[$keys[$i]]."';";
                                   $db->setQuery($del);
                                   $db->query();
                               
                                $sql1 = "INSERT INTO #__jtmb_objects_directory (user_id, name,Email,display_in_frontend)
                               VALUES ('$userid', ' $username', '$email','1')" ;
    			       $db->setQuery($sql1);
   		               $db->query();
                            //  die(var_dump($db->query()));   
   			         $link = JRoute::_('index.php?option=com_jtagobjectsdirectory&c=adduser', false);
				 $this->setRedirect($link, JText::_('User is added as a register user'));
                                   
                                   

                                   }
                              }
                         
                        }break;

                        case 'reject' :
                         {
                             $db = &JFactory::getDbo();
                             $ids = JRequest::getVar('cid');
                              $keys = array_keys($ids);
                              for($i=0;$i<=count($keys);$i++)
                              {
                                   $del="DELETE FROM #__jtmb_object_request WHERE user_id ='".$ids[$keys[$i]]."';";
                                    $db->setQuery($del);
                                   $db->query();
                              }
                                 $link = JRoute::_('index.php?option=com_jtagobjectsdirectory&c=adduser', false);
				 $this->setRedirect($link, JText::_('User request rejected'));
                         }break;
						

                        default:
			{
                            JRequest::setVar( 'view'  , 'objects' );
			}
		}
            	parent::display();
	}  
	
	function importJoomlaUsers(){
		$model =$this->getModel('users');
		$model->addFromJoomla();
	}
           /* Start - Snehal Kulkarni- Import groups -date-15/10/2012*/
         function addGroups()
          {
             require_once JPATH_ADMINISTRATOR.'/components/com_jtagobjectsdirectory/views/objects/groups.php';
          }
         function importGroup()
          {
              $data = JRequest::getVar('jform');
              $userid="";
              $db = &JFactory::getDbo(); 
    	      $sqlquery = "SELECT user_id FROM  #__jtmb_objects_directory ";
   	      $db->setQuery($sqlquery); 
    	      $rows1 = $db->loadObjectList();
   	      $userid =array();
              $total=count($rows1);
               
              
                $name=$data['id'];
       		$sql = "SELECT id FROM #__usergroups where title= '".$name."';";
  		$db->setQuery($sql); 
  		$rows = $db->loadObjectList();
                $uid=$rows[0]->id;

                $sqluid = "SELECT user_id FROM #__user_usergroup_map where group_id= '".$uid."';";
                $db->setQuery($sqluid); 
  		$rowsuid = $db->loadObjectList();
                $userid =array();
                if (count($rowsuid))
		  {
			
         	     foreach($rowsuid AS $item) 
			{

                          $userid=$item->user_id;
					$sql = "update `#__jtmb_objects_directory` SET `deleted_at` = '0' where `user_id` = '$userid'";
			     	  $db->setQuery($sql);
   		               $db->query();
                          $sqluid = "SELECT * FROM #__users  where id= '".$userid."';";
                          $db->setQuery($sqluid); 
  		          $rowsuserid = $db->loadObjectList();
                          $name =array();
      			  $id =array();
			  $email =array();
			   $reg_date =array();
                       
                           if (count( $rowsuserid))
			   {
				
			     foreach( $rowsuserid AS $data) 
			     {
                                $flag = 1;
                                $id=$data->id;
  			        $name=$data->name;
  			        $email=$data->email;
                                $reg_date=$data->registerDate;
                              if($total!== 0)
			       {
			        foreach($rows1 AS $data) 
    			         {
			           $userid=$data->user_id;
  			            if($userid===$id)
                                    {
				      $flag = 0;
				      break;  
			             }
			         }
			       }
                              if($flag===1)
			     {
 		               $sql = "INSERT INTO #__jtmb_objects_directory (user_id, name,Email)
                               VALUES ('$id', '$name', '$email')" ;
    			       $db->setQuery($sql);
   		               $db->query();
                                             
                             } 
                              $link = JRoute::_('index.php?option=com_jtagobjectsdirectory', false);
		 	      $this->setRedirect($link, JText::_('JTAG_object_ALL_object_IMPORTED_MESSAGE'));
                           }    
                         }
                      }
                   }
                  else
                 { 
                    JError::raiseNotice( 100, 'There are no users in this group' );
                    $link = JRoute::_('index.php?option=com_jtagobjectsdirectory', false);
		    $this->setRedirect($link);   
                  }
               }
                 /* End - Snehal Kulkarni- Import groups -date-15/10/2012*/              

	 function retrieveProfileData() {
        JRequest::setVar('view', 'objectdata');
        $object = $this->getModel('object')->getOrCreateobject(JRequest::getInt('mid'));

        $view->assign('object', $object);

        parent::display();
    }

    function _applyobjectChanges() {
    
     //   $data = JRequest::getVar('jform');
	// Start - Chnaged by kirti -  07-09-2012  - For TinyMCE Editor 
        $post = JRequest::get('post');  
        $data = $post['jform'];
              
        //print_r(JRequest::getInt('id'));exit;
        // End - Chnaged by kirti -  07-09-2012  - For TinyMCE Editor 
        $model = $this->getModel('object');
      //  print_r(JRequest::getInt('id'));exit;
        $object = $model->getOrCreateobject(JRequest::getInt('id'));
       $model->save($data);
     
        return $object;
       
    }

/*Start-Snehal Kulkarni-Assign multiple categories to single user-08-11-2012*/
  function assignCategories()
  {
        $post = JRequest::get('post');  
        $data = $post['jform'];
        $userid=$data['user_id'];
       if($userid !=null)
       {
        $object = $this->_applyobjectChanges();
	JRequest::setVar('view', 'usercategories');
	$model = $this->getModel('assigncategories');
        $object = $model->retrievecategories($userid);
        $categories=$model->categaries($userid);
        $view = $this->getView('usercategories', 'html', 'jtagobjectdirectoryView');
        $view->assign('cat', $object);
        $view->assign('uid',$userid);
        $view->assign('category', $categories); 
	//die(var_dump($view));
        parent::display();
      }
      else
      {
       JError::raiseNotice( 100, 'Please select user first' );
       $link = JRoute::_('index.php?option=com_jtagobjectsdirectory&controller=jtagobjectsdirectory&task=object&mid='.$userid, false);
       $this->setRedirect($link); 
      }  
    
    }

function assigncat()
{
  $id = JRequest::getVar('jform');
  $cnt=count($id['with_perms']); 
  $post = JRequest::get('post'); 
  $userid=$post['user'];
  $model = $this->getModel('assigncategories');
  $mid=$model->retriveobjectid($userid);
  $object = $model->deleteuser($userid);

  for($j=0;$j<$cnt;$j++)
  {
    $catid=$id['with_perms'][$j];
    $object = $model->insertusers($userid,$catid);
 
  } 		          
    $link = JRoute::_('index.php?option=com_jtagobjectsdirectory&controller=jtagobjectsdirectory&task=object&mid='.$mid, false);
    $this->setRedirect($link); 
 }
/*End-Snehal Kulkarni-Assign multiple categories to single user-08-11-2012*/
  function save_displayoptions()
  {
    $post = JRequest::get('post');  
    $data = $post['jform'];
    $model = $this->getModel('dispayoptions');
    $object = $model->getOrCreateOption();
    if($model->save($data))
    {
        $link = JRoute::_('index.php?option=com_jtagobjectsdirectory&c=filters', false);
        $this->setRedirect($link, JText::_('Settings saved successfully'));
    }
   else
   {
       JError::raiseNotice( 100, 'Settings not saved' );
       $link = JRoute::_('index.php?option=com_jtagobjectsdirectory&c=filters', false);
        $this->setRedirect($link);   
    }
       // return $object;
  }

 function cancel()

 {
     $link = JRoute::_('index.php?option=com_jtagobjectsdirectory', false);
     $this->setRedirect($link, JText::_('JTAG_object_OPERATION_CANCELLED'));
  } 
  
  /* Priyanka Bhorkade 08-01-2013 To add the today's registered users to jtag objects. */
    function addNew(){
		$mainframe = &JFactory::getApplication();
		$db = & JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		$model =& $this->getModel('users');
		$ret_val = $model->addToobjects($cid);
		if($ret_val){
			 $link = JRoute::_('index.php?option=com_jtagobjectsdirectory&c=Users', false);
			 $this->setRedirect($link,'Added Successfully');
		}
  } /* end */

 function orderup()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$model = $this->getModel('object');
//echo "I am here";exit;
		//print_r($model);exit;
                $model->move(-1);
		$this->setRedirect( 'index.php?option=com_jtagobjectsdirectory');
	}

	function orderdown()
	{

		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$model = $this->getModel('object');
		$model->move(1);

		$this->setRedirect( 'index.php?option=com_jtagobjectsdirectory');
	}

      function saveorder()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$cid 	= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$order 	= JRequest::getVar( 'order', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		JArrayHelper::toInteger($order);

		$model = $this->getModel('object');
		$model->saveorder($cid, $order);

		$msg = JText::_( 'NEW_ORDER_SAVED' );
		$this->setRedirect( 'index.php?option=com_jtagobjectsdirectory', $msg );
	}
function publish()
	{
        //print_r("hi");exit;
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);
                 // print_r($cid);exit;
		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'SELECT_ITEM_PUBLISH' ) );
		}

		$model = $this->getModel('objects');
		if(!$model->publish($cid, 1)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_jtagobjectsdirectory&c=objects' );
	}


	function unpublish()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'SELECT_ITEM_UNPUBLISH' ) );
		}

		$model = $this->getModel('objects');
		if(!$model->publish($cid, 0)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_jtagobjectsdirectory&c=objects' );
	}




}
 

?>
