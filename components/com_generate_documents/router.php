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

JLoader::registerPrefix('Generate_documents', JPATH_SITE . '/components/com_generate_documents/');

/**
 * Route builder
 *
 * @param   array &$query A named array
 *
 * @return    array
 */
function Generate_documentsBuildRoute(&$query)
{
	$segments = array();
	$view     = null;

	if (isset($query['task']))
	{
		$taskParts  = explode('.', $query['task']);
		$segments[] = implode('/', $taskParts);
		$view       = $taskParts[0];
		unset($query['task']);
	}

	if (isset($query['view']))
	{
		$segments[] = $query['view'];
		$view       = $query['view'];
		unset($query['view']);
	}

	if (isset($query['id']))
	{
		if ($view !== null)
		{
			$segments[] = $query['id'];
		}
		else
		{
			$segments[] = $query['id'];
		}

		unset($query['id']);
	}

	return $segments;
}

/**
 * Converts URL segments into query variables.
 *
 * @param   array  $segments  A named array
 *
 * Formats:
 *
 * index.php?/generate_documents/task/id/Itemid
 *
 * index.php?/generate_documents/id/Itemid
 *
 * @return array
 */
function Generate_documentsParseRoute($segments)
{
	$vars = array();


	// View is always the first element of the array
	$vars['view'] = array_shift($segments);
	$model        = Generate_documentsHelpersGenerate_documents::getModel($vars['view']);

	while (!empty($segments))
	{
		$segment = array_pop($segments);

		// If it's the ID, let's put on the request
		if (is_numeric($segment))
		{
			$vars['id'] = $segment;
		}
		else
		{
			$vars['task'] = $vars['view'] . '.' . $segment;
		}
	}

	return $vars;
}
