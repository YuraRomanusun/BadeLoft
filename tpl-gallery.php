<?php get_header();/*Template Name: Gallery*/ ?>
<section class="content new-gallery-archive">
    <div class="container">
        <?php
        $args = array(
            'taxonomy' => 'cat_gal',
            'hide_empty' => true,
        );
        ?>
        <?php if ($terms = get_terms( $args )) { ?>
            <h2>Select Category</h2>
            <div class="cg-categories flex">
                <?php foreach ($terms as $category) { ?>
                    <div>
                        <figure><img src="<?php echo image_src(get_field('cat_bg', 'term_'.$category->term_id), 'gal_small', false, false); ?>" alt=""></figure>
                        <?php echo $category->name; ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <h3>Select Product</h3>

        <?php if ($terms = get_terms( $args )) { ?>
            <div class="cg-series">
                <?php foreach ($terms as $series) {
                    $query = new WP_Query( array(
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'cat_gal',
                                'field'    => 'slug',
                                'terms'    => $series->slug
                            )
                        )
                    ) );
                    ?>
                    <div class="serie flex">
                        <?php if ($query->have_posts()) { ?>
                            <?php while ($query->have_posts()) { $query->the_post(); ?>
                                <div class="item" data-id="<?php echo get_the_ID(); ?>">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <figure><?php the_post_thumbnail('gal_small'); ?></figure>
                                    <?php } ?>
                                    <?php the_title(); ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } wp_reset_postdata(); ?>

        <div class="cg-gallery flex">

        </div>

    </div>
</section>
<?php get_footer(); ?>

