<!--Start- Snehal Kulkarni-Added for filtering display options and custom fields-- 18th dec-2012-->
<?php 
/*------------------------------------------------------------------------
# com_joomlatag_members_directory  Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');
class JTagMemberDirectoryControllerFilters extends JControllerLegacy {

        function __construct($config = array())
	{
		parent::__construct($config);   
                   
                
                // Register Extra tasks
		//$this->registerTask( 'list',  'list' );
   }
   public function display($cachable = false, $urlparams = false)
	{ 

		 
		 JRequest::setVar('view', 'filters');
                 			 $member = $this->getModel('dispayoptions');
                                         $option = $member->getOrCreateOption(1);
                                        // echo "I am here";exit;
                                         $custom = $member->getCustomfields(1);

                                         //print_r($custom);exit;
                                 	 $view = $this->getView('filters', 'html', 'jtagmemberdirectoryView');
					 $view->assign('member', $option);
                                         $view->assign('custom', $custom);
		 parent::display($cachable, $urlparams);
	}
}
//Start- Snehal Kulkarni-Added for filtering display options and custom fields-- 18th dec-2012-->
