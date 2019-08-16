<?php get_header(); /* Template Name: Contact Us */ ?>
<div class="content inner-page">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="form-container flex separator">
            <div class="item small">
                <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                <?php endwhile;
                    wp_reset_query();
                ?>
            </div>
            <?php echo do_shortcode( '[contact-form-7 id="4" title="Contact Us"]' ); ?>
        </div>
        <div class="adresses flex">
            <div class="left">
                <?php the_field('llc_corporate_content'); ?>
            </div>
            <div class="right">
                <?php the_field('showroom_content'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

