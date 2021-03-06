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
    
    $userid =& JFactory::getUser();
    $user_id = $userid->id;
   //die(var_dump($options));
?>

<div id="jtag-md-overall-partial"></div>
  <?php if (count($users) > 0): ?>
    <ul class="members">
      <?php foreach ($users as $user): ?>
      <li>
	  <a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&format=html&task=memberDetails&mid='.$user->id) ?>">
	  <img width="89" src="components/com_jtagmembersdirectory/assets/profile_pictures/thumb/<?php echo $user->profile_picture ? $user->profile_picture : 'profile2.jpg' ?>" alt="<?php echo $user->name ?>'s photo" /></a>

        <div style="clear: both; float: left; margin:5px 0;">

                 

        	<?php if($user_id==0):?>
              <?php if(($options->display_nr_email==1 || !$options) && $user->Email):?>
            		<a href="mailto:<?php echo $user->Email; ?>"><img src="components/com_jtagmembersdirectory/assets/images/mail.gif" style="margin-right: 5px;border-color: #fff;"/><?php echo $user->Email; ?></a>
              <?php endif;?>   
            <?php else:?>
              <?php if( $user->Email):?>
				<a href="mailto:<?php echo $user->Email; ?>"><img src="components/com_jtagmembersdirectory/assets/images/mail.gif" style="margin-right: 5px;border-color: #fff;"/><?php echo $user->Email; ?></a>
              <?php endif;?>
            <?php endif;?>  
            
			
		<?php if($user_id==0):?>
            <?php if(($options->display_nr_facebook==1|| !$options) && $user->facebook_page):?>
           			<a <?php echo $user->facebook_page ? 'href=http://'.$user->facebook_page.' target="_blank"' : 'href="#" onclick="return false;"' ?>><img src="components/com_jtagmembersdirectory/assets/images/facebook.gif"/></a>
            <?php endif;?>
          <?php else:?>
            <?php if( $user->facebook_page && ($options->display_facebook_page || !$options)):?>
        			<a <?php echo $user->facebook_page ? 'href=http://'.$user->facebook_page.' target="_blank"' : 'href="#" onclick="return false;"' ?>><img src="components/com_jtagmembersdirectory/assets/images/facebook.gif"/></a>
            <?php endif;?>
          <?php endif;?>  

			
		<?php if($user_id==0):?>
            <?php if(($options->display_nr_twitter==1|| !$options) && $user->twitter_page):?>
			<a <?php echo $user->twitter_page ? 'href=http://'.$user->twitter_page.' target="_blank"' : 'href="#" onclick="return false;"' ?>><img src="components/com_jtagmembersdirectory/assets/images/twitter.gif"/></a>
        <?php endif;?>
          <?php else:?>
            <?php if($user->twitter_page && ($options->display_twitter_page|| !$options)):?>
        			<a <?php echo $user->twitter_page ? 'href=http://'.$user->twitter_page.' target="_blank"' : 'href="#" onclick="return false;"' ?>><img src="components/com_jtagmembersdirectory/assets/images/twitter.gif"/></a>
            <?php endif;?>
          <?php endif;?>  

		
		</div>		
		
        <div class="info">
<h4><a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&format=html&task=memberDetails&mid='.$user->id) ?>">
          <?php echo $user->name; ?></a></h4>
	<!-- Start Yogesh to display profile option from backend-->	  
          <?php if($user_id==0):?>
 <?php if(($options->display_nr_profile==1|| !$options) && $user->member_profile):?>
          <?php echo (strlen($user->member_profile) > 150) ? substr($user->member_profile,0,150).'...' : $user->member_profile;?>
    <?php endif;?>  
<?php else:?>
  <?php if( $user->member_profile && ($options->display_profile || !$options)):?>
 <?php echo (strlen($user->member_profile) > 150) ? substr($user->member_profile,0,150).'...' : $user->member_profile;?>
 <?php endif;?>  
 <?php endif;?>  
	<!-- End Yogesh to display profile option from backend-->	
         <!--
          <h4><?php echo JText:: _('JTAG_USER_LIST_MEMBER_SINCE');?></h4>
		  <?php echo $user->member_since; ?><br>-->
        

		<br>
		  <a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&format=html&task=memberDetails&mid='.$user->id) ?>" class="more"><?php echo JText:: _('JTAG_USER_LIST_VIEW_FULL_PROFILE');?></a>
     
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
    <br>
    
    
    <?php if (count($pagination_data->pages) > 1): ?>
      <ul class="paging">
      <!-- Changes done by GJ on 23-Jun for pagination and formating - Begin-->
        <!-- <li class="rarr"><a <?php //echo $pagination_data->next->link ? 'href="'.$pagination_data->next->link.'" onclick="jtagMDAjaxSearch(this); return false;"' : 'href="#" onclick="return false;"' ?>>&nbsp;</a></li>
        <?php //foreach (array_reverse($pagination_data->pages) as $page): ?>
        <li<?php //if (!$page->link){ echo ' class="active"';} ?>><a <?php //echo $page->link ? 'href="'.$page->link.'" onclick="jtagMDAjaxSearch(this); return false;"' : 'href="#" onclick="return false;"' ?>><?php //echo $page->text; ?></a></li>
        <?php //endforeach; ?>
        <li class="larr"><a <?php //echo $pagination_data->previous->link ? 'href="'.$pagination_data->previous->link.'" onclick="jtagMDAjaxSearch(this); return false;"' : 'href="#" onclick="return false;"' ?>>&nbsp;</a></li>
        -->
        <li class="rarr"><a <?php echo $pagination_data->next->link ? 'href="'.$pagination_data->next->link.'"  ' : 'href="#" onclick="return false;"' ?>>&nbsp;</a></li>
        <?php foreach (array_reverse($pagination_data->pages) as $page): ?>
        <!-- Changes done by GJ on 23-Jun for pagination and formating - Begin-->
        <!--<li<?php // if (!$page->link){ echo ' class="active"';} ?>><a <?php //echo $page->link ? 'href="'.$page->link.'"  ' : 'href="#" onclick="return false;"' ?>><?php //echo $page->text; ?></a></li>-->
        <li<?php if (!$page->link){ echo ' class="active"';} ?>><a <?php echo $page->link ? 'href="'.str_replace("format=raw","format=html",$page->link).'"  ' : 'href="#" onclick="return false;"' ?>><?php echo $page->text; ?></a></li>
        <!-- Changes done by GJ on 23-Jun for pagination and formating - End-->
        <?php endforeach; ?>
        <li class="larr"><a <?php echo $pagination_data->previous->link ? 'href="'.$pagination_data->previous->link.'" ' : 'href="#" onclick="return false;"' ?>>&nbsp;</a></li>
        <!-- Changes done by GJ on 23-Jun for pagination and formating - End-->
      </ul>
         
      
    <?php endif; ?>
  <?php else: ?>
<?php echo JText::_('JTAG_USER_LIST_NO_USER_FOUND')?>
  <?php endif; ?>


