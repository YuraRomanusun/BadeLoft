<?php get_header(); ?>
<div class="content">
        <?php if ($mslider = get_field('slider')) { ?>
        <div class="main-slider swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($mslider as $msldr) { ?>
                <div class="swiper-slide" style="background-image: url(<?php echo $msldr['image']; ?>);">
                    <div class="container flex separator">
                        <div class="left">
                            <h1><?php echo $msldr['title']; ?></h1>
                            <?php echo $msldr['description']; ?>
                        </div>
                        <div class="right">
                            <?php if ($msldr['button_type'] == 1) { ?>
                                <a  data-fancybox data-src="#req-popup" href="javascript:;" class="button" onclick="ga('send', 'event', 'Sample Request', 'Click', 'Sample Hero CTA');"><?php echo $msldr['button_text_p']; ?></a>
                            <?php } else if ($msldr['button_type'] == 2) { ?>
                                <a href="<?php echo $msldr['button_link_d']; ?>" class="button"><?php echo $msldr['button_text_d']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <?php } ?>



        <?php  $pCount = 0; if ($big_product_block = get_field('big_product_block')) { ?>
        <div class="our-products">
                <div class="prod-categories">
                    <?php /* <div class="prod-categories-slider swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($big_product_block as $bpbl) { ?>
                                <div class="swiper-slide flex">
                                    <a href="<?php echo $bpbl['button_link']; ?>" class="left" style="background-image: url(<?php echo $bpbl['image_big_product_block']; ?>);">
                                        <div class="bottom"><?php echo $bpbl['title_image_big_product']; ?></div>
                                    </a>
                                    <div class="right">
                                        <h4><?php echo $bpbl['title_description_big_product']; ?></h4>
                                        <?php echo $bpbl['description_big_product']; ?>
                                        <a href="<?php echo $bpbl['button_link']; ?>" class="button"><?php echo $bpbl['button_text']; ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div> */ ?>
                	<div class="prcategories flex">
                    	<?php foreach ($big_product_block as $big_prod) { ?>
                        	<a class="item" style="background-image: url(<?php echo $big_prod['image_big_product_block']; ?>);"  href="<?php echo $big_prod['button_link']; ?>">
                            	<div class="bottom">
                                	<?php echo $big_prod['title_image_big_product']; ?>
                            	</div>
                        	</a>
                    	<?php } ?>
                	</div>
                    

                </div>
        </div>
               

        <?php } ?>


        <div class="sample-templates">
             <div class="flex">
                
				<a data-fancybox data-src="#req-popup" href="javascript:;"  class="left" style="background-image: url(<?php the_field('image_left_block'); ?>);">
                    <h4><?php the_field('title_left_block'); ?></h4>
                    <?php the_field('description_left_block'); ?>
                    <span class="button"><?php the_field('button_text_blb'); ?></span>
                </a>
                <a data-fancybox data-src="#req-popup" href="javascript:;"  class="right" style="background-image: url(<?php the_field('image_right_block'); ?>);">
                    <h4><?php the_field('title_right_block'); ?></h4>
                    <?php the_field('description_right_block'); ?>
                    <span class="button"><?php the_field('button_text_brb'); ?></span>
                </a>
				
            </div>
        </div>
    	
 <?php if ($benefits = get_field('benefits')) { $lCount = 0; ?>
        <div class="benefits">
                <h2><?php the_field('benefits_title'); ?></h2>
                <div class="flex">
                    <?php foreach ($benefits as $bene) { ?>
                        <?php if ($lCount <=1) { ?>
                            <a  data-fancybox data-src="#req-popup" href="javascript:;" class="item">
                                <img src="<?php echo $bene['icon']['url']; ?>" alt="<?php echo $bene['icon']['alt']; ?>">
                                <p><?php echo $bene['title']; ?></p>
                            </a>

                        <?php $lCount++; } else { ?>
                        <span class="item">
                            <img src="<?php echo $bene['icon']['url']; ?>" alt="<?php echo $bene['icon']['alt']; ?>">
                            <p><?php echo $bene['title']; ?></p>
                        </span>
                        <?php } ?>
                    <?php } ?>
                </div>
        </div>
        <?php } ?>


<?php get_footer(); ?>