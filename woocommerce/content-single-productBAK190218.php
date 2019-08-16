<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>"
     id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="content prod-single flex">
        <aside class="big-side-image">
            <?php
            /**
             * woocommerce_before_single_product_summary hook.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action('woocommerce_before_single_product_summary');
            ?>
            <?php /*if ($cphoto = get_field('customers_photo')) { ?>
                <?php
                $query = new WP_Query(array('p' => $cphoto[0], 'post_type' => 'gallery'));
                while ($query->have_posts()) {
                    $query->the_post(); ?>
                    <a class="c-photos" href="<?php echo get_the_permalink($cphoto[0]); ?>"><p>Customers Project
                            Photos</p><?php the_post_thumbnail(); ?></a>
                <?php } ?>
            <?php }
            wp_reset_postdata(); */?>
            <div class="slider-images">
            <?php
            global $product;
            $attachment_ids = $product->get_gallery_attachment_ids();
            $mainImage = get_post_thumbnail_id( $product->ID );
            array_unshift($attachment_ids,$mainImage);
            ?>
            <?php if(count($attachment_ids) > 1){ ?>
                <div class="swiper-container thumbSlider">
                    <div class="swiper-wrapper">
                        <?php foreach ($attachment_ids as $attachment_id) { ?>
                            <div class="swiper-slide">
                                <a href="<?php $image = wp_get_attachment_image_src($attachment_id, 'shop_single'); echo $image[0] ?>" data-fancybox="gallery">
                                    <?php echo wp_get_attachment_image( $attachment_id, 'shop_single'); ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="swiper-container galleryThumbs">
                    <div class="swiper-wrapper">
                        <?php foreach ($attachment_ids as $attachment_id) { ?>
                            <div class="swiper-slide">
                                <!--style="background-image: url(<?php //$image = wp_get_attachment_image_src($attachment_id, 'thumbnail'); echo $image[0] ?>)"-->
                                <?php echo wp_get_attachment_image( $attachment_id, 'shop_thumbnail');  ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <span class="tip">Swipe to see more</span>
            <?php }
            else
            {
                echo wp_get_attachment_image( $mainImage, 'large');
            }
            ?>
            <?php
            //wc_get_template( 'single-product/product-thumbnails.php' );
            ?>
            </div>

            <style>
                @media screen and (max-width: 1024px) {
                    /* FIX IOS BUG WITH BREADCRUMBS */
                    .prod-single aside, .prod-single article {
                        -webkit-box-flex: 1;
                        -webkit-flex: 1;
                        -moz-box-flex: 1;
                        -moz-flex: 1;
                        -ms-flex: 1;
                        flex: 1;

                    }
                }

            </style>
        </aside>


        <article>
            <div class="container">
                <!--div class="summary entry-summary"-->
                <div class="breadcrumbs separator">
                    <?php
                    if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                    <?php /*<a href="#">Home</a> > <a href="#">Freestanding Bathtubs</a> > <span>Freestanding Bathtub BW-01-L</span> */ ?>
                </div>
                <div class="prod-name flex separator">
                    <div class="left">
                        <?php

                        remove_action('woocommerce_single_product_summary',"woocommerce_template_single_rating", 10);

                        /**
                         * woocommerce_single_product_summary hook.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_meta - 30
                         * @hooked woocommerce_template_single_add_to_cart - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         */
                        do_action('woocommerce_single_product_summary');
                        ?>


                    </div>

                    <!--div class="right">
						<a class="email-us" href="<?php // echo get_field('email_us', 'options'); ?>">Email Us</a>
						<a class="free-template"  data-fancybox data-src="#req-popup" href="javascript:;">Free Template</a>
					</div-->
                </div>
                <?php if (get_field('image_tech')) { ?>
                    <div class="tech-cpec">
                        <a href="#tabsall" id="viewfullspec"><img src="<?php echo get_field('image_tech', $product_id); ?>" alt=""></a>
                    </div>
                <?php } ?>
                <!-- .summary -->
<!--                Specifications-->
                <?php /*
				<h2>Technical Characteristics</h2>
				<div class="sn-downloads flex">
					<div class="item">
						<table>
							<?php
							$attributes = get_post_meta( get_the_ID() , '_product_attributes' );
							$attributes = $attributes[0];
							foreach($attributes as $attribute):?>
								<?php if($attribute['value'] != ""): ?>
									<tr>
										<th><?php echo $attribute['name']; ?>: </th>
										<td><?php echo $attribute['value']; ?></td>
									</tr>
								<?php endif; endforeach; ?>
						</table>
					</div>
					<div class="item">
						<table class="docs">
							<?php if($download_links = get_field('download_links')): ?>
								<?php foreach($download_links as $key => $download_link): ?>
									<tr>
										<?php echo $key == 0 ? '<th rowspan="4">Download:</th>' : ""; ?>
										<td><a class="alt-download-doc <?php echo $download_link['file_type'] == "PDF" ? "alt-pdf" : "alt-dwg"; ?>" href="<?php if ($download_link['file_type'] == "PDF") { ?>http://docs.google.com/viewerng/viewer?url=<?php echo $download_link['file']; } else {echo $download_link['file'];}  ?>" target="_blank"><?php echo $download_link['title_link']; ?></a></td>
									</tr>
								<?php endforeach;?>
							<?php endif; ?>
						</table>
					</div>
                    <?php if (get_field('cupc_logo')) { ?>
                        <div class="item flex">
                            <img src="<?php  echo theme('img/cUPC-Logo.png'); ?>" alt="">
                        </div>
                    <?php } ?>
				</div>
<?php */ ?>
                <?php /*
                <div class="sr-char separator">
                    <h2><?php echo get_field("description_title"); ?></h2>
                    <?php echo get_field("description_tech"); ?>
                </div>
                */?>

<!--                <p>-->
<!--                    --><?php //the_content(); ?>
<!--                </p>-->
<!--                --><?php //if ($features = get_field("features")): ?>
<!--                    <div class="sn-features flex">-->
<!--                        <strong>--><?php //echo get_field("features_text"); ?><!--</strong>-->
<!--                        <ul>-->
<!--                            --><?php
//                            foreach ($features as $feature): ?>
<!--                                <li><a data-fancybox-->
<!--                                       href="--><?php //echo $feature['features_file']; ?><!--">--><?php //echo $feature['title']; ?><!--</a>-->
<!--                                </li>-->
<!--                            --><?php //endforeach; ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!--                VIDEOS-->
                <?php /*if (get_field('is_there_a_video')): ?>
                    <div class="video-covers flex separator">
                        <?php foreach (get_field('videos') as $video): ?>
                            <?php
                            $vid = $video['video_link'];
                            $vid_ex = explode("v=", $vid);
                            $imgurl = 'http://img.youtube.com/vi/' . $vid_ex[1] . '/0.jpg';
                            $imgurl = (@file_get_contents($imgurl)) ? $imgurl : 'http://img.youtube.com/vi/' . $vid_ex[1] . '/maxresdefault.jpg';
                            $content = file_get_contents("http://youtube.com/get_video_info?video_id=" . $vid_ex[1]);
                            parse_str($content, $ytarr);
                            ?>
                            <a data-fancybox
                               href="<?php echo $video['choice_type'] == 'link' ? $video['video_link'] : $video['video']; ?>"><img
                                        src="<?php echo $video['choice_type'] != 'link' ? $video['preview_image'] : $imgurl; ?>"
                                        alt=""><span
                                        class="video-title"><?php echo $video['choice_type'] = 'link' ? $ytarr['title'] : $video['video_title']; ?></span></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; */?>
                <?php /*if (get_field('image_tech') || get_field('3d_model')) { ?>
                    <div class="sn-tech-char">
                        <div>
                            <?php if (get_field('image_tech')) { ?>
                                <div class="left">
                                    <img src="<?php echo get_field('image_tech'); ?>" alt="">
                                </div>
                            <?php } ?>
                            <?php if (get_field('3d_model')) { ?>
                                <div class="right">
                                    <iframe src="<?php echo get_field('3d_model'); ?>" frameborder="0" seamless
                                            allowfullscreen="allowfullscreen"></iframe>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php }*/ ?>


                <?php
                remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
                add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );
                /**
                 * woocommerce_after_single_product_summary hook.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                //add_action('woocommerce_output_product_data_tabs');

                do_action('woocommerce_after_single_product_summary');
                ?>

                <meta itemprop="url" content="<?php the_permalink(); ?>"/>


            </div>
        </article>
    </div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action('woocommerce_after_single_product'); ?>
