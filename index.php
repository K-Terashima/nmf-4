<?php get_header(); ?>


      <div id="index-banner" class="parallax-container">
        <section class="section no-pad-bot">
          <div class="container">
            <br><br>
            <h1 class="header center white-text text-lighten-2">南陽市をウェブ上に「ある化」するミニマムメディア</h1>
            <div class="row center">
              <p class="header col s12 light">南陽磁力は、ウェブや紙媒体などに散在する南陽市の情報を整理し、ウェブ上に「ある化」する活動をしています。</p>
            </div>
            <br><br>
            <?php echo get_search_form(); ?>
          </div>
        </section>
        <div class="parallax img-blur"><img src="<?php echo get_template_directory_uri(); ?>/images/background1.jpg" alt="南陽磁力 ふるさと祭りvar."></div>
      </div>


      <div id="info" class="container">
        <section class="section">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col m4 s12">
                <!-- small box -->
                <div class="card small-box hoverable">
                  <div class="inner">
                    <h3>
                      <?php echo wp_count_posts()->publish; ?>
                    </h3>
                    <p>
                      全掲載数
                    </p>
                  </div>
                  <div class="icon">
                    <i class="material-icons large grey-text text-lighten-4">edit</i>
                  </div>
                  <a href="<?php get_bloginfo('url');?>/archive_all/" class="small-box-footer pink accent-1">
                    <span class="hide-on-small-only">全記事表示</span> <i class="material-icons tiny">keyboard_arrow_right</i>
                  </a>
                </div>
              </div><!-- ./col -->
              <div class="col m4 s12">
                <!-- small box -->
                <div class="card small-box hoverable">
                  <div class="inner">
                    <h3>
                      <?php $chosen_id = 576; $thisCat = get_category($chosen_id); echo $thisCat->count; ?>
                    </h3>
                    <p>
                      サービス業数
                    </p>
                  </div>
                  <div class="icon">
                    <i class="material-icons large grey-text text-lighten-4">store</i>
                  </div>
                  <a href="<?php get_bloginfo('url'); ?>/category/join/service/" class="small-box-footer pink accent-1">
                    <span class="hide-on-small-only">サービス業</span> <i class="material-icons tiny">keyboard_arrow_right</i>
                  </a>
                </div>
              </div><!-- ./col -->
              <div class="col m4 s12">
                <!-- small box -->
                <div class="card small-box hoverable">
                  <div class="inner">
                    <h3>
                      <?php echo wp_count_comments()->approved ; ?><sup style="font-size: .8rem;">件</sup>
                    </h3>
                    <p>
                      コメント数
                    </p>
                  </div>
                  <div class="icon">
                    <i class="material-icons large grey-text text-lighten-4">comment</i><span class="new badge pink accent-1 circle">1</span>
                  </div>
                  <a href="<?php echo get_bloginfo('url'); ?>/join/service/snack-tsubaki/#comments" class="small-box-footer pink accent-1">
                    <span class="hide-on-small-only">最新コメント </span><i class="material-icons tiny">keyboard_arrow_right</i>
                  </a>
                </div>
              </div><!-- ./col -->
          </div><!-- /.row -->
        </section>

        <section id="news" class="section">
          <div class="row">
            <div class="col s12">
              <div class="card hoverable">
                <div class="card-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/start_add.jpg">
                </div>
                <div class="card-content">
                  <p>南陽市全事業所1800件弱の、名称・所在地・電話番号などお問い合わせ・アクセス諸情報をウェブ上に登録しました。</p>
                  <p>2014年9月、ウェブ上に南陽市の情報がないことに危機感を得て、突貫で登録してきました。この1年間、掲載情報主さまに対し、確認や配慮不足など多々あり、ご迷惑をお掛けしています。合わせて、ご支援ご鞭撻ありがとうございました。</p>
                  <p>今後各事業主様へ、ご挨拶と利活用に過不足がないかご連絡させていただき、情報取得者の情報信頼性向上と発信者の利便性向上を図っていきます。</p>
                  <p>当サイトは、今後も南陽市の発展・利便性向上のため、努力を惜しまない所存です。ご指導よろしくお願いいたします。</p>
                  <p class="right"><strong>当サイト南陽磁力管理人 寺島和宏</strong></p>
                  <br>
                </div>
                <div class="card-action">
                  <a href="<?php get_bloginfo('url');?>/archive_all/" class="pink-text accent-1">全記事表示 <i class="material-icons tiny">keyboard_arrow_right</i></a>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col s12">
              <div class="card hoverable">
                <div class="card-action">
                  <a href="https://www.google.com/maps/d/viewer?mid=z1K74sTXjXLA.k_YWwFEMd5QI" class="pink-text accent-1">南陽市全域企業・農家・店舗掲載地図 <i class="material-icons tiny">keyboard_arrow_right</i></a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>


      <div id="archive-shop" class="container">
        <section class="section">
            <div class="row">
              <?php query_posts('category_name=service&posts_per_page=12&ignore_sticky_posts=1&orderby=rand'); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div class="col s4 m2">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                      <?php
                        if ( has_post_thumbnail() ) {
                          $title= get_the_title();
                          the_post_thumbnail('thumb-square-min',array('alt' => $title, 'class' => 'z-depth-1 circle responsive-img hoverable' ));
                        } else {
                          echo '<img class="circle responsive-img" src="' . get_template_directory_uri() . '/images/no-image.png" alt="NO IMAGE" />';
                        }
                      ?>
                    </a>
                </div>
              <?php endwhile; endif; ?>
              <?php wp_reset_query(); ?>
            </div>
        </section>
      </div>

      <div id="ad-bit" class="container">
        <div class="section">
          <div class="row">
            <div class="center-align">
              <a href="https://bitflyer.jp?bf=fxeyrqd1" target="_blank"><img class="responsive-img" src="https://bitflyer.jp/Images/Affiliate/affi_04_468x60.gif" alt="bitFlyer ビットコインを始めるなら安心・安全な取引所で"></a>
            </div>
          </div>
        </div>
      </div>

      <div id="archive" class="container">
        <section class="section">
          <div class="row">
            <?php query_posts(
            'cat=4, 5, 6, 454, 300',
            array(
              'post_type' => array('post'),
              'posts_per_page' => 20,
              'ignore_sticky_posts' => 1,
              //'cat' => array(  )//クリエイター, 医療・福祉, 他サービス業,join 410, 575, 584, 586, 589
              )

            ); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php
              $cat = get_the_category();
              $caty = $cat[0];
              $catname = $cat[0]->cat_name;
              $catslug = $cat[0]->slug;
              $tag = get_the_tags();
              $tagname = $tag[0]->name;
              $tagslug = $tag[0]->slug;
            ?>
            <div class="col s6 m3">

                <div class="card hoverable">
                  <div class="card-image">
                    <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
              				<?php
              					$title= get_the_title();
              					the_post_thumbnail( 'thumb-square-min',array('alt' =>$title ));
              				?>
              			<?php else: // サムネイルを持っていないときの処理 ?>
              				<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="NO IMAGE" title="NO IMAGE" />
              			<?php endif; ?>
                    </a>
                  </div>
                  <div class="card-content" style="height:100px; overflow: hidden;">
                    <a href="<?php the_permalink(); ?>"><h2 class="card-title grey-text text-darken-4" style="font-size: 1rem; line-height:1.75; margin: 0;"><?php the_title();?></h2></a>
                    <small>
                      <?php the_tags('',', ','');?>
                    </small>
                  </div>
                </div>

            </div>
            <?php endwhile; endif; ?>
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
