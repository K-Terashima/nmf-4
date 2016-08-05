<?php get_header(); ?>


      <div id="index-banner" class="parallax-container">
        <section class="section no-pad-bot">
          <div class="container">
            <br><br>
            <h1 class="header center grey-text text-darken-4">
              <?php
              global $wpdb;
            	// defaultsearchでカスタムフィールドの検索
            	// $keyword = sanitize_text_field( $_POST['keyword'] );
            	$keyword = get_search_query();
            	$keyword = '%' . like_escape( $keyword ) . '%'; // Thanks Manny Fleurmond
            	// カスタムフィールドの検索
            	$post_ids_meta = $wpdb->get_col( $wpdb->prepare( "
            	    SELECT DISTINCT post_id FROM {$wpdb->postmeta}
            	    WHERE meta_value LIKE '%s'
            	", $keyword ) );
            	// タイトル・コンテンツの検索
            	$post_ids_post = $wpdb->get_col( $wpdb->prepare( "
            	    SELECT DISTINCT ID FROM {$wpdb->posts}
            	    WHERE post_title LIKE '%s'
            	    OR post_content LIKE '%s'
            	", $keyword, $keyword ) );
            	$post_ids = array_merge( $post_ids_meta, $post_ids_post );
            	// Query arguments
            	$args = array(
            	    'post_type'   => 'post',
            	    'post_status' => 'publish',
            	    'post__in'    => $post_ids,
            	    'posts_per_page' => '18',
            	);
              $allsearch =& new WP_Query($args);
              $key = wp_specialchars($s, 1);
              $count = $allsearch->post_count;

              if($count!=0){
              // 検索結果を表示:該当記事あり
                  echo '【 '. $key .' 】で検索した結果、<strong>'.$count.'</strong>件の記事が見つかりました';
              }
              else {
              // 検索結果を表示:該当記事なし
                  echo '【 '. $key .' 】で検索した結果、関連する記事は見つかりませんでした';
              }
              ?>
            </h1>
            <?php echo get_search_form(); ?>
            <br><br>
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
            <div class="col s12">
              <?php
                //Pagenation
                if (function_exists("pagination")) {
                  pagination($additional_loop->max_num_pages);
                }
              ?>
            </div>
          </div>
          <div class="row">
            <?php
            	global $wpdb;
            	// defaultsearchでカスタムフィールドの検索
            	// $keyword = sanitize_text_field( $_POST['keyword'] );
            	$keyword = get_search_query();
            	$keyword = '%' . like_escape( $keyword ) . '%'; // Thanks Manny Fleurmond
            	// カスタムフィールドの検索
            	$post_ids_meta = $wpdb->get_col( $wpdb->prepare( "
            	    SELECT DISTINCT post_id FROM {$wpdb->postmeta}
            	    WHERE meta_value LIKE '%s'
            	", $keyword ) );
            	// タイトル・コンテンツの検索
            	$post_ids_post = $wpdb->get_col( $wpdb->prepare( "
            	    SELECT DISTINCT ID FROM {$wpdb->posts}
            	    WHERE post_title LIKE '%s'
            	    OR post_content LIKE '%s'
            	", $keyword, $keyword ) );
            	$post_ids = array_merge( $post_ids_meta, $post_ids_post );
            	// Query arguments
            	$args = array(
            	    'post_type'   => 'post',
            	    'post_status' => 'publish',
            	    'post__in'    => $post_ids,
            	    'posts_per_page' => '20',
            	);
            	$query = new WP_Query( $args );
            	if ( have_posts() ): while ( $query->have_posts() ) : $query->the_post();
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
                    <h2 class="card-title grey-text text-darken-4" style="font-size: 1rem; line-height:1.75; margin: 0;"><?php the_title();?></h2>
                    <small>
                      <?php the_tags('',', ','');?>
                    </small>
                  </div>
                </div>
              </a>
            </div>
            <?php endwhile; ?>
            <?php else:?>
              <div class="col s12 m10 offset-m1 l8 offset-l2">
                <h2>
                  お探しの情報は見つけられませんでした。
                </h2>
                <p>こちらに下記の要素にお探しのものはありませんか？</p>
                <h2>タグクラウド</h2>
                <?php wp_tag_cloud('smallest=10&largest=16&number=200&format=flat&separator=, &order=DESC&orderby=count'); ?>
              </div>
            <?php endif;?>
            <!-- <?php wp_reset_query(); ?> -->
            <div class="row">
              <div class="col s12">
                <?php
              		//Pagenation
              		if (function_exists("pagination")) {
              			pagination($additional_loop->max_num_pages);
              		}
              	?>
              </div>
            </div>
          </div>
        </section>
      </div>


      <div class="parallax-container valign-wrapper">
        <div class="section no-pad">
          <div class="container">
            <div class="row center">
              <p class="header col s12 light">南陽市内で個々人が発信するグルメ情報やイベント情報・雇用情報など、点在する情報をまとめ集約することで、閲覧者の利便性向上と南陽市の広報効果を最大化します。ご要望やご意見ご質問などありましたら、お聴かせください。
            </div>
          </div>
        </div>
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
