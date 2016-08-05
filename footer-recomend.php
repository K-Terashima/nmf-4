<div id="more-infomations" class="container">
  <section class="section">
    <div class="row">
      <div class="col s12">
        <ul class="tabs hide-on-small-only">
          <li class="tab col s3"><a href="#tab01" class="active">写真で見る関連情報</a></li>
          <li class="tab col s3"><a href="#tab02">おすすめ情報</a></li>
          <li class="tab col s3"><a href="#tab03">最新コメント</a></li>
        </ul>
        <ul class="tabs hide-on-med-and-up">
          <li class="tab col s3"><a href="#tab01"><i class="material-icons">loyalty</i></a></li>
          <li class="tab col s3"><a href="#tab02"><i class="material-icons">thumb_up</i></a></li>
          <li class="tab col s3"><a href="#tab03"><i class="material-icons">comment</i></a></li>
        </ul>
      </div>
      <div id="tab01" class="col s12">
        <!-- 関連情報 -->
          <section id="archive-shop" class="section">
              <div class="row">
                <?php query_posts('category_name=service&posts_per_page=12&ignore_sticky_posts=1&orderby=rand'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col s4 m2">
                      <a href="<?php the_permalink(); ?>" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="<?php the_title_attribute(); ?>">
                        <?php
                          if ( has_post_thumbnail() ) {
                            $title= get_the_title();
                            the_post_thumbnail('thumb-square-min',array('alt' => $title, 'class' => 'circle responsive-img z-depth-1 hoverable' ));
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
      <div id="tab02" class="col s12">
        <!-- おすすめ情報 -->
        <article id="recommend" class="section">
          <div class="row">
            <div class="col s4 m2">
              <img class="circle" src="http://nanyo-jiriki.okitama.org/wp-content/uploads/2015/04/11149491_411653135672208_6270280964050253436_n.png" alt="海鮮居酒屋 いさば家">
            </div>
            <div class="col s8 m10">
              <p>
                <h3><a href="http://nanyo-jiriki.okitama.org/join/service/space-miyauchi2632/">カフェ・レンタルスペース MIYAUCHI2632</a></h3>
                タグ: <a href="http://nanyo-jiriki.okitama.org/tag/miyauchi2632/" rel="tag">MIYAUCHI2632</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%82%a4%e3%83%99%e3%83%b3%e3%83%88/" rel="tag">イベント</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%81%8a%e4%b8%80%e4%ba%ba%e6%a7%98/" rel="tag">お一人様</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%82%ab%e3%82%a6%e3%83%b3%e3%82%bf%e3%83%bc/" rel="tag">カウンター</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%82%b5%e3%83%86%e3%83%a9%e3%82%a4%e3%83%88%e3%82%aa%e3%83%95%e3%82%a3%e3%82%b9/" rel="tag">サテライトオフィス</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%83%8e%e3%83%9e%e3%83%89%e3%83%af%e3%83%bc%e3%82%af/" rel="tag">ノマドワーク</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%83%a9%e3%82%a4%e3%83%96%e4%bc%9a%e5%a0%b4/" rel="tag">ライブ会場</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%83%ac%e3%83%b3%e3%82%bf%e3%83%ab%e3%82%b9%e3%83%9a%e3%83%bc%e3%82%b9/" rel="tag">レンタルスペース</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e4%ba%a4%e6%b5%81%e3%82%b9%e3%83%9a%e3%83%bc%e3%82%b9/" rel="tag">交流スペース</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e4%bc%9a%e8%ad%b0/" rel="tag">会議</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%a4%9a%e7%9b%ae%e7%9a%84%e3%82%b9%e3%83%9a%e3%83%bc%e3%82%b9/" rel="tag">多目的スペース</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%ae%ae%e5%86%85/" rel="tag">宮内</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%b1%95%e7%a4%ba%e4%bc%9a%e5%a0%b4/" rel="tag">展示会場</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e6%97%a5%e6%9b%9c%e5%96%b6%e6%a5%ad/" rel="tag">日曜営業</a>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col s4 m2">
              <img class="circle" src="http://nanyo-jiriki.okitama.org/wp-content/uploads/2014/09/s_001v11.jpg" alt="海鮮居酒屋 いさば家">
            </div>
            <div class="col s8 m10">
              <p>
                <h3><a href="http://nanyo-jiriki.okitama.org/join/service/isabaya/">海鮮居酒屋 いさば家</a></h3>
                タグ: <a href="http://nanyo-jiriki.okitama.org/tag/%e3%82%b3%e3%82%b9%e3%83%91%e9%ab%98%e3%81%84/" rel="tag">コスパ高い</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%84%aa%e8%89%af%e5%ba%97/" rel="tag">優良店</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%88%ba%e3%81%97%e8%ba%ab/" rel="tag">刺し身</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%8d%97%e9%99%bd%e7%a3%81%e5%8a%9b%e6%8a%bc%e3%81%97/" rel="tag">南陽磁力押し</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%92%8c%e9%a3%9f/" rel="tag">和食</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%ae%b4%e4%bc%9a/" rel="tag">宴会</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%b1%85%e9%85%92%e5%b1%8b/" rel="tag">居酒屋</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e6%97%a5%e6%9c%ac%e9%85%92/" rel="tag">日本酒</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e6%b1%82%e4%ba%ba/" rel="tag">求人</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e6%b1%82%e4%ba%ba-%e3%82%a2%e3%83%ab%e3%83%90%e3%82%a4%e3%83%88%e5%8b%9f%e9%9b%86/" rel="tag">求人-アルバイト募集</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e6%b5%b7%e9%ae%ae/" rel="tag">海鮮</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e8%b5%a4%e6%b9%af/" rel="tag">赤湯</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e9%8d%8b/" rel="tag">鍋</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e9%a3%b2%e3%81%bf%e6%94%be%e9%a1%8c/" rel="tag">飲み放題</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e9%ae%ae%e9%ad%9a/" rel="tag">鮮魚</a>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col s4 m2">
              <img class="circle" src="http://nanyo-jiriki.okitama.org/wp-content/uploads/2015/01/0000-466x466.png" alt="ラーメン 麺や 福とみ">
            </div>
            <div class="col s8 m10">
              <p>
                <h3><a href="http://nanyo-jiriki.okitama.org/join/service/ramen-fukutomi/">麺や 福とみ</a></h3>
                タグ: <a href="http://nanyo-jiriki.okitama.org/tag/%e3%81%8a%e4%b8%80%e4%ba%ba%e6%a7%98/" rel="tag">お一人様</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%82%ab%e3%82%a6%e3%83%b3%e3%82%bf%e3%83%bc/" rel="tag">カウンター</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%82%b3%e3%82%b9%e3%83%91%e9%ab%98%e3%81%84/" rel="tag">コスパ高い</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%83%a9%e3%83%bc%e3%83%a1%e3%83%b3/" rel="tag">ラーメン</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e3%83%a9%e3%83%b3%e3%83%81%e5%96%b6%e6%a5%ad/" rel="tag">ランチ営業</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%8d%97%e9%99%bd%e7%a3%81%e5%8a%9b%e6%8a%bc%e3%81%97/" rel="tag">南陽磁力押し</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e5%ba%83%e3%81%84%e9%a7%90%e8%bb%8a%e5%a0%b4/" rel="tag">広い駐車場</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e6%97%a5%e6%9b%9c%e5%96%b6%e6%a5%ad/" rel="tag">日曜営業</a> <a href="http://nanyo-jiriki.okitama.org/tag/%e8%b5%a4%e6%b9%af/" rel="tag">赤湯</a>
              </p>
            </div>
          </div>
        </article>
      </div>
      <div id="tab03" class="col s12">
        <!-- 最新コメント -->
        <article class="section">
          <ul class="collection with-header">
            <?php
              $comments = get_comments(array(
                  'number' => 5, // 取得件数
                  'orderby' => 'comment_date', // ソート対象
                  'order' => 'desc', // 昇順 ( asc ) か降順 ( desc ) を指定
                  'status' => 'approve', // ステータス
                  'type' => 'comment' // 取得するタイプ ( コメントのみ )
              ));
              foreach ($comments as $comment) {
                // コメント先の投稿情報取得, タイトルとか使わないなら必要ない
                // $tmpPost = get_post($comment->comment_post_ID);
                echo '<li class="collection-item"><div>'.$comment->comment_date.'<br>'.$comment->comment_content.'<a href="'.get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID.'" class="secondary-content pink-text lighten-4"><i class="material-icons">comment</i></a></div></li>';
            }
            ?>
          </ul>
        </article>
      </div>
    </div>
  </section>
</div>
