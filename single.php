<?php get_header(); ?>


<?php
//single >> shop,corp / artist in_Category分岐
if(in_category('creator')){
  include(TEMPLATEPATH . '/content-creator.php');
} elseif(in_category('hazard')) {
  include(TEMPLATEPATH . '/content-hazard.php');
} elseif(in_category('member')) {
  include(TEMPLATEPATH . '/content-member.php');
} else {
  include(TEMPLATEPATH . '/content-main.php');
} ?>


<?php get_footer(); ?>
