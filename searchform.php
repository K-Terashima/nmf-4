<div class="row">
  <form class="col s12" method="get" action="<?php echo home_url('/'); ?>">
    <div class="row">
      <div class="input-field col offset-s1 s10 offset-m3 m6">
        <input id="s" name="s" type="text" value="<?php the_search_query(); ?>">
        <label for="icon_prefix"><i class="material-icons">search</i></label>
      </div>
    </div>
  </form>
</div>
