<?php
/**
 * Kunena Component
 * @package Kunena.Template.Blue_Eagle
 * @subpackage Common
 *
 * @copyright (C) 2008 - 2015 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>
<div id="jf_ku_login">
	<div class="jf_ku_modal jf_ku_modal_effect_1">
		<div class="jf_ku_modal_content">
			<h3><?php echo JText::_('MOD_JF_KU_LOGIN_MY_ACCOUNT'); ?></h3>
			<div>
				<div class="jf_ku_greeting">
					<?php if ($this->me->getAvatarImage('welcome')) : ?>
						<?php echo $this->me->getAvatarImage('kavatar', 'welcome'); ?>
					<?php endif; ?>
				</div>

				<ul class="jf_ku_profile_links">
					<?php if (!empty($this->privateMessagesLink)) : ?><li><i class="fa fa-arrow-right"></i><?php echo $this->privateMessagesLink ?></li><?php endif ?>
					<?php if (!empty($this->editProfileLink)) : ?><li><i class="fa fa-arrow-right"></i><?php echo $this->editProfileLink ?></li><?php endif ?>
					<?php if (!empty($this->announcementsLink)) : ?><li><i class="fa fa-arrow-right"></i><?php echo $this->announcementsLink ?></li><?php endif ?>
					<li><i class="fa fa-arrow-right"></i><?php echo JText::_('COM_KUNENA_PROFILEBOX_WELCOME'); ?>, <?php echo $this->me->getLink() ?></li>
					<li class="kms">
						<strong><?php echo JText::_('COM_KUNENA_MYPROFILE_LASTVISITDATE'); ?>:</strong>
						<span title="<?php echo KunenaDate::getInstance($this->me->lastvisitDate)->toKunena('ago'); ?>">
						<?php echo KunenaDate::getInstance($this->me->lastvisitDate)->toKunena('date_today'); ?>
						</span>
					</li>
				</ul>
				
				<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena') ?>" method="post" name="login" class="jf_ku_logged">
					<input type="hidden" name="view" value="user" />
					<input type="hidden" name="task" value="logout" />
					[K=TOKEN]

					<input type="submit" name="submit" class="button jf_ku_authoriz_btn" value="<?php echo JText::_('COM_KUNENA_PROFILEBOX_LOGOUT'); ?>" />
				</form>
				<div class="jf_ku_modal_close">×</div>
			</div>
		</div>
	</div>
	<div class="jf_ku_modal_overlay"></div>
	<button class="jf_ku_modal_trigger"><i class="fa fa-user"></i></button>
</div>
