<?php
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory � Jtag objects Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www  .joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');
$link = JRoute::_('index.php?option=com_jtagobjectsdirectory&amp;Itemid='.JRequest::getVar('Itemid'));
$version = new JVersion();
if($version->RELEASE!="1.5")
{
 require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';
$params = & JTagHelper::getComponentParameters('com_jtagobjectsdirectory');
 $v = $params->view; 
}
?>


<div class="Jtag_objects_Directory_list" >
<?php 
if($version->RELEASE!="1.5")
{?>
    <h2 class="page-title"><?php echo $params->title;?></h2>
<?php } else {?>
<h2 class="page-title"><?php echo comparams('title');?></h2>
<?php }?>	
<a href="<?php echo $link; ?>"><?php echo JText::_('JTAG_CATEGOTY_ALL_objectS');?></a>

<div id="jtag-category-list">
     <?php jtag_include_partial($this->getName(), 'catlist', array('categories' => $this->categories,'customfield' => $this->customfield,'search' => $this->search,'rows' => $this->rows,'custom'=>$this->customsearch, 'pagination_data' => $this->pagination_data)); ?>
</div>


	<?php jtag_include_partial($this->getName(), 'alphalist'); ?>
	
    <?php jtag_include_partial($this->getName(), 'searchForm',array('search' => $this->search)); ?>
 <?php if($v==0):  ?>
    <div id="jtag-object-list" style="background-color:<?php echo $params->wall; ?>;">
     <?php jtag_include_partial($this->getName(), 'list',  array('users' => $this->users,'options'=>$this->options, 'pagination_data' => $this->pagination_data)); ?>
    </div>
<?php elseif($v==2):  ?>
    <div id="jtag-object-list" style="background-color:<?php echo $params->wall; ?>;">
     <?php jtag_include_partial($this->getName(), 'collage',  array('users' => $this->users,'options'=>$this->options, 'pagination_data' => $this->pagination_data)); ?>
    </div>
<?php else: ?>
<div id="jtag-object-list" style="background-color:<?php echo $params->wall; ?>;">
     <?php jtag_include_partial($this->getName(), 'table',  array('users' => $this->users,'options'=>$this->options, 'pagination_data' => $this->pagination_data)); ?>
    </div>
<?php endif;?>
    <!--
    <div id="jtag-object-list">
      <?php if (count($this->users) > 0): ?>
        <ul>
          <?php foreach ($this->users as $user): ?>
          <li>
            <img width="89" heigh="113" src="components/com_jtagobjectsdirectory/assets/profile_pictures/<?php echo $user->profile_picture ? $user->profile_picture : 'profile2.jpg' ?>" alt="<?php echo $user->first_name ?>'s photo" />
            <div class="info">
              <h4><?php echo $user->first_name; ?></h4>
              <p><?php echo substr($user->object_profile, 0, strpos($user->object_profile, ' ', 250)); ?>...</p>
              <a href="<?php echo JRoute::_('index.php?option=com_jtagobjectsdirectory&task=objectDetails&mid='.$user->id) ?>" class="more">Read the full profile</a>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php if (count($this->pagination_data->pages) > 1): ?>
          <ul class="paging">
            <li class="rarr"><a <?php echo $this->pagination_data->next->link ? 'href="'.$this->pagination_data->next->link.'"' : 'href="#" onclick="return false"' ?>>&nbsp;</a></li>
            <?php foreach (array_reverse($this->pagination_data->pages) as $page): ?>
            <li<?php if (!$page->link){ echo ' class="active"';} ?>><a <?php echo $page->link ? 'href="'.$page->link.'"' : 'href="#" onclick="return false"' ?>><?php echo $page->text; ?></a></li>
            <?php endforeach; ?>
            <li class="larr"><a <?php echo $this->pagination_data->previous->link ? 'href="'.$this->pagination_data->previous->link.'"' : 'href="#" onclick="return false"' ?>>&nbsp;</a></li>
          </ul>
        <?php endif; ?>
      <?php else: ?>
        No users found
      <?php endif; ?>
    </div>
    -->
</div>
