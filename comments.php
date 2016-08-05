<?php
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="row">
	<?php if (have_comments()) :?>
		<h5 id="comments-count"><?php echo get_comments_number().' 件のレビュー'; ?></h5>
		<ul id="comments-list">
		<?php wp_list_comments(array(
				'avatar_size'=>52,
				'style'=>'ul',
				'type'=>'comment'
			)); ?>
		</ul>
	<?php if (get_comment_pages_count() > 1) : ?>
		<ul id="comments-pagination">
			<li id="prev-comments"><?php previous_comments_link('&lt;&lt; 前のレビュー'); ?></li>
			<li id="next-comments"><?php next_comments_link('次のレビュー &gt;&gt;'); ?></li>
		</ul>
	<?php endif; endif; ?>

	<?php if(in_category(array('shop', 'corp'))): ?>
		<?php comment_form(array('title_reply'=> '間違いを見つけた')); ?>
	<?php else: ?>
		<?php comment_form(array('title_reply'=> 'ちょす')); ?>
	<?php endif; ?>
</div><!-- comments -->
