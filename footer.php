</div>
<div class="pusher"></div>
<footer>
    <div class="container">
        <div class="flex separator">
            <div class="column">
                <nav class="footer-menu">
                    <?php wp_nav_menu(array('container' => false, 'items_wrap' => '<ul id="%1$s">%3$s</ul>', 'theme_location'  => 'footer')); ?>
                </nav>
            </div>
            <div class="column we-accept">
                We Accept
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/card1.png" alt="visa logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/card2.png" alt="mastercard logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/card3.png" alt="amex logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/card4.png" alt="discover logo">
                </div>
            </div>
            <div class="column f-social">
                <div class="soc-icons">
                    <a href="//facebook.com/Badeloft"><img src="<?php echo get_template_directory_uri(); ?>/img/soc1.png" alt="facebook icon"></a>
                    <a href="//plus.google.com/113423341380248061587"><img src="<?php echo get_template_directory_uri(); ?>/img/soc2.png" alt="google plus icon"></a>
                    <a href="//pinterest.com/badeloftusa/"><img src="<?php echo get_template_directory_uri(); ?>/img/soc3.png" alt="pinterest icon"></a>
                    <a href="//instagram.com/badeloftusa/"><img src="<?php echo get_template_directory_uri(); ?>/img/soc6.png" alt="instagram icon"></a>
                    <a href="//houzz.com/pro/tgk2180/badeloft"><img src="<?php echo get_template_directory_uri(); ?>/img/soc4.png" alt="houzz icon"></a>
                </div>
                <div class="f-al-right">
                	<a href="https://www.houzz.com/pro/tgk2180/badeloft"><img src="<?php echo get_template_directory_uri(); ?>/img/houzz2019.png" alt="best of houzz winner 2019"></a>
                	<a href="https://www.houzz.com/pro/tgk2180/badeloft"><img src="<?php echo get_template_directory_uri(); ?>/img/houzz2018.png" alt="best of houzz winner 2018"></a>
                	<a href="https://www.houzz.com/pro/tgk2180/badeloft"><img src="<?php echo get_template_directory_uri(); ?>/img/houzz.png" alt="best of houzz winner 2017"></a>
                    <a href="https://www.houzz.com/pro/tgk2180/badeloft"><img src="<?php echo get_template_directory_uri(); ?>/img/best-of1.png" alt="best of houzz winner 2016"></a>
                    <a href="https://www.houzz.com/pro/tgk2180/badeloft"><img src="<?php echo get_template_directory_uri(); ?>/img/best-of2.png" alt="best of houzz winner 2015"></a>
                </div>
            </div>
        </div>
        <div class="copy">
            <?php the_field('copy_footer', 'option'); ?>
        </div>
    </div>
</footer>
<div class="mobile-menu">
    <div class="mob-close">X</div>
    <?php wp_nav_menu(array('container' => false, 'items_wrap' => '<ul id="%1$s">%3$s</ul>', 'theme_location'  => 'mobile_menu')); ?>
</div>

<div style="display: none;" id="req-popup">
    <div class="request req-popup">

        <div class="san-franc samples-block flex separator">
            <div class="left">
                <?php
                    $your_query = new WP_Query( 'page_id=885' );
                    while ( $your_query->have_posts() ) : $your_query->the_post();
                        the_content();
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
            <div class="right">
                <div class="item"><img src="<?php $fimg = get_field('material_sample', '885'); echo $fimg['url']; ?>" alt="<?php echo $fimg['alt']; ?>"><?php the_field('material_sample_text'); ?></div>
                <div class="item"><img src="<?php $simg = get_field('bathtub_templates_image', '885'); echo $simg['url']; ?>" alt="<?php echo $simg['alt']; ?>"><?php the_field('bathtubs_template_text'); ?></div>
                <?php if (get_field('video_sample', '885')) { ?>
                    <div class="s-video-cover fullframe"><?php the_field('video_sample', '885'); ?></div>
                <?php } ?>
            </div>
        </div>
        <div class="request">
            <?php echo do_shortcode( '[contact-form-7 id="1164" title="Request"]' ); ?>
        </div>
    </div>
</div>

<div style="display:none" class="ck-modal" id="ckmodal">
    <div class="top"><h4><?php the_field('title_popup', 'option'); ?></h4></div>
    <img src="<?php $ipp = get_field('image_popup', 'option'); echo $ipp['url']; ?>" alt="<?php echo $ipp['alt']; ?>">
    <a  data-fancybox data-src="#req-popup" href="javascript:;" class="button" onclick="ga('send', 'event', 'PopUp', 'Click', 'PopUp Click');" ><?php the_field('button_text_popup', 'option'); ?></a>
</div>

<?php if ( get_field('discount_f', 'option') ) { ?>
    <div class="discount-box"><?php the_field('discount_f', 'option'); ?></div>
<?php } ?>


<?php wp_footer(); ?>
<?php


/*
on_sent_ok: "ga('send', 'event', 'Material Request', 'Sent');"
<script>
    var wpcf7Elm = document.querySelector( '.wpcf7' );

    wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
        location = 'https://www.badeloftusa.com/thank-you/';
    }, false );
</script> */
?>
<?php

    $showroom_coordinates = array();
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'Showroom'
    );
    $showrooms_query = new WP_Query( $args );
    if ($showrooms_query -> have_posts()) {
        while ($showrooms_query->have_posts()) { $showrooms_query->the_post();
            $location = get_field('map_single_room');
            if( !empty($location) ) {
                $showroom = array(get_the_ID(), $location['lat'], $location['lng'], get_the_permalink());
                array_push($showroom_coordinates, $showroom);
            }
        }
    }
    //var_dump($showroom_coordinates);
?>

<div id="coordinates" style="display: none;" data-coords="<?php
    foreach ($showroom_coordinates as $c_item) {
        echo ''.$c_item[0].','.$c_item[1].','.$c_item[2].','.$c_item[3].'|';
    }
?>"></div>

<script>
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

var leadSource = getUrlVars()["campaignType"];

</script>

<?php
if (isset($_GET['campaignType']))
{
@setcookie('catAccCookies', 1, time() + (3600 * 24 * 30), '/', '.badeloftusa.com');
}
{
@setcookie('campaignType', $_GET['campaignType'], time() + (3600 * 24 * 30), '/', '.badeloftusa.com');
}
?>
<script>

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

var leadSource = getUrlVars()["campaignType"];

$(function(){
$('#lead_source').val(leadSource);
});
</script>

<script>
$(function(){
$('#new_web_order').val('NewWebOrder');
});
$('input[name="est_shipp_date"]').mask('00/00/00');
$('input[name="est_shipp_date"]').attr('placeholder','YY/MM/DD');
</script>

<script src="//rum-static.pingdom.net/pa-5c5088cf9a3f830016000522.js" async></script>


<script>(function(n,t,i,r){var u,f;n[i]=n[i]||{},n[i].initial={accountCode:"BADEL11114",host:"BADEL11114.addressy.com"},n[i].on=n[i].on||function(){(n[i].onq=n[i].onq||[]).push(arguments)},u=t.createElement("script"),u.async=!0,u.src=r,f=t.getElementsByTagName("script")[0],f.parentNode.insertBefore(u,f)})(window,document,"pca","//BADEL11114.addressy.com/js/sensor.js")</script>

</body>
</html>

