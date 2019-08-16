<?php get_header(); /* Template Name: Quality & Characteristics */ ?>
<div class="content inner-page">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="two-columns flex separator">
            <div class="column">
                <?php the_field('left_column_qc'); ?>
            </div>
            <div class="column">
                <?php the_field('right_column_qc'); ?>
            </div>
        </div>
        <?php if ($color_selection_images_qc = get_field('color_selection_images_qc')) { ?>
            <div class="colors-selection flex">
                <div class="column first">
                    <?php the_field('color_selection_text_qc'); ?>
                </div>
                <div class="column pictures">
                    <?php foreach ($color_selection_images_qc as $csiqc) { ?>
                        <img src="<?php echo $csiqc['image_qc']['url']; ?>" alt="<?php echo $csiqc['image_qc']['alt'] ?>">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>

