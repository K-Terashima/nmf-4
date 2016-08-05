<div id="index-banner" class="parallax-container">
  <div class="section no-pad">
    <div class="container">
      <?php breadcrumb(); ?>
    </div>
    <?php echo get_search_form(); ?>
  </div>
  <div class="parallax img-blur"><?php the_post_thumbnail('top-thumb'); ?></div>
</div>


<div id="article-single" class="container">
  <section class="section row">

      <article class="post-content col s12">
        <header class="post-head">
          <h1 class="post-title"><?php the_title(); ?></h1>
          <ul>
            <li><i class="material-icons tiny tooltipped" data-position="top" data-delay="10" data-tooltip="投稿日">create</i> <span><?php echo get_the_time('Y年m月d日'); ?></span></li>
            <li><i class="material-icons tiny tooltipped" data-position="top" data-delay="10" data-tooltip="カテゴリ">folder</i> <span><?php the_category(', '); ?></span></li>
            <!-- <li><a href="#"><i class="material-icons"></i> <span>Comments</span></a></li>-->
            <li><i class="material-icons tiny tooltipped" data-position="top" data-delay="10" data-tooltip="タグ">loyalty</i> <span><?php the_tags('',', ','');?></span></li>
            <!-- <li><a href="#"><i class="material-icons"></i><span>124 views</span></a></li>-->
          </ul>
        </header>


        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <section id="post-article" class="section">
            <?php the_content(); ?>
          </section>
        <?php endwhile; endif; ?>



      </article>

  </section>
</div>


<?php get_template_part('footer-recomend'); ?>
