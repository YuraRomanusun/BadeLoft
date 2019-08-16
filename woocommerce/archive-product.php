<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
<div class="content inner-page">
	<div class="container">
		<div class="rel-prod four-prods">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

						<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
						
						<div class="header-bottom sub-nav-filter" style=display:none;>
							<h4 class="page-title" style="margin-bottom: 11px; text-transform: capitalize; font-weight: 300; font-size: 24px;">Filter</h4>
							<div class="flex"> 
								<nav class="main-menu left-main-menu" style="width: 100%;">
									<ul id="menu-main-left">
										<li class="current-menu-item"><a href="/freestanding-bathtubs/white-freestanding-tubs">White Tubs</a></li>
										<li class="current-menu-item"><a href="/freestanding-bathtubs/black-freestanding-tubs">Black Tubs</a></li>
										<li class="current-menu-item"><a href="/freestanding-bathtubs/small-freestanding-tubs">Small Tubs</a></li>
										<li class="current-menu-item"><a href="/freestanding-bathtubs/large-freestanding-tubs">Large Tubs</a></li>
										<li class="current-menu-item"><a href="/freestanding-bathtubs/x-large-freestanding-tubs">XL Tubs</a></li>
									</ul>
								</nav>
							</div>
						</div>	

					<?php endif; ?>

					<?php
						/**
						 * woocommerce_archive_description hook.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
					?>

					<?php if ( have_posts() ) : ?>

						<?php
							/**
							 * woocommerce_before_shop_loop hook.
							 *
							 * @hooked woocommerce_result_count - 30
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						?>

						<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

						<div class="f-fix"></div>
						<div class="f-fix"></div>
						<div class="f-fix"></div>
						<div class="f-fix"></div>

						<?php woocommerce_product_loop_end(); ?>


						<?php
							/**
							 * woocommerce_after_shop_loop hook.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>

				<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>

				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					//do_action( 'woocommerce_sidebar' );
				?>

		</div>
		<?php ?>
		<div class="container">
			<div class="additional-content">
				<?php $addname = get_field('additional_text_category', 'category_'. get_queried_object()->term_id .""); echo $addname;?>
				<?php if ($taber = get_field('tabs_category', 'category_'. get_queried_object()->term_id ."")) { ?>
					<div class="taber">
						<div class="taber-headings">
							<?php foreach ($taber as $tbr) { ?>
								<div class="item"><?php echo $tbr['tab_title_category']; ?></div>
							<?php } ?>
						</div>
						<div class="taber-content">
							<?php foreach($taber as $tbr) { ?>
								<div class="item"><?php echo $tbr['tab_content_category']; ?></div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php ?>
	</div>
</div>

<?php get_footer( 'shop' ); ?>