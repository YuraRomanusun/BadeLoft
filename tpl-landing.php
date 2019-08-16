<?php get_header('landing'); /* Template Name: Landing */ ?>
<div class="content inner-page">
    <div class="top-block cover alc" <?php if (get_field('background_tb')) { echo 'style="'.image_src(get_field('background_tb'), 'free', true, false).'"'; } ?> >
        <?php if ( get_field('text_tb') ) { ?>
            <div class="container">
                <div class="text">
                    <?php the_field('text_tb'); ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="sample-templates">
        <div class="flex">

            <div class="left" style="background-image: url(<?php the_field('left_background_b'); ?>);">
                <?php the_field('left_text_b') ?>
            </div>
            <div class="right" style="background-image: url(<?php the_field('right_background_b'); ?>);">
                <?php the_field('right_text_b'); ?>
            </div>

        </div>
    </div>
    
    <div class="container" id="products">
        <div class="rel-prod four-prods">
            <?php if ( get_field('title_pr') ) { ?>
                <div class="top-text">
                    <?php the_field('title_pr'); ?>
                </div>
            <?php } ?>
            <div class="switch-grid">
                <div class="tile"><img src="<?php echo theme(); ?>/img/tile.png" alt=""></div>
                <div class="row"><img src="<?php echo theme(); ?>/img/row.png" alt=""></div>
            </div>
            <?php if ( $products = get_field('products') ) { ?>
                <div class="flex category-page">
                    <?php foreach ($products as $product) { ?>
                        <div>
                            <?php if ( $product['image'] ) { ?>
                                <div class="image-box" ><a href="<?php echo image_src($product['image'], 'medium_large', false, false); ?>" data-fancybox="thumbnails" class="thumbnail" style="<?php echo image_src($product['image'], 'medium_large', true, false); ?>" ></a></div>
                            <?php } ?>
                            <?php if ( $product['title'] ) { ?>
                                <h3><?php echo $product['title']; ?></h3>
                            <?php } ?>
                            <?php if ( $rating = $product['stars'] ) { ?>
                                <div class="star-rating">
                                    <?php for ($i=0; $i < $rating; $i++) { echo '★'; } ?>
                                </div>
                            <?php } ?>
                            <?php if ( $product['text'] ) { ?>
                                <div class="attributes-wrap">
                                    <div class="mattributes">
                                        <?php echo $product['text']; ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <a href="#request" class="button button-blue">request sample</a>
                            <?php if ( $product['link'] ) { ?>
                                <div class="additional-button" >
                                    <a href="<?php echo $product['link']; ?>" class="button">Learn More</a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            <?php } ?>

        </div>
    </div>
<?php if ($benefits = get_field('benefits')) { $lCount = 0; ?>
        <div class="benefits" id="benefits">
            <div><?php the_field('title_bn'); ?></div>
            <div class="flex">
                <?php foreach ($benefits as $bene) { ?>
                    <?php if ($lCount <=1) { ?>
                        <a  href="#request" class="item">
                            <img src="<?php echo $bene['image']; ?>" alt="">
                            <p><?php echo $bene['text']; ?></p>
                        </a>

                        <?php $lCount++; } else { ?>
                        <span class="item">
                            <img src="<?php echo $bene['image']; ?>" alt="">
                            <p><?php echo $bene['text']; ?></p>
                        </span>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

<?php if ( get_field('form_f') ) { ?>
        <div class="request" id="request">
            <div class="container">
                <?php the_field('form_f'); ?>
            </div>
        </div>
    <?php } ?>
<?php if ( get_field('text_ba') ) { ?>
    <div class="ms">
        <?php the_field('text_ba'); ?>
    </div>
<?php } ?>



<?php get_footer(); ?>