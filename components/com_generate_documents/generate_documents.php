<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Generate_documents
 * @author     Rome Lindaro <pro_fesor@mail.ru>
 * @copyright  2017 Rome Lindaro
 * @license    GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Generate_documents', JPATH_COMPONENT);

// Execute the task.
$controller = JController::getInstance('Generate_documents');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
