<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>

<div id="index-banner" class="parallax-container parallax-height480">
	<div class="section no-pad">
		<div class="container">
			<?php breadcrumb(); ?>
		</div>
		<?php echo get_search_form(); ?>
			<div class="center">
					<!-- Modal Trigger -->
					<a class="waves-effect waves-light btn pink accent-3 modal-trigger" href="#modal-asign">関係者様へ</a>
			</div>
		<div id="modal-asign" class="modal">
			<div class="modal-content grey-text">
				<h4 class="black-text">関係者様へ</h4>
				<p>当サイト南陽磁力は、ウェブ上に南陽市情報の「ある化」をしています。</p>
				<p>南陽市にルーツのある方でしたら、各種情報やイベント情報などを公開することができます。</p>
				<p>南陽市関係者から1日400ビューの閲覧があり、増加傾向です。広報や集客ページとして活用検討ください。</p>
			</div>
			<div class="modal-footer">
				<a href="<?php echo get_bloginfo('url'); ?>/contact/" class=" modal-action modal-close waves-effect waves-green btn-flat">お問い合わせ</a>
			</div>
		</div>
	</div>
	<div class="parallax"><?php the_post_thumbnail('top-thumb'); ?></div>
</div>


<div id="product-content" class="container">


	<section id="product-meta" class="section">
		<?php if (have_posts()) : the_post(); ?>
		<header class="post-head">
			<h6><?php the_title(); ?></h6>
		</header>


		<?php usces_remove_filter(); ?>
		<?php usces_the_item(); ?>


		<?php usces_the_itemImage(0, 1280, 300, $post); ?>
		<div class="row">
			<?php $imageid = usces_get_itemSubImageNums(); ?>
			<?php foreach ( $imageid as $id ) : ?>
				<div class="col s3">
					<img src="<?php echo usces_the_itemImageURL($id); ?>" class="materialboxed" alt="" />
				</div>
			<?php endforeach; ?>
		</div>


		<?php if(usces_sku_num() === 1) : usces_have_skus(); ?>
		<h1 class="item_title"><?php usces_the_itemName(); ?></h1>
		<ul>
			<li><i class="material-icons tiny tooltipped" data-position="top" data-delay="10" data-tooltip="商品番号">view_list</i> <span><?php usces_the_itemCode(); ?></span></li>
			<li><i class="material-icons tiny tooltipped" data-position="top" data-delay="10" data-tooltip="カテゴリ">folder</i> <span><?php the_category(', '); ?></span></li>
			<li><i class="material-icons tiny tooltipped" data-position="top" data-delay="10" data-tooltip="タグ">loyalty</i> <span><?php the_tags('',', ','');?></span></li>
		</ul>



		<?php if( usces_the_itemCprice('return') > 0 ) : ?>
		<div class="row">
			<div class="col s6">
				<?php _e('List price', 'usces'); ?><?php usces_guid_tax(); ?>
			</div>
			<div class="col s6 right-align">
				<?php usces_the_itemCpriceCr(); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col s6">
				<?php _e('selling price', 'usces'); ?><?php usces_guid_tax(); ?>
			</div>
			<div class="col s6 right-align">
				<?php usces_the_itemPriceCr(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<?php _e('stock status', 'usces'); ?>:
			</div>
			<div class="col s6 right-align">
				<?php usces_the_itemZaikoStatus(); ?>
			</div>
		</div>
		<?php if( $item_custom = usces_get_item_custom( $post->ID, 'list', 'return' ) ) : ?>
		<div class="row">
			<?php echo $item_custom; ?>
		</div>
		<?php endif; ?>


		<form action="<?php echo USCES_CART_URL; ?>" method="post">
			<?php usces_the_itemGpExp(); ?>
			<?php if (usces_is_options()) : ?>
			<table class='item_option'>
				<thead>
					<tr>
						<caption><?php _e('Please appoint an option.', 'usces'); ?></caption>
					</tr>
				</thead>
			<?php while (usces_have_options()) : ?>
				<tbody>
					<tr>
						<th><?php usces_the_itemOptName(); ?></th>
						<td><?php usces_the_itemOption(usces_getItemOptName(),''); ?></td>
					</tr>
				</tbody>
			<?php endwhile; ?>
			</table>
			<?php endif; ?>


			<?php if( !usces_have_zaiko() ) : ?>
			<div class="row">
				<?php echo apply_filters('usces_filters_single_sku_zaiko_message', esc_html(usces_get_itemZaiko( 'name' ))); ?>
			</div>
			<?php else : ?>


			<div class="row">
				<div class="col s6">
					<?php _e('Quantity', 'usces'); ?>
				</div>
				<div class="col s6 right-align input-field">
					<?php usces_the_itemQuant(); ?>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<?php usces_the_itemSkuUnit(); ?>
				</div>
				<div id="button-change" class="col s6 right-align">
					<?php usces_the_itemSkuButton(__('Add to Shopping Cart', 'usces'), 0); ?>
				</div>
			</div>


			<?php usces_singleitem_error_message($post->ID, usces_the_itemSku('return')); ?>
			<?php endif; ?>
			<?php echo apply_filters('single_item_single_sku_after_field', NULL); ?>
			<?php do_action('usces_action_single_item_inform'); ?>
		</form>
		<?php do_action('usces_action_single_item_outform'); ?>
		<?php elseif(usces_sku_num() > 1) : usces_have_skus(); ?>





		<h2><?php usces_the_itemName(); ?> (<?php usces_the_itemCode(); ?>)</h2>
		<?php the_content(); ?>
		<?php if( $item_custom = usces_get_item_custom( $post->ID, 'list', 'return' ) ) : ?>
			<?php echo $item_custom; ?>
		<?php endif; ?>

		<form action="<?php echo USCES_CART_URL; ?>" method="post">
			<table class="skumulti">
				<thead>
					<tr>
						<th rowspan="2" class="thborder"><?php _e('order number', 'usces'); ?></th>
						<th colspan="2"><?php _e('Title', 'usces'); ?></th>
					<?php if( usces_the_itemCprice('return') > 0 ) : ?>
						<th colspan="2">(<?php _e('List price', 'usces'); ?>)<?php _e('selling price', 'usces'); ?><?php usces_guid_tax(); ?></th>
					<?php else : ?>
						<th colspan="2"><?php _e('selling price', 'usces'); ?><?php usces_guid_tax(); ?></th>
					<?php endif; ?>
					</tr>
					<tr>
						<th class="thborder"><?php _e('stock status', 'usces'); ?></th>
						<th class="thborder"><?php _e('Quantity', 'usces'); ?></th>
						<th class="thborder"><?php _e('unit', 'usces'); ?></th>
						<th class="thborder">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				<?php do { ?>
				<tr>
					<td rowspan="2"><?php usces_the_itemSku(); ?></td>
					<td colspan="2" class="skudisp subborder"><?php usces_the_itemSkuDisp(); ?>
				<?php if (usces_is_options()) : ?>
						<table class='item_option'>
						<caption><?php _e('Please appoint an option.', 'usces'); ?></caption>
				<?php while (usces_have_options()) : ?>
							<tr>
								<th><?php usces_the_itemOptName(); ?></th>
								<td><?php usces_the_itemOption(usces_getItemOptName(),''); ?></td>
							</tr>
				<?php endwhile; ?>
						</table>
				<?php endif; ?>
					</td>
					<td colspan="2" class="subborder price">
				<?php if( usces_the_itemCprice('return') > 0 ) : ?>
					<span class="cprice">(<?php usces_the_itemCpriceCr(); ?>)</span>
				<?php endif; ?>
					<span class="price"><?php usces_the_itemPriceCr(); ?></span>
					<br /><?php usces_the_itemGpExp(); ?>
					</td>
				</tr>
				<tr>
					<td class="zaiko"><?php usces_the_itemZaikoStatus(); ?></td>
					<td class="quant"><?php usces_the_itemQuant(); ?></td>
					<td class="unit"><?php usces_the_itemSkuUnit(); ?></td>
				<?php if( !usces_have_zaiko() ) : ?>
					<td class="button"><?php echo apply_filters('usces_filters_multi_sku_zaiko_message', esc_html(usces_get_itemZaiko( 'name' ))); ?></td>
				<?php else : ?>
					<td class="button"><?php usces_the_itemSkuButton(__('Add to Shopping Cart', 'usces'), 0); ?></td>
				<?php endif; ?>
				</tr>
				<tr>
					<td colspan="5" class="error_message"><?php usces_singleitem_error_message($post->ID, usces_the_itemSku('return')); ?></td>
				</tr>

				<?php } while (usces_have_skus()); ?>
				</tbody>
			</table>


		<?php echo apply_filters('single_item_multi_sku_after_field', NULL); ?>
		<?php do_action('usces_action_single_item_inform'); ?>
		</form>
		<?php do_action('usces_action_single_item_outform'); ?>
		<?php endif; ?>
	</section>


	<section id="post-article" class="section">
		<?php the_content(); ?>
	</section>






	<section id="loginbox" class="section">
		<h2>ログイン</h2>
		<?php if ( ! usces_is_login() ) { ?>
		<form id="loginform" action="<?php echo USCES_MEMBER_URL; ?>" method="post">
			<div class="input-field">
				<input type="text" name="loginmail" id="loginmail" value="<?php usces_remembername(); ?>" />
				<label for="loginmail"><?php _e('e-mail adress','usces') ?></label>
			</div>
			<div class="input-field">
				<input type="password" name="loginpass" id="loginpass" value="<?php usces_rememberpass(); ?>" />
				<label for="loginpass"><?php _e('password','usces') ?></label>
			</div>
			<div class="row">
				<div class="col s6">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever"<?php usces_remembercheck(); ?> />
					<label for="rememberme"><?php _e('memorize login information','usces') ?></label>
				</div>
				<div class="col s6">
					<input type="submit" name="member_login" id="member_login" class="btn pink accent-1" value="<?php _e('Log-in','usces') ?>" />
					<a class="btn-flat" href="<?php echo USCES_LOSTMEMBERPASSWORD_URL; ?>" title="<?php _e('Pssword Lost and Found','usces') ?>"><?php _e('Did you forget your password?','usces') ?></a>
					<a class="btn-flat" href="<?php echo USCES_NEWMEMBER_URL; ?>" title="<?php _e('New enrollment for membership.','usces') ?>"><?php _e('New enrollment for membership.','usces') ?></a>
				</div>
			</div>
		</form>
		<?php }else{ ?>
			<?php printf(__('Mr/Mrs %s', 'usces'), usces_the_member_name('return')); ?><br />
			<?php echo usces_loginout(); ?><br />
			<a href="<?php echo USCES_MEMBER_URL; ?>"><?php _e('Membership information','usces') ?></a>
		<?php } ?>
	</section>



	<?php usces_assistance_item( $post->ID, __('An article concerned', 'usces') ); ?>



	<?php else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
