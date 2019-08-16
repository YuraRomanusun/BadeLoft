<?php get_header(); /* Template Name: Product Categories */ ?>
<div class="content inner-page page-product-categories">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="flex">
            <?php
            $terms = get_terms('product_cat');
            foreach($terms as $term)
            {
              $termID = $term->term_id;
              $termName = $term->name;
              $termDescription = $term->description;
              $termID = $term->term_id;
              $termPermalink = get_term_link($termID);
              $thumbnail_id = get_woocommerce_term_meta( $termID, 'thumbnail_id', true );
              $imageURL = wp_get_attachment_url( $thumbnail_id );
                ?>
                <a class="item" href="<?php echo $termPermalink; ?>">
                    <img src="<?php echo $imageURL; ?>" alt="">
                    <p><?php echo $termName; ?></p>
                </a>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
