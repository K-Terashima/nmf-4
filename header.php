<!DOCTYPE HTML>
<html lang="ja">
<head>
<title><?php
global $page, $paged;
if(is_front_page()):
	bloginfo('name');
elseif(is_single()):
	wp_title('');
elseif(is_page()):
	wp_title('-',true,'right');
	bloginfo('name');
elseif (is_month()):
	the_time('Y年M');
	echo 'の記事一覧';
elseif(is_archive()):
	wp_title('');
	echo 'の記事一覧';
elseif(is_search()):
	wp_title('',true,'');
elseif(is_404()):
	echo'404 - ';
	bloginfo('name');
endif;
if($paged >= 2 || $page >= 2):
	echo'-'.sprintf('%sページ',
	max($paged,$page));
endif;
?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="google-site-verification" content="smVqNDY3Nh5lHOm1Qa8WreHcdsGD7Q__XITSPdYLNPs" />
<meta name="author" content="http://twitter.com/6rules">
<link rel="alternate"  hreflang="jp" href="<?php bloginfo('url'); ?>" />
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favcon.ico" />
<!--Import Google Icon Font-->
<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
<!--Import materialize.css-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css"  media="screen,projection"/>
<?php if(in_category('product')): ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-product.css"  media="screen,projection"/>
<?php endif; ?>

<?php if(is_home() && is_front_page())://start ogp ?>
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php bloginfo('name'); ?>">
	<meta property="og:url" content="<?php bloginfo('url') ?>">
	<meta property="og:description" content="<?php bloginfo('description'); ?>">
	<meta property="og:image" content="">
	<meta property="fb:app_id" content="293255674207292" />

<?php elseif(is_page()): ?>
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php the_title(); ?>">
	<meta property="og:url" content="<?php echo get_permalink(); ?>">
	<meta property="og:description" content="<?php bloginfo('description'); ?>">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/page-top-thumb.jpg">
	<meta property="fb:app_id" content="293255674207292" />

<?php else: ?>
	<meta property="og:type" content="article">
	<meta property="og:title" content="<?php the_title(); ?>">
	<meta property="og:url" content="<?php echo get_permalink(); ?>">
	<meta property="og:description" content="<?php echo mb_substr(str_replace(array("rn", "r", "n"), '', strip_tags($post-> post_content)), 0, 100).''; ?>">
<?php endif; ?>
	<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); ?>
	<?php if(is_single() && has_post_thumbnail() ): ?>
	<meta property="og:image" content="<?php echo $image_url[0] ?>">
	<?php elseif(!is_home() && !is_page() ): ?>
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/unknown.png">
	<meta property="fb:app_id" content="293255674207292" />
<?php endif;//end ogp ?>

<?php
	wp_deregister_script( 'jquery' );
  wp_deregister_script('jquery-migrate');
	wp_head();
 ?>
</head>
<body id="top">


<div class="navbar-fixed">
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/" class="brand-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="80" alt="南陽磁力"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="<?php get_bloginfo('url');?>/informations/" title="お知らせまとめ"><i class="material-icons tooltipped" data-position="bottom" data-delay="10" data-tooltip="お知らせまとめ">info</i></a></li>
        <li><a href="<?php get_bloginfo('url');?>/tagcloud/" title="各記事・店舗の構成要素"><i class="material-icons tooltipped" data-position="bottom" data-delay="10" data-tooltip="タグクラウド">loyalty</i></a></li>
        <li><a href="<?php get_bloginfo('url');?>/board/" title="南陽市掲示板"><i class="material-icons tooltipped" data-position="bottom" data-delay="10" data-tooltip="南陽市掲示板">chat</i></a></li>
        <li><a href="<?php get_bloginfo('url');?>/contact/" title="お問い合わせ"><i class="material-icons tooltipped" data-position="bottom" data-delay="10" data-tooltip="お問い合わせ">mail</i></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="<?php get_bloginfo('url');?>/informations/"><i class="material-icons left">info</i>お知らせまとめ</a></li>
        <li><a href="<?php get_bloginfo('url');?>/tagcloud/"><i class="material-icons left">loyalty</i>タグクラウド</a></li>
        <li><a href="<?php get_bloginfo('url');?>/board/"><i class="material-icons left">chat</i>南陽市掲示板</a></li>
        <li><a href="<?php get_bloginfo('url');?>/contact/"><i class="material-icons left">mail</i>お問い合わせ</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse grey-text darken-4"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>
