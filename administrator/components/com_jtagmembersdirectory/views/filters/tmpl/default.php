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

<form action="index.php?option=com_jtagmembersdirectory" method="post" name="adminForm" id="adminForm">


<h3><span style="padding-left:300px">
Display Settings :-</span>
</h3>
<table class="admintable" border="bold" align="center">
    <tbody>


<th>Member Detail Fields</th>
<th>Display to non Register Users</th>
<th>Display on Frontend</th>
<th>Allow Edit from Frontend</th>


      <tr>
        <td>
          <label for="jform_email"><?php echo  JText::_(JTAG_MEMBER_NEW_FORM_EMAIL);?></label>
</td>
<td>
          <input type="checkbox" id="jform_user_display_nr_email" name="jform[display_nr_email]"  <?php echo $this->member->display_nr_email||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
<td>
<input type="checkbox"  id="jform_user_display_email" name="jform[display_email]" <?php echo $this->member->display_email||!$this->member? 'checked="checked"' : '' ?> value="1" />
</td>
<td>
<input type="checkbox"  id="jform_user_allowedit_email" name="jform[allowedit_email]" <?php echo $this->member->display_email==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
</td>
       </tr>
        <tr>
        <td>
          <label for="jform_country"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_COUNTRY);?> </label>
        </td>
       <td>
           <input type="checkbox" id="jform_user_display_nr_country" name="jform[display_nr_country]" <?php echo $this->member->display_nr_country||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
<td>          
<input type="checkbox"  id="jform_user_display_country" name="jform[display_country]" <?php echo $this->member->display_country||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
<td>          
<input type="checkbox"  id="jform_user_allowedit_country" name="jform[allowedit_country]" <?php echo $this->member->display_country==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
        </tr>
  <tr>
        <td>
          <label for="jform_city"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_CATEGORY);?> </label>
        </td>
      <td>
      <input type="checkbox" id="jform_user_display_nr_category" name="jform[display_nr_category]" <?php echo $this->member->display_nr_category||!$this->member? 'checked="checked"' : '' ?> value="1" />
      
</td><td>          
<input type="checkbox"  id="jform_user_display_category" name="jform[display_category]" <?php echo $this->member->display_category||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
<td>          
<input type="checkbox"  id="jform_user_allowedit_category" name="jform[allowedit_category]" <?php echo $this->member->display_category==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
      </tr>
        <tr>
        <td>
          <label for="jform_city"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_CITY);?> </label>
        </td>
      <td>
      <input type="checkbox" id="jform_user_display_nr_city" name="jform[display_nr_city]" <?php echo $this->member->display_nr_city||!$this->member? 'checked="checked"' : '' ?> value="1" />
      
</td><td>          
<input type="checkbox"  id="jform_user_display_city" name="jform[display_city]" <?php echo $this->member->display_city||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>

<td>          
<input type="checkbox"  id="jform_user_allowedit_city" name="jform[allowedit_city]" <?php echo $this->member->display_city==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
      </tr>
<tr>
        <td>
          <label for="jform_state"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_STATE );?></label>
        </td>
       <td>
     <input type="checkbox" id="jform_user_display_nr_state" name="jform[display_nr_state]" <?php echo $this->member->display_nr_state||!$this->member? 'checked="checked"' : '' ?> value="1" />
</td>
<td>          
<input type="checkbox"  id="jform_user_display_state" name="jform[display_state]" <?php echo $this->member->display_state||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
<td>          
<input type="checkbox"  id="jform_user_allowedit_state" name="jform[allowedit_state]" <?php echo $this->member->display_state==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
</tr>
<tr>
        <td>
          <label for="jform_phone_no"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_PHONE_NO);?> </label>
        </td>
    <td>
<input type="checkbox" id="jform_user_display_nr_phone_no" name="jform[display_nr_phone_no]" <?php echo $this->member->display_nr_phone_no||!$this->member? 'checked="checked"' : '' ?> value="1" />
   
          </td><td>
  <input type="checkbox"  id="jform_user_display_phone_no" name="jform[display_phone_no]" <?php echo $this->member->display_phone_no||!$this->member? 'checked="checked"' : '' ?> value="1" />
</td>
<td>          
<input type="checkbox"  id="jform_user_allowedit_phone_no" name="jform[allowedit_phone_no]" <?php echo $this->member->display_phone_no==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
</tr>
  <tr>
        <td>
          <label for="jform_facebook_page"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_FACEBOOK);?></label>
        </td>
        <td>
<input type="checkbox" id="jform_user_display_nr_facebook" name="jform[display_nr_facebook]" <?php echo $this->member->display_nr_facebook||!$this->member? 'checked="checked"' : '' ?> value="1" />
         
</td><td>        
<input type="checkbox"  id="jform_user_display_facebook_page" name="jform[display_facebook_page]" <?php echo $this->member->display_facebook_page ||!$this->member? 'checked="checked"' : '' ?> value="1" />
      </td>

<td>          
<input type="checkbox"  id="jform_user_allowedit_facebook_page" name="jform[allowedit_facebook_page]" <?php echo $this->member->display_facebook_page==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
</tr>
<tr>
        <td>
          <label for="jform_twitter_page"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_TWITTER);?></label>
        </td>
        <td>
<input type="checkbox" id="jform_user_display_nr_twitter" name="jform[display_nr_twitter]" <?php echo $this->member->display_nr_twitter||!$this->member ? 'checked="checked"' : '' ?> value="1" />
</td><td>        
  <input type="checkbox"  id="jform_user_display_twitter_page" name="jform[display_twitter_page]" <?php echo $this->member->display_twitter_page||!$this->member ? 'checked="checked"' : '' ?> value="1" />
</td>

<td>          
<input type="checkbox"  id="jform_user_allowedit_twitter_page" name="jform[allowedit_twitter_page]" <?php echo $this->member->display_twitter_page==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
        </td>
</tr>
<tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_MEMBER_PROFILE);?></label>
        </td>
        <td>
<input type="checkbox" id="jform_user_display_nr_twitter" name="jform[display_nr_profile]" <?php echo $this->member->display_nr_profile||!$this->member ? 'checked="checked"' : '' ?> value="1" />
</td><td>        
  <input type="checkbox"  id="jform_user_display_profile" name="jform[display_profile]" <?php echo $this->member->display_profile||!$this->member ? 'checked="checked"' : '' ?> value="1" />
</td>
<td>
<input type="checkbox"  id="jform_user_allowedit_profile" name="jform[allowedit_profile]" <?php echo $this->member->display_profile==2||!$this->member? 'checked="checked"' : '' ?> value="1" />
</td>

</tr>

<tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_GALLERY);?></label>
        </td>
    <td>
         <input type="checkbox" id="jform_user_display_nr_gallery" name="jform[display_nr_gallery]" <?php echo $this->member->display_nr_gallery? 'checked="checked"' : '' ?> value="1" />
</td>
<td>
   <input type="checkbox"  id="jform_user_display_gallery" name="jform[display_gallery]" <?php echo $this->member->display_gallery||!$this->member ? 'checked="checked"' : '' ?> value="1" />
</td>  
<td>
   <input type="checkbox"  id="jform_user_allowedit_gallery" name="jform[allowedit_gallery]" <?php echo $this->member->display_gallery==2||!$this->member ? 'checked="checked"' : '' ?> value="1" />
</td> 
 </tr>
 
 <tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(ALLOW_NONREGISTERED_USERS_FROM_FRONTEND);?></label>
        </td>
         <td></td>
        <td>
   <input type="checkbox" name="jform[allow_nonregistered_users_from_frontend]" <?php echo $this->member->allow_nonregistered_users_from_frontend||!$this->member ? 'checked="checked"' : '' ?> value="1" />
</td>  
 </tr>
  <tr>
  
    </tbody>
  </table>

<span style="display: block; text-align: center;padding:3em">
<b>
<?php echo JText::_(JTAG_AUTO_SYNC_JOOMLA_USERS);?></b>
   <input type="checkbox" name="jform[auto_sync]" <?php echo $this->member->auto_sync ? 'checked="checked"' : '' ?> value="0" />

  </span>



</td>

<h3><span style="padding-left:200px"> Custom Fields:-</span></h3>

          
<br>
<table class="admintable" border="bold" align="center">


<th>Custom Fields</th>
<th>Custom Field Name</th>
<th>Custom Field Label</th>
<th>Display to Non Register Users</th>
<th>Allow edit from front end</th>
 <?php foreach ($this->custom->custom_fields as $k => $customField): ?>
      <tr>
        <td>
          <label for="jform_cf<?php echo $k+1; ?>_label"><?php echo $k+1; ?></label>
        </td>
        <td>
          <label for="jform_cf<?php echo $k+1; ?>_label"></label> <input type="text" size="30" class="inputbox required" name="jform[custom_fields][<?php echo $k+1; ?>][field_name]" value="<?php echo $customField->field_name ?>" />
</td>
<td>
          <label for="jform_cf<?php echo $k+1; ?>_label"></label> <input type="text" size="30" class="inputbox required" name="jform[custom_fields][<?php echo $k+1; ?>][field_label]" value="<?php echo $customField->field_label ?>" />
</td>

<td>
          <input type="checkbox" id="jform_user_display_nr_cf" name="jform[custom_fields][<?php echo $k+1; ?>][display_nr_cf]" <?php echo $customField->display_nr_cf ? 'checked="checked"' : '' ?> value="1" />
        </td>
<td>
          <input type="checkbox" id="jform_allow_edit" name="jform[custom_fields][<?php echo $k+1; ?>][allow_edit]" <?php echo $customField->allow_edit ? 'checked="checked"' : '' ?> value="1" />
        </td>
      </tr>
    <?php endforeach; ?>
</table>


  <input type="hidden" name="option" value="com_jtagmembersdirectory" />
  <input type="hidden" name="task" value="hello" />
  <input type="hidden" name="boxchecked" value="0" />
  <input type="hidden" name="user" value="<?php echo $u ?>" />
 

</form>
  <!--End - Snehal Kulkarni -Added For multiple categories- 08-11-2012 -->
