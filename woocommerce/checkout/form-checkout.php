<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
<div class="checkoutContent">
	<a href="<?php echo get_home_url() . '/cart'; ?>" class="checkoutContent__btn"></a>
<form action="" class="guestLogin">
	<input type="email" class="email" placeholder="Email">
	<input type="text" class="name" placeholder="First Name">
	<input type="text" class="surname" placeholder="Surname">
	<input type="text" class="fiscalCode" placeholder="Fiscal Code">
	<input type="tel" class="phoneNumber" placeholder="Phone Number">
	<input type="submit" value="Continue">
</form>
<div class="formResult">
	Name: ...
	Surname: ...
</div>
<div class="checkoutTabs__list">
	<div class="checkoutTabs__listItem checkoutUserInfoTab">
		<?php if(!is_user_logged_in()): ?>
			<div class="checkoutTabs__listItem__title login">Existing customer</div>
			<div class="checkoutTabs__listItem__title create-account">Existing customer</div>
			<div class="checkoutTabs__listItem__title ">Existing customer</div>
		<?php else: ?>
			<?php $customer = new WC_Customer( get_current_user_id() ); 
				if($customer->first_name != "" or $customer->last_name != ""): 
					$customer_name = $customer->last_name . " " . $customer->first_name; 
				else: 
					$customer_name = $customer->display_name; 
				endif;
				$current_user = wp_get_current_user();
			?>
			<div class="checkoutTabs__listItem__title login">Contact information<a href="<?php echo get_home_url() . '/my-account'; ?>">edit</a></div>
			<div class="checkoutTabs__listItem__subtitle"><?php echo $customer_name; ?></div>
			<div class="checkoutTabs__listItem__subtitle"><?php echo $current_user->user_email; ?></div>
		<?php endif; ?>
	</div>
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
		<div id="order_review" class="woocommerce-checkout-review-order">
			<div class="cartTotals__wrapper">
				<h2 class="cartTotals__title">Your order</h2>
				<div class="cartTotals__list cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

					<div class="cartTotals__subtotalRow cartTotals__row">
						<div class="cartTotals__subtotalLabel">Subtotal</div>
						<div class="cartTotals__subtotalNumber"><?php wc_cart_totals_subtotal_html(); ?></div>
					</div>
					<div class="cartTotals__taxRow cartTotals__row">
						<div class="cartTotals__taxLabel">Tax and duty</div>
						<div class="cartTotals__taxNumber"><?php echo WC()->cart->get_total_tax( ) . ' ' . get_woocommerce_currency_symbol();; ?></div>
					</div>
					<div class="cartTotals__shippingRow cartTotals__row">
						<div class="cartTotals__shippingLabel">Shipping</div>
						<div class="cartTotals__shippingNumber"><?php echo WC()->cart->get_shipping_total() . ' ' . get_woocommerce_currency_symbol(); ?></div>
					</div>

					<h4 class="cartTotals__amountRow cartTotals__row lg">
						<div class="cartTotals__amountLabel">Total</div>
						<div class="cartTotals__amountNumber"><?php wc_cart_totals_order_total_html(); ?></div>
					</h4>

				</div>


			</div>
		</div>
		
		<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
		<div class="checkoutTabs__listItem checkoutShipping">
			<div class="col2-set" id="customer_details">
				<div class="col-12">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>

				<div class="col-12">
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<?php endif; ?>
		<div class="checkoutTabs__listItem checkoutPaymnet">
		<div id="payment" class="woocommerce-checkout-payment">
			<?php if ( WC()->cart->needs_payment() ) : ?>
					<ul class="wc_payment_methods payment_methods methods">
						<?php
						if ( ! empty( $available_gateways ) ) {
							foreach ( $available_gateways as $gateway ) {
								wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
							}
						} else {
							echo '<li>';
							wc_print_notice( apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ), 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment
							echo '</li>';
						}
						?>
					</ul>
				<?php endif; ?>
				<div class="form-row place-order">
					<noscript>
						<?php
						/* translators: $1 and $2 opening and closing emphasis tags respectively */
						printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
						?>
						<br/><button type="submit" class="button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
					</noscript>

					<?php wc_get_template( 'checkout/terms.php' ); ?>

					<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

					<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt' . esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ) . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

					<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

					<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
				</div>
			</div>
			<?php
			if ( ! wp_doing_ajax() ) {
				do_action( 'woocommerce_review_order_after_payment' );
			} ?>
		</div>
	</form>
	
	
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</div>