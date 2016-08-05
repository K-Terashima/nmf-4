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
		<section class="section">
			<div class="row">
				<div class="col s12">
					<?php if (have_posts()) : usces_remove_filter(); ?>
					<h1 class="member_page_title"><?php _e('Completion', 'usces'); ?></h1>
					<div class="header_explanation">
						<?php do_action('usces_action_membercompletion_page_header'); ?>
					</div>




					<?php $member_compmode = usces_page_name('return'); ?>
					<?php if ( 'newcompletion' == $member_compmode ) : ?>
					<p><?php _e('Thank you in new membership.', 'usces'); ?></p>

					<?php elseif ( 'editcompletion' == $member_compmode ) : ?>
					<p><?php _e('Membership information has been updated.', 'usces'); ?></p>

					<?php elseif ( 'lostcompletion' == $member_compmode ) : ?>
					<p><?php _e('I transmitted an email.', 'usces'); ?></p>
					<p><?php _e('Change your password by following the instruction in this mail.', 'usces'); ?></p>

					<?php elseif ( 'changepasscompletion' == $member_compmode ) : ?>
					<p><?php _e('Password has been changed.', 'usces'); ?></p>

					<?php endif; ?>


					<div class="footer_explanation">
					<?php do_action('usces_action_membercompletion_page_footer'); ?>
					</div>

					<p><a href="<?php usces_url('member'); ?>"><?php _e('to vist membership information page', 'usces'); ?></a></p>

					<div class="send"><a href="<?php echo home_url(); ?>" class="back_to_top_button"><?php _e('Back to the top page.', 'usces'); ?></a></div>
				<!--	<form action="<?php echo home_url(); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
					<div class="send"><input name="top" type="submit" value="<?php _e('Back to the top page.', 'usces'); ?>" /></div>
					<?php //do_action('usces_action_membercompletion_page_inform'); ?>
					</form>
				-->

					<?php else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div>

</div>

<?php get_footer(); ?>
