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
// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

?>

<form action="" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<table >
    <tbody>
      	

        <input type="hidden" size="30" class="inputbox required" value="<?php echo $this->member->user_id; ?>" id="jform_user_id" name="jform[user_id]" />

      	<tr>
        	<td>
          		<label for="jform_name"><?php echo  JText::_(JTAG_MEMBER_NEW_FORM_NAME);?><span class="star">&nbsp;*</span></label>
        	</td>
        	<td>
          		<input type="tcountriesext" size="30" class="inputbox required"  value="<?php echo $this->member->name; ?>" id="jform_user_name" name="jform[name]" />
        	</td>
      	</tr>

		    <tr>
        	<td>
          		<label for="jform_email"><?php echo  JText::_(JTAG_MEMBER_NEW_FORM_EMAIL);?><?php if($this->options->display_email==2):?><span class="star">&nbsp;*</span> <?php endif;?></label>
        	</td>
              
        	<td>
<?php if($this->options->display_email==2 || empty($this->options->display_email) ):?>
          		<input type="text" size="30" class="inputbox required" value="<?php echo $this->member->Email; ?>" id="jform_user_email" name="jform[email]" />
    <?php else:?>
<label for="jform_email"><?php echo  $this->member->Email;?></label>
 <?php endif;?>
        	</td> 
         
              
      	</tr>
       
      	<tr>
        	<td>
                        <?php //if(!empty($item->name)):?>
          		<label for="jform_category"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_CATEGORY);?></label>
                       <?php //endif;?>
        	</td>
        	<td>
                        <?php if($this->options->display_category==2 || empty($this->options->display_category)):?><!--Check if allowed to edit from front end -->
				    <select name="jform[cat_id][]" id="jform_cat_id" multiple="multiple" >

					     <?php foreach($this->categories as $item): $flag=0;?>
                         <?php foreach($this->ascat as $assigncat) : ?>
                               <?php if($assigncat->cat_id == $item->id ):  $flag=1;?>
                               <?php endif;?>
                         <?php endforeach; ?>
                   
                  <option value="<?php echo $item->id?>" <?php echo $flag==1? ' selected="selected"' : '';  ?> ><?php echo $item->name; ?></option>
					     <?php endforeach;  ?> 
	          </select>  
<?php else:?>
                   <label for="jform_category"><?php echo $item->name; ?></label>
 <?php endif;?>
            
        	</td>
      	</tr>
	  
  
  		<tr>
    		<td>
      			<label for="jform_country"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_COUNTRY);?> <span class="star">&nbsp;*</span></label>
    		</td>
    		<td>
                    <?php if($this->options->display_country==2 || empty($this->options->display_country) ):?>
      			<?php echo JHTML::_('select.genericlist',  jtag_countries_list(), 'jform[country]', 'size="1"', 'value', 'text', $this->member->country); ?>
<?php else:?>
                   <label for="jform_country"><?php echo $this->member->country; ?></label>
 <?php endif;?>
    		</td>
  		</tr>

		  <tr>
			  <td>
          <label for="jform_city"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_CITY);?> <span class="star">&nbsp;*</span></label>
        </td>
        <td>
                        <?php if($this->options->display_city==2 || empty($this->options->display_city) ):?>
        		<input type="text" size="30" class="inputbox required" value="<?php echo $this->member->city; ?>" id="jform_user_city" name="jform[city]" />
<?php else:?>
                   <label for="jform_city"><?php echo $this->member->city; ?></label>
 <?php endif;?>
        		
      </td>
      </tr>
      
      	<tr>
        	<td>
          		<label for="jform_state"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_STATE );?></label>
        	</td>
        	<td>
                      <?php if($this->options->display_state==2 || empty($this->options->display_state) ):?>
          		<input type="text" size="30" class="inputbox required" value="<?php echo $this->member->state; ?>" id="jform_user_state" name="jform[state]" />
                <?php else:?>
                   <label for="jform_state"><?php echo $this->member->state; ?></label>
              <?php endif;?>
        	</td>
      	</tr>
      
      	<tr>
        	<td>
          		<label for="jform_phone_no"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_PHONE_NO);?> </label>
        	</td>
        	<td>
                       <?php if($this->options->display_phone_no==2 || empty($this->options->display_phone_no )):?>
          		<input type="text" size="30" class="inputbox required" value="<?php echo $this->member->phone_no; ?>" id="jform_user_phone_no" name="jform[phone_no]" />
                  <?php else:?>
                   <label for="jform_phone_no"><?php echo $this->member->phone_no; ?></label>
             <?php endif;?>

        	</td>
      	</tr>
      
      	<tr>
        	<td>
          		<label for="jform_facebook_page"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_FACEBOOK);?></label>
        	</td>
        	<td>
                   <?php if($this->options->display_facebook_page==2 || empty($this->options->display_facebook_page)):?>
	          <input type="text" size="30" class="inputbox required" value="<?php echo $this->member->facebook_page; ?>" id="jform_user_facebook_page" name="jform[facebook_page]" />
                      <?php else:?>
                   <label for="jform_facebook_page"><?php echo $this->member->facebook_page; ?></label>
                    <?php endif;?>
        	</td>
      	</tr>
      
      	<tr>
        	<td>
          		<label for="jform_twitter_page"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_TWITTER);?></label>
       	 	</td>
        	<td>
                         <?php if($this->options->display_twitter_page==2 || empty($this->options->display_twitter_page ) ):?>
          		<input type="text" size="30" class="inputbox required" value="<?php echo $this->member->twitter_page; ?>" id="jform_user_twitter_page" name="jform[twitter_page]" />
                        <?php else:?>
                   <label for="jform_twitter_page"><?php echo $this->member->twitter_page; ?></label>
                    <?php endif;?>
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
          		<img src= "<?php echo JURI::root();?>/components/com_jtagmembersdirectory/assets/profile_pictures/small/<?php echo $this->member->profile_picture ?>" />
        	</td>
      	</tr>
      	<?php endif; ?>
      	
      	  <!-- Added by Pratik on Oct 19, 2012 to support Gallery functionality-->
      
      <tr>
        <td>
          <label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_GALLERY);?></label>
        </td>
        <td>
             <?php if($this->options->display_gallery==2 || empty($this->options->display_gallery ) ):?>
          <input type="file" size="30" class="inputbox required" id="jform_user_gallery" name="jform_gallery_picture[]" multiple="multiple" />
          <?php if ($this->galary): ?>
            		<input type="checkbox" id="jform_user_delete_old_galary" name="jform[delete_old_galary]" />
            		<label for="jform_delete_old_galary"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_DELETE_CURRENT_GALARY);?></label>
          		<?php endif; ?>
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
      
<!--Start Yogesh Added display option from backend -->
    
      	<tr>  <?php if($this->options->display_profile==2 || empty($this->options->display_profile) ):?>
        	<td>
          		<label for="jform_profile"><?php echo JText::_(JTAG_MEMBER_NEW_FORM_MEMBER_PROFILE);?></label>
        	</td>
        	<td>
           		<?php
      	 	 			$editor =& JFactory::getEditor();
                			echo $editor->display('jform[member_profile]', htmlspecialchars($this->member->member_profile, ENT_QUOTES),'550','300','60','20',array('pagebreak','readmore'));
      				?>
        	</td>
<?php endif; ?>
      	</tr>
      <!--End Yogesh Added display option from backend -->
        <?php $user =& JFactory::getUser();?>
    
  <?php $do=(array_keys($user->groups));?>
<?php foreach($do as $d):?>

      <?php if($d==8 ): ?>
       <?php foreach ($this->customfields as $cf): if($cf->allow_edit==0 OR $cf->allow_edit==1):?>
        <tr>
        	<td>
                <label name="jform[<?php echo $cf->id ?>][label]"><?php echo $cf->field_label ?></label>
          </td>
          <td>
          
              <input type="text" size="30" class="inputbox required" name="jform[<?php echo $cf->id?>][value]" value="<?php echo $cf->field_value ?>" />
          </td>
      	</tr>
      	<?php endif; endforeach; ?>
        
<?php else:?>
<?php foreach ($this->customfields as $cf): if($cf->allow_edit==1 ):?>
        <tr>
        	<td>
                <label name="jform[<?php echo $cf->id ?>][label]"><?php echo $cf->field_label ?></label>
          </td>
          <td>
          
              <input type="text" size="30" class="inputbox required" name="jform[<?php echo $cf->id?>][value]" value="<?php echo $cf->field_value ?>" />
          </td>
      	</tr>
      	<?php endif; endforeach; ?>

<?php endif;?>

<?php endforeach; ?>

    </tbody>
  	</table>
    
    
    <input type="submit" name="Update" value="<?php echo JText:: _('JTAG_MEMBER_EDIT_SUBMIT');?>">
	  <input type="button" name="s" value="<?php echo JText:: _('JTAG_MEMBER_EDIT_CANCEL');?>" onclick="self.history.back(1)" >
    <input type="hidden" name="task" value="savememberdetails" />
    <input type="hidden" name="controller" value="JTagMemberDirectoryController" />

</form>

