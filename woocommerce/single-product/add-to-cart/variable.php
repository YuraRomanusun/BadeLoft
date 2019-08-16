<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );


$is_custom_build = get_field('custom_build',get_the_ID());


do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<?php
$cart_action_url = esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) );
/*
if ( $is_custom_build == false )
{
	echo '<div class="btn-custom-build-wrapper">';
	echo '<a href="'.get_site_url().'/product/custom-tub/" class="btn-custom-build">Build Custom Tub</a>';
	echo '</div>';
}
*/
?>

<form class="variations_form cart add-to-cart" action="<?php echo  $cart_action_url;?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>

		<?php
		if ( $is_custom_build == false ){
		?>
		<div class="mob-attributes">
			<?php
			$producdt_attributes = get_post_meta( get_the_ID() , '_product_attributes' );
			$producdt_attributes = $producdt_attributes[0];
			foreach($producdt_attributes as $attribute):?>
				<?php if($attribute['value'] != ""): ?>
					<div>
						<strong><?php echo $attribute['name']; ?>: </strong>
						<span><?php echo $attribute['value']; ?></span>
					</div>
				<?php endif; endforeach; ?>
		</div>
		<?php
		}?>

		<table class="variations" cellspacing="0">
			<tbody>
				<?php 
					$i = 0;
					foreach ( $attributes as $attribute_name => $options ) : 
						if ( $is_custom_build == false ){
							echo '<tr>';
						}else{
							echo '<tr>';
						}
				?>
						<td class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name );?></label></td>
						<td class="value">
							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
							$i++;
						echo '</td>';
						echo '</tr>';
						endforeach;
						?>
			</tbody>
		</table>

		
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * woocommerce_before_single_variation Hook.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * woocommerce_after_single_variation Hook.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>



<?php
do_action( 'woocommerce_after_add_to_cart_form' );