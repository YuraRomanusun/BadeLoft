<?php get_header(); ?>
<section class="content inner-page">
    <div class="container">
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
               <?php if(function_exists('bcn_display'))
               { ?>
                  <h2><?php bcn_display(); ?></h2>
               <?php } ?>
            </div>
             <?php the_content(); ?>
         <?php endwhile; endif; ?>
       <?php $images = get_field('gallery_gal'); ?>
       <?php if( $images ): ?>
          <div class="bathtub-s">
             <div class="flex">
                <?php foreach( $images as $image ): ?>
                      <a href="<?php echo $image['sizes']['gal_big']; ?>" data-fancybox="images" class="item fancybox"><img src="<?php echo $image['sizes']['gal_small']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
                <?php endforeach; ?>
             </div>
          </div>
       <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

