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
            <table class="table-2" >
<thead>
  <th>Name </th>
       <?php if($user_id==0):?>
              <?php if($options->display_nr_email==1 || !$options):?>
                <th><img src="components/com_jtagmembersdirectory/assets/images/mail.gif"/> Email </th>
              <?php endif;?>
        <?php else:?>
               <th><img src="components/com_jtagmembersdirectory/assets/images/mail.gif"/> Email </th>
        <?php endif;?>
        <?php if($user_id==0):?>
            <?php if($options->display_nr_phone_no==1|| !$options):?>
              <th><img src="components/com_jtagmembersdirectory/assets/images/phone.gif"/> Phone </th>
            <?php endif;?>
        <?php else:?>
              <?php if ($options->display_phone_no || !$options):?>
              <th><img src="components/com_jtagmembersdirectory/assets/images/phone.gif"/> Phone </th>      
              <?php endif;?>
         <?php endif;?>
</thead>
    <?php if (count($users) > 0): ?>
         <?php foreach ($users as $user): ?>
          <tr>
             <td style="margin-left:20px;">	
             <!--<div class="info">-->
              <h4><a href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&format=html&task=memberDetails&mid='.$user->id) ?>">
                  <?php echo $user->name; ?></a></h4> 
              <!--<?php echo (strlen($user->member_profile) > 150) ? substr($user->member_profile,0,150).'...' : $user->member_profile;?>-->
             </td>

          <?php if($user_id==0):?>
            <?php if(($options->display_nr_email==1 || !$options) && $user->Email):?>
              <td style="margin-left:20px;">
                  <?php echo $user->Email; ?>
	      </td>			
             <?php endif;?>
          <?php else:?>
              <td style="margin-left:20px;">
              <?php if( $user->Email):?>
                  <?php echo $user->Email; ?>
               <?php endif;?>
              </td>
          <?php endif;?> 

          <?php if($user_id==0):?>
            <?php if(($options->display_nr_phone_no==1|| !$options) && $user->phone_no):?>
              <td style="margin-left:20px;">
		<div><?php echo $user->phone_no; ?></div>
              </td>
            <?php endif;?>
          <?php else:?>
             <td style="margin-left:20px;">
              <?php if( $user->phone_no && ($options->display_phone_no || !$options)):?>
		<div><?php echo $user->phone_no; ?></div>        
              <?php endif;?>
             </td>
          <?php endif;?> 

       </tr>
         </div>
     <!-- </li>-->

      <?php endforeach; ?>

       </table> 
   <!-- </ul>-->
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


