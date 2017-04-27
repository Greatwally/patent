<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory � Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');

?>

<script>
  window.addEvent('domready', function() {
  var defs = new dwDefaults({
    collection: $$('input.jtag-dv')
  });
});
</script>
<div class="jtag-member-search-container">
<form action="<?php echo JRoute::_('') ?>" class="jtag-search-members" method="get" id="jtag_md_search_form">
  <input type="hidden" name="option" value="com_jtagmembersdirectory" rel="adfjkasfjadsl;f" />
<!--  <div class="cl">&nbsp;</div>-->
  <label><?php echo JText:: _('JTAG_SEARCH_MEMBERS');?></label>
<?php $count=0;$stat=0;$ct=0;$nm=0;?>
<?php if($search!="Select Search Field to Hide"): ?>
<?php foreach($search as $field) : ?>
<?php if($field=="country"): ?>
  <?php $count=1; ?>
<?php endif; ?>
<?php if($field=="city"): ?>
  <?php $ct=1; ?>
<?php endif; ?>
<?php if($field=="name"): ?>
  <?php $nm=1; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>

  <?php if($nm==0): ?>
  <div class="holding name">
    <input type="text" name="name" class="field jtag-dv" value="<?php echo JRequest::getString('name') ?>" placeholder="<?php echo JText:: _('JTAG_SELECT_NAME');?>"/>

  </div>
<?php endif; ?>
<?php if($count==0): ?>
  <div class="holding country">
    <?php echo JHTML::_('select.genericlist', jtag_countries_list($add_empty = true), 'country', ' class="field" size="1"', 'value', 'text', JRequest::getString('country')); ?>
  </div>
<?php endif; ?>
 <?php if($ct==0): ?>
  <div class="holding city">
    <input type="text" name="city" class="field jtag-dv" value="<?php echo JRequest::getString('city') ?>" placeholder="<?php echo JText:: _('JTAG_SELECT_CITY');?>"/>
  </div>
<?php endif; ?>

<?php if($ct==0 || $stat==0 || $count==0 || $nm==0) :?>
  <div class="holding btnp"><input type="submit" value="<?php echo JText:: _('JTAG_BUTTON_GO');?>" id="jtag-userseacr-submit" onclick="return false;" /></div>
<?php endif; ?>
</form>
  </div>
