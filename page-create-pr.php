<?php get_header(); ?>


      <div id="index-banner" class="parallax-container">
        <section class="section">
          <div class="container">
            <?php breadcrumb(); ?>
          </div>
          <?php echo get_search_form(); ?>
        </section>
        <div class="parallax img-blur"><img src="<?php echo get_template_directory_uri(); ?>/images/page-top-thumb.jpg" alt=""/></div>
      </div>




      <div class="page-create-pr" class="container">
        <div class="row">
          <div class="col s12">
            <?php if(is_user_logged_in()): /*ログイン確認*/ ?>
              <?php show_thread_error(); ?>
              <form action="<?php the_permalink();?>" method="post">
                <?php wp_nonce_field('create_pr'); ?>
                    <div class="row">
                      <div class="col s12 offset-l2 l8">
                        <h2>自動掲載フォーム</h2>
                        <span>必要事項を記載し、投稿ボタンを押すと自動的に当サイトに掲載されます。[ * ]がついた入力欄は必須です。</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 offset-l2 l8">
                          <label for="title">タイトル *</label>
                          <input id="title" type="text" name="title" value="" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 offset-l2 l8">
                        <label for="content">本文 *</label>
                        <textarea id="content" name="content" class="materialize-textarea"></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <div class="file-field input-field col s12 offset-l2 l8">
                        <div class="btn pink accent-1">
                          <span>File</span>
                          <input type="file" name="image">
                        </div>
                        <div class="file-path-wrapper">
                          <input id="form-file" class="file-path validate" name="image" type="text" placeholder="1 or MORE PHOTOS">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 offset-l2 l4">
                        <label for="accessTitle">事業名称 *</label>
                        <input id="accessTitle" name="accessTitle" type="text">
                      </div>
                      <div class="input-field col s12 l4">
                        <label for="accessUrl">URL</label>
                        <input id="accessUrl" name="accessUrl" type="url" class="validate">
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 offset-l2 l4">
                        <label for="accessTel">電話番号 *</label>
                        <input id="accessTel" name="accessTel" type="text">
                      </div>
                      <div class="input-field col s12 l4">
                        <label for="accessHoliay">定休日</label>
                        <input id="accessHoliday" name="accessHoliday" type="text">
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 offset-l2 l8">
                        <label for="accessAddress">所在地 *</label>
                        <input id="accessAddress" name="accessAddress" type="text">
                      </div>
                    </div>

                  <div class="row submit">
                    <div class="center-align">
                      <input type="submit" class="btn pink accent-1" value="投稿" />
                    </div>
                  </div>
              </form>
            <?php else: ?>
              <div class="row">
                <div class="col s12 offset-m2 m8">
                  <form method="post" action="<?php echo wp_login_url() ?>?redirect_to=<?php echo esc_attr($_SERVER['REQUEST_URI']) ?>">
                    <dl>
                      <dt>ユーザー名:</dt><dd><input type="text" name="log" id="login_username" value="" /></dd>
                      <dt>パスワード:</dt><dd><input type="password" name="pwd" id="login_password" value="" /></dd>
                    </dl>
                    <div class="row">
                      <script src='//www.google.com/recaptcha/api.js'></script>
                      <div class="g-recaptcha col s6" data-sitekey="6Lcytg0TAAAAALR30mYVJz1bnf2CNY5-BRCJFQ30"></div>
                      <div class="col s6">
                        <input type="submit" value="ログイン" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php endif; ?>


          </div>
        </div>
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
