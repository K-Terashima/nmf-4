<?php
/**<title>新パスワード取得</title>
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>


<?php if (have_posts()) : usces_remove_filter(); ?>

<div id="wc_<?php usces_page_name(); ?>">


	<div id="loginbox" class="container">
		<section class="section">
			<div class="header_explanation">
				<?php do_action('usces_action_newpass_page_header'); ?>
			</div>
			<div class="error_message"><?php usces_error_message(); ?></div>

			<div class="row">
				<div class="col offset-s2 s8">
					<h1><?php _e('The new password acquisition', 'usces'); ?></h1>
					<form name="loginform" id="loginform" action="<?php usces_url('member'); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
						<div class="input-field">
							<input type="text" name="loginmail" id="loginmail" class="loginmail" value=""/>
							<label for="loginmail"><?php _e('e-mail adress', 'usces'); ?></label>
						</div>
						<div class="input-field">
							<input type="submit" name="lostpassword" id="member_login" class="btn pink accent-1" value="<?php _e('Obtain new password', 'usces'); ?>" />
							<?php do_action('usces_action_newpass_page_inform'); ?>
						</div>
					</form>
					<?php _e('Change your password by following the instruction in this mail.', 'usces'); ?>
					<?php if ( ! usces_is_login() ) : ?>
						<p>
							<a href="<?php usces_url('login'); ?>"><?php _e('Log-in', 'usces'); ?></a>
						</p>
					<?php endif; ?>
				</div>
			</div>
			<div class="footer_explanation">
				<?php do_action('usces_action_newpass_page_footer'); ?>
			</div>


		</section>
	</div>

	<script>
		try{document.getElementById('loginmail').focus();}catch(e){}
	</script>



	<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</div>


<?php get_footer(); ?>
