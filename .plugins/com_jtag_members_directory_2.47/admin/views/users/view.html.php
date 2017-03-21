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

class JtagMemberDirectoryViewusers extends JViewLegacy
{

function display($tpl = null)
	{
	
	   JToolBarHelper::title('Recent Joomla Users');
       JToolBarHelper::addNew('addNew','Import to Jtag Members Directory');

		JToolBarHelper::cancel();
		parent::display($tpl);
	}
}
