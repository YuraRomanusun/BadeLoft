<?php get_header();/*Template Name: Showroom*/ ?>
<div class="content inner-page">
    <div class="container">
        <div class="san-franc flex separator">
            <div class="left">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <div class="san-franc-adress">
                    <?php the_field('address_sh'); ?>
                </div>
            </div>
            <div class="right">
                <?php get_template_part('part/snippet', 'map_showroom') ?>
            </div>
        </div>
        <div class="showroom-wrap flex separator">
            <div class="item">
                <h2><?php the_field('title_single_category') ?></h2>
                <div class="showrooms-set flex">
                    <?php $ids = get_field('our_us_showrooms', false, false);
                    $id_is = get_field('international_showrooms', false, false);
                    $query = new WP_Query(array(
                        'post_type' => 'Showroom',
                        'posts_per_page' => -1,
                        'post__in' => $ids,
                        'post__not_in' => $id_is,
                        'post_status' => 'any',
                        'orderby' => 'post__in',
                    ));
                    /*var_dump(array(
                        'post_type' => 'Showroom',
                        'post__in' => $ids,
                        'post_status' => 'any',
                        'orderby' => 'post__in',
                    ));*/
                    while ($query->have_posts()) {
                        $query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="item">
                            <?php if (has_post_thumbnail()) { ?>
                                <?php the_post_thumbnail(); ?>
                            <?php } ?>
                            <strong><?php the_title(); ?> </strong>
                        </a>
                        <?php wp_reset_postdata(); } ?>
                </div>
            </div>
            <?php if ($partners_links = get_field('partners_links')) { ?>
                <div class="item">
                    <h2><?php the_field('partners_title'); ?></h2>
                    <ul>
                        <?php foreach ($partners_links as $partner) { ?>
                            <li><a href="<?php echo $partner['link_partner']; ?>" onclick="trackOutboundLink('<?php echo $partner['link_partner']; ?>'); return false;"><?php echo $partner['link_text']; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>

        <h2>International Showrooms</h2>
        <div class="showrooms-set flex">
            <?php
            $query_is = new WP_Query(array(
                'post_type' => 'Showroom',
                'posts_per_page' => -1,
                'post__in' => $id_is,
                'post__not_in' => $ids,
                'post_status' => 'any',
                'orderby' => 'post__in',
            ));
            while ($query_is->have_posts()) {
                $query_is->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="item">
                    <?php if (has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail(); ?>
                    <?php } ?>
                    <strong><?php the_title(); ?> </strong>
                </a>
                <?php wp_reset_postdata(); } ?>
        </div>
    </div>
</div>
<div class="pusher"></div>
<?php get_footer(); ?>
