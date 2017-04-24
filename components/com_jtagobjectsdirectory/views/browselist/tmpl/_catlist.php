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
$flag=0;
$link = JRoute::_('index.php?option=com_jtagobjectsdirectory&amp;Itemid='.JRequest::getVar('Itemid'));
$u =& JFactory::getUser();
 $parts = explode('/',getcwd());      
if(empty($rows)&& $u->id == 0)
{
   $flag=1;
}
foreach ($rows as $user){
if($u->id==$user->user_id || $u->id == 0 )
{
  $flag=1;
break;
}
} 
//var_dump(JRequest::getVar('customtext'));
?>
<script>

function DoTheCheck() {
//alert( document.getElementsByName('customtext'));

   if(document.getElementById("customvalue").value == "Select")
{
this.cat['customtext'].style.visibility="hidden";
// document.getElementsByName('customtext').style.visibility="hidden";    
}
  else
{
   this.cat['customtext'].style.visibility="visible";
  // document.getElementsByName('customtext').style.visibility="visible";
}
   //window.location=document.cat.custom.options[document.cat.custom.selectedIndex].value; 
  
}

  window.addEvent('domready', function() {
  var defs = new dwDefaults({
    collection: $$('input.jtag-dv')
  });
});
</script>

<form action="<?php echo JRoute::_('') ?>" name="cat"  method="get" id="jtag_md_search_form">
<br/>
  <input type="hidden" name="option" value="com_jtagobjectsdirectory" rel="adfjkasfjadsl;f" />
<span style="padding-left:400px">
<?php if($flag==0 && ($customfield[0]->allow_nonregistered_users_from_frontend == 1 || empty($customfield))){?>
<input type="submit" name="submit" value="Add in objects directory">
<?php } ?>
</span>	

<br/><br/>
<?php $cat=0; $custm=0;?>
<?php if($search!="Select Search Field to Hide"): ?>
<?php foreach($search as $field) : ?>
<?php if($field=="category"): ?>
  <?php $cat=1; ?>
<?php endif; ?>
<?php if($field=="custom"): ?>
  <?php $custm=1; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<?php $params = & JTagHelper::getComponentParameters('com_jtagobjectsdirectory');
 $catwise=$params->category;?>
<?php if($cat==0 And $catwise==0): ?>
       <b><?php echo JText:: _('JTAG_CATEGORY');?></b>

	   <select name="categories" size="1"
		onChange="window.location=document.cat.categories.options[document.cat.categories.selectedIndex].value">
		<option value="<?php echo JRoute::_('index.php');?>"><?php echo JText:: _('JTAG_SELECT_CATEGORY');?></option>
       <?php if (count($categories) > 0): ?>
			<?php foreach ($categories as $cat):$link = JRoute::_('index.php?option=com_jtagobjectsdirectory&amp;Itemid='.JRequest::getVar('Itemid').'&amp;cat_id='.$cat->id) ?>
	         <option value="<?php echo $link; ?>" <?php if($_GET['cat_id'] == $cat->id) { ?> selected <?php } ?>><?php echo $cat->name; ?></option>
			<?php endforeach; ?>
		<?php endif; ?>
    </select>
<?php endif; ?>
<?php if($custm==0): ?>
<b><?php echo JText:: _('JTAG_CUSTOM_FIELDS');?></b>
 <select name="custom" id="customvalue" size="1" class="field"
		onChange="DoTheCheck()">
		<option value="Select"><?php echo JText:: _('JTAG_SELECT_CUSTOM');?></option>
       <?php if (count($custom) > 0): ?>
			<?php foreach ($custom as $cust):$link = JRoute::_('index.php?option=com_jtagobjectsdirectory&amp;Itemid='.JRequest::getVar('Itemid').'&amp;cust_id='.$cust->field_label) ?>
	         <option value="<?php echo $link; ?>" <?php if($_GET['cust_id'] == $cust->field_label) { ?> selected <?php } ?>><?php echo $cust->field_label; ?></option>
			<?php endforeach; ?>
		<?php endif; ?>
    </select>

 <input type="text" name="customtext"  class="field jtag-dv" value="<?php echo JRequest::getString('customtext') ?>" style="visibility:hidden" />

<?php endif; ?>

<input type="hidden" name="option" value="com_jtagobjectsdirectory" />
  <input type="hidden" name="task" value="Sendrequest" />
  <input type="hidden" name="controller" value="jtagobjectsdirectory" />
<?php echo JHtml::_('form.token'); ?>
 </form>
