<?php 
/*------------------------------------------------------------------------
# com_joomlatag_members_directory – Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

function jtag_countries_list($add_empty = false) {
  if ($add_empty)
  {
    $countries[] = JHTML::_('select.option', '', JText::_('JTAG_SELECT_COUNTRY'));
  }
  $countries[] = JHTML::_('select.option', 'FR', 'Фрунзенский');
  $countries[] = JHTML::_('select.option', 'СТ', 'Центральный');
  $countries[] = JHTML::_('select.option', 'SV', 'Советский');
  $countries[] = JHTML::_('select.option', 'PM', 'Первомайский');
  $countries[] = JHTML::_('select.option', 'PT', 'Партизанский');
  $countries[] = JHTML::_('select.option', 'ZV', 'Заводской');
  $countries[] = JHTML::_('select.option', 'OK', 'Октябрьский');
  $countries[] = JHTML::_('select.option', 'LN', 'Ленинский');
  $countries[] = JHTML::_('select.option', 'MC', 'Московский');

  return $countries;
}
