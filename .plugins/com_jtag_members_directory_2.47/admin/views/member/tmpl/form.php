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

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

?>
<form action="index.php?option=com_jtagmembersdirectory" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
  <table class="admintable">
    <tbody>
     
     <tr>
        <td>
          <label for="jform_username"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_USER);?> <span class="star">&nbsp;*</span></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->user->username; ?>" id="jform_user_username" name="jform[username]" readonly="readonly" />
          <input type="hidden" value="<?php echo $this->member->user_id ?>" name="jform[user_id]" id="jform_user_id" />
        </td>
      </tr>
      <tr>
        <td>
          <label for="jform_name"><?php echo  JText::_(JTAG_MEMBER_NEW_FORM_NAME);?><span class="star">&nbsp;*</span></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->name; ?>" id="jform_user_name" name="jform[name]" />
        </td>
      </tr>
<!--Start- Snehal Kulkarni- 05/09/2012-Adding Email and Registeration date to the backend form-->
<tr>
        <td>
          <label for="jform_email"><?php echo  JText::_(JTAG_MEMBER_NEW_FORM_EMAIL);?><span class="star">&nbsp;*</span></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->user->email; ?>" id="jform_user_email" name="jform[email]" />
          
        </td>

<!--Commented By Pratik Munot on Oct 26, 2012 to remove the registration date field
      </tr>
       <tr>
        <td>
          <label for="jform_registerdate"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_REGISTRATION_DATE);?><span class="star">&nbsp;*</span></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->user->registerDate; ?>" id="jform_user_registerDate" name="jform[registerDate]" />
        </td>
      </tr> -->
<!--End- Snehal Kulkarni- 05/09/2012-Adding Email and Registeration date to the backend form-->
	  <!--Added By sarika-->
	  <!--
	   <tr>
        <td>
          <label for="jform_category">Category </label>
        </td>
        <td>
			<?php foreach($this->categories as $item): ?>
				<li>
						<input type="checkbox" name="categories[<?php echo $item->id; ?>]">
						<?php echo $item->name; ?>
				</li>
			<?php endforeach;  ?> 
f                            
        </td>
      </tr>
	  -->

        <!--Start-Snehal Kulkarni-Added For multiple categories- 08-11-2012 -->
	  <tr>
        <td>
          <label for="jform_category"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_CATEGORY);?></label>
        </td>
        <td>
            <input type="submit" name="category" value="Select category">  
<?php if(!empty($this->usercat)) : ?>
            <?php foreach($this->usercat as $item): ?>
         <label for="jform_category"><?php echo $item['cat'];?></label>  
         <?php endforeach; ?>  
  <?php endif; ?> 
        </td>
      </tr>
          <!--End-Snehal Kulkarni-Added For multiple categories- 08-11-2012 -->
	  <!--changes end-->
      <tr>
        <td>
          <label for="jform_country"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_COUNTRY);?> <span class="star">&nbsp;*</span></label>
        </td>
          <td>
          
      <?php echo JHTML::_('select.genericlist',  jtag_countries_list(), 'jform[country]', 'size="1"', 'value', 'text', $this->member->country); ?>
        </td>
        </tr>
      <tr>
        <td>
          <label for="jform_city"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_CITY);?> <span class="star">&nbsp;*</span></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->city; ?>" id="jform_user_city" name="jform[city]" />
         </td>
      </tr>
      <tr>
        <td>
          <label for="jform_state"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_STATE );?><span class="star">&nbsp;*</span></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->state; ?>" id="jform_user_state" name="jform[state]" />
          
        </td>
      </tr>
      <tr>
        <td>
          <label for="jform_phone_no"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_PHONE_NO);?> <span class="star">&nbsp;*</span></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->phone_no; ?>" id="jform_user_phone_no" name="jform[phone_no]" />
          
        </td>
      </tr>
      <tr>
        <td>
          <label for="jform_facebook_page"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_FACEBOOK);?></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->facebook_page; ?>" id="jform_user_facebook_page" name="jform[facebook_page]" />
          
       </td>
      </tr>
      <tr>
        <td>
          <label for="jform_twitter_page"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_TWITTER);?></label>
        </td>
        <td>
          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->twitter_page; ?>" id="jform_user_twitter_page" name="jform[twitter_page]" />
          
        </td>
      </tr>
      <tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_PROFILE_PICTURE);?></label>
        </td>
        <td>
          <input type="file" size="30" class="inputbox required" id="jform_user_profile_picture" name="jform_profile_picture" />
          <?php if ($this->member->profile_picture): ?>
            <input type="checkbox" id="jform_user_delete_old_picture" name="jform[delete_old_picture]" />
            <label for="jform_delete_old_picture"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DELETE_CURRENT_PICTURE);?></label>
          <?php endif; ?>
        </td>
      </tr>
      <?php if ($this->member->profile_picture): ?>
      <tr>
        <td>
          &nbsp;
        </td>
        <td>
          <img src="../components/com_jtagmembersdirectory/assets/profile_pictures/small/<?php echo $this->member->profile_picture ?>" />
        </td>
      </tr>
      <?php endif; ?>
      
      <!-- Added by Pratik on Oct 19, 2012 to support Gallery functionality-->
      
      <tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_GALLERY);?></label>
        </td>
        <td>
          <input type="file" size="30" class="inputbox required" id="jform_user_gallery" name="jform_gallery_picture[]" multiple="multiple" />
         <?php if ($this->galary): ?>
            <input type="checkbox" id="jform_user_delete_old_galary" name="jform[delete_old_galary]" />
            <label for="jform_delete_old_galary"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DELETE_CURRENT_GALARY);?></label>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_ATTACHMENTS);?></label>
        </td>
        <td>
          <input type="file" size="30" class="inputbox required" id="jform_user_attachment" name="jform_attachment[]" multiple="multiple" />
         <?php if ($this->attachment): ?>
            <input type="checkbox" id="jform_user_delete_old_galary" name="jform[attachment]" />
            <label for="jform_delete_old_galary"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DELETE_CURRENT_ATTACHMENTS);?></label>
          <?php endif; ?>
        </td>
      </tr>
      <!-- END -->
      
      <tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_MEMBER_PROFILE);?> <span class="star">&nbsp;*</span></label>
        </td>
        <td>
      <!--    <textarea type="text" cols="60" rows="15" class="inputbox required" id="jform_user_profile" name="jform[member_profile]" ><?php echo $this->member->member_profile; ?></textarea>           -->
        <!-- Start - Added by kirti - 07-09-2012 - For TinyMCE Editor -->
	<?php
	  $editor =& JFactory::getEditor();
          echo $editor->display('jform[member_profile]', htmlspecialchars($this->member->member_profile, ENT_QUOTES),'550','300','60','20',array('pagebreak','readmore'));
	?>
	<!-- End - Added by kirti - 07-09-2012 - For TinyMCE Editor -->
        </td>
      </tr>
      
      

      <!-- Added by Pratik M on Oct 11, 2012 -->
      <!-- the following code will display label and radio button which will control the editing of details from front end -->
      <tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_ALLOW_EDIT);?><span class="star">&nbsp;*</span></label>
        </td>
        <td>
          <input type="radio" size="30" class="inputbox required"<?php echo $this->member->allow_edit === '1' || $this->member->allow_edit === null ? ' checked="checked"' : ''; ?> value="1" id="jform_user_allow_edit_yes" name="jform[allow_edit]"/>
          <label for="jform_show_on_frontend_yes"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DISPLAY_ON_FRONTEND_YES);?></label>

          <input type="radio" size="30" class="inputbox required"<?php echo $this->member->allow_edit === '0' ? ' checked="checked"' : ''; ?> value="0" id="jform_user__allow_edit_yes" name="jform[allow_edit]" />
          <label for="jform_show_on_frontend_no"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DISPLAY_ON_FRONTEND_NO);?></label>
        </td>
      </tr>
      <!-- end  -->
<tr>
<td>
<label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DISPLAY_ON_FRONTEND);?><span class="star">&nbsp;*</span></label>
        
          <input type="radio" size="30" class="inputbox required"<?php echo $this->member->display_in_frontend === '1'|| $this->member->display_in_frontend === null ? ' checked="checked"' : ''; ?>
                 value="1" id="jform_user_show_on_frontend_yes" name="jform[display_in_frontend]"/>
          <label for="jform_show_on_frontend_yes"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DISPLAY_ON_FRONTEND_YES);?></label>
          <input type="radio" size="30" class="inputbox required"<?php echo $this->member->display_in_frontend === '0' ? ' checked="checked"' : ''; ?>
                 value="0" id="jform_user_show_on_frontend_no" name="jform[display_in_frontend]" />
          <label for="jform_show_on_frontend_no"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DISPLAY_ON_FRONTEND_NO);?></label>
</td>
</tr>
<tr>
<td>
<?php if(!empty($this->custom)){?>
<h4>
    Custom Fields:-
</h4>

</td>
</tr>

<?php foreach ($this->custom as $k => $customField): ?>
      <tr>
        <td>
          <label for="jform_cf<?php $k?> " > <?php echo $customField->field_label; ?><span class="star">&nbsp;*</span></label>
          
</td>
<td>
             <input type="text" size="30" class="inputbox required" name="jform[custom_fields][<?php $k?>][field_value]" value="<?php echo $customField->field_value ?>" />
      
</td>
</tr>
<?php endforeach; ?>
<?php }?>
         </tbody>
  </table>
  <input type="hidden" name="jform[id]" value="<?php echo $this->member->id; ?>" />
  <input type="hidden" name="option" value="com_jtagmembersdirectory" />
  <input type="hidden" name="view" value="member" />
  <input type="hidden" name="task" value="assignCategories" />
  <input type="hidden" name="boxchecked" value="0" />
  <input type="hidden" name="controller" value="jtagmembersdirectory" />

</form>
<div id="overall"></div>


<div id="userlist_box">
  <div id="search_users">
    <label for="username_filter"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_FILTER_USER);?> </label><input type="text" name="username_filter" id="username_filter" />
    <a onclick="jtagMDResetFilter(); return false;" class="reset_filter" title="Reset filter"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_FILTER_RESET);?> </a>
  </div>
  <div id="userlist_results"></div>
  <a href="#" onclick="jtagMDCloseOverall(); return false;" class="close"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_FILTER_CLOSE);?></a>
</div>


