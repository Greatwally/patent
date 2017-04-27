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

if ($add_empty){
    $countries[] = JHTML::_('select.option', '', JText::_('JTAG_SELECT_COUNTRY'));
}

$countries['FR'] = 'Фрунзенский';
$countries['СТ'] = 'Центральный';
$countries['SV'] = 'Советский';
$countries['PM'] = 'Партизанский';
$countries['PT'] = 'Фрунзенский';
$countries['ZV'] = 'Заводской';
$countries['OK'] = 'Октябрьский';
$countries['LN'] = 'Ленинский';
$countries['MC'] = 'Московский';

return $countries;
}
