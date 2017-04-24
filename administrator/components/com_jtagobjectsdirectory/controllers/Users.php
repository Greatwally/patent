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
class JtagobjectDirectoryControllerUsers extends JControllerLegacy {

        function __construct($config = array())
	{

		parent::__construct($config);      
                
                // Register Extra tasks
		$this->registerTask( 'add',  'display' );
	//		$this->registerTask( 'list', 'display' );
	    //$this->registerTask( 'category', 'category' );
	}
   
	function display()
	{
        switch($this->getTask())
		 {
             case 'save':
				{
                    JRequest::checkToken() or jexit('Invalid Token');
                    $post	= JRequest::get('post');
                    $model = & $this->getModel('users');
                    $model->add();
                 } 
					 break;
            
             case 'cancel' :
				{
					JRequest::checkToken() or jexit('Invalid Token');
					$this->setRedirect( 'index.php?option=com_jtagobjectsdirectory&c=Users' );;
                }
					break;

			
/*				case 'addNew' :
				{
							$mainframe = &JFactory::getApplication();
		$db = & JFactory::getDBO();
		$cid = JRequest::getVar('cid');
		print_r($cid);
		exit();
				
				}*/
      /*     	case 'save'     :
				{ 
				     JRequest::checkToken() or jexit( 'Invalid Token' );
                     $post	= JRequest::get('post');
                      $model      = $this->getModel('categories');
                            $cid        = JRequest::getVar('cid');
                            if ($model->store($post)) {
                                    $msg = JText::_(JTAG_CATEGORY_SAVED_MESSAGE );
                                    $link = 'index.php?option=com_jtagobjectsdirectory&c=categories';
                                    $msgType = 'message' ;
                            } else {
                                    $msg = $model->getError(); 
                                    $link = 'index.php?option=com_jtagobjectsdirectory&c=categories&task=edit&cid[]='.$cid;
                                    $msgType = 'error' ;
                            }
                            $this->setRedirect($link,$msg,$msgType);
                                
			} break;
			  	
					
                        case 'add'     :
			{ 
                            
                              JRequest::setVar('cid',NULL);
                              JRequest::setVar( 'hidemainmenu', 1 );
                              JRequest::setVar( 'view'  , 'category');
                              JRequest::setVar( 'edit', false ); 

                              
			} break;
			
           
                        case 'list':
			{
                            JRequest::setVar( 'view'  , 'categories' );
			}break;
			*/
			
                        default:
			{
                            JRequest::setVar( 'view'  , 'users' );
			}
		}
				$post	= JRequest::get('post');
				$model = & $this->getModel('users');
				$users = $model->getNewUsers();
				$view = $this->getView('users', 'html', 'jtagobjectdirectoryView');
			    $view->assign('users', $users); 
//				var_dump($users);
            	parent::display();
	} 
	
	  
}
?>
