<?php
/**
 * Single variation display
 *
 * This is a javascript-based template for single variations (see https://codex.wordpress.org/Javascript_Reference/wp.template).
 * The values will be dynamically replaced after selecting attributes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$is_custom_build = get_field('custom_build',get_the_ID());

?>
<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">
		{{{ data.variation.variation_description }}}
	</div>

	<div class="woocommerce-variation-price">
		<?php
		if ( $is_custom_build ){
		?>
		
		<div>
			<strong>Dimensions: </strong>
			<span>{{{ data.variation.dimensions_html }}}</span>
		</div>

		<div>
			<strong>Weight: </strong>
			<span>{{{ data.variation.weight_html }}}</span>
		</div>


		<div>
			<strong>Price: </strong>
			{{{ data.variation.price_html }}}
		</div>

		<?php
		}?>

		
	</div>

	<div class="woocommerce-variation-availability">
		{{{ data.variation.availability_html }}}
	</div>
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p><?php _e( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ); ?></p>
</script>
