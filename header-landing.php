<?php
//header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 1));
//header('Content-Type: text/html; charset=utf-8');
//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//header('X-UA-Compatible: IE=Edge');
?><?php
if (isset($_GET['campaignType']))
{	
@setcookie('campaignType', $_GET['campaignType'], time() + (3600 * 24 * 30), '/', '.badeloftusa.com');
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5H2CNM');</script>
<!-- End Google Tag Manager -->

<script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php wp_head(); ?>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
<meta name="google-site-verification" content="7LT1P_YZt3xq-GpocFxcJfdS9GVKS7khz_LTZl440uE" />


<meta name="google-site-verification"
             content="<meta name="google-site-verification" content="7LT1P_YZt3xq-GpocFxcJfdS9GVKS7khz_LTZl440uE" />




<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1661429037432779');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1661429037432779&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


<script>(function(n,t,i,r){var u,f;n[i]=n[i]||{},n[i].initial={accountCode:"BADEL11114",host:"BADEL11114.addressy.com"},n[i].on=n[i].on||function(){(n[i].onq=n[i].onq||[]).push(arguments)},u=t.createElement("script"),u.async=!0,u.src=r,f=t.getElementsByTagName("script")[0],f.parentNode.insertBefore(u,f)})(window,document,"pca","//BADEL11114.addressy.com/js/sensor.js")</script>

<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0067/2611.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5H2CNM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="main" <?php echo (is_front_page() ? 'class="main"' : '')?> >
    <header>
                <div class="call-us">
<p><strong>CALL US:</strong> <a href="tel:1-833-223-3563">(833)-Badeloft – </a> MON – FRI 9AM – 5PM PST</p> <p style="text-align: center; margin-top: 10px;"></p>
                </div>
        <div class="menu-open">&equiv;</div>
        <div class="container alc">
            <a href="<?php echo get_site_url(); ?>" id="logo" style="margin: 0 0 0 0;"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo"></a>
            <nav class="main-menu main-menu-right" style="margin: 0 0 0 0;">
                <?php wp_nav_menu(array('container' => false, 'items_wrap' => '<ul id="%1$s">%3$s</ul>', 'theme_location'  => 'landing_menu')); ?>
            </nav>
        </div>
    </header>
