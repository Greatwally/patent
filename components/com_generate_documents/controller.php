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

jimport('joomla.application.component.controller');

/**
 * Class Generate_documentsController
 *
 * @since  1.6
 */
class Generate_documentsController extends JController
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   mixed    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return   JController        This object to support chaining.
	 *
	 * @since    1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		parent::display($cachable, $urlparams);

		return $this;
	}
}
