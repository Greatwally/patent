<?php
/**
 * @package     JTAG Help Desk
 * @subpackage  Components
 * ------------------------------------------------------------------------
 * @author      JoomlaTag.com
 * @copyright   Copyright (C) 2011 Joomla Tag. All Rights Reserved.
 * @link        http://www.joomlatag.com
 * @license     GNU/GPL
*/

defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');
jimport('joomla.application.component.helper');

//JModel::addIncludePath(JPATH_SITE.DS.'components'.DS.'com_dpcalendar'.DS.'models', 'DPCalendarModel');
class JFormFieldContact extends JFormField {

	protected $type = 'Contact';
      
       

	// getLabel() left out

	public function getInput() {
//require_once JPATH_ADMINISTRATOR.DS.'components'.DS.'com_jtagobjectsdirectory'.DS.'helpers' . DS . '_helper.php';
//$params = & JTagHelper::getComponentParameters('com_jtagobjectsdirectory');
  //print_r($params->public);
      $db = JFactory::getDbo();
		$db->setQuery(
			'SELECT a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level' .
			' FROM #__usergroups AS a' .
			' LEFT JOIN '.$db->quoteName('#__usergroups').' AS b ON a.lft > b.lft AND a.rgt < b.rgt' .
			' GROUP BY a.id, a.title, a.lft, a.rgt' .
			' ORDER BY a.lft ASC'
		);
		$options = $db->loadObjectList();
          
      $com_users =& JComponentHelper::getComponent('com_users', true );
      if ( !$com_users->enabled )
        return '<label>'.JText::_('Group is missing').'</label>';
    
      $html  = '<select name="'.$this->name.'" id="'.$this->id.'">';
 if($this->value==1.5)
{
 $html .= '<option value="1.5" selected=selected >'.JText::_('Any Logged in user').'</option>';
 $html .= JHtml::_('select.options', $options, 'value', 'text', $this->value );
}
else
{
  $html .= JHtml::_('select.options', $options, 'value', 'text', $this->value );
  $html .= '<option value="1.5 " >'.JText::_('Any Logged in user').'</option>';
}
    
      $html .= '</select>';

      return $html;
	}
}
