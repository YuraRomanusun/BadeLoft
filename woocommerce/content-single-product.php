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
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>


    <div class="content prod-single">
        <div class="container">
            <div class="breadcrumbs separator">
                <?php
                if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
                <?php /*<a href="#">Home</a> > <a href="#">Freestanding Bathtubs</a> > <span>Freestanding Bathtub BW-01-L</span> */ ?>
            </div>
			
            <div class="top-part flex">
                <aside class="big-side-image">
                <?php
                    do_action( 'woocommerce_before_single_product_summary' );
                ?> 
                </aside>
                    
                <article>
                    <div class="prod-name separator">
                        <div class="left">
                            <?php

                            remove_action('woocommerce_single_product_summary',"woocommerce_template_single_rating", 10);

                            /**
                            * Hook: woocommerce_single_product_summary.
                            *
                            * @hooked woocommerce_template_single_title - 5
                            * @hooked woocommerce_template_single_rating - 10
                            * @hooked woocommerce_template_single_price - 10
                            * @hooked woocommerce_template_single_excerpt - 20
                            * @hooked woocommerce_template_single_add_to_cart - 30
                            * @hooked woocommerce_template_single_meta - 40
                            * @hooked woocommerce_template_single_sharing - 50
                            * @hooked WC_Structured_Data::generate_product_data() - 60
                            */
                            do_action( 'woocommerce_single_product_summary' );
                            ?>
                        </div>

                        <!--div class="right">
                            <a class="email-us" href="<?php // echo get_field('email_us', 'options'); ?>">Email Us</a>
                            <a class="free-template"  data-fancybox data-src="#req-popup" href="javascript:;">Free Template</a>
                        </div-->
                    </div>
                    
                    <?php if (get_field('image_tech')) { ?>
                    <div class="tech-cpec">
                        <a href="<?php echo get_field('image_tech', $product_id); ?>" data-fancybox ><img src="<?php echo get_field('image_tech', $product_id); ?>" alt=""></a>
                    </div>
                    <?php } ?>
                    
                    <div class="anchors-box">
                    <?php if ($gcphoto = get_field('customers_photo',get_the_ID())) {
                    //var_dump($custGal);
                    if ($custGal = get_field('gallery_gal', $gcphoto[0])) { ?>
                        <a class="button" id="customerPhotos">Customers Photos</a>
                    <?php }
                    }; ?>
                    
                    <?php if (get_field('3d_model',get_the_ID())) { ?>
                        <a class="button anchor icon-arrows-ccw" href="#model3d">360 View</a>
                    <?php } ?>
                    
                    <?php if (get_field('illustrations',get_the_ID())) { ?>
                        <a href="#s-illustrations" class="button anchor icon-bath">Body Position</a>
                    <?php } ?>
                    
                    <?php if (get_field('is_there_a_video',get_the_ID())) { ?>
                        <a href="#pr-videos" class="button anchor icon-play-circled2">Product Video</a>
                    <?php } ?>
                        <a data-fancybox data-src="#req-popup" href="javascript:;" class="button red-button">Free Material Sample Kit</a>
                    </div>
                    
                    <?php if ($gcphoto = get_field('customers_photo',get_the_ID())) {
                    //var_dump($custGal);
                    if ($custGal = get_field('gallery_gal', $gcphoto[0])) { ?>
                    <div class="cs-images" style="display:none;">
                    <?php foreach ($custGal as $cgal) { ?>
                        <a data-fancybox="customer-photos" href="<?php echo $cgal['url']; ?>"></a>
                    <?php } ?>
                    </div>
                    <?php }
                    }; ?>

                </article>
            </div>
             
            <article class="main">
                <!--div class="summary entry-summary"-->
                <!-- .summary -->
                <div class="text-features">
                    <?php 
                    global $product;
                    $product_id = $product->get_ID();
                    echo "<p>";
                    the_content();
                    echo "</p>";
                    if ($features = get_field("features",$product_id)): ?>
                        <div class="sn-features flex">
                            <ul>
                                <?php
                                foreach ($features as $feature): ?>
                                    <?php if ($feature['features_file']) { ?>
                                        <li><a data-fancybox
                                               href="<?php echo $feature['features_file']; ?>"><?php echo $feature['title']; ?></a>
                                        </li>
                                    <?php } elseif ($feature['title']) { ?>
                                        <li>
                                            <?php echo $feature['title']; ?>
                                        </li>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>



                <!--                Specifications-->
                <div class="sn-downloads flex">
                    <div class="item">
                        <table>
                            <?php
                            $product_attributes = get_post_meta( get_the_ID() , '_product_attributes' );
                            $product_attributes = $product_attributes[0];
                            foreach($product_attributes as $attribute):?>
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
                            <?php if($download_links = get_field('download_links', get_the_ID())): ?>
                                <?php foreach($download_links as $key => $download_link): ?>
                                    <tr>
                                        <?php echo $key == 0 ? '<th rowspan="4">Download:</th>' : ""; ?>
                                        <td><a class="alt-download-doc <?php echo $download_link['file_type'] == "PDF" ? "alt-pdf" : "alt-dwg"; ?>" href="<?php if ($download_link['file_type'] == "PDF") { ?>http://docs.google.com/viewerng/viewer?url=<?php echo $download_link['file']; } else {echo $download_link['file'];}  ?>" target="_blank"><?php echo $download_link['title_link']; ?></a></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif; ?>
                        </table>
                    </div>
                    <?php if (get_field('cupc_logo',get_the_ID())) { ?>
                        <div class="item flex">
                            <img src="<?php /*echo get_field('image_logo');*/ echo theme('img/cUPC-Logo.png'); ?>" alt="">
                        </div>
                    <?php } ?>
                </div>



                <!--                VIDEOS-->
                <?php if (get_field('is_there_a_video',get_the_ID())): ?>
                    <div class="video-covers flex separator" id="pr-videos">
                        <?php foreach (get_field('videos', get_the_ID()) as $video): ?>
                            <?php
                            $vid = $video['video_link'];
                            $vid_ex = explode("v=", $vid);
                            $imgurl = 'https://img.youtube.com/vi/' . $vid_ex[1] . '/0.jpg';
                            $imgurl = (@file_get_contents($imgurl)) ? $imgurl : 'https://img.youtube.com/vi/' . $vid_ex[1] . '/maxresdefault.jpg';
                            $content = file_get_contents("https://youtube.com/get_video_info?video_id=" . $vid_ex[1]);
                            parse_str($content, $ytarr);
                            ?>
                            <a data-fancybox
                               href="<?php echo $video['choice_type'] == 'link' ? $video['video_link'] : $video['video']; ?>">
                               <img src="<?php echo $video['choice_type'] != 'link' ? $video['preview_image'] : $imgurl; ?>" alt="">
                               <span class="video-title"><?php echo $video['choice_type'] = 'link' ? $ytarr['title'] : $video['video_title']; ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif;?>
                
                <div class="sr-char separator prod-exp-section">
                    <?php echo get_field("description_tech", get_the_ID()); ?>
                </div>

                <?php if (get_field('image_tech',get_the_ID()) || get_field('3d_model',get_the_ID())) { ?>
                    <div class="sn-tech-char prod-exp-section" id="model3d">
						<h3 class="prod-subheading">360° View</h3>
						<p class="prod-subheading-p">Click to begin. Left-click to turn/rotate. Trackball to zoom.</p>
                        <div>
                            <?php if (get_field('3d_model',get_the_ID())) { ?>
                                <div class="right">
                                    <iframe src="<?php echo get_field('3d_model', get_the_ID()); ?>" frameborder="0" seamless
                                            allowfullscreen="allowfullscreen"></iframe>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>


                <?php
                if ($cphoto = get_field('customers_photo',get_the_ID())) { ?>
                    <?php
                    $queryTab = new WP_Query(array('p' => $cphoto[0], 'post_type' => 'gallery'));
                    while ($queryTab->have_posts()) {
                        $queryTab->the_post(); ?>
                        <a class="c-photos prod-exp-section" href="<?php echo get_the_permalink($cphoto[0]); ?>"><h3 class="prod-subheading">Customers Project
                                Photos</h3><p class="prod-subheading-p">Click to see more</p><?php the_post_thumbnail(); ?></a>
                    <?php } ?>
                <?php }
                wp_reset_postdata();
                ?>


                <?php
                if ($cillustration = get_field('illustrations',get_the_ID())) { $ilCount = 0; ?>
                    <div class="illustrations-box prod-exp-section" id="s-illustrations">
                        <div class="right">
							<h3 class="prod-subheading">Body Position Illustration</h3>
							<p class="prod-subheading-p">Adjust slider to correct height to see how you'll fit in our tubs!</p>
                            <?php foreach ($cillustration as $cim) { ?>
                                <?php if ($cim['size'] && $cim['image']) { ?>
                                    <figure><img src="<?php echo $cim['image']; ?>" alt=""></figure>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="left flex">
                            <div class="range-title">Choose your height</div>
                            <div class="range-slider-box">
                                <div id="slider-range" data-heights="<?php foreach ($cillustration as $cCount) {echo "".$cCount['size']." ";} ?>"></div>
                                <!--                <div id="slider-update-value"></div>-->
                                <div class="slider-values">
                                    <?php foreach ($cillustration as $cil) { ?>
                                        <div><?php echo $cil['size']; ?></div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php } ?>

                <?php if (get_field('single_illustration', get_the_ID())) { ?>
                    <div class="single-illustration prod-exp-section">
					    <h3 class="prod-subheading">Tubs For Two</h3>
					    <p class="prod-subheading-p">Spend quality time in your personal home spa!</p>
                        <img src="<?php echo image_src(get_field('single_illustration', get_the_ID()), 'single_illustration', false, false); ?>" alt="">
                    </div>
                <?php } ?>

                <?php
                wp_reset_postdata();
                ?>
             
                <?php
                remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
                add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action( 'woocommerce_after_single_product_summary' );
                ?>
                
                <meta itemprop="url" content="<?php the_permalink(); ?>"/>
                
            </article>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>