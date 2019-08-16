<?php
//header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 1));
//header('Content-Type: text/html; charset=utf-8');
//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//header('X-UA-Compatible: IE=Edge');
?><?php
if (isset($_GET['campaignType']))
{	
@setcookie('catAccCookies', 1, time() + (3600 * 24 * 30), '/', '.badeloftusa.com');
}
{	
@setcookie('campaignType', $_GET['campaignType'], time() + (3600 * 24 * 30), '/', '.badeloftusa.com');
}
?>
<!DOCTYPE html>
<html>
<head lang="en">

<!-- Google Tag Manager -->
<script async>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5H2CNM');</script>
<!-- End Google Tag Manager -->

<!-- Pinterest Tag -->
<script>
!function(e){if(!window.pintrk){window.pintrk = function () {
window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
      n=window.pintrk;n.queue=[],n.version="3.0";var
      t=document.createElement("script");t.async=!0,t.src=e;var
      r=document.getElementsByTagName("script")[0];
      r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
pintrk('load', '2614228273575', {em: '<user_email_address>'});
pintrk('page');
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt=""
      src="https://ct.pinterest.com/v3/?tid=2614228273575&pd[em]=<hashed_email_address>&noscript=1" />
</noscript>
<!-- end Pinterest Tag -->

<script async>
/**
* Function that tracks a click on an outbound link in Analytics.
* This function takes a valid URL string as an argument, and uses that URL string
* as the event label. Setting the transport method to 'beacon' lets the hit be sent
* using 'navigator.sendBeacon' in browser that support it.
*/
var trackOutboundLink = function(url) {
   ga('send', 'event', 'outbound', 'click', url, {
     'transport': 'beacon',
     'hitCallback': function(){document.location = url;}
   });
}
</script>


    <meta charset="UTF-8">
    <title><?php seo_title(); ?></title>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link rel="shortcut icon"  href="<?php echo theme() ?>/img/favicon.ico" type="image/x-icon" />
<script async src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php wp_head(); ?>
	<link rel='stylesheet' href='<?php echo theme()."/style.css?".time();?>' type='text/css' media='all'/>
    
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
<meta name="google-site-verification" content="7LT1P_YZt3xq-GpocFxcJfdS9GVKS7khz_LTZl440uE" />




</head>
<body <?php body_class(); ?>>
	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5H2CNM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="main" <?php echo (is_front_page() ? 'class="main"' : '')?> >
    <header>
        <div class="header-top">
            <div class="menu-open">&equiv;</div>
            <div class="container">
                <?php the_field('header_top_text', 'option'); ?>
                <div class="ht-container">
                    <div class="ht-image">
                        <img src="<?php $ith = get_field('image_top_header', 'option'); echo $ith['url']; ?>" alt="<?php echo $ith['alt']; ?>">
                    </div>
                    <a style="color:<?php the_field('text_color', 'option'); ?>;" data-fancybox data-src="#req-popup" href="javascript:;" onclick="ga('send', 'event', 'Sample Request', 'Click', 'Sample Top Bar');">
                        <?php// the_field('header_top_link_title', 'option'); ?>
                        <span class="mobile-hide">Click for a </span>Free Material Sample
                    </a>
                </div>

            </div>
        </div>
        <div class="header-middle">
            <div class="flex">
                <div class="find-a-showroom">
                    <a href="<?php echo get_permalink('212'); ?>" class="item">
                        Find a Showroom
                    </a>
                    <?php if ($links = get_field('links', 'option')) { ?>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/flag.jpg" alt="flag">
                            <select id="dynamic_select" ><!--onchange="location = this.value;"-->>
                                <?php foreach ($links as $lnks) { ?>
                                    <option value="<?php echo $lnks['link_to']; ?>"><?php echo $lnks['link_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                </div>
                <div class="call-us">
                    <?php the_field('call_content', 'option'); ?>
                </div>
                <!-- <div class="search-cart">
                    <div class="left">
                        <div class="h-search">
                            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>">
                                <input type="text" name="s">
                                <button class="search-submit"><img src="<?php echo get_template_directory_uri(); ?>/img/glass.png" alt="glass"></button>
                            </form>
                        </div>
                    </div> -->
                    <div class="right">
                        <a href="<?php echo wc_get_cart_url(); ?>">
                            <img id="cart" src="<?php echo get_template_directory_uri(); ?>/img/cart.png" alt="cart">
                            <span><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="flex">
                <nav class="main-menu left-main-menu">
                    <?php wp_nav_menu(array('container' => false, 'items_wrap' => '<ul id="%1$s">%3$s</ul>', 'theme_location'  => 'main_left')); ?>
                </nav>
                <a href="<?php echo get_site_url(); ?>" id="logo"><img src="https://www.badeloftusa.com/wp-content/uploads/2019/01/2019-logo.png" alt="logo"></a>
                <nav class="main-menu main-menu-right">
                    <?php wp_nav_menu(array('container' => false, 'items_wrap' => '<ul id="%1$s">%3$s</ul>', 'theme_location'  => 'main_right')); ?>
                </nav>
            </div>
            <div id="showroom_popup" style="display: none;">
                <div class="container">
                    <div class="text" >
                        <div>We have <a href="#">a partner showroom</a> in your area</div>
                    </div>
                </div>
            </div>
        </div>
    </header>