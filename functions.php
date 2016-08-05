<?php
//http://nanyo-jiriki.okitama.org/wp-admin/?nmfでログイン画面
function redirect_login(){
  $uri = getenv('REQUEST_URI');
  if(!strpos($uri, 'nmf')){
    if( !is_user_logged_in() ){
      wp_redirect( home_url( '/' ) );
    }
  }
}
add_action( 'login_form_login', 'redirect_login' );
//wordpress icon読み込み
add_action( 'wp_enqueue_scripts', 'load_dashicons' );

function load_dashicons() {
  wp_enqueue_style( 'dashicons' );
}
// generatorを非表示にする
remove_action('wp_head', 'wp_generator');

// EditURIを非表示にする
remove_action('wp_head', 'rsd_link');

// wlwmanifestを非表示にする
remove_action('wp_head', 'wlwmanifest_link');

//Contact Form 7が読み込むCSSを削除
add_action( 'wp_enqueue_scripts', 'my_delete_plugin_styles' );
	function my_delete_plugin_styles() {
	wp_deregister_style( 'contact-form-7' );
}
// 検索窓での全角スペースを可能に
if(isset($_GET['s'])) $_GET['s']=mb_convert_kana($_GET['s'],'s','UTF-8');

// is_mobile からタブレット削除
function is_mobile(){
$useragents = array(
'iPhone', // iPhone
'iPod', // iPod touch
'Android', // 1.5+ Android
'dream', // Pre 1.5 Android
'CUPCAKE', // 1.5+ Android
'blackberry9500', // Storm
'blackberry9530', // Storm
'blackberry9520', // Storm v2
'blackberry9550', // Storm v2
'blackberry9800', // Torch
'webOS', // Palm Pre Experimental
'incognito', // Other iPhone browser
'webmate' // Other iPhone browser
);
$pattern = '/'.implode('|', $useragents).'/i';
return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// コメントフォーム下に表示される注意書きの削除
add_filter( "comment_form_defaults", "my_comment_notes_after");
function my_comment_notes_after( $defaults){
    $defaults['comment_notes_after'] = '';
    return $defaults;
}
    //コメント欄自動リンクの無効化
    remove_filter( 'comment_text', 'make_clickable', 9);


// Comment form
    add_filter('comment_form_default_fields', 'remove_comment_url_fields');

    function remove_comment_url_fields($fields) {
    	unset($fields['url']);
    	return $fields;
    }

    add_filter('comment_form_defaults', 'custom_comment_form');

    add_filter('comment_form_default_fields', 'custom_comment_form_fields');

    function custom_comment_form_fields($fields) {
    	$commenter = wp_get_current_commenter();
    	$req = get_option('require_name_email');
    	$aria_req = ($req ? " aria-required='true'" : '');
    	$fields =  array(
    		'author' => '<div class="input-field col s6">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
    		'email' => '<div class="input-field col s6"><label for="email" data-error="wrong" data-success="right">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" name="email" class="validate" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
    		'url' => '',
    	);
    	return $fields;
    }

    add_filter('comment_form_defaults', 'custom_comment_form');

    function custom_comment_form($args) {
      $args['comment_field'] = '<div class="comment-form-comment input-field col s12"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" class="materialize-textarea validate"" cols="45" rows="8" aria-required="true"></textarea></div>';
    	$args['comment_notes_after'] = '<p class="form-allowed-tags">内容を確認いただき、下記の<strong>送信</strong>を押してください。</p>';
    	$args['label_submit'] = '送信';
      $args['class_submit'] = 'btn pink lighten-2';
    	return $args;
    }
    //Reply 返信のclass



// 投稿サムネイル対応の有効化
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}
add_image_size( 'footer-thumb', 100, 100, true );
add_image_size( 'thumb-square-min', 200, 200, true );
add_image_size( 'thumb-square', 466, 466, true );
add_image_size( 'thumbnail', 480, 270, true );
add_image_size( 'top-thumb', 1280, 480, true );
add_filter( 'post_thumbnail_html', 'custom_attribute' );
function custom_attribute( $html ){
    // width height を削除する
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}
// 投稿画像の初期設定
function image_default_setting() {
  $image_link = get_option( 'image_default_link_type' );
  $image_size = get_option( 'image_default_size' );

  // リンク先をなしに指定
  if ( $image_link !== 'none' ) {
    update_option( 'image_default_link_type', 'none' );
  }

  // サイズをフルサイズに指定
  if ( $image_size !== 'full' ) {
    update_option( 'image_default_size', 'full' );
  }
}
add_action('admin_init', 'image_default_setting', 10);

//パンくずリスト breadcrumb
function breadcrumb(){
    global $post;
    $str ='';
    if(!is_home()&&!is_admin()){
        $str.= '<div class="container"><ul id="breadcrumb" class="pagination row"><div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
        $str.= '<a href="'. home_url() .'" itemprop="url"><span itemprop="title">HOME</span></a> &gt;</li>';

        if(is_category()) {
            $cat = get_queried_object();
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<li class="" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor) .'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor) .'</span></a> &gt;</li>';
                }
            }
        $str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a></li>';
        } elseif(is_page()){
            if($post -> post_parent != 0 ){
                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
                foreach($ancestors as $ancestor){
                    $str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a></li>';
                }
            }
        } elseif(is_single()){
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a> &gt;</li>';
                }
            }
            $str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a></li>';
        } else{
            $str.='<li>'. wp_title('', false) .'</li>';
        }
        $str.='</ul></div>';
    }
    echo $str;
}
//ログインロゴ変更
function custom_login_logo() { ?>
    <style>
        .login #login h1 a {
            width: 200px;
            height: 113px;
            background: url(<?php echo get_template_directory_uri(); ?>/images/logo.png) no-repeat 0 0;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_logo' );
  //背景変更
  function custom_login() { ?>
    <style>
        .login {
            background:#fff;
            background-size: cover;
        }
    </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'custom_login' );
  //リンク先変更
  function custom_login_logo_url() {
      return get_bloginfo( 'url' );
  }
  add_filter( 'login_headerurl', 'custom_login_logo_url' );
  function custom_login_logo_title() {
    return get_option( 'blogname' );
  }
  add_filter( 'login_headertitle', 'custom_login_logo_title' );


// カスタム投稿タイプ#myself
locate_template('lib/create-pr.php', true);
add_action('init', 'create_post_type');
//create_post_typeのactionを定義
function create_post_type () {
  register_post_type(
    'pr', array(  /*任意の名前*/

      /*ラベルの作成*/
      'labels'        => array(
        'name'          => 'PR', //管理画面などで表示する名前
        'singular_name' => 'PR', //管理画面などで表示する名前（単数形）
        'menu_name'     => 'PR', //管理画面メニューで表示する名前（nameより優先される）
        'add_new_item'  => '新しいPR', //新規作成ページのタイトルに表示される名前
        'add_new'       => '新規追加', //メニューの新規追加ボタンのラベル
        'new_item'      => '一覧ページの「新規追加」ボタンのラベル',
        'edit_item'     => '編集', //編集ページのタイトルに表示される名前
        'view_item'     => '編集', //編集ページの「投稿を表示」ボタンのラベル
        'search_items'  => '投稿の検索', //一覧ページの検索ボタンのラベル
        'not_found'     => '見つかりません。', //一覧ページに投稿が見つからなかったときに表示
        'not_found_in_trash' => 'ゴミ箱にはありません。' //ゴミ箱に何も入っていないときに表示
      ),
      'descriptions' => 'PRの概要', //カスタム投稿ページの概要文
      'hierarchical' => false, //falseの場合、階層構造なし
      'public'       => true, //ユーザーが内容を投稿する場合true(通常はtrue)
      'has_archive'  => true,  //アーカイブページを作成するか否かを設定(trueでindexページを作成)
      'exclude_from_search' => false, //WPの検索機能から検索した際、検索対象に含めるか否かを設定（※trueの場合は検索対象に含めない）
      'taxonomies' => [], //投稿の分類に用いるカスタムカテゴリ・カスタムタグ[配列]
      //管理画面から投稿できる項目
      'supports'     => array(
        'title', //タイトル表示を有効に
        'editor', //本文の表示を有効に
        'thumbnail',
        'custom-fields'
      )
    )
  );
};

//ページネーション
function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 3)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
     echo "<ul class=\"pagination\">\n";
     //Prev：現在のページ値が１より大きい場合は表示
         if($paged > 1) echo "<li class=\"prev waves-effect\"><a href='".get_pagenum_link($paged - 1)."'>＜</a> </li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active waves-effect waves-light pink accent-1\">".$i."</li>\n":"<li class=\"waves-effect\"><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
    //Next：総ページ数より現在のページ値が小さい場合は表示
    if ($paged < $pages) echo "<li class=\"next waves-effect\"> <a href=\"".get_pagenum_link($paged + 1)."\">＞</a></li>\n";
    echo "</ul>\n";
     }
}
//固定ページで抜粋有効
add_post_type_support( 'page', 'excerpt' );

//関連記事
function related_post_list($show_num) {
    global $post;
    $tags = wp_get_post_tags($post->ID);
    $tagIDs = array();
    if ($tags) {
        $tagcount = count($tags);
        for ($i = 0; $i < $tagcount; $i++) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }
        $args=array(
            'tag__in' => $tagIDs,
            'post__not_in' => array($post->ID),
            'showposts'=>$show_num,
            'caller_get_posts'=>1
        );
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) {
                $my_query->the_post();
                echo '<li>';
                if ( has_post_thumbnail() ) {
                    $title= get_the_title();
                    the_post_thumbnail('footer-thumb',array('alt' =>$title ));
                  } else {
                    echo '<img src="' . get_template_directory_uri() . '/images/no-image.png" alt="NO IMAGE" title="NO IMAGE" />';
                  }
                echo '<small>';
                the_time('Y年m月d日');
                echo '</small><a href="';
                the_permalink();
                echo '" title="';
                the_title_attribute();
                echo '">';
                the_title();
                echo '</a></li>';
            }
            wp_reset_query();
        }else {
            echo '<li>関連する記事は見当たりません。</li>';
        }
    }
}

// ビジュアルエディタのフォント変更
add_editor_style('editors.css');
function custom_editor_settings( $initArray ){
$initArray['body_class'] = 'editor-area'; //オリジナルのクラスを設定する
return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );


?>
