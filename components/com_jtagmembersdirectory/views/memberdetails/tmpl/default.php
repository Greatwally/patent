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

    $user =& JFactory::getUser();
    $this->user_id = $user->id;
$id=JRequest::getInt('mid');
$flag=0;
foreach($user->groups as $group)
{
  if($group=="8")
{
  $flag=1;
}
if($group=="7")
{
   $flag=2;
}
if($group=="6")
{
   $flag=3;
}
}
  //  print_r($this->ucategories);
// print_r($this->custom);exit;
?>

<div class="Jtag_Members_Directory_details">
    <h2 class="page-title"><?php echo JText:: _('JTAG_MEMBER_DETAIL');?></h2>
    <div id="jtag-member-list">
    <!--<ul>-->
    <!--    <li>-->
	<?php if (($this->profile->user_id == $this->user_id && $this->profile->allow_edit) || (!empty($this->user_id) && $this->adminedit== '1' && $flag==1) ):?>
	 <div class="button-link"">
				<a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&task=editmemberdetails&mid='.$id) ?>" class="back-list"title ="Click to edit your Profile"><h4>Edit Profile</h4></a>
				</div>
<?elseif(($this->profile->user_id == $this->user_id && $this->profile->allow_edit) || (!empty($this->user_id) && $this->adminedit== '2' && $flag==2) ):?>
				

 <div class="button-link">
				<a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&task=editmemberdetails&mid='.$id) ?>" class="back-list"title ="Click to edit your Profile"><h4>Edit Profile</h4></a>
				</div>
<?elseif(($this->profile->user_id == $this->user_id && $this->profile->allow_edit) || (!empty($this->user_id) && $this->adminedit== '3' && $flag==3) ):?>
<div class="button-link">
				<a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&task=editmemberdetails&mid='.$id) ?>" class="back-list"title ="Click to edit your Profile"><h4>Edit Profile</h4></a>
				</div>

<?php endif; ?>
          <img width="225" src="components/com_jtagmembersdirectory/assets/profile_pictures/small/<?php echo $this->profile->profile_picture ? $this->profile->profile_picture : 'profile2.jpg' ?>" alt="" />
          <div class="info details">

            
          <?php if (($this->profile->user_id == $this->user_id && $this->profile->allow_edit) || (!empty($this->user_id) && $this->adminedit== '1'  && $flag==1) ):?>
			  
                <a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&task=editmemberdetails&mid='.$id) ?>" title ="Click to edit your Profile"><h2><?php echo $this->profile->name ?></h2></a>
<?elseif(($this->profile->user_id == $this->user_id && $this->profile->allow_edit) || (!empty($this->user_id) && $this->adminedit== '2'  && $flag==2) ):?>
 <a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&task=editmemberdetails&mid='.$id) ?>" title ="Click to edit your Profile"><h2><?php echo $this->profile->name ?></h2></a>
<?elseif(($this->profile->user_id == $this->user_id && $this->profile->allow_edit) || (!empty($this->user_id) && $this->adminedit== '3'  && $flag==3) ):?>
<a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&task=editmemberdetails&mid='.$id) ?>" title ="Click to edit your Profile"><h2><?php echo $this->profile->name ?></h2></a>
				<?php else:?>
                <h2><?php echo $this->profile->name ?></h2>    
				
            <?php endif; ?>

             











<?php if($this->user_id ==0):?>
   
   <?php if($this->options->display_nr_profile==1 ||!$this->options && $this->profile->member_profile):?>		
            <h4><?php echo JText:: _('JTAG_MEMBER_DETAIL_ABOUT_ME');?></h4>
            <div><?php echo nl2br($this->profile->member_profile) ?></div>
            <ul class="member-details">
           <?php endif;?>
            <?php else:?>
      <?php if( $this->profile->member_profile && ($this->options->display_profile|| !$this->options)):?>   

<h4><?php echo JText:: _('JTAG_MEMBER_DETAIL_ABOUT_ME');?></h4>
            <div><?php echo nl2br($this->profile->member_profile) ?></div>
            <ul class="member-details">
 <?php endif;?>
            <?php endif;?>  

			<?php if($this->user_id !=0):?>

				<?php if($this->profile->hasGallery==1 && $this->options->display_gallery == 1|| !$this->options): ?>		
					<li><a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&task=showgallery&mid='.$this->profile->user_id) ?>" title ="Click to checkout the gallery"><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_GALLERY');?></strong></a></li>
                                <?php endif;?> 
			           <?php elseif($this->options->display_nr_gallery == 1):?>
  
       <li><a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&task=showgallery&mid='.$this->profile->user_id) ?>" title ="Click to checkout the gallery"><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_GALLERY');?></strong></a></li>
				<?php endif;?>  
			 <?php if($this->user_id==0):?>
              <?php if($this->options->display_nr_category==1 ||!$this->options && $this->ucategories->cat):?>
               <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_CATEGORY');?></strong> <?php echo $this->ucategories->cat; ?></li>
              <?php endif;?>
            <?php else:?>
              <?php if( $this->ucategories->cat && ($this->options->display_category==1|| !$this->options)):?>
               <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_CATEGORY');?></strong> <?php echo $this->ucategories->cat; ?></li>
              <?php endif;?>
            <?php endif;?> 
            <?php if($this->user_id==0):?>
              <?php if(($this->options->display_nr_country==1 || !$this->options) && $this->profile->country):?>
                <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_COUNTRY');?></strong> <?php echo $this->countries[$this->profile->country]; ?></li>
              <?php endif;?>
            <?php else:?>
              <?php if( $this->profile->country && ($this->options->display_country|| !$this->options)):?>
                <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_COUNTRY');?></strong> <?php echo $this->countries[$this->profile->country]; ?></li>
              <?php endif;?>
            <?php endif;?>  

              
            <?php if($this->user_id==0):?>
              <?php if(($this->options->display_nr_city==1 || !$this->options) && $this->profile->city):?>
                <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_CITY');?></strong> <?php echo $this->profile->city; ?></li>
              <?php endif;?>
            <?php else:?>
              <?php if( $this->profile->city && ($this->options->display_city || !$this->options)):?>
                <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_CITY');?></strong> <?php echo $this->profile->city; ?></li>
              <?php endif;?>
            <?php endif;?>  


            <?php if($this->user_id==0):?>
              <?php if(($this->options->display_nr_state==1 || !$this->options) && $this->profile->state):?>
                          <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_STATE');?></strong> <?php echo $this->profile->state; ?></li>
              <?php endif;?>
            <?php else:?>
              <?php if( $this->profile->state && ($this->options->display_state|| !$this->options)):?>
                          <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_STATE');?></strong> <?php echo $this->profile->state; ?></li>
              <?php endif;?>
            <?php endif;?>  

            
             

            <?php if($this->user_id==0):?>
              <?php if(($this->options->display_nr_phone_no==1 || !$this->options) && $this->profile->phone_no):?>
                          <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_PHONE_NO');?></strong> <?php echo $this->profile->phone_no ?></li>
              <?php endif;?>
            <?php else:?>
              <?php if( $this->profile->phone_no  &&( $this->options->display_phone_no|| !$this->options)):?>
                          <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_PHONE_NO');?></strong> <?php echo $this->profile->phone_no ?></li>
              <?php endif;?>
            <?php endif;?>  

            <?php if($this->user_id==0):?>
              <?php if($this->options->display_nr_email==1 || !$this->options && $this->profile->Email):?>
               <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_EMAIL');?></strong> <?php echo $this->profile->Email; ?></li>
              <?php endif;?>
            <?php else:?>
              <?php if( $this->profile->Email && ($this->options->display_email || !$this->options)):?>
               <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_EMAIL');?></strong> <?php echo $this->profile->Email; ?></li>
              <?php endif;?>
            <?php endif;?>  

                 
          <?php if($this->user_id==0):?>
            <?php if(($this->options->display_nr_facebook==1|| !$this->options) && $this->profile->facebook_page):?>
             <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_FACEBOOK_PAGE');?></strong> <a href="http://<?php echo $this->profile->facebook_page ?>" target="_blank"><?php echo $this->profile->facebook_page ?></a></li>
                    
            <?php endif;?>
          <?php else:?>
            <?php if( $this->profile->facebook_page && ($this->options->display_facebook_page || !$this->options)):?>
             <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_FACEBOOK_PAGE');?></strong> <a href="http://<?php echo $this->profile->facebook_page ?>" target="_blank"><?php echo $this->profile->facebook_page ?></a></li>
                    
            <?php endif;?>
          <?php endif;?>  
          <?php if($this->user_id==0):?>
            <?php if(($this->options->display_nr_twitter==1   || !$this->options )&& $this->profile->twitter_page):?>
             <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_TWITTER_PAGE');?></strong> <a href="http://<?php echo $this->profile->twitter_page ?>" target="_blank"><?php echo $this->profile->twitter_page ?></a></li>
                    
            <?php endif;?>
          <?php else:?>
            <?php if( $this->profile->twitter_page && ($this->options->display_twitter_page || !$this->options)):?>
             <li><strong><?php echo JText:: _('JTAG_MEMBER_DETAIL_TWITTER_PAGE');?></strong> <a href="http://<?php echo $this->profile->twitter_page ?>" target="_blank"><?php echo $this->profile->twitter_page ?></a></li>
                    
            <?php endif;?>
          <?php endif;?>  

          <?php if($this->user_id):?>   
              <?php foreach ($this->custom as $field):  ?>
                <?php if ($field->field_label && $field->field_value): ?>
                <li><strong><?php echo $field->field_label; ?>:</strong> <?php echo $field->field_value ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
          <?php else: ?>
              <?php foreach ($this->custom as $field):  ?>
                <?php if ($field->field_label && $field->field_value && $field->display_nr_cf): ?>
                <li><strong><?php echo $field->field_label; ?>:</strong> <?php echo $field->field_value ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
          
          <?php endif;?>


          <?php if($this->attachments): ?>
            <li><strong><?php echo JText::_(JTAG_MEMBER_NEW_FORM_ATTACHMENTS);?></strong></li>
          <?php foreach($this->attachments as $attachment) :?>		
					<li><a href="?option=com_jtagmembersdirectory&task=attachment&download_file=<?php echo $attachment->image; ?>" title ="Click to checkout the gallery"><strong><?php echo $attachment->image;?></strong></a></li>
                  <?php endforeach; ?>             
           <?php endif;?> 

            <?php if ($this->vcf==1) :	?>
	<li>	<?php echo JText::_('DOWNLOAD_INFORMATION_AS');?>
		<a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&amp;view=memberdetails&amp;id='.$id . '&amp;task=getvcf'); ?>">

		<?php echo JText::_('VCARD');?></a></li>
	<?php endif; ?>

            </ul>
            <a href="#" class="back-list" onclick="self.history.back(1)"><?php echo JText:: _('BACK_TO_THE_LIST');?></a>
          </div>
    <!--    </li>-->
    <!--</ul>-->
    </div>
</div>
