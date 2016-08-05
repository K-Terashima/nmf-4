<?php
/*
Template Name: archive_all
use: 全記事表示,
*/
?>

<?php get_header(); ?>


      <div id="index-banner" class="parallax-container">
        <section class="section">
          <div class="container">
            <br><br>
            <h1 class="header center white-text bold">
              <?php wp_title(''); ?>一覧
            </h1>
            <br><br>
            <div class="row">
              <?php echo get_search_form(); ?>
            </div>
            <div class="row center">
              <a class="btn waves-effect waves-light pink accent-1" href="<?php get_bloginfo('url');?>/tagcloud/" title="各記事・店舗の構成要素">要素から探す</a>
            </div>
          </div>
        </section>
        <div class="parallax img-blur"><img src="<?php echo get_template_directory_uri(); ?>/images/archive-top-thumb.jpg" alt="Unsplashed background img 1"></div>
      </div>


      <div id="archive" class="container">
        <section class="section">
          <div class="row">
            <?php
              $per_page = 20; //ページあたりの件数
              $query = get_query_var('paged');
              if($query == 0){
              	$start = 1;
              }else{
              	$start = ($query - 1) * $per_page + 1;
              }

              query_posts( 'post_status=publish&posts_per_page='.$per_page.'&paged='.$query );
            ?>
            <div class="col s12">
              <?php
                //Pagenation
                if (function_exists("pagination")) {
                  pagination($additional_loop->max_num_pages);
                }
              ?>
            </div>
            <?php if(have_posts()) : while (have_posts()) : the_post();
            $cat = get_the_category();
            $caty = $cat[0];
            $catname = $cat[0]->cat_name;
            $catslug = $cat[0]->slug;
            $tag = get_the_tags();
            $tagname = $tag[0]->name;
            $tagslug = $tag[0]->slug;
            ?>
            <div class="col s6 m3">
              <a href="<?php the_permalink(); ?>">
                <div class="card hoverable">
                  <div class="card-image">
                    <?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
              				<?php
              					$title= get_the_title();
              					the_post_thumbnail( 'thumb-square-min',array('alt' => $title));
              				?>
              			<?php else: // サムネイルを持っていないときの処理 ?>
              				<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="NO IMAGE" title="NO IMAGE" />
              			<?php endif; ?>
                  </div>
                  <div class="card-content" style="height:100px; overflow: hidden;">
                    <h1 class="card-title grey-text text-darken-4" style="font-size: 1rem; line-height:1.75; margin: 0;"><?php the_title();?></h1>
                    <small>
                      <?php the_tags('',', ','');?>
                    </small>
                  </div>
                </div>
              </a>
            </div>
            <?php endwhile; endif; ?>
            <div class="col s12">
              <?php
            		//Pagenation
            		if (function_exists("pagination")) {
            			pagination($additional_loop->max_num_pages);
            		}
            	?>
            </div>
            <?php wp_reset_query(); ?>
          </div>
        </section>
      </div>


      <div class="parallax-container valign-wrapper">
        <section class="section no-pad">
          <div class="container">
            <div class="row center">
              <p class="header col s12 light">南陽市内で個々人が発信するグルメ情報やイベント情報・雇用情報など、点在する情報をまとめ集約することで、閲覧者の利便性向上と南陽市の広報効果を最大化します。ご要望やご意見ご質問などありましたら、お聴かせください。
              </p>
            </div>
          </div>
        </section>
        <div class="parallax img-blur"><img /src="<?php echo get_template_directory_uri(); ?>/images/background2.jpg" alt="Unsplashed background img 2"></div>
      </div>


      <div class="container">
        <div class="section">

          <div class="row">
            <div class="col s12 center">
              <h3><i class="mdi-content-send pink-text text-accent-1"></i></h3>
              <h4>お問い合わせ</h4>
              <div　id="contact-form" class="row">
                <?php echo do_shortcode( '[contact-form-7 id="1600" title="contact-form"]' );//1300 ?>
              </div>
            </div>
          </div>

        </div>
      </div>



<?php get_footer(); ?>
