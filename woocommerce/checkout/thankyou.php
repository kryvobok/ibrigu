<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;
?>
<?php 
$message = apply_filters(
	'woocommerce_thankyou_order_received_text',
	__( 'Thank you. Your order has been received.', 'woocommerce' ),
	$order
);
?>
<div class="orderThanks">
	<?php if ( $order->has_status( 'failed' ) ) : ?>
		<h1 class="orderThanks__title"><?php echo esc_html( $message ); ?></h1>
		<div class="orderThanks__buttons">
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="btn button--black button--fz--md button--size--md pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
			<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="btn button--white button--fz--md button--size--md pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php else : ?>
		<h1 class="orderThanks__title"><?php echo esc_html( $message ); ?></h1>
		<h4 class="orderThanks__number"><?php esc_html_e( 'Your order number is:', 'woocommerce' ); echo '<span>' . $order->get_order_number() . '</span>'; ?></h4>
		<div class="orderThanks__buttons">
			<a href="<?php echo get_home_url(); ?>" class="btn button--black button--fz--md button--size--md pay"><?php esc_html_e( 'Home', 'woocommerce' ); ?></a>
		</div>
	<?php endif; ?>
</div>

