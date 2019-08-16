<?php get_header(); the_post(); ?>
<div class="content bl-single">
    <div class="container flex" data-sticky_parent >
        <article>
            <div class="breadcrumbs separator">
                <?php
                if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
                <?php /*<a href="#">Home</a> > <a href="#">Freestanding Bathtubs</a> > <span>Freestanding Bathtub BW-01-L</span> */ ?>
            </div>
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) { ?>
                <div class="huge-image">
                    <?php the_post_thumbnail(); ?>
                    <div class="bottom flex">
                        <strong>by <?php the_author(); ?> | <?php echo get_the_date(); ?></strong>
                        <div class="tags">
                            <span>TAGS:</span>
                            <?php
                            $categories = wp_get_post_terms(get_the_ID(),'category');
                            foreach($categories as $category): ?>
                              <a href="<?php echo get_term_link($category->term_id); ?>"><?php echo $category->name; ?>,</a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!--h1><?php/* the_title(); */?></h1-->
            <?php the_content(); ?>
            <?php if ($post_slider = get_field('post_slider')) { ?>
                <div class="swiper-container post-slider">
                    <div class="swiper-wrapper">
                        <?php foreach($post_slider as $post_slide) { ?>
                            <div class="swiper-slide" ><div class="picture" style="<?php echo image_src($post_slide['image_post_slider'], 'gal_big', true); ?>"></div></div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php } ?>
            <?php echo comments_template(); ?>
        </article>
        <?php if (get_field('sidebar_image', 'option') || get_field('sidebar_image_link', 'option')) { ?>
            <aside>
               <div class="st">
                   <?php if (get_field('sidebar_image_link', 'option')) { ?>
                       <div>
                           <a href="https://www.badeloftusa.com/free-material-sample-and-or-template/?campaignType=Blog-Sidebar-Banner">
                               <?php if (get_field('sidebar_image', 'option')) { ?>
                                   <img src="<?php the_field('sidebar_image', 'option'); ?>" alt="">
                               <?php } ?>
                           </a>
                       </div>

                   <?php } else if (get_field('sidebar_image', 'option')) { ?>
                       <div>
                           <img src="<?php the_field('sidebar_image', 'option') ?>" alt="">
                       </div>

                   <?php } ?>
               </div>
            </aside>
        <?php } ?>
    </div>
</div>
<div class="pusher"></div>
</div>
<script type='text/javascript'>
    /* <![CDATA[ */
    //var sb_instagram_js_options = {"sb_instagram_at":"3180585331.3a81a9f.5e668d49ba6f4524be9b68bdfc185772"};
    /* ]]> */
</script>
<!--script type='text/javascript' src='https://www.badeloftusa.com/freestanding/wp-content/plugins/instagram-feed/js/sb-instagram.min.js?ver=1.4.8'></script-->
<script async defer src="//assets.pinterest.com/js/pinit.js"></script></div>
<?php get_footer(); ?>
