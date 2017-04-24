  <!--Start-Snehal Kulkarni-Added For multiple categories- 08-11-2012 -->
<?php
/*------------------------------------------------------------------------
# com_jtagcalendar – jtag Calendar v.2
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/
// No direct access
defined('_JEXEC') or die;
//die(var_dump($this->uid));
$u=$this->uid;

?>

<form action="index.php?option=com_jtagobjectsdirectory" method="post" name="adminForm" id="adminForm">
<table class="admintable">
    <tbody>
      <tr>
        <td colspan="3">
          <label for="jform_countries"><?php echo JText::_('SELECT_CATEGORIES_TO_ASSIGN');?> <span class="star">&nbsp;*</span></label>
        </td>
      </tr>

      <tr>
        <td><strong><?php echo JText::_('PER_CATEGORIES');?></strong></td>
        <td></td>
        <td><strong><?php echo JText::_('PER_ASSIGNED_CATEGORIES');?></strong></td>
      </tr>
      <tr>
        <td>
          <select class="required" size="20" name="jform[users]" multiple="multiple" id="select1" style="width: 230px">
             
          <?php foreach($this->cat as $categories): ?>
              <option value="<?php echo $categories['id'] ?>"><?php echo $categories['name'] ?></option>
            <?php endforeach; ?>

          </select>
        </td>
        <td align="center" style="padding: 5px;">
          <input type="button" id="add" value="<?php echo JText::_('PER_ADD_CATEGORY');?> &raquo;" style="width: 100px; height: 30px; margin-bottom: 3px;"/>
          <br />
          <input type="button" id="remove" value="&laquo; <?php echo JText::_('PER_REMOVE_CATEGORY');?>" style="width: 100px; height: 30px;"/>
        </td>
        <td>
          <select class="required" size="20" name="jform[with_perms][]" multiple="multiple" id="select2" style="width: 230px">
            <?php foreach($this->category as $cat): ?>
              <option value="<?php echo $cat['cat_id'] ?>"><?php echo $cat['name']?></option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      
    </tbody>
  </table>


  <input type="hidden" name="option" value="com_jtagobjectsdirectory" />
  <input type="hidden" name="task" value="hello" />
  <input type="hidden" name="boxchecked" value="0" />
  <input type="hidden" name="user" value="<?php echo $u ?>" />
 

</form>
  <!--End - Snehal Kulkarni -Added For multiple categories- 08-11-2012 -->
