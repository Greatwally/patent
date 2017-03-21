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

<?php if (count($users) > 0): $i=0;  ?>
<ul class="members">
<div class="polaroid-images">
 <?php foreach ($users as $user): ?>
   <a  href="<?php echo JRoute::_('index.php?option=com_jtagmembersdirectory&format=html&task=memberDetails&mid='.$user->id) ?>" title="" >
		<img  src="components/com_jtagmembersdirectory/assets/profile_pictures/thumb/<?php echo $user->profile_picture ? $user->profile_picture : 'profile2.jpg' ?>" alt="<?php echo $user->name ?>'s photo" height="100"  title="<?php echo $user->name ?>" /> <p class="caption"><b> <?php echo $user->name ?></b></p></a>

<?php endforeach; ?>	
   </div>
</ul>	  
    <br>
    
    <?php if (count($pagination_data->pages) > 1): ?>
      <ul class="paging">
      
        <li class="rarr"><a <?php echo $pagination_data->next->link ? 'href="'.$pagination_data->next->link.'"  ' : 'href="#" onclick="return false;"' ?>>&nbsp;</a></li>
        <?php foreach (array_reverse($pagination_data->pages) as $page): ?>
      
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


