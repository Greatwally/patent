<?php
/**
 * Joomla! 1.5 component Jtagobject
 *
 * @version $Id: controller.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage Jtagobject
 * @license GNU/GPL
 *
 * Jtag object
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class JtagobjectDirectoryViewusers extends JViewLegacy
{

function display($tpl = null)
	{
	
	   JToolBarHelper::title('Recent Joomla Users');
       JToolBarHelper::addNew('addNew','Import to Jtag objects Directory');

		JToolBarHelper::cancel();
		parent::display($tpl);
	}
}
