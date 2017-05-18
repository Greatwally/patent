<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Generate_documents
 * @author     Rome Lindaro <pro_fesor@mail.ru>
 * @copyright  2017 Rome Lindaro
 * @license    GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 */


// No direct access
defined('_JEXEC') or die;
JFactory::getDocument()->addStyleSheet(JURI::root() . 'administrator/components/' . JRequest::getVar('option') . '/assets/css/generate_documents.css');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_generate_documents'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

JLoader::registerPrefix('Generate_documents', JPATH_COMPONENT_ADMINISTRATOR);

// Include dependencies
jimport('joomla.application.component.controller');

$controller = JController::getInstance('Generate_documents');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
