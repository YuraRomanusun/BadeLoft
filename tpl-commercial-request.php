<?php get_header();/*Template Name: Commercial Sample*/ ?>
<div class="content inner-page">
    <div class="container">
        <div class="san-franc samples-block flex separator">
            <div class="left">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <div class="san-franc-adress">
                    <?php the_field('address_sh'); ?>
                </div>
            </div>
            <div class="right">
                <div class="item"><img src="<?php the_field('commercial_material_sample'); ?>" alt=""><?php the_field('commercial_material_sample_text'); ?></div>
                <div class="item"><img src="<?php the_field('commercial_bathtub_templates_image'); ?>" alt=""><?php the_field('commercial_bathtubs_template_text'); ?></div>
                <?php if (get_field('commercial_video_sample')) { ?>
                    <div class="s-video-cover fullframe"><?php the_field('commercial_video_sample'); ?></div>
                <?php } ?>
            </div>
        </div>
        <div class="request">
            <?php echo do_shortcode( '[contact-form-7 id="3181" title="Commercial Request"]' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
