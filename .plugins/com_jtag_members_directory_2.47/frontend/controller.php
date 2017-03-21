<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory ? Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');
class JTagMemberDirectoryController extends JControllerLegacy
{
  function __construct()
  {
	parent::__construct();
    $this->registerTask('brwoseList', 'brwoseList');
    $this->registerTask('cloud', 'cloud');
    $this->registerTask('profile', 'profile');
    $this->registerTask('savememberdetails','savememberdetails');
    $this->registerTask('showgallery','showgallery');
     $model = $this->getModel('members');
        $on = $model->auto_sync();
        if($on->auto_sync == 1){
        $this->importJoomlaUsers();
        }

  }
  
  function browseList()
  {
    JRequest::setVar('view', 'browseList');
     $version = new JVersion();
       switch($version->RELEASE)
{

 case "1.5" :
 $params =& JComponentHelper::getParams('com_jtagmembersdirectory');
     $search = $params->getValue('search');
 
 break;

 default :
    require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';
    $params = & JTagHelper::getComponentParameters('com_jtagmembersdirectory');
    $search = $params->search; 
  
}
     
    //Next line added by sarika
  	$categories = $this->getModel('members')-> getCategories();
  	$customfield = $this->getModel('members')-> checkCustomField();  
  	$rows = $this->getModel('members')->checkMember();  
    $users = $this->getModel('members')->getData();
//    die(var_dump($users));
    $pagination = $this->getModel('members')->getPagination();
    $member=$this->getModel('memberdetails');
    $options= $member->getOrCreateOption(1);
    $customsearch =$member->custom();
    $custom= $this->getModel('members')->retrive_custom();
 // print_r($customsearch);
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
      //force raw format
      $document = &JFactory::getDocument();
      $doc = &JDocument::getInstance('raw');
      $document = $doc;
      $document->setMimeEncoding('text/html');
      
      $view = $this->getView('browseList', 'raw', 'jtagmemberdirectoryView');
    }
    else
    {
      $view = $this->getView('browseList', 'html', 'jtagmemberdirectoryView');
    }
   // $view->assign('view', $v);
    $view->assign('categories', $categories);
    $view->assign('users', $users);
    $view->assign('pagination_data', $pagination->getData());
     $view->assign('customfield',$customfield);
     $view->assign('rows',$rows);
     $view->assign('options', $options);
     $view->assign('custom', $custom);
     $view->assign('search', $search);
     $view->assign('customsearch', $customsearch);
    
    parent::display();
  }
  
  function memberdetails()
  {

    require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'tables' . DS . 'membersdirectory.php';
     JRequest::setVar('view', 'memberdetails');
      $version = new JVersion();
       switch($version->RELEASE)
      {

        case "1.5" :
        $params =& JComponentHelper::getParams('com_jtagmembersdirectory');
        $adminedit = $params->getValue('adminedit');
 
        break;

       default :
          require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';
          $params = & JTagHelper::getComponentParameters('com_jtagmembersdirectory');
          $adminedit = $params->adminedit; 
          $vcf = $params->vcf;
  
     }
//  $profile = $this->getModel('memberdetails')->getData(JRequest::getInt('mid'));
    $profile = $this->getModel('memberdetails')->getTable('MembersDirectory');
    $profile->load(JRequest::getInt('mid'));
    $ucategories = $this->getModel('memberdetails');
    $ucat=$ucategories->getassignedcat(JRequest::getInt('mid'));
    $member=$this->getModel('memberdetails');
    $options= $member->getOrCreateOption(1);
    $attachments= $member->getattachments(JRequest::getInt('mid'));
    $customfield=$this->getModel('memberdetails');
    $custom= $customfield->retrive_custom(JRequest::getInt('mid'));
   
    $view = $this->getView('memberdetails', 'html', 'jtagmemberdirectoryView');
   
    $view->assign('adminedit', $adminedit);
    $view->assign('ucategories', $ucat);
    $view->assign('profile', $profile);
    $view->assign('options', $options);
    $view->assign('attachments', $attachments);
    $view->assign('custom', $custom);
    $view->assign('vcf', $vcf);
    
    parent::display();
  }


  function editmemberdetails()
  {
    require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'tables' . DS . 'membersdirectory.php';
    require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';
          $params = & JTagHelper::getComponentParameters('com_jtagmembersdirectory');
          $adminedit = $params->adminedit; 
          JRequest::setVar('view', 'editmemberdetail');
          $user =& JFactory::getUser();
          $uid = $user->id;
          $ud=$this->getModel('editmemberdetail')->getMemberDetail(JRequest::getInt('mid'));
     $flag=0;
    foreach($user->groups as $group)
   {
    if($group=="8" || $group=="6" || $group=="7")
    {
     $flag=1; 
    }
   }
    if($uid==$ud->user_id || ($flag== 1 && ($adminedit=='1' ||$adminedit=='2'||$adminedit=='3')))
    
    {
    $member = $this->getModel('editmemberdetail')->getMemberDetail(JRequest::getInt('mid'));
    $filters=$this->getModel('memberdetails');
    $options= $filters->getOrCreateOption(1);
  // die(var_dump($member));
//	$member->member_profile=htmlspecialchars_decode($member->member_profile);
	$member->member_profile=nl2br($member->member_profile);
//   die(var_dump($member->member_profile));
        $assignedcat = $this->getModel('members')-> assignCategories(JRequest::getInt('mid'));

     $galary=$this->getModel('editmemberdetail')->selectgalary(JRequest::getInt('mid'));
     $attachment= $this->getModel('editmemberdetail')->selectattachments(JRequest::getInt('mid'));
     $customFields = $this->getModel('editmemberdetail')->getCustomFields(JRequest::getInt('mid'));
     $view = $this->getView('editmemberdetail', 'html', 'jtagmemberdirectoryView');
    $view->assign('options', $options);
    $view->assign('member', $member);
    $view->assign('ascat', $assignedcat);
    $view->assign('attachment', $attachment);
    $view->assign('galary', $galary);
    $view->assign('customfields',$customFields);
    parent::display();
   }
   else
    {
   //$link = JRoute::_('index.php', false);
   $this->setRedirect('index.php?option=com_jtagmembersdirectory');
    }
  }

  function savememberdetails()
  {
    // $data = JRequest::getVar('jform');
   $post = JRequest::get( 'post' );
   $data=$post[jform];
    $member = $this->getModel('editmemberdetail')->saveMemberDetail($data);
    //$this->browseList();
   $link = JRoute::_('index.php', false);
   $this->setRedirect($link, JText::_('Information updated successfully'));
  }
  
 
  function showgallery()
  {
  	$user_id = JRequest::getInt(mid);
  	JRequest::setVar('view', 'membergallery');
    $images = $this->getModel('memberdetails')->retrieveGalleryImages($user_id);
    
    $view = $this->getView('membergallery', 'html', 'jtagmemberdirectoryView');
    $view->assign('images',$images);
    parent::display();
  }
 function Sendrequest()
  {
    $u =& JFactory::getUser();
    //print_r($u);exit;
    $member = $this->getModel('members')->saverequest($u->id,$u->name,$u->username,$u->email);

   $link = JRoute::_('index.php', false);
		 	$this->setRedirect($link, JText::_('Request send successfully . Please wait for administrator confirmation'));  
   
  }
/* Added by Priyanka Bhorkade on 28th Dec 2012. Functionality to delete indivisual gallary images */  
function deleteCheckboxGal(){
    
$post = JRequest::get('post');  
$data = $post['jform'];
$array = array_keys($data, "on");
$user_id = JRequest::getInt(mid);
$model = $this->getModel('memberdetails');
$member = $model->delete_gallery($array, $user_id);
    $link = JRoute::_('index.php?option=com_jtagmembersdirectory&task=showgallery&mid='.$user_id, false);
   $this->setRedirect($link, JText::_('Image Deleted Successfully'));

  }
 
  /*end */
  
  function importJoomlaUsers(){
		$model =$this->getModel('members');
		$model->addFromJoomla();
	}

function attachment()
{
// place this code inside a php file and call it f.e. "download.php"
$path = JPATH_BASE."/components/com_jtagmembersdirectory/assets/attachments/"; // change the path to fit your websites document structure
$fullPath = $path.$_GET['download_file'];
// print_r($fullPath);exit;
if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
        header("Content-type: application/pdf"); // add here more headers for diff. extensions
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
        break;
        default;
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);
exit;
// example: place this kind of link into the document where the file download is offered:
// <a href="download.php?download_file=some_file.pdf">Download here</a> 
}
function getvcf()
{
  
    $profile = $this->getModel('memberdetails')->getTable('MembersDirectory');
    $profile->load(JRequest::getInt('id')); 
   // print_r($profile);exit;
     $countries = require_once (JPATH_COMPONENT . DS . 'helpers' . DS . 'countries_list.php');
    
      $card_name =$profile->name;
      $view = &$this->getView('memberdetails', 'html');
      $view->setLayout('vcf');
      $view->assignRef('profile', $profile);
      $view->assignRef('countries', $countries);
      $code = $view->loadTemplate();

      header("Cache-Control: public");
      header("Content-Description: File Transfer");
      header("Content-Disposition: attachment; filename=".$card_name.".vcf");
      header("Content-Type: application/text");

      echo $code;
      exit();
}

}

    

