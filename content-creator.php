      <div id="index-banner" class="parallax-container">
        <div class="section no-pad">
          <div class="container">
            <?php breadcrumb(); ?>
          </div>
          <?php echo get_search_form(); ?>
        </div>
        <div class="parallax img-blur"><?php the_post_thumbnail('top-thumb'); ?></div>
      </div>


      <div id="article-single-creator" class="container">
        <section class="section row">


            <article class="post-content col s12 m10 offset-m1 l8 offset-l2">
              <?php
                // 現在の投稿のカスタムフィールド情報を全て取得
                $custom_fields = get_post_custom();
                // []内はカスタムフィールドのスラグ、フィールドの値を変数に格納する( $aaa = $custom_fields['aaa']; )
                //top作家紹介
                $topPhoto = get_post_meta($post->ID, 'topPhoto', true);
                $topPhotoSquare = wp_get_attachment_image_src($topPhoto, 'thumb-square');
                $topPhotoClass = $custom_fields['topPhotoClass'];
                $topTitle = $custom_fields['topTitle'];
                $topText = $custom_fields['topText'];
                $portfolioPhoto01 = get_post_meta($post->ID, 'portfolioPhoto01', true);
                $portfolioPhoto02 = get_post_meta($post->ID, 'portfolioPhoto02', true);
                $portfolioPhoto03 = get_post_meta($post->ID, 'portfolioPhoto03', true);
                $portfolioPhoto04 = get_post_meta($post->ID, 'portfolioPhoto04', true);
                $portfolioPhoto05 = get_post_meta($post->ID, 'portfolioPhoto05', true);
                $portfolioPhoto06 = get_post_meta($post->ID, 'portfolioPhoto06', true);
                $portfolioPhotoSquare01 = wp_get_attachment_image_src($portfolioPhoto01, 'thumb-square');
                $portfolioPhotoSquare02 = wp_get_attachment_image_src($portfolioPhoto02, 'thumb-square');
                $portfolioPhotoSquare03 = wp_get_attachment_image_src($portfolioPhoto03, 'thumb-square');
                $portfolioPhotoSquare04 = wp_get_attachment_image_src($portfolioPhoto04, 'thumb-square');
                $portfolioPhotoSquare05 = wp_get_attachment_image_src($portfolioPhoto05, 'thumb-square');
                $portfolioPhotoSquare06 = wp_get_attachment_image_src($portfolioPhoto06, 'thumb-square');
                $portfolioText01 = $custom_fields['portfolioText01'];
                $portfolioText02 = $custom_fields['portfolioText02'];
                $portfolioText03 = $custom_fields['portfolioText03'];
                $portfolioText04 = $custom_fields['portfolioText04'];
                $portfolioText05 = $custom_fields['portfolioText05'];
                $portfolioText06 = $custom_fields['portfolioText06'];



                //access
                $accessTitle = $custom_fields['accessTitle'];
                $accessTel = $custom_fields['accessTel'];
                $accessURL = $custom_fields['accessURL'];
              //end カスタムフィールド取得
              ?>

              <section id="creator-top" class="section no-pad">
                <div class="row">
                  <div class="col offset-s3 s6 offset-m4 m4">
                    <?php if(empty($topPhoto)):?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $topTitle[0] ?>" />
                      <?php else: ?>
                      <img src="<?php echo $topPhotoSquare[0] ?>" class="responsive-image <?php echo $topPhotoClass[0] ?>" alt="<?php echo $topTitle[0] ?>" />
                    <?php endif; ?>
                  </div>
                </div>

                <div id="mediabox" class="row">
                  <div class="col s2">
                    <?php if(empty($portfolioPhoto01)):?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $portfolioText01[0] ?>" />
                      <?php else: ?>
                      <img class="materialboxed responsive-img z-depth-1 hoverable" src="<?php echo $portfolioPhotoSquare01[0] ?>" data-caption="<?php echo $portfolioText01[0] ?>" alt="<?php echo $portfolioText01[0] ?>" />
                    <?php endif; ?>
                  </div>
                  <div class="col s2">
                    <?php if(empty($portfolioPhoto02)):?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $portfolioText02[0] ?>" />
                      <?php else: ?>
                      <img class="materialboxed responsive-img z-depth-1 hoverable" src="<?php echo $portfolioPhotoSquare02[0] ?>" data-caption="<?php echo $portfolioText02[0] ?>" alt="<?php echo $portfolioText02[0] ?>" />
                    <?php endif; ?>
                  </div>
                  <div class="col s2">
                    <?php if(empty($portfolioPhoto03)):?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $portfolioText03[0] ?>" />
                      <?php else: ?>
                      <img class="materialboxed responsive-img z-depth-1 hoverable" src="<?php echo $portfolioPhotoSquare03[0] ?>" data-caption="<?php echo $portfolioText03[0] ?>" alt="<?php echo $portfolioText03[0] ?>" />
                    <?php endif; ?>
                  </div>
                  <div class="col s2">
                    <?php if(empty($portfolioPhoto04)):?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $portfolioText04[0] ?>" />
                      <?php else: ?>
                      <img class="materialboxed responsive-img z-depth-1 hoverable" src="<?php echo $portfolioPhotoSquare04[0] ?>" data-caption="<?php echo $portfolioText04[0] ?>" alt="<?php echo $portfolioText04[0] ?>" />
                    <?php endif; ?>
                  </div>
                  <div class="col s2">
                    <?php if(empty($portfolioPhoto05)):?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $portfolioText05[0] ?>" />
                      <?php else: ?>
                      <img class="materialboxed responsive-img z-depth-1 hoverable" src="<?php echo $portfolioPhotoSquare05[0] ?>" data-caption="<?php echo $portfolioText05[0] ?>" alt="<?php echo $portfolioText05[0] ?>" />
                    <?php endif; ?>
                  </div>
                  <div class="col s2">
                    <?php if(empty($portfolioPhoto06)):?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/unknown.png" alt="<?php echo $portfolioText06[0] ?>" />
                      <?php else: ?>
                      <img class="materialboxed responsive-img z-depth-1 hoverable" src="<?php echo $portfolioPhotoSquare06[0] ?>" data-caption="<?php echo $portfolioText06[0] ?>" alt="<?php echo $portfolioText06[0] ?>" />
                    <?php endif; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12">
                    <header class="post-head">
                      <h1 class="post-title"><?php the_title(); ?></h1>
                      <ul>
                        <li><i class="material-icons tiny tooltipped" data-position="top" data-delay="10" data-tooltip="タグ">loyalty</i> <span><?php the_tags('',', ','');?></span></li>
                      </ul>
                    </header>
                  </div>
                </div>
              </section>



              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <section id="post-article" class="section">
                  <?php the_content(); ?>
                </section>
              <?php endwhile; endif; ?>


              <!-- アクセス情報 -->
              <section id="creator-info" class="section">
                <h2>お問い合わせ先</h2>
                <ul class="collection with-header">
                    <li class="collection-header">
                      <h4><?php echo $accessTitle[0] ?></h4>
                      <div class="row no-padding">
                        <span class="col s4">
                        <script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411" ></script>
                        <script type="text/javascript">
                          new media_line_me.LineButton({"pc":false,"lang":"ja","type":"a"});
                        </script>
                        </span>
                      </div>
                    </li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="連絡先">perm_phone_msg</i><?php echo $accessTel[0] ?></div></li>
                    <li class="collection-item"><div><i class="material-icons left tooltipped" data-position="top" data-delay="10" data-tooltip="ウェブサイトなど">person_pin</i><?php echo $accessURL[0] ?></div></li>
                </ul>
              </section>
            </article>


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
