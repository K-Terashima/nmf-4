<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>

<div id="wc_<?php usces_page_name(); ?>">


	<div class="container">
		<section>
			<div class="row">
				<div class="col offset-s2 s8">
					<?php if (have_posts()) : usces_remove_filter(); ?>
					<h1 class="member_page_title"><?php _e('Change password', 'usces'); ?></h1>
					<div class="header_explanation">
						<?php do_action('usces_action_changepass_page_header'); ?>
					</div>

					<div class="error_message"><?php usces_error_message(); ?></div>

					<form name="loginform" id="loginform" action="<?php usces_url('member'); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
						<div class="input-field">
							<label for="loginpass1"><?php _e('password', 'usces'); ?></label>
							<input type="password" name="loginpass1" id="loginpass1" class="loginpass" value="" size="20" />
						</p>
						<div class="input-field">
							<label for="loginpass2"><?php _e('Password (confirm)', 'usces'); ?></label>
							<input type="password" name="loginpass2" id="loginpass2" class="loginpass" value="" size="20" />
						</div>
						<input type="submit" name="changepassword" id="member_login" class="btn pink accent-1" value="<?php _e('Register', 'usces'); ?>" />
						<?php do_action('usces_action_changepass_page_inform'); ?>
					</form>


					<div class="footer_explanation">
						<?php do_action('usces_action_changepass_page_footer'); ?>
					</div>




					<?php else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div>


	<script type="text/javascript">
		try{document.getElementById('loginpass1').focus();}catch(e){}
	</script>
</div>


<?php get_footer(); ?>
