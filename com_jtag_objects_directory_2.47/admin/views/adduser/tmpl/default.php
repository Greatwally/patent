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
$db = &JFactory::getDbo(); 
	  //$inquiry = $_POST['cid'];
	 // $inqstr = (!empty($inquiry) && is_array($inquiry)) ? implode(',',$inquiry) : 0;
	  $sql = "SELECT user_id,email,name,username FROM #__jtmb_object_request";
	  $db->setQuery($sql); 
	  $rows = $db->loadObjectList();
//print_r($rows);exit;

//$name = $email = array();

 
?>
<form action="<?php echo JRoute::_('index.php');?>" method="post" name="adminForm" id="adminForm">
  <table class="adminlist">
    <thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows) ?>)" />
				</th>
        <th>
					<?php echo "Id" ;?>
				</th>
        <th>
					<?php echo "NAME"; ?>
				</th>
        <th>
					<?php echo "Login Name"; ?>
				</th>
        <th>
					<?php echo "EMAIL" ?>
				</th>
			
			</tr>
		</thead>
    <tfoot>
			<tr>
				<td colspan="15">
					
				</td>
			</tr>
		</tfoot>
    <tbody>
		
	<?php foreach ($rows as $i=>$item) :	?>
		<tr class="row<?php echo $i % 2; ?>">
			<td class="center">
				<?php echo JHtml::_('grid.id', $i, $item->user_id); ?>
			</td>
		    <td align="center">
				  
			      <?php echo $item->user_id; ?>
	        </td>
		    <td align="center">
				  <?php echo $item->name; ?>
			</td>
<td align="center">
				  <?php echo $item->username; ?>
			</td>
			<td align="center">
			      <?php echo $item->email; ?>
			</td>
		
		</tr>
			<?php endforeach; ?>
		</tbody>
  </table>
  
  <input type="hidden" name="option" value="com_jtagobjectsdirectory" />
  <input type="hidden" name="view" value="objects" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="controller" value="jtagobjectsdirectory" />
  <input type="hidden" name="boxchecked" value="0" />

	<?php echo JHtml::_('form.token'); ?>
</form>
