(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.modal-trigger').leanModal();
    $('.slider').slider();
    $('.materialboxed').materialbox();
    $('ul.tabs').tabs();
    $('ul#footer-categories li').addClass('collection-item');
    $('.reply a').addClass('btn pink accent-1 right');
    $('.form-submit input#submit').addClass('btn pink accent-1 right');
    $('#button-change input').addClass('btn pink accent-1 right');
    $(document).ready(function() {
         if ($('ol:first').css('list-style-type') != 'none') { /* For IE6/7 only. */
             $('ol ol').each(function(i, ol) {
                 ol = $(ol);
                 var level1 = ol.closest('li').index() + 1;
                 ol.children('li').each(function(i, li) {
                     li = $(li);
                     var level2 = level1 + '-' + (li.index() + 1);
                     li.prepend('<span>' + level2 + '</span>');
                 });
             });
         }
     });
    //
    // $('#article-single-creator').on('contextmenu',function(e){
    //     return false;
    // });

  }); // end of document ready
})(jQuery); // end of jQuery name space
