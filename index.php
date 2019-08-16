<?php get_header(); ?>
<div class="content inner-page blogp">
    <div class="container">
      <?php
      $cat_id = get_query_var('cat');
      ?>

        <div class="breadcrumbs separator">
            <?php
            if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
            <?php /*<a href="#">Home</a> > <a href="#">Freestanding Bathtubs</a> > <span>Freestanding Bathtub BW-01-L</span> */ ?>
        </div>

        <h1><?php echo get_cat_name($cat_id); ?></h1>
        <div class="blog-how-to flex">
          <?php loadMorePosts_ajax(1,$cat_id, 7); ?>
        </div>
        <?php
        $args = array('post_type' => 'post','posts_per_page'  => -1,'tax_query' => array(array('taxonomy' => 'category','field'    => 'id','terms'    => $cat_id,),),);
        $posts = new WP_Query($args);
        $posts = $posts->posts;
        if(count($posts) > 7): ?>
          <div id="button_more" data-cat="<?php echo $cat_id; ?>" data-paged="2" class="button button-center">Show more</div>
        <?php endif; ?>
    </div>
</div>
<div class="pusher"></div>
</div>
<?php get_footer(); ?>
