<?php
/**<title>新規入会フォーム</title>
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>

<div id="wc_<?php usces_page_name(); ?>">

	<?php if (have_posts()) : usces_remove_filter(); ?>
	<div class="container">
		<section class="section">
			<div class="row">
				<div class="col s12">
					<h1><?php _e('New enrollment form', 'usces'); ?></h1>

					<ul>
						<li><?php _e('All your personal information  will be protected and handled with carefull attention.', 'usces'); ?></li>
						<li><?php _e('Your information is entrusted to us for the purpose of providing information and respond to your requests, but to be used for any other purpose. More information, please visit our Privacy  Notice.', 'usces'); ?></li>
						<li><?php _e('The items marked with *, are mandatory. Please complete.', 'usces'); ?></li>
						<li><?php _e('Please use Alphanumeric characters for numbers.', 'usces'); ?></li>
					</ul>
					<?php do_action('usces_action_newmember_page_header'); ?>


					<div class="error_message"><?php usces_error_message(); ?></div>
					<form action="<?php echo apply_filters('usces_filter_newmember_form_action', usces_url('member', 'return')); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
						<table border="0" cellpadding="0" cellspacing="0" class="customer_form">
							<tr>
								<th><?php _e('*', 'usces'); ?><?php _e('e-mail adress', 'usces'); ?></th>
								<td colspan="2"><input name="member[mailaddress1]" id="mailaddress1" type="text" value="<?php usces_memberinfo('mailaddress1'); ?>" /></td>
							</tr>
							<tr>
								<th><?php _e('*', 'usces'); ?><?php _e('E-mail address (for verification)', 'usces'); ?></th>
								<td colspan="2"><input name="member[mailaddress2]" id="mailaddress2" type="text" value="<?php usces_memberinfo('mailaddress2'); ?>" /></td>
							</tr>
							<tr>
							<th><?php _e('*', 'usces'); ?><?php _e('password', 'usces'); ?></th>
							<td colspan="2"><input class="hidden" value=" " /><input name="member[password1]" id="password1" type="password" value="<?php usces_memberinfo('password1'); ?>" autocomplete="off" /></td>
							</tr>
							<tr>
							<th><?php _e('*', 'usces'); ?><?php _e('Password (confirm)', 'usces'); ?></th>
							<td colspan="2"><input name="member[password2]" id="password2" type="password" value="<?php usces_memberinfo('password2'); ?>" /></td>
							</tr>
							<?php uesces_addressform( 'member', usces_memberinfo(NULL), 'echo' ); ?>
						</table>
						<div id="button-change"><?php usces_newmember_button($member_regmode); ?></div>
						<?php do_action('usces_action_newmember_page_inform'); ?>
					</form>

					<div class="footer_explanation">
						<?php do_action('usces_action_newmember_page_footer'); ?>
					</div><!-- end of footer_explanation -->

					<?php else: ?>
						<?php _e('Sorry, no posts matched your criteria.'); ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div>


</div>

<?php get_footer(); ?>
