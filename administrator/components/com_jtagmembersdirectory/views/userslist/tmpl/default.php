<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory – Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

?>

<ul>
  <li class="result_counter">
    <?php if (count($this->users) > 0): ?>
     <?php echo JText:: _(JTAG_USER_LIST_SHOWING);?> <?php echo count($this->users) ?>      <?php echo JText:: _(JTAG_USER_LIST_MAX_USER_TEN);?>
    <?php else: ?>
      No users found.
    <?php endif; ?>
  </li>
  <?php foreach ($this->users as $user): ?>
    <li>
      <a href="#" class="user_select" onclick='jtagMDSetUser(<?php echo json_encode($user) ?>); return false;'><?php echo $user['username'] ?></a>
      <?php if ($user['md_profile']): ?> <span class="edit">     <?php echo JText:: _(JTAG_USER_LIST_EDIT);?></span><?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>
