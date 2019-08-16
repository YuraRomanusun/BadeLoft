<?php get_header(); ?>
   <section class="content inner-page page-gallery">
      <div class="container">
         <?php
         $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
         ?>
         <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if(function_exists('bcn_display'))
            { ?>
               <h2><?php bcn_display(); ?></h2>
            <?php }?>
         </div>
         <p><?php echo $term->description; ?></p> 
         <div class="gallery-bathtubs flex">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
               <div class="item">
                  <?php if (has_post_thumbnail()) { ?>
                     <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                     </a>
                  <?php } ?>
                     <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     <p><?php echo wp_trim_words(get_the_content(), 40); ?></p>
                     <span datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(get_option('date_format_custom')); ?></span>
               </div>
            <?php endwhile; endif; ?>
         </div>
         <div class="tags">
            <strong>TAGS: </strong>
              <?php $tags = get_terms( array(
               'taxonomy' => 'tag_gal',
               'hide_empty' => false,
               ) ); ?>
               <?php foreach($tags as $tag) { ?>
                  <a href="<?php echo get_term_link( $tag ); ?>">#<?php echo $tag->name; ?></a>
               <?php } ?>
         </div>
      </div>
   </section>
<?php get_footer(); ?>
