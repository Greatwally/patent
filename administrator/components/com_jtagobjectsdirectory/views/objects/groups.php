<!-- Start - Snehal Kulkarni- Import groups -date-15/10/2012--> 
<?php
/*------------------------------------------------------------------------
# com_jtagcalendar – jtag Calendar v.2
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

// No direct access
defined('_JEXEC') or die;
 //JToolBarHelper::cancel('cancel');
$db = &JFactory::getDbo(); 
$sql = "SELECT * FROM #__usergroups ";
$db->setQuery($sql); 
$rows = $db->loadObjectList();
$name = array();
if (count($rows))
{
  
?>
<form action="" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
           Group Name:

             <select name="jform[id]"  style="width:120px;height:20px;"  >
<?php foreach($rows AS $item) { ?>
              <option > <?php echo $item->title; ?></option>
<?php } }?>
               </select> 
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <input type="submit" value="Import" id="Import">
 &nbsp; &nbsp; 
<input type="button" value="Cancel" onClick='ComfirmCancelOrder();' />

<script type="text/javascript">

    function ComfirmCancelOrder()
    {
        window.location.href="index.php?option=com_jtagobjectsdirectory";
      
    }
</script>



  <input type="hidden" name="option" value="com_jtagobjectsdirectory" />
 <input type="hidden" name="task" value="importGroup" />
<input type="hidden" name="controller" value="importGroup" />

</form>
<!-- End - Snehal Kulkarni- Import groups -date-15/10/2012-->
