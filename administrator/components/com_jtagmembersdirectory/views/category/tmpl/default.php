<?php
/**
 * Joomla! 1.5 component JtagMember
 *
 * @version $Id: controller.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage JtagMember
 * @license GNU/GPL
 *
 * Jtag Member
 */

// no direct access
defined('_JEXEC') or die('Restricted access');             
?>
<script type="text/javascript">
	//<![CDATA[
	function submitbutton(pressbutton) {
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		if (trim( document.adminForm.name.value ) == "") {
			alert( '<?php echo JText::_(JTAG_MEMBER_CATEGORY_FORM_NO_NAME_ERROR, true);?>' );
		} else {
			submitform( pressbutton );
		}
	}
	//]]>
</script>

<form action="index.php" method="post" name="adminForm" id="adminForm">
  <fieldset class="adminform">
    <legend><?php echo JText::_('JTAG_MEMBER_CATEGORY_FORM'); ?></legend>
    <table class="admintable">
     <tbody>
         <tr>
            <td class="key"><?php echo JText::_(JTAG_MEMBER_CATEGORY_FORM_NAME); ?></td>
            <td>
				<input type="text" maxlength="255" value="<?php echo $this->row->name; ?>" id="name" name="name" class="text_area k2TitleBox">
			</td>
			
	 </tr>
	  <tr>
            <td class="key"><?php echo JText::_(JTAG_MEMBER_CATEGORY_FORM_DESCRIPTION); ?></td>
            <td>
                <?php// echo $this->editor; ?>
				<input type="text" maxlength="255" value="<?php echo $this->row->description; ?>" id="description" name="description" class="text_area k2TitleBox">
            </td>
			
	 </tr>
	<tr>
	    <td class="key"><?php echo JText::_(JTAG_MEMBER_CATEGORY_FORM_PUBLISHED); ?></td>
	    <td>
			
            <?php echo JText::_(JTOOL_BAR_HELPER_NO);?>&nbsp;&nbsp;<input type="radio" class="inputbox" value="0" id="published0" name="published" >
			<!--<label for="published0" style="min-width:30px;" >No</label>
	        <div style="clear:both;"></div>-->
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<?php echo JText::_(JTOOL_BAR_HELPER_YES);?>&nbsp;&nbsp;<input type="radio" class="inputbox" checked="checked" value="1" id="published1" name="published">
			<!--<label for="published1"  style="min-width:30px;" >Yes</label>-->
        </td>
	</tr>						
      </tbody>
    </table>
  </fieldset>
  <input type="hidden" name="option" value="com_jtagmembersdirectory" />
  <input type="hidden" name="view" value="<?php echo JRequest::getVar('view');?>" />
  <input type="hidden" name="task"   value="add" />
  <input type="hidden" name="c" value="categories" />
  <input type="hidden" name="action" value="save" />
  <input type="hidden" name="id" value="<?php echo $this->row->id;?>" />
        
  <?php echo JHTML::_( 'form.token' );?>
</form>
