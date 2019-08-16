<?php get_header();/*Template Name: Showroom*/ ?>
<div class="content inner-page">
    <div class="container">
        <div class="san-franc flex separator">
            <div class="left">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <div class="san-franc-adress">
                    <?php the_field('address_single_sh'); ?>
                </div>
            </div>
            <div class="right">
                <?php get_template_part('part/snippet', 'map_showroom_single') ?>
            </div>
        </div>
        <?php $images = get_field('gallery_single_room');
        if ($images): ?>
        <div class="separator marg-bottom">
            <div class="simple-slider swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($images as $image): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <?php endif; ?>
        </div>
        <?php if (get_field('showroom_extra_content') || get_field('showroom_extra_image')): ?>
            <div class="san-franc flex separator">
                <div class="left">
                    <?php the_field('showroom_extra_content')?>
                </div>
                <div class="right al-center">
                    <img src="<?php $sei = get_field('showroom_extra_image'); echo $sei['url'];?>" alt="<?php echo $sei['alt']; ?>">
                </div>
            </div>
        <?php endif; ?>
        <?php if (get_field('showroom_bottom_content')): ?>
        <div class="san-franc flex">
            <div class="left">
                <?php the_field('showroom_bottom_content')?>
                
            </div>
        </div>
        <?php endif ?>
    </div>
</div>
<div class="pusher"></div>
<?php get_footer(); ?>
