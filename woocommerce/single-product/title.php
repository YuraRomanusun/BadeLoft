<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $post, $product;
$imageUrl            = get_the_post_thumbnail_url( $post->ID, 'full', array(
	'title'	 => $props['title'],
	'alt'    => $props['alt'],
) );
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$title = get_the_title($post->ID);
?>
<link rel="canonical" href="<?php echo $actual_link ?>" />

<?php
the_title( '<div class="top"><h1 itemprop="name" class="product_title entry-title">', '</h1>

</div>' );


remove_action('woocommerce_single_product_summary',"woocommerce_template_single_title", 5);
remove_action('woocommerce_single_product_summary',"woocommerce_template_single_rating", 10);
remove_action('woocommerce_single_product_summary',"woocommerce_template_single_price", 10);
remove_action('woocommerce_single_product_summary',"woocommerce_template_single_excerpt", 20);
remove_action('woocommerce_single_product_summary',"woocommerce_template_single_add_to_cart", 30);
remove_action('woocommerce_single_product_summary',"woocommerce_template_single_meta", 40);
remove_action('woocommerce_single_product_summary',"woocommerce_template_single_sharing", 50);

add_action('woocommerce_single_product_summary',"woocommerce_template_single_rating", 10);
add_action('woocommerce_single_product_summary',"woocommerce_template_single_price", 6);
add_action('woocommerce_single_product_summary',"woocommerce_template_single_add_to_cart", 30);
//do_action('woocommerce_single_product_summary');


?>


<!-- GOOGLE PLUS -->
<script>
  window.___gcfg = {
    lang: 'en-US'
  };
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<!-- PINTEREST -->
<script
    type="text/javascript"
    async defer
    src="//assets.pinterest.com/js/pinit.js"
></script>