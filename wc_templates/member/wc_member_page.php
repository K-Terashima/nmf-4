<?php
/** <title>会員情報と編集</title>
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>

<?php if (have_posts()) : usces_remove_filter(); ?>

<div id="wc_<?php usces_page_name(); ?>">

	<div id="user-tabs" class="container">
		<div class="section">
			<ul class="tabs">
				<li class="tab col s4"><a class="active" href="#user-info">会員情報</a></li>
				<li class="tab col s4"><a href="#user-history">購入履歴</a></li>
				<li class="tab col s4"><a href="#user-edit">登録情報変更</a></li>
			</ul>
		</div>
	</div>

	<div id="user-info" class="container">
		<section class="section">
			<h1 class="member_page_title"><?php esc_html_e(sprintf(__('Mr/Mrs %s', 'usces'), usces_localized_name( usces_memberinfo( 'name1', 'return' ), usces_memberinfo( 'name2', 'return' ), 'return' ))); ?> 会員情報</h1>

			<table class="highlight">
				<tr>
					<th class="col s12 m4" data-field="id"><?php _e('member number', 'usces'); ?></th>
					<td class="num col s12 m8"><?php usces_memberinfo( 'ID' ); ?></td>
				</tr>
				<tr>
					<th class="col s12 m4" data-field="date"><?php _e('Strated date', 'usces'); ?></th>
					<td class="col s12 m8"><?php usces_memberinfo( 'registered' ); ?></td>
				</tr>
				<tr>
					<th class="col s12 m4" data-field="name"><?php _e('Full name', 'usces'); ?></th>
					<td class="col s12 m8"><?php esc_html_e(sprintf(__('Mr/Mrs %s', 'usces'), usces_localized_name( usces_memberinfo( 'name1', 'return' ), usces_memberinfo( 'name2', 'return' ), 'return' ))); ?></td>
				</tr>
			<?php if(usces_is_membersystem_point()) : ?>
				<tr>
					<th class="col s12 m4" data-field="point"><?php _e('The current point', 'usces'); ?></th>
					<td class="col s12 m8"><?php usces_memberinfo( 'point' ); ?></td>
				</tr>
			<?php else : ?>
				<tr>
					<th class="col s12 m4" data-field="null">&nbsp;</th>
					<td class="col s12 m8">&nbsp;</td>
				</tr>
			<?php endif; ?>
				<tr>
					<th class="col s12 m4" data-field="email"><?php _e('e-mail adress', 'usces'); ?></th>
					<td class="col s12 m8"><?php usces_memberinfo('mailaddress1'); ?></td>
					<?php $html_reserve = '<th>&nbsp;</th><td>&nbsp;</td>'; ?>
					<?php echo apply_filters( 'usces_filter_memberinfo_page_reserve', $html_reserve, usces_memberinfo( 'ID', 'return' ) ); ?>
				</tr>
			</table>
			<ul class="member_submenu">
				<?php do_action( 'usces_action_member_submenu_list' ); ?>
				<li class="logout_member"><?php usces_loginout(); ?></li>
			</ul>

			<div class="header_explanation">
				<?php do_action('usces_action_memberinfo_page_header'); ?>
			</div>
		</section>
	</div>



	<div id="user-history" class="container">
		<section class="section">
			<h3><?php _e('Purchase history', 'usces'); ?></h3>
			<div class="currency_code"><?php _e('Currency','usces'); ?> : <?php usces_crcode(); ?></div>
			<?php usces_member_history(); ?>
		</section>
	</div>


	<div id="user-edit" class="container">
		<section class="section">
			<h3><a name="edit"></a><?php _e('Member information editing', 'usces'); ?></h3>
			<div class="error_message"><?php usces_error_message(); ?></div>
			<form action="<?php usces_url('member'); ?>#edit" method="post" onKeyDown="if (event.keyCode == 13) {return false;}">
				<table class="customer_form">
					<?php uesces_addressform( 'member', usces_memberinfo(NULL), 'echo' ); ?>
					<tr>
						<th data-field="email"><?php _e('e-mail adress', 'usces'); ?></th>
						<td><input name="member[mailaddress1]" id="mailaddress1" type="text" value="<?php usces_memberinfo('mailaddress1'); ?>" /></td>
					</tr>
					<tr>
						<th data-field="password"><?php _e('password', 'usces'); ?></th>
						<td><input class="hidden" value=" " /><input name="member[password1]" id="password1" type="password" value="<?php usces_memberinfo('password1'); ?>" autocomplete="off" />
						<?php _e('Leave it blank in case of no change.', 'usces'); ?></td>
					</tr>
					<tr>
						<th data-field="password confirm"><?php _e('Password (confirm)', 'usces'); ?></th>
						<td><input name="member[password2]" id="password2" type="password" value="<?php usces_memberinfo('password2'); ?>" />
						<?php _e('Leave it blank in case of no change.', 'usces'); ?></td>
					</tr>
				</table>
				<input name="member_regmode" type="hidden" value="editmemberform" />
				<div class="send row">
					<div class="col s6">
						<input name="deletemember" type="submit" class="btn-flat disabled" value="<?php _e('delete it', 'usces'); ?>" onclick="return confirm('<?php _e('All information about the member is deleted. Are you all right?', 'usces'); ?>');" />
					</div>
					<div class="col s6">
						<input name="editmember" type="submit" class="btn pink accent-1" value="<?php _e('update it', 'usces'); ?>" />
					</div>
				</div>
				<?php do_action('usces_action_memberinfo_page_inform'); ?>
			</form>

			<div class="footer_explanation">
				<?php do_action('usces_action_memberinfo_page_footer'); ?>
			</div>
		</section>
	</div>




	<?php else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>


<?php get_footer(); ?>
