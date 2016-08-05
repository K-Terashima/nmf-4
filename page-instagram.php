<?php get_header(); ?>


      <div id="index-banner" class="parallax-container">
        <section class="section">
          <div class="container">
            <?php breadcrumb(); ?>
          </div>
          <?php echo get_search_form(); ?>
        </section>
        <div class="parallax img-blur"><?php the_post_thumbnail('top-thumb'); ?></div>
      </div>




      <div class="page-instagram" class="container">
        <section class="section row">

          <article class="post-content col s12">
            <header class="post-head">
              <h1><?php the_title(); ?></h1>
              <p>Instagram内で投稿される#南陽市, #nanyo, #南陽市の強さ教えてやる, #赤湯温泉, #フラワー長井線など全国でもユニークなキーワードを表示しています。</p>
              <p>この他にも、オススメのハッシュタグがありましたら、教えてください(ง •̀_•́)۶</p>
            </header>

              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <section id="post-article" class="section">
                  <?php the_content(); ?>
                </section>
              <?php endwhile; endif; ?>
          </article>

        </section>
      </div>



      <?php get_template_part('footer-recomend') ?>


            <div class="parallax-container valign-wrapper">
              <section class="section no-pad">
                <div class="container">
                  <div class="row center">
                    <p class="header col s12 light">南陽市内で個々人が発信するグルメ情報やイベント情報・雇用情報など、点在する情報をまとめ集約することで、閲覧者の利便性向上と南陽市の広報効果を最大化します。ご要望やご意見ご質問などありましたら、お聴かせください。
      </p>
                  </div>
                </div>
              </section>
              <div class="parallax img-blur"><img src="<?php echo get_template_directory_uri(); ?>/images/background2.jpg" alt="Unsplashed background img 2"></div>
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
