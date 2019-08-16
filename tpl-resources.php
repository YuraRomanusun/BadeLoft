<?php get_header(); /* Template Name: Resources */ ?>
<div class="content inner-page page-gallery">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php if ($resources_res = get_field('resources_res')) { ?>
        <div class="resource-center flex">
            <?php foreach ($resources_res as $reso) { ?>
                <a href="<?php if ( 'ltp' == $reso['link_type_res']) {
                    echo $reso['link_to_page_res'];
                } elseif ( 'ltc' == $reso['link_type_res']) {
                    echo get_category_link($reso['link_to_category']);
                }

                ?>" class="item">
                    <img src="<?php $img = $reso['image_res']; echo $reso['image_res']['url']; ?>" alt="<?php echo $img['alt']; ?>">
                    <div class="inner">
                        <?php if ( 'ltp' == $reso['link_type_res']) { ?>
                            <div><?php echo $reso['link_text_res']; ?></div>
                        <?php } elseif ( 'ltc' == $reso['link_type_res']) { ?>
                            <div><?php echo $reso['link_text_res']; ?></div>
                        <?php } ?>
                    </div>
                </a>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>

