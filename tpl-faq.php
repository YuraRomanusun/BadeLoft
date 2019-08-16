<?php get_header(); /* Template Name: FAQ */ ?>
<div class="content inner-page">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile;
        wp_reset_query();
        ?>

        <?php
        $btnCount = 0;
        if ($faq_items = get_field('faq_items')) { ?>
            <div class="faq-buttons flex">
                <?php foreach ($faq_items as $fqit) { ++$btnCount; ?>
                    <div class="item" onclick="faqChange(<?php echo $btnCount; ?>)"><?php echo $fqit['title_faq_item']; ?></div>
                <?php } ?>
            </div>


            <div class="faq-container">
                <?php foreach ($faq_items as $fqitcon) { ?>
                    <div class="faq-content">
                        <?php if ($fqitcon['image_faq_item']) { ?>
                            <div class="faq-image">
                                <img src="<?php echo $fqitcon['image_faq_item']['url']; ?>" alt="<?php echo $fqitcon['image_faq_item']['alt']; ?>">
                            </div>
                        <?php } if ($fqitcon['video_faq_item']) { ?>
                            <div class="faq-video">
                                <?php echo $fqitcon['video_faq_item']; ?>
                            </div>
                        <?php } ?>
                        <?php if ($nfgt = $fqitcon['columns_faq_item']) { ?>
                            <div class="two-columns flex">
                                <?php foreach ($nfgt as $columns) { ?>
                                    <div class="column"><?php echo $columns['column_content_faq_item']; ?></div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

            <?php /*<div class="button button-center">Show more</div> */?>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>
