<?php
global $create_pr_error;
$create_pr_error = array();
/*
# テンプレートが読み込まれる直前で実行される
*/
function _my_create_pr(){
  global $create_pr_error;
  if(
    is_page('create-pr')
        &&
    is_user_logged_in()
        &&
    isset($_POST['_wpnonce'])
        &&
    wp_verify_nonce($_POST['_wpnonce'], 'create_pr')
  ){
    //ここまできたらnonceはOK
    if(!isset($_POST['title']) || empty($_POST['title'])){
        $create_pr_error[] = 'タイトルを入力してください';
    }
    if(!isset($_POST['content']) || empty($_POST['content'])){
        $create_pr_error[] = '本文を入力してください';
    }

    //画像チェック開始
    if (
      isset($_FILES['image']['error'])
        &&
      is_int($_FILES['image']['error'])
    ){
      // ファイルバリデーション
      if (!$_FILES['image']['error']) {
        // サイズ上限チェック
        if ($_FILES['image']['size'] > 3000000) {
          $create_pr_error[] = 'ファイルサイズが大きすぎます。';
        }
        // getimagesizeを利用しMIMEタイプをチェック
        $imageInfo = getimagesize($_FILES['image']['tmp_name']);
        list($orig_width, $orig_height, $image_type) = $imageInfo;
        if ($imageInfo === false) {
          $create_pr_error[] = '画像ファイルではありません。';
        } else {
          $ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
          if (false === $ext = array_search(
            $imageInfo['mime'],
            array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            ),
            true
          )) {
            $create_pr_error[] = '画像形式が未対応です。';
          }
        }
        $user = wp_get_current_user();
        $upload_dir = wp_upload_dir();
        $image_url = $upload_dir['path'] . '/'. $user->get('user_login').'-'. date(YmdHis) .'.'. $ext;
        if (!move_uploaded_file($_FILES['image']['tmp_name'],$image_url)) {
          $create_pr_error[] = 'ファイル保存時にエラーが発生しました。';
        }
      } else {
        $create_pr_error[] = 'ファイルが選択されていません。';
      }
    }

    //エラーが無かったら投稿を追加
    if(empty($create_pr_error)){
      $id = wp_insert_post(array(
          'post_title' => (string)$_POST['title'],
          'post_content' => (string)$_POST['content'],
          'post_status' => 'publish',
          'post_author' => get_current_user_id(),
          'post_type' => 'pr'
          //'post_category' => array(intval($_POST['cat']))
      ), true);

      //アイキャッチに設定
      $image_data = file_get_contents($image_url);
      $filename = basename($image_url);
      if(wp_mkdir_p($upload_dir['path']))
          $file = $upload_dir['path'] . '/' . $filename;
      else
          $file = $upload_dir['basedir'] . '/' . $filename;
      file_put_contents($file, $image_data);
      $wp_filetype = wp_check_filetype($filename, null );
      $attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title' => sanitize_file_name($filename),
          'post_content' => '',
          'post_status' => 'inherit'
      );
      $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
      wp_update_attachment_metadata( $attach_id, $attach_data );
      set_post_thumbnail( $post_id, $attach_id );


      // 再度エラーチェック
      if(!isset($_POST['accessTitle']) || empty($_POST['accessTitle']) || !preg_match('/^(https?)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $_POST['url'])){
          $create_pr_error[] = '事業名称を入力してください';
      }
      if(!isset($_POST['accessTel']) || empty($_POST['accessTel']) || !preg_match('/^(https?)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $_POST['url'])){
          $create_pr_error[] = '電話番号を入力してください';
      }
      if(!isset($_POST['accessAddress']) || empty($_POST['accessAddress']) || !preg_match('/^(https?)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $_POST['url'])){
          $create_pr_error[] = '所在地を入力してください';
      }
      //データの挿入に成功していたら移動
      if(!is_wp_error($id)){
          //カスタムフィールド追加
          update_post_meta($id, 'accessTitle', $_POST['accessTitle']);
          update_post_meta($id, 'accessUrl', $_POST['accessUrl']);
          update_post_meta($id, 'accessTel', $_POST['accessTel']);
          update_post_meta($id, 'accessHoliday', $_POST['accessHoliday']);
          update_post_meta($id, 'accessAddress', $_POST['accessAddress']);

          //ページを移動
          header('Location: '.get_permalink($id));
          die();
      }else{
          $create_pr_error[] = 'エラーが発生しました'.$id->get_error_message();
      }
    }
  }
}











/**
 * create-prページでエラーがあれば表示
 * @global array $create_pr_error
 */
function show_thread_error(){
  global $create_pr_error;
  if(!empty($create_pr_error)){
      echo '<div id="error" class="red-text">';
      echo implode('<br>', $create_pr_error);
      echo '</div>';
  }
}
add_action('template_redirect', '_my_create_pr');
?>
