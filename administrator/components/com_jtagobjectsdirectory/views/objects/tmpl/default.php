<?php
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory – Jtag objects Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
 require_once JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . '_helper.php';
   $params = & JTagHelper::getComponentParameters('com_jtagobjectsdirectory');
     $sortby = $params->sortby;


?>
<form action="<?php echo JRoute::_('index.php');?>" method="post" name="adminForm" id="adminForm">
    <?php echo JText::_('Filter By:'); ?>
    &nbsp;&nbsp;&nbsp;&nbsp;
     <?php echo JText::_('Name:'); ?>
		<input type="text" name="search" id="search" value="<?php echo $this->lists['search'] ?>" class="text_area" title="<?php echo   JText::_(JTAG_FILTER_BY_TITLE); ?>"/>
     <?php echo JText::_('Email:'); ?>
              <input type="text" name="email" id="email" value="<?php echo $this->lists['email'] ?>" class="text_area" title="<?php echo JText::_('Filter Email:'); ?>"/>
     <?php echo JText::_('Phone Number:'); ?>
<input type="text" name="phone" id="phone" value="<?php echo $this->lists['phone'] ?>" class="text_area" title="<?php echo JText::_('Filter phone:'); ?>"/>
     <?php echo JText::_('Categories:'); ?>
<input type="text" name="category" id="category" value="<?php echo $this->lists['cat'] ?>" class="text_area" title="<?php echo JText::_('Filter category:'); ?>"/>
	    <button onclick="this.form.submit();"><?php echo JText::_(JTAG_CATEGORY_LIST_GO); ?></button>
	    <button onclick="clearAll();">
			<?php echo JText::_(JTAG_CATEGORY_LIST_RESET); ?></button>
<script>
function clearAll()
{
  document.getElementById('search').value='';
  document.getElementById('email').value='';
  document.getElementById('phone').value='';
  
 
  this.form.getElementById('filter_state').value='-1';
  this.form.submit();
}
</script>

  <table class="adminlist" style="margin-top:20px;">
    <thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this)" />
				</th>
        <th>
					<?php echo JHtml::_('grid.sort', JTAG_objectS_LIST_ID, 'user_id', $this->lists['order_Dir'], $this->lists['order']); ?>
				</th>
        <th>
					<?php echo JHtml::_('grid.sort', JTAG_objectS_LIST_NAME, 'name', $this->lists['order_Dir'], $this->lists['order']); ?>
				</th>
        <th>
					<?php echo JHtml::_('grid.sort', JTAG_objectS_LIST_PHONE_NO, 'phone_no', $this->lists['order_Dir'], $this->lists['order']); ?>
				</th>

<!-- Start - Snehal Kulkarni - 05/09/2012- To display Email information on the form -->
<th>
					<?php echo JHtml::_('grid.sort',JTAG_objectS_LIST_EMAIL, 'Email', $this->lists['order_Dir'], $this->lists['order']); ?>
				</th>
<!-- End - Snehal Kulkarni - 05/09/2012- To display Email information on the form -->
     <!--   <th>
					<?php echo JHtml::_('grid.sort', JTAG_objectS_LIST_object_SINCE, 'object_since', $this->lists['order_Dir'], $this->lists['order']); ?>
				</th>-->
		<th>
					<?php echo JHtml::_('grid.sort',JTAG_objectS_LIST_CATEGORY, 'cat_id', $this->lists['order_Dir'], $this->lists['order']); ?>
				</th>
<th>
					<?php echo JHTML::_('grid.sort','Publish','c.Published', $this->lists['order_Dir'], $this->lists['order'] ); ?>
                                 </th>
<?php if($sortby=='Custom'): ?>

	<th width="8%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',  'Order', 'c.ordering', $this->lists['order_Dir'], $this->lists['order'] ); ?>
				<?php echo JHTML::_('grid.order',  $this->items ); ?>
			</th>
<?php endif; ?>
			</tr>

		</thead>
    <tfoot>
			<tr>
				<td colspan="15">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
    <tbody>
		
	<?php  $v=0; $n=count( $this->items );  foreach ($this->items as $i => $item) : 

       if($v < $n)
           {
             $ordering = ($this->lists['order'] == 'c.ordering');	?>
 
		<tr class="row<?php echo $i % 2; ?>">
			<td class="center">
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
		    <td align="center">
				  <a href="index.php?option=com_jtagobjectsdirectory&controller=jtagobjectsdirectory&task=object&mid=<?php echo $item->id ?>" ><?php echo $this->escape($item->user_id); ?></a>
			</td>
	        <td align="center">
			      <?php echo $this->escape($item->name); ?>
	        </td>
		    <td align="center">
				  <?php echo $this->escape($item->phone_no); ?>
			</td>
<!-- Start - Snehal Kulkarni - 05/09/2012- To display Email information on the form -->
<td align="center">
				  <?php echo $this->escape($item->Email); ?>
			</td>
<!-- End - Snehal Kulkarni - 05/09/2012- To display Email information on the form -->
			<!--<td align="center">
			      <?php echo $this->escape($item->object_since); ?>
			</td>-->
			<td align="center">
               <?php echo $this->escape($item->cat); ?>
                    <!--<?php for ($i=1;$i<count($item->cat_id);$i++) : $cat=$item->cat_id;	?>
			      <?php echo explode(', ', $cat[$i]); ?>
                         <?php endfor; ?>-->
			</td>


 <?php if($sortby=='Custom'): ?>
<td class="order">
			    <span><?php echo $this->pagination->orderUpIcon( $v, true,'orderup', 'Move Up', $ordering ); ?></span>
				<span><?php echo $this->pagination->orderDownIcon( $v, $n, true, 'orderdown', 'Move Down', $ordering ); ?></span>
				<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
				<input type="text" name="order[]" size="2" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
			</td>
<?php endif; ?>

		<td>

                         <?php $published 	= JHTML::_('grid.Published', $item->Published, $v ); ?>

                         <?php echo $published;?>

                         </td>
		</tr>
			<?php $v++; }  endforeach; ?>
		</tbody>
  </table>
  
  <input type="hidden" name="option" value="com_jtagobjectsdirectory" />
  <input type="hidden" name="view" value="objects" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="controller" value="jtagobjectsdirectory" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
  <input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>
