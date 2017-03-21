<?php
/**
 * Joomla! 1.5 component Jtagminicart
 *
 * @version $Id: controller.php 2011-08-25 09:52:09 svn $
 * @author www.Joomlatag.com
 * @package Joomla
 * @subpackage Jtagminicart
 * @license GNU/GPL
 *
 * Jtag Minicart
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
 JHTML::_('behavior.tooltip');
$ordering = ( ($this->lists['order'] == 'c.ordering' || $this->lists['order'] == 'c.parent, c.ordering') && (!$this->filter_trash) );

?>

<!-- To move into mootools.js -->
<script type="text/javascript">
	//<![CDATA[
	window.addEvent('domready', function(){

		// For the Joomla! checkbox toggle button
		$$('#jToggler').addEvent('click', function(){
			checkAll(<?php echo count( $this->rows ); ?>);
		});
         });
	//]]>
</script>
<style type="text/css" >

table.adminlist tbody tr td 
{
   background: none repeat scroll 0 0 #FFFFFF;
   border: 1px solid #FFFFFF;
   height: 25px;
}

table.adminlist td.order span {
    background-repeat: no-repeat;
    float: left;
    height: 13px;
    text-align: center;
    width: 20px;
}

.catCenter { text-align: center; } 
.catOrderBox {
    text-align: right;
    white-space: nowrap;
    text-align: center;
}

.catOrderBoxRight {
    text-align: right;

} 

</style>
<form action="index.php" method="post" name="adminForm" id="adminForm">

  <table >
    <tr>
      <td >
		<?php echo JText::_(JTAG_CATEGORY_LIST_FILTER); ?>
		<input type="text" name="search" id="search" value="<?php echo $this->lists['search'] ?>" class="text_area" title="<?php echo JText::_(JTAG_FILTER_BY_TITLE); ?>"/>
		<button onclick="this.form.submit();"><?php echo JText::_(JTAG_CATEGORY_LIST_GO); ?></button>
	    <button onclick="document.getElementById('search').value='';this.form.getElementById('filter_state').value='-1';this.form.submit();">
			<?php echo JText::_(JTAG_CATEGORY_LIST_RESET); ?></button>
      </td>
      <td class="catOrderBoxRight">
      	<?php echo $this->lists['trash']; ?>
      	<?php echo $this->lists['state']; ?>
      </td>
    </tr>
  </table> 

  <table class="adminlist">
    <thead>
      <tr>
        <th><?php echo JText::_(JTAG_CATEGORY_LIST_CAT_ID);?></th>
        <th><input id="jToggler" type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this)" /></th>
        <th><?php echo JHTML::_('grid.sort', JTAG_CATEGORY_LIST_NAME, 'c.name', @$this->lists['order_Dir'], @$this->lists['order'] ); ?></th>
        <th><?php echo JHTML::_('grid.sort', JTAG_CATEGORY_LIST_DESCRIPTION, 'c.description', @$this->lists['order_Dir'], @$this->lists['order'] ); ?></th>
        <th><?php echo JText::_(JTAG_CATEGORY_LIST_PUBLISHED);  ?></th>
        <th><?php echo JText::_(JTAG_CATEGORY_LIST_ORDER);  ?></th>
      </tr>
    </thead>
    <tbody > 
     <?php
		 $k = 0; $i = 0;	$n = count( $this->rows );
		 if($n)
			foreach ($this->rows as $row) :
					$row->checked_out=0;
					$checked 	= JHTML::_('grid.checkedout', $row, $i );
                    $published = JHTML::_('grid.published', $row, $i );
	?>
        <tr>
            <td class="catCenter">
	<a href="index.php?option=com_jtagmembersdirectory&controller=jtagmembersdirectory&task=category&cid=<?php echo $row->id ?>&name=<?php echo $row->name ?>&description=<?php echo $row->description ?>"><?php echo $row->id ?></a>  
			</td>
            <td class="catCenter">
             <?php
				if ($this->filter_trash){
					if ($row->trash==1){
						echo $checked;
					}
				}
				else {
					echo $checked;
				}
            ?>
	    </td>
		
			
            <td class="catCenter"><?php echo $row->name; ?></td>
            <td class="catCenter"><?php echo $row->description; ?></td>
            <td class="catCenter"><?php echo ($this->filter_trash)?strip_tags($published,'<img>'):$published;?></td>
            <td class="order"><span><?php echo $this->page->orderUpIcon( $i,true, 'orderup', 'Move Up', $ordering); ?></span> <span><?php echo $this->page->orderDownIcon( $i, $n,true, 'orderdown', 'Move Down', $ordering ); ?></span>
            <?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
            <input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" <?php echo $disabled ?> class="text_area k2OrderBox" /></td>
        </tr>
        <?php $k = 1 - $k; $i++; endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="9">
			<?php// echo $this->page->getListFooter(); ?>
		</td>
      </tr>
    </tfoot>
  </table>

  <input type="hidden" name="option" value="com_jtagmembersdirectory" />
  <input type="hidden" name="view" value="<?php echo JRequest::getVar('view'); ?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="c" value="categories" />
  <input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
  <input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
  <input type="hidden" name="boxchecked" value="0" />
  <?php echo JHTML::_( 'form.token' );?>
</form>
