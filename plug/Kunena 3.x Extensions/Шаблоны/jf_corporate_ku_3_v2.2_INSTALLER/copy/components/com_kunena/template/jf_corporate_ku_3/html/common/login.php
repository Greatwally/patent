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
<?php if ($this->login->enabled()) : ?>
<div id="jf_ku_login">
	<div class="jf_ku_modal jf_ku_modal_effect_5">
		<div class="jf_ku_modal_content">
			<h3><?php echo JText::_('MOD_JF_KU_LOGIN_ACCOUNT'); ?></h3>
			<div>
				<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena') ?>" method="post" name="login">
					<input type="hidden" name="view" value="user" />
					<input type="hidden" name="task" value="login" />
					[K=TOKEN]
					
					<fieldset class="userdata">
						<div class="jf_ku_authorizing_wrap">
							<div class="jf_ku_authorize">
								<p>
									<a class="jf_ku_forgot" href="<?php echo $this->lostUsernameUrl ?>" title="<?php echo JText::_('COM_KUNENA_PROFILEBOX_FORGOT_USERNAME'); ?>">
										<i class="fa fa-question"></i>
									</a>
									<input type="text" name="username" class="inputbox ks" alt="username" size="18" placeholder="<?php echo JText::_('COM_KUNENA_LOGIN_USERNAME') ?>" />
									<label class="jf_ku_input_icon" for="modlgn-username"><i class="fa fa-user"></i></label>
								</p>
								<p>
									<input type="password" name="password" class="inputbox ks" size="18" alt="password" placeholder="<?php echo JText::_('COM_KUNENA_LOGIN_PASSWORD'); ?>" />
									
									<label class="jf_ku_input_icon" for="modlgn-passwd"><i class="fa fa-key"></i></label>
									<a class="jf_ku_forgot" href="<?php echo $this->lostPasswordUrl ?>" title="<?php echo JText::_('COM_KUNENA_PROFILEBOX_FORGOT_PASSWORD'); ?>">
										<i class="fa fa-question"></i>
									</a>
								</p>
								<?php if($this->remember) : ?>
									<p class="jf_ku_ku_remember">
										<label><?php echo JText::_('COM_KUNENA_LOGIN_REMEMBER_ME'); ?></label>
										<input type="checkbox" name="remember" class="inputbox" alt="" value="1" />
									</p>
								<?php endif; ?>
								<input type="submit" name="submit" class="jf_ku_authoriz_btn" value="<?php echo JText::_('COM_KUNENA_PROFILEBOX_LOGIN'); ?>" />
							</div>
							<span class="jf_ku_authorizing_text"><?php echo JText::_('MOD_JF_KU_LOGIN_AUTHORIZATING_TEXT'); ?></span>
						</div>
					</fieldset>
					
					<?php if ($this->registerUrl) : ?>
						<div class="jf_ku_register">
							<a class="jf_ku_register_link" href="<?php echo $this->registerUrl ?>">
								<?php echo JText::_('COM_KUNENA_PROFILEBOX_CREATE_ACCOUNT'); ?>
							</a>
							<i class="fa fa-arrow-right"></i>
						</div>
					<?php endif; ?>
					
					
					<div class="clear"></div>
				</form>
				<div class="jf_ku_modal_close">×</div>
			</div>
		</div>
	</div>
	<div class="jf_ku_modal_overlay"></div>
	<button class="jf_ku_modal_trigger"><i class="fa fa-lock"></i></button>
</div>
<?php endif; ?>