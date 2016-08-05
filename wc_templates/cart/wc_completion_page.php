<?php
/**
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
			<h1><?php _e('Completion', 'usces'); ?></h1>
			<h3><?php _e('It has been sent succesfully.', 'usces'); ?></h3>
			<div class="header_explanation">
				<p><?php _e('Thank you for shopping.', 'usces'); ?><br /><?php _e("If you have any questions, please contact us by 'Contact'.", 'usces'); ?></p>
				<?php do_action('usces_action_cartcompletion_page_header', $usces_entries, $usces_carts); ?>
			</div><!-- header_explanation -->

			<?php usces_completion_settlement(); ?>

			<?php do_action('usces_action_cartcompletion_page_body', $usces_entries, $usces_carts); ?>

			<div class="footer_explanation">
				<?php do_action('usces_action_cartcompletion_page_footer', $usces_entries, $usces_carts); ?>
			</div><!-- footer_explanation -->

			<p>
				<a href="<?php echo home_url(); ?>"><?php _e('Back to the top page.', 'usces'); ?></a>
			</p>
			<!--	<form action="<?php echo home_url(); ?>" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
				<div class="send"><input name="top" class="back_to_top_button" type="submit" value="<?php _e('Back to the top page.', 'usces'); ?>" /></div>
				<?php //do_action('usces_action_cartcompletion_page_inform'); ?>
				</form>
			-->
			<?php echo apply_filters('usces_filter_conversion_tracking', NULL, $usces_entries, $usces_carts); ?>


			<?php else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		</section>
	</div>


</div>
<?php get_footer(); ?>
