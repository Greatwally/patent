<?php
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory – Jtag objects Directory
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
<div class="jtag-object-search-container">
<form action="<?php echo JRoute::_('') ?>" class="jtag-search-objects" method="get" id="jtag_md_search_form">
  <input type="hidden" name="option" value="com_jtagobjectsdirectory" rel="adfjkasfjadsl;f" />
<!--  <div class="cl">&nbsp;</div>-->
  <label><?php echo JText:: _('JTAG_SEARCH_objectS');?></label>
<?php $count=0;$stat=0;$ct=0;$nm=0;?>
<?php if($search!="Select Search Field to Hide"): ?>
<?php foreach($search as $field) : ?>
<?php if($field=="country"): ?>
  <?php $count=1; ?>
<?php endif; ?>
<?php if($field=="state"): ?>
  <?php $stat=1; ?>
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
    <input type="text" name="name" class="field jtag-dv" value="<?php echo JRequest::getString('name') ?>" />
    <span class="overfield" id="test_id"><?php echo JText:: _('JTAG_SELECT_NAME');?></span>
  </div>
<?php endif; ?>

  <?php if($count==0): ?>
  <div class="holding country">
    <?php echo JHTML::_('select.genericlist', jtag_countries_list($add_empty = true), 'country', ' class="field" size="1"', 'value', 'text', JRequest::getString('country')); ?>
  </div>
<?php endif; ?>


   <?php if($stat==0): ?>
  <div class="holding state">
    <input type="text" name="state" class="field jtag-dv" value="<?php echo JRequest::getString('state') ?>" />
    <span class="overfield"><?php echo JText:: _('JTAG_SELECT_STATE');?></span>
  </div>
  <?php endif; ?>

 <?php if($ct==0): ?>
  <div class="holding city">
    <input type="text" name="city" class="field jtag-dv" value="<?php echo JRequest::getString('city') ?>" />
    <span class="overfield"><?php echo JText:: _('JTAG_SELECT_CITY');?></span>
  </div>
<?php endif; ?>

<?php if($ct==0 || $stat==0 || $count==0 || $nm==0) :?>
  <div class="holding btnp"><input type="submit" value="<?php echo JText:: _('JTAG_BUTTON_GO');?>" id="jtag-userseacr-submit" onclick="return false;" /></div>
<?php endif; ?>
</form>
  </div>
