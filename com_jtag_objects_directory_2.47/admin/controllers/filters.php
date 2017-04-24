<!--Start- Snehal Kulkarni-Added for filtering display options and custom fields-- 18th dec-2012-->
<?php 
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory  Jtag objects Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');
class JTagobjectDirectoryControllerFilters extends JControllerLegacy {

        function __construct($config = array())
	{
		parent::__construct($config);   
                   
                
                // Register Extra tasks
		//$this->registerTask( 'list',  'list' );
   }
   public function display($cachable = false, $urlparams = false)
	{ 

		 
		 JRequest::setVar('view', 'filters');
                 			 $object = $this->getModel('dispayoptions');
                                         $option = $object->getOrCreateOption(1);
                                        // echo "I am here";exit;
                                         $custom = $object->getCustomfields(1);

                                         //print_r($custom);exit;
                                 	 $view = $this->getView('filters', 'html', 'jtagobjectdirectoryView');
					 $view->assign('object', $option);
                                         $view->assign('custom', $custom);
		 parent::display($cachable, $urlparams);
	}
}
//Start- Snehal Kulkarni-Added for filtering display options and custom fields-- 18th dec-2012-->
