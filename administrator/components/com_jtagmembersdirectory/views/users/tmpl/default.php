<?php
/**
 * Joomla! 1.5 component JtagMember
 *
 * @version $Id: controller.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage JtagMember
 * @license GNU/GPL
 *
 * Jtag Member
 */

// no direct access
defined('_JEXEC') or die('Restricted access');             
//print_r($this->users);
?>
<form action="<?php echo JRoute::_('index.php') ?>" method="post" name="adminForm" id ="adminForm">
   <table class="adminlist">
    <thead>
			<tr>
				<th width="1%">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->users);?>)"></input>
				</th>
        <th>
    <?php //print_r($this->users); echo "this ".$this->users[0]->name;?>
    <?php echo JHtml::_('grid.sort', JTAG_MEMBERS_LIST_ID, 'id'); 
					 ?>
					</th>
					<th>
					<?php echo JHtml::_('grid.sort', JTAG_MEMBERS_LIST_NAME, 'name'); ?>
				</th>
        <th>
					<?php echo JHtml::_('grid.sort', 'Username', 'username'); ?>
				</th>
    <th>
					<?php echo JHtml::_('grid.sort',JTAG_MEMBERS_LIST_EMAIL, 'Email'); 
					//echo "email";?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>

				<td colspan="15">
		<?php //echo $this->pagination->getListFooter(); ?> 

				</td>
			</tr>
		</tfoot> 

		<tbody> 

	<?php $db = & JFactory::getDBO();?>

			<?php foreach($this->users as $i=>$user) :	 ?>
		<?php	$sql = "SELECT `id` FROM `#__jtmb_members_directory` WHERE `name` = '$user->name'";
			$db->setQuery($sql);
			$dupid = $db->loadObjectList();
			if($dupid==NULL){?>			
			
			
<tr class="row<?php echo $i % 2;?>">

			<td class="center">
				<?php echo JHtml::_('grid.id', $i, $user->id); ?>
			</td>
				        <td align="center">
				         <?php echo $this->escape($user->id); ?>

	        </td>
		    <td align="center">
			      <?php echo $this->escape($user->name); ?>				 
			</td>
	        <td align="center">
			      <?php echo $this->escape($user->username); ?>
	        </td>
		    <td align="center">
				  <?php echo $this->escape($user->email); ?>
			</td>
		
		</tr>
		<?php } ?>
			<?php endforeach; ?>
	</tbody> 
</table>
  <input type="hidden" name="option" value="com_jtagmembersdirectory" />
  <input type="hidden" name="view" value="users" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="controller" value="jtagmembersdirectory" />
	<input type="hidden" name="boxchecked" value="0" />
</form>





