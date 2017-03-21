<?php

/* ------------------------------------------------------------------------
  # com_joomlatag_members_directory ? Jtag Members Directory
  # ------------------------------------------------------------------------
  # author    Joomlatag.com
  # copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
  # Websites  http://www.joomlatag.com
  # Support   http://www.joomlatag.com/Forum/
  # @version  2.0
  # @license  http://www.joomlatag.com/Different-articles/software-license.html
  ------------------------------------------------------------------------- */
// No direct access
defined('_JEXEC') or die;
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.view');
jimport( 'joomla.registry.registry' );
class jtagmemberdirectoryViewbrowseList extends JViewLegacy {

    function display($tpl = null) {
 $version = new JVersion();
//print_r($version->RELEASE);exit;
        $app = & JFactory::getApplication();
        $template = $app->getTemplate();

      $version = new JVersion();
       switch($version->RELEASE)
{
  case "3.0" :
    //JHTML::_( 'behavior.mootools' ); // load mootools first
    JHtmlBehavior::framework();
    break;
  case "3.1" :
    //JHTML::_( 'behavior.mootools' ); // load mootools first
    JHtmlBehavior::framework();
    break;
  default :
    JHTML::_( 'behavior.mootools' ); // load mootools first
   
}

        JFactory::getDocument()->addStyleSheet(JURI::root() . 'components/com_jtagmembersdirectory/assets/css/styles.css');
        if (file_exists(JURI::root() . 'components/com_jtagmembersdirectory/assets/css/' . $template . '.css')) {
            JFactory::getDocument()->addStyleSheet(JURI::root() . 'components/com_jtagmembersdirectory/assets/css/' . $template . '.css');
        }
        JFactory::getDocument()->addScript(JURI::root() . 'components/com_jtagmembersdirectory/assets/js/form-defaults.js');
        JFactory::getDocument()->addScript(JURI::root() . 'components/com_jtagmembersdirectory/assets/js/form-submit.js');

        //include helpers
        require_once (JPATH_COMPONENT . DS . 'helpers' . DS . 'partial.php');
        require_once (JPATH_COMPONENT_ADMINISTRATOR    . DS . 'helpers' . DS . 'countries.php');
        require_once (JPATH_COMPONENT . DS . 'helpers' . DS . 'helper.php');


 $user =& JFactory::getUser();
               
$params = & JTagHelper::getComponentParameters('com_jtagmembersdirectory');

$catwise=$params->category;

if($user->id == 0 AND $catwise==1)
{
//print_r("hi");exit;
JFactory::getApplication()->enqueueMessage( JText::_('YOU_ARE_NOT_PERMITTED_TO_VIEW_THIS_PAGE'), 'error' );
                 return false;
        
}

   switch($version->RELEASE)
{

case "1.5":
 if ( comparams('public') != 0 ) {
            $user =& JFactory::getUser();
            if ($user->get('id') && $user->get('id') != '0') {
                 parent::display($tpl);
            } else {
                 JFactory::getApplication()->enqueueMessage( JText::_('YOU_ARE_NOT_PERMITTED_TO_VIEW_THIS_PAGE'), 'error' );
                 return false;
            }
        } else {
            parent::display($tpl);
        }

       
break;

default :
         require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';

        //Next two lines added by sarika
		//$model      = $this->getModel();
		//$categories = $model->getCategories();
		
//print_r($params->contact_category);exit; //$this->assignRef('categories',$categories);

$params = & JTagHelper::getComponentParameters('com_jtagmembersdirectory');

             $flag=0;
        if ( $params->contact_category != 1 ) 
        {
          if($params->contact_category==0)
         {
            parent::display($tpl);
          }
           else
          { 
            $user =& JFactory::getUser();
            $groups=array_keys($user->get('groups'));
            foreach($groups as $group)
            {
            
             if($group==$params->contact_category)

             {
               $flag=1;   
               break;     
             }         
           }
         
            if ($user->get('id') && $user->get('id') != '0'&& ($flag==1 || $params->contact_category == 1.5)) {
                 parent::display($tpl);
            } 
            else {
                 JFactory::getApplication()->enqueueMessage( JText::_('YOU_ARE_NOT_PERMITTED_TO_VIEW_THIS_PAGE'), 'error' );
                 return false;
                }
           }
        
        } 
       else 
        {
            parent::display($tpl);
        }
       
}

}
    }
