<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<<<<<<< HEAD
<div class="checkoutBox mt-4 woocommerce-variation-add-to-cart variations_button">
=======
<div class="woocommerce-variation-add-to-cart variations_button">
>>>>>>> e62c4841ab368ee8375e482c6afeecf106def8b8
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>



<<<<<<< HEAD
	<button type="submit" class="btn btn-danger mt-4 rounded-0 text-uppercase "><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	
=======
	<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
>>>>>>> e62c4841ab368ee8375e482c6afeecf106def8b8

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
