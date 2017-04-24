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
class JTagobjectDirectoryControllerCategories extends JControllerLegacy {

        function __construct($config = array())
	{
		parent::__construct($config);      
               // Register Extra tasks
		$this->registerTask( 'add',  'display' );
		$this->registerTask( 'edit', 'edit' );
		$this->registerTask( 'list', 'display' );
	    //$this->registerTask( 'category', 'category' );
	}
   
	public function display($cachable = false, $urlparams = false)
	{
        switch($this->getTask())
		 {
             case 'trash':
				{
                    JRequest::checkToken() or jexit('Invalid Token');
                    $model = & $this->getModel('categories');
                    $model->trash();
                } 
					 break;
             case 'publish':
				{
                    JRequest::checkToken() or jexit('Invalid Token');
                    $model = & $this->getModel('categories');
                    $model->publish();
                }
					break;
             case 'orderdown':
				{
					JRequest::checkToken() or jexit('Invalid Token');
                    $model = & $this->getModel('categories');
                    $model->orderdown();
                }
					break;
             case 'orderup':
				{
                    JRequest::checkToken() or jexit('Invalid Token');
					$model = & $this->getModel('categories');
					$model->orderup();
                }
					break;
             case 'unpublish':     
				{
                   JRequest::checkToken() or jexit('Invalid Token');
				   $model = & $this->getModel('categories');
				   $model->unpublish();
                 }
					break;
             case 'cancel' :
				{
					JRequest::checkToken() or jexit('Invalid Token');
					$this->setRedirect( 'index.php?option=com_jtagobjectsdirectory&c=categories' );;
                }
					break;
             case 'restore'     :
				{
				    JRequest::checkToken() or jexit('Invalid Token');
                    $model = & $this->getModel('categories');
					$model->restore();
                } 
					break;
             case 'remove'     :
				{
                    JRequest::checkToken() or jexit('Invalid Token');
                    $model = & $this->getModel('categories');
					$model->remove();
                } break;
           	case 'save'     :
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
			
                 case 'saveFormAndNew'     :
				{ 
				     JRequest::checkToken() or jexit( 'Invalid Token' );
                                 
                                      $post= JRequest::get('post');
                                      $model= $this->getModel('categories');
                                      $cid = JRequest::getVar('cid');
                                   if ($model->store($post)) {
                                      JRequest::setVar('view', 'category');
                                      JFactory::getApplication()->enqueueMessage(JText::_('JTAG_CATEGORY_SAVED_MESSAGE'));
                                     } 
                                  else {
                                        $msg = $model->getError(); 
                                        $link = 'index.php?option=com_jtagobjectsdirectory&c=categories&task=edit&cid[]='.$cid;
                                        $msgType = 'error' ;
                                        $this->setRedirect($link,$msg,$msgType);
                                      }
                                                   
			         } break;	
					
                        case 'add'     :
			{ 
                            
                              JRequest::setVar('cid',NULL);
                              JRequest::setVar( 'hidemainmenu', 1 );
                              JRequest::setVar( 'view'  , 'category');

                              JRequest::setVar( 'edit', false ); 

                              
			} break;
			
                        case 'edit'    :
			{
							JRequest::setVar('view', 'category');
							 JRequest::checkToken() or jexit('Invalid Token');
				            $model = & $this->getModel('categories');
							$row = $model->editCat(); 
							//JRequest::setVar( 'view'  , 'category');
							$view = $this->getView('category', 'html', 'jtagobjectdirectoryView');
							$view->assign('row', $row);

			} break;
                    
			
                        case 'list':
			{
                            JRequest::setVar( 'view'  , 'categories' );
			}break;
			
			
                        default:
			{
                            JRequest::setVar( 'view'  , 'categories' );
			}
		}
            	parent::display($cachable, $urlparams);
	}   
}
?>
