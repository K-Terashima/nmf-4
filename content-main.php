      <div id="index-banner" class="parallax-container">
        <div class="section no-pad">
          <div class="container">
            <?php breadcrumb(); ?>
          </div>
          <?php echo get_search_form(); ?>
        </div>
        <div class="parallax img-blur"><?php the_post_thumbnail('top-thumb'); ?></div>
      </div>


      <?php get_template_part('article-top'); //回遊用リンク ?>


      <div id="article-single" class="container">

        <section class="section row">

            <article class="post-content col s12 l8">
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

              <?php if(in_category(array('service','join','service-o','estate','mediwel','retail','formal','build','info','education','fab','agfo','finance'))): ?>
              <?php
                // 現在の投稿のカスタムフィールド情報を全て取得
                $custom_fields = get_post_custom();
                // []内はカスタムフィールドのスラグ、フィールドの値を変数に格納する( $aaa = $custom_fields['aaa']; )
                //about部
                $servicePhoto01 = get_post_meta($post->ID, 'servicePhoto01', true);
                $servicePhoto02 = get_post_meta($post->ID, 'servicePhoto02', true);
                $servicePhoto03 = get_post_meta($post->ID, 'servicePhoto03', true);
                $servicePhotoSquare01 = wp_get_attachment_image_src($servicePhoto01, 'thumb-square');
                $servicePhotoSquare02 = wp_get_attachment_image_src($servicePhoto02, 'thumb-square');
                $servicePhotoSquare03 = wp_get_attachment_image_src($servicePhoto03, 'thumb-square');
                $serviceTitle01 = $custom_fields['serviceTitle01'];
                $serviceTitle02 = $custom_fields['serviceTitle02'];
                $serviceTitle03 = $custom_fields['serviceTitle03'];
                $serviceText01 = $custom_fields['serviceText01'];
                $serviceText02 = $custom_fields['serviceText02'];
                $serviceText03 = $custom_fields['serviceText03'];
                //process部
                $strongTitle01 = $custom_fields['strongTitle01'];
                $strongTitle02 = $custom_fields['strongTitle02'];
                $strongTitle03 = $custom_fields['strongTitle03'];
                $strongTitle04 = $custom_fields['strongTitle04'];
                //team部
                $staffPhoto01 = get_post_meta($post->ID, 'staffPhoto01', true);
                $staffPhotoSquare01 = wp_get_attachment_image_src($staffPhoto01, 'thumb-square-min');
                $staffPhoto02 = get_post_meta($post->ID, 'staffPhoto02', true);
                $staffPhoto03 = get_post_meta($post->ID, 'staffPhoto03', true);
                $staffPhoto04 = get_post_meta($post->ID, 'staffPhoto04', true);
                $staffPhoto05 = get_post_meta($post->ID, 'staffPhoto05', true);
                $staffPhoto06 = get_post_meta($post->ID, 'staffPhoto06', true);
                $staffName01 = $custom_fields['staffName01'];
                $staffName02 = $custom_fields['staffName02'];
                $staffName03 = $custom_fields['staffName03'];
                $staffName04 = $custom_fields['staffName04'];
                $staffName05 = $custom_fields['staffName05'];
                $staffName06 = $custom_fields['staffName06'];
                $staffAuth01 = $custom_fields['staffAuth01'];
                $staffAuth02 = $custom_fields['staffAuth02'];
                $staffAuth03 = $custom_fields['staffAuth03'];
                $staffAuth04 = $custom_fields['staffAuth04'];
                $staffAuth05 = $custom_fields['staffAuth05'];
                $staffAuth06 = $custom_fields['staffAuth06'];
                //map部
                $accessTitle = $custom_fields['accessTitle'];
                $accessTel = $custom_fields['accessTel'];
                $accessTime = $custom_fields['accessTime'];
                $accessHoliday = $custom_fields['accessHoliday'];
                $accessYosan = $custom_fields['accessYosan'];
                $accessPost = $custom_fields['accessPost'];
                $accessAddress = $custom_fields['accessAddress'];
                $accessMap = $custom_fields['accessMap'];
              //end カスタムフィールド取得
              ?>

              <?php /* 有料拡張サービス */ ?>
              <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col m3 s12"><a class="active" href="#test1">Test 1</a></li>
                    <li class="tab col m3 s12"><a href="#test2">Test 2</a></li>
                    <li class="tab col m3 s12"><a href="#test3">Test 3</a></li>
                    <li class="tab col m3 s12"><a href="#test4">Test 4</a></li>
                  </ul>
                </div>
                <div id="test1" class="col s12">

                  <!-- アイキャッチ・サービス -->
                  <section id="post-service" class="section">
                    <div class="slider">
                      <ul class="slides">
                        <li>
                          <?php if(empty($servicePhoto01)):?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $serviceTitle01[0] ?>" />
                            <?php else: ?>
                            <img src="<?php echo wp_get_attachment_url($servicePhoto01); ?>" alt="<?php echo $serviceTitle01[0] ?>" />
                          <?php endif; ?>
                          <div class="caption center-align">
                            <h3><?php echo $serviceTitle01[0] ?></h3>
                          </div>
                        </li>
                        <li>
                          <?php if(empty($servicePhoto02)):?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $serviceTitle02[0] ?>" />
                            <?php else: ?>
                            <img src="<?php echo wp_get_attachment_url($servicePhoto02); ?>" alt="<?php echo $serviceTitle02[0] ?>" />
                          <?php endif; ?>
                          <div class="caption left-align">
                            <h3><?php echo $serviceTitle02[0] ?></h3>
                          </div>
                        </li>
                        <li>
                          <?php if(empty($servicePhoto03)):?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $serviceTitle03[0] ?>" />
                            <?php else: ?>
                            <img src="<?php echo wp_get_attachment_url($servicePhoto03); ?>" alt="<?php echo $serviceTitle03[0] ?>" />
                          <?php endif; ?>
                          <div class="caption right-align">
                            <h3><?php echo $serviceTitle03[0] ?></h3>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <h2><?php echo $accessTitle[0] ?>のサービス</h2>
                    <div class="row">
                      <div class="col s4">
                        <?php if(empty($servicePhoto01)):?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $serviceTitle01[0] ?>" />
                          <?php else: ?>
                          <img class="materialboxed circle responsive-img z-depth-1 hoverable" src="<?php echo $servicePhotoSquare01[0]; ?>" alt="<?php echo $serviceTitle01[0] ?>" />
                        <?php endif; ?>
                      </div>
                      <div class="col s4">
                        <?php if(empty($servicePhoto02)):?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $serviceTitle02[0] ?>" />
                          <?php else: ?>
                          <img class="materialboxed circle responsive-img z-depth-1 hoverable" src="<?php echo $servicePhotoSquare02[0]; ?>" alt="<?php echo $serviceTitle02[0] ?>" />
                        <?php endif; ?>
                      </div>
                      <div class="col s4">
                        <?php if(empty($servicePhoto03)):?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $serviceTitle03[0] ?>" />
                          <?php else: ?>
                          <img class="materialboxed circle responsive-img z-depth-1 hoverable" src="<?php echo $servicePhotoSquare03[0]; ?>" alt="<?php echo $serviceTitle03[0] ?>" />
                        <?php endif; ?>
                      </div>
                    </div>

                    <ul class="collapsible popout" data-collapsible="accordion">
                      <li>
                        <div class="collapsible-header active"><i class="material-icons">thumb_up</i><?php echo $serviceTitle01[0] ?></div>
                        <div class="collapsible-body"><p><?php echo $serviceText01[0] ?></p></div>
                      </li>
                      <li>
                        <div class="collapsible-header"><i class="material-icons">favorite</i><?php echo $serviceTitle02[0] ?></div>
                        <div class="collapsible-body"><p><?php echo $serviceText02[0] ?></p></div>
                      </li>
                      <li>
                        <div class="collapsible-header"><i class="material-icons">grade</i><?php echo $serviceTitle03[0] ?></div>
                        <div class="collapsible-body"><p><?php echo $serviceText03[0] ?></p></div>
                      </li>
                    </ul>
                  </section>


                  <!-- 強み弱み -->
                  <section id="post-strong" class="section">
                    <h2><?php echo $accessTitle[0] ?>の強みと特徴</h2>
                    <ul class="collection with-header">
                      <li class="collection-item"><div><?php echo $strongTitle01[0] ?><i class="material-icons left">chevron_right</i></div></li>
                      <li class="collection-item"><div><?php echo $strongTitle02[0] ?><i class="material-icons left">chevron_right</i></div></li>
                      <li class="collection-item"><div><?php echo $strongTitle03[0] ?><i class="material-icons left">chevron_right</i></div></li>
                      <li class="collection-item"><div><?php echo $strongTitle04[0] ?><i class="material-icons left">chevron_right</i></div></li>
                    </ul>
                  </section>
                <?php endif; //join表示#前半 ?>



                <section id="post-ad" class-"section">
                  <div class="row">
                    <div class="col s12">
                      <!-- nmf-content-left -->
                      <ins class="adsbygoogle"
                           style="display:block"
                           data-ad-client="ca-pub-8212203315180935"
                           data-ad-slot="7158678882"
                           data-ad-format="auto"></ins>
                      <script>
                      (adsbygoogle = window.adsbygoogle || []).push({});
                      </script>
                    </div>
                  </div>
                </section>


                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <section id="post-article" class="section">
                    <?php the_content(); ?>
                  </section>
                <?php endwhile; endif; ?>




                <?php if(in_category(array('service','join','service-o','estate','mediwel','retail','formal','build','info','education','fab','agfo','finance'))): ?>
                <!-- スタッフ -->
                <section id="post-staff" class="section">
                  <h2><?php echo $accessTitle[0] ?>で働くスタッフ</h2>
                  <div class="row">
                    <div class="chip col s12 m6 l4">
                      <?php if(empty($staffPhotoSquare01)):?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff.png" alt="<?php echo $staffName01[0] ?>" />
                      <?php else: ?>
                        <img class="materialboxed" src="<?php echo wp_get_attachment_url($staffPhoto01, 'footer-thumb'); ?>" alt="<?php echo $staffName01[0] ?>" />
                      <?php endif;?>
                      <span class="small"><?php echo $staffAuth01[0] ?>: <?php echo $staffName01[0]?></span>
                    </div>
                    <div class="chip col s12 m6 l4">
                      <?php if(empty($staffPhoto02)):?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff.png" alt="<?php echo $staffName02[0] ?>" />
                      <?php else: ?>
                        <img src="<?php echo wp_get_attachment_url($staffPhoto02, 'footer-thumb'); ?>" alt="<?php echo $staffName02[0] ?>" />
                      <?php endif;?>
                      <span class="small"><?php echo $staffAuth02[0] ?>: <?php echo $staffName02[0]?></span>
                    </div>
                    <div class="chip col s12 m6 l4">
                      <?php if(empty($staffPhoto03)):?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff.png" alt="<?php echo $staffName03[0] ?>" />
                      <?php else: ?>
                        <img src="<?php echo wp_get_attachment_url($staffPhoto03, 'footer-thumb'); ?>" alt="<?php echo $staffName03[0] ?>" />
                      <?php endif;?>
                      <span class="small"><?php echo $staffAuth03[0] ?>: <?php echo $staffName03[0]?></span>
                    </div>

                    <div class="chip col s12 m6 l4">
                      <?php if(empty($staffPhoto04)):?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff.png" alt="<?php echo $staffName04[0] ?>" />
                      <?php else: ?>
                        <img src="<?php echo wp_get_attachment_url($staffPhoto04, 'footer-thumb'); ?>" alt="<?php echo $staffName04[0] ?>" />
                      <?php endif;?>
                      <span class="small"><?php echo $staffAuth04[0] ?>: <?php echo $staffName04[0]?></span>
                    </div>
                    <div class="chip col s12 m6 l4">
                      <?php if(empty($staffPhoto05)):?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff.png" alt="<?php echo $staffName05[0] ?>" />
                      <?php else: ?>
                        <img src="<?php echo wp_get_attachment_url($staffPhoto05, 'footer-thumb'); ?>" alt="<?php echo $staffName05[0] ?>" />
                      <?php endif;?>
                      <span class="small"><?php echo $staffAuth05[0] ?>: <?php echo $staffName05[0]?></span>
                    </div>
                    <div class="chip col s12 m6 l4">
                      <?php if(empty($staffPhoto06)):?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/staff.png" alt="<?php echo $staffName06[0] ?>" />
                      <?php else: ?>
                        <img src="<?php echo wp_get_attachment_url($staffPhoto06, 'footer-thumb'); ?>" alt="<?php echo $staffName06[0] ?>" />
                      <?php endif;?>
                      <span class="small"><?php echo $staffAuth06[0] ?>: <?php echo $staffName06[0]?></span>
                    </div>
                  </div>
                </section>

                </div>
                <!-- /tab1表示 -->
                <div id="test2" class="col s12">Test 2</div>
                <div id="test3" class="col s12">Test 3</div>
                <div id="test4" class="col s12">Test 4</div>
              </div>



              <!-- アクセス情報 -->
              <section id="post-info" class="section">
                <h2><?php echo $accessTitle[0] ?>の詳細情報</h2>
                <ul class="collection with-header">
                  <?php if(in_category(array('service'))): ?>
                    <li class="collection-header">
                      <h3><?php echo $accessTitle[0] ?></h3>
                      <div class="row no-padding">
                        <span class="col s4">
                        <script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411" ></script>
                        <script type="text/javascript">
                          new media_line_me.LineButton({"pc":false,"lang":"ja","type":"a"});
                        </script>
                        </span>
                      </div>
                    </li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="電話番号">phone_in_talk</i><?php echo $accessTel[0] ?> <a class="hide-on-med-and-up" href="tel:<?php echo $accessTel[0] ?>">電話する</a></div></li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="定休日">event_available</i><?php echo $accessHoliday[0] ?></div></li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="営業時間">access_time</i><?php echo $accessTime[0] ?></div></li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="平均予算">person</i><?php echo $accessYosan[0] ?></div></li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="店舗所在地">store</i><?php echo $accessPost[0] ?><br><?php echo $accessAddress[0] ?></div></li>
                  <?php else: ?>
                    <li class="collection-header"><h3><?php echo $accessTitle[0] ?></h3></li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="電話番号">phone_in_talk</i><?php echo $accessTel[0] ?></div></li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="所在地">store</i><?php echo $accessPost[0] ?><br><?php echo $accessAddress[0] ?></div></li>
                  <?php endif; ?>
                </ul>
                <div class="video-container">
                  <iframe src="<?php echo $accessMap[0] ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </section>
            <?php endif; ?>
            </article>


            <aside id="sidebar" class="hide-on-med-and-down col l4">
              <section class="section">
                <h4 class="gray-text">注目の要素</h4>
                <ul>
                  <li><i class="material-icons tiny">loyalty</i><a href="<?php get_bloginfo('url');?>/tag/%e3%83%a9%e3%83%bc%e3%83%a1%e3%83%b3/">ラーメン</a></li>
                  <li><i class="material-icons tiny">loyalty</i><a href="<?php get_bloginfo('url');?>/tag/%e3%83%89%e3%83%aa%e3%83%b3%e3%82%af%e8%b1%8a%e5%af%8c/">ドリンク豊富</a></li>
                  <li><i class="material-icons tiny">loyalty</i><a href="<?php get_bloginfo('url');?>/tag/%e9%a3%b2%e3%81%bf%e6%94%be%e9%a1%8c/">飲み放題</a></li>
                  <li><i class="material-icons tiny">loyalty</i><a href="<?php get_bloginfo('url');?>/tag/%e6%b7%b1%e5%a4%9c%e5%96%b6%e6%a5%ad/">深夜営業</a></li>
                  <li><i class="material-icons tiny">loyalty</i><a href="<?php get_bloginfo('url');?>/tag/%e5%a5%b3%e5%ad%90%e4%bc%9a/">女子会</a></li>
                  <li><i class="material-icons tiny">loyalty</i><a href="<?php get_bloginfo('url');?>/tag/%e3%82%b3%e3%82%b9%e3%83%91%e9%ab%98%e3%81%84/">コスパ高い</a></li>
                  <li><i class="material-icons tiny">loyalty</i><a href="<?php get_bloginfo('url');?>/tag/%e3%83%87%e3%83%bc%e3%83%88/">デート</a></li>
                  <li><i class="material-icons tiny">loyalty</i><a href="<?php get_bloginfo('url');?>/tag/%e5%87%ba%e5%89%8d%e5%ae%85%e9%85%8d%ef%bc%88%e3%83%87%e3%83%aa%e3%83%90%e3%83%aa%e3%83%bc%ef%bc%89/">出前宅配</a></li>
                </ul>
                <h4 class="gray-text">編集部より</h4>
                <ul>
                  <li><a href="<?php bloginfo('url');?>/category/weblog/"><img class="responsive-img" src="<?php echo get_template_directory_uri(); ?>/images/b_pr.jpg" alt="広報ブログ" /></a></li>
                  <li><a href="<?php bloginfo('url');?>/instagram/"><img class="responsive-img" src="<?php echo get_template_directory_uri(); ?>/images/b_instagram.jpg" alt="Instagramで見る南陽市" /></a></li>
                  <li><a href="<?php bloginfo('url');?>/tag/南陽磁力押し/"><img class="responsive-img" src="<?php echo get_template_directory_uri(); ?>/images/b_oshi.jpg" alt="南陽磁力押し" /></a></li>
                  <li><li><a href="https://bitflyer.jp?bf=fxeyrqd1" target="_blank"><img src="https://bitflyer.jp/Images/Affiliate/affi_04_300x250.gif" alt="bitFlyer ビットコインを始めるなら安心・安全な取引所で"></a></li></li>
                </ul>
              </section>

            </aside>

        </section>
      </div>

      <div class="container">
        <section class="section">
          <?php if( is_singular('post') ) {
            //#comments
            comments_template();
          } ?>
        </section>
      </div>


      <?php get_template_part('footer-recomend'); ?>
