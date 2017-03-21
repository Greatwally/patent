<?php
/**
 * Joomla! 1.5 component JtagMember
 *
 * @version $Id: controller.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage JtagMember
 * @license GNU/GPL
 *
 * Jtag Member
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class JtagMemberDirectoryViewCategory extends JViewLegacy
{

	function display($tpl = null)
	{
	     
		JRequest::setVar('hidemainmenu', 1);

		$model    = $this->getModel();
//echo "I am here";exit;
		$category = $model->getData();
           
        JFilterOutput::objectHTMLSafe( $category );

        if(!$category->id)
			$category->published=1;

		$this->assignRef('row', $category);
		$wysiwyg = & JFactory::getEditor();
		//$editor = $wysiwyg->display('description', $category->description, '100%', '250', '40', '5', array('pagebreak', 'readmore'));
	//	$this->assignRef('editor', $editor);
	      JToolBarHelper::title(JText::_('JTAG_BACKEND_CAT_TITLE'));
              JToolBarHelper::save('save');
              JToolBarHelper::save2new('saveFormAndNew');
		JToolBarHelper::cancel();
		//JToolBarHelper::apply('saveForm');
		
		parent::display($tpl);
	}

}
