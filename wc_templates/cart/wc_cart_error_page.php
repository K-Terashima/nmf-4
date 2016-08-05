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
			<h1><?php _e('Error', 'usces'); ?></h1>
			<h2>ERROR</h2>
			<p><?php _e('Your order has not been completed', 'usces'); ?></p>
			<p>(error <?php esc_html_e( urldecode($_REQUEST['acting_return']) ); ?>)</p>

			<?php uesces_get_error_settlement(); ?>


			<?php else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		</section>
	</div>


</div>


<?php get_footer(); ?>
