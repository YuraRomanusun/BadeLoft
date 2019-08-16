<?php get_header(); /* Template Name: News Press */ ?>
<div class="content inner-page">
    <div class="container">
        <div class="breadcrumbs separator">
            <?php
            if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
            <?php /*<a href="#">Home</a> > <a href="#">Freestanding Bathtubs</a> > <span>Freestanding Bathtub BW-01-L</span> */ ?>
        </div>
        <h1><?php the_title(); ?></h1>
        <div class="news-press flex">

        <?php

        $posts = new WP_Query(array(
            'post_type' => 'newspress',
            'posts_per_page' => 10,
            'post_status' => 'publish'
        ));

        if ($posts->have_posts() ) {
            while ( $posts->have_posts() ) {
                $posts->the_post(); ?>
                <div class="item">
                    <?php the_post_thumbnail(); ?>
                    <div class="bottom">
                        <strong><?php echo get_the_date(); ?></strong>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        <a href="<?php the_permalink(); ?>">View article...</a>
                    </div>
                </div>

        <?php    }}
        ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

