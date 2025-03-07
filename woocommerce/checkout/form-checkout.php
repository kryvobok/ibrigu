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
	<a href="<?php echo get_home_url() . '/cart'; ?>" class="checkoutContent__btn button--underline"><?php _e('Back to cart', 'woocommerce_custom_text'); ?></a>
	<div id="order_review" class="woocommerce-checkout-review-order">
		<div class="cartTotals__wrapper">
			<h3 class="cartTotals__title lg"><?php _e('Your order', 'woocommerce_custom_text'); ?></h3>
			<div
				class="cartTotals__list cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
				<div class="cartTotals__subtotalRow cartTotals__row">
					<div class="cartTotals__subtotalLabel"><?php _e('Subtotal', 'woocommerce_custom_text'); ?></div>
					<div class="cartTotals__subtotalNumber"><?php wc_cart_totals_subtotal_html(); ?></div>
				</div>
				<div class="cartTotals__taxRow cartTotals__row">
					<div class="cartTotals__taxLabel"><?php _e('Tax and duty', 'woocommerce_custom_text'); ?></div>
					<div class="cartTotals__taxNumber">
						<?php echo WC()->cart->get_total_tax( ) . ' ' . get_woocommerce_currency_symbol();; ?></div>
				</div>
				<div class="cartTotals__shippingRow cartTotals__row">
					<div class="cartTotals__shippingLabel"><?php _e('Shipping', 'woocommerce_custom_text'); ?></div>
					<div class="cartTotals__shippingNumber">
						<?php echo WC()->cart->get_shipping_total() . ' ' . get_woocommerce_currency_symbol(); ?></div>
				</div>
				<h5 class="cartTotals__amountRow cartTotals__row lg">
					<div class="cartTotals__amountLabel"><?php _e('Total', 'woocommerce_custom_text'); ?></div>
					<div class="cartTotals__amountNumber"><?php wc_cart_totals_order_total_html(); ?></div>
				</h5>
			</div>
		</div>
	</div>
	<div class="checkoutTabs__list">
		<div class="checkoutTabs__listItem checkoutUserInfoTab active">
			<?php if(!is_user_logged_in()): ?>
				<div class="checkoutUserInfoTab__forms">
					<h4 class="checkoutTabs__listItem__title sm"><?php _e('Contact information', 'woocommerce_custom_text'); ?></h4>
					<div class="checkoutUserInfoTab__sublist checkoutTabs__listItem__sublist login-tab">
						<h4 class="sm checkoutTabs__listItem__sublistTitle login"><?php _e('Existing customer', 'woocommerce_custom_text'); ?></h4>
						<div class="checkoutTabs__listItem__sublistContent">
							<form class="woocommerce-form woocommerce-form-login login" method="post" id="login">
								<?php do_action( 'woocommerce_login_form_start' ); ?>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="<?php _e('E-mail *', 'woocommerce_custom_text'); ?>" /><?php // @codingStandardsIgnoreLine ?>
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php _e('Password *', 'woocommerce_custom_text'); ?>" />
								</p>
								<?php do_action( 'woocommerce_login_form' ); ?>
								<p class="woocommerce-LostPassword lost_password woocommerce-text sm">
									<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot the password?', 'woocommerce' ); ?></a>
								</p>
								<div class="form-row loginFormButtons">
									<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
										<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
									</label>
									<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
									<button type="submit" class="woocommerce-button woocommerceAccountForm__buttonSubmit btn button--black button--fz--md button--size--md woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'LOGIN & CONTINUE', 'woocommerce' ); ?>"><?php esc_html_e( 'LOGIN & CONTINUE', 'woocommerce' ); ?></button>
									<div class="registerFormLink swapForm woocommerce-text sm"><?php _e('You can also', 'woocommerce_custom_text'); ?> <span class="link"><?php _e('New customers', 'woocommerce_custom_text'); ?></span></div>
								</div>
								<?php do_action( 'woocommerce_login_form_end' ); ?>
							</form>
						</div>
					</div>
					<div class="checkoutTabs__listItem__sublist new-account">
						<h4 class="sm checkoutTabs__listItem__sublistTitle"><?php _e('Create an account', 'woocommerce_custom_text'); ?></h4>
						<div class="checkoutTabs__listItem__sublistContent">
							<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
							<?php do_action( 'woocommerce_register_form_start' ); ?>

							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
								</p>

							<?php endif; ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide email">
								<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" placeholder="<?php _e('Email *', 'woocommerce_custom_text'); ?>" /><?php // @codingStandardsIgnoreLine ?>
							</p>

							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
									<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
								</p>

							<?php else : ?>


							<?php endif; ?>


							<div class="woocommerce-form-row form-row registerFormButtons">
								<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
								<button type="submit" class="woocommerce-Button woocommerceAccountForm__buttonSubmit woocommerce-button button--black button--fz--md button--size--md btn<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'LOGIN & CONTINUE', 'woocommerce' ); ?>"><?php esc_html_e( 'LOGIN & CONTINUE', 'woocommerce' ); ?></button>
								<div class="loginFormLink swapForm woocommerce-text sm"><?php _e('You can also', 'woocommerce_custom_text'); ?> <span class="link"><?php _e('Login', 'woocommerce_custom_text'); ?></span></div>
							</div>

							<?php do_action( 'woocommerce_register_form_end' ); ?>

							</form>
						</div>
					</div>
					<div class="checkoutTabs__listItem__sublist guestLogin__tab">
						<div class="guestLogin__wrapper">
							<h4 class="sm checkoutTabs__listItem__sublistTitle"><?php _e('Guest checkout', 'woocommerce_custom_text'); ?></h4>
							<div class="checkoutTabs__listItem__sublistContent">
								<form action="" class="guestLogin spacing-sm">
									<input type="email" class="email" placeholder="<?php _e('Email *', 'woocommerce_custom_text'); ?>">
									<input type="text" class="name" placeholder="<?php _e('First Name *', 'woocommerce_custom_text'); ?>">
									<input type="text" class="surname" placeholder="<?php _e('Surname *', 'woocommerce_custom_text'); ?>">
									<input type="text" class="fiscalCode" placeholder="<?php _e('Fiscal Code *', 'woocommerce_custom_text'); ?>">
									<input type="tel" pattern="[0-9]{9}" class="phoneNumber" placeholder="<?php _e('Phone Number *', 'woocommerce_custom_text'); ?>">
									<div class="form-row woocommerce-form-row form-row-wide form-privacy-checkbox-wrapper form-checkbox-wrapper">
										<div class="form-privacy-checkbox form-checkbox"><input type="checkbox" name="privacy"></div>
										<span class="woocommerce-text sm"><?php _e('Having read the privacy policy I authorize Ibrigu to process my personal data.', 'woocommerce_custom_text'); ?></span>
									</div>
									<div class="errors woocommerce-text">
										<div class="error-msg checkbox"><?php _e('Please confirm that you have read the Privacy Policy', 'woocommerce_custom_text'); ?></div>
										<div class="error-msg emptyFields"><?php _e('Some fields are empty', 'woocommerce_custom_text'); ?></div>
									</div>
									<div class="guestLogin__btnWrapper">
										<button type="submit" class="guestLogin__btn btn button--black button--fz--md button--size--md"><?php _e('Continue', 'woocommerce_custom_text'); ?></button>
									</div>
									<div class="createAccount woocommerce-text sm"><?php _e('You can also', 'woocommerce_custom_text'); ?> <span class="create"><?php _e('New customers', 'woocommerce_custom_text'); ?></span></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="formResult woocommerce-text lg">
					<div class="formResult__top"><?php _e('Contact information', 'woocommerce_custom_text'); ?> <span class="edit woocommerce-text"><?php _e('Edit', 'woocommerce_custom_text'); ?></span></div>
					<div class="formResult__content">
					</div>
				</div>
			<?php else: ?>
				<?php $customer = new WC_Customer( get_current_user_id() ); 
					if($customer->first_name != "" or $customer->last_name != ""): 
						$customer_name = $customer->last_name . " " . $customer->first_name; 
					else: 
						$customer_name = $customer->display_name; 
					endif;
					$current_user = wp_get_current_user();
					$redirect_full_url = get_home_url() . $redirect_slug;
					$logout_url = wp_logout_url($redirect_full_url);
				?>
				<div class="loginedCustomerData woocommerce-text lg">
					<div class="checkoutTabs__listItem__title loginedCustomerData__title login"><?php _e('Contact information', 'woocommerce_custom_text'); ?></div>
					<div class="loginedCustomerData__subtitle">Signed with <?php echo $current_user->user_email; ?><a href="<?php echo $logout_url; ?>" class="woocommerce-text loginedCustomerData__logout"><?php _e('Logout', 'woocommerce_custom_text'); ?></a></div>
					<div class="loginedCustomerData__text woocommerce-text md"><?php echo $customer_name; ?></div>
					<div class="loginedCustomerData__text woocommerce-text md"><?php echo $current_user->user_email; ?></div>
				</div>
			<?php endif; ?>
		</div>
			<form name="checkout" method="post" class="checkout woocommerce-checkout spacing-sm"
				action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">


				<?php if ( $checkout->get_checkout_fields() ) : ?>

				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
				<div class="checkoutTabs__listItem checkoutShipping<?php if(is_user_logged_in()){echo ' opened';} ?>">
					<h4 class="checkoutTabs__listItem__title sm"><?php _e('Shipping', 'woocommerce_custom_text'); ?></h4>
					<div class="checkoutTabs__listItem__sublist">
						<div class="col2-set checkoutTabs__listItem__sublistContent" id="customer_details">
							<div class="col-12">
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
								<div class="giftComment form-checkbox-wrapper"><div class="form-checkbox"><input type="checkbox"></div><span><?php _e('Is this a gift?', 'woocommerce_custom_text'); ?> </span><?php _e('Add a personalized message.', 'woocommerce_custom_text'); ?></div>
								<div class="charactersLimit">
									<span class="count"></span><span class="label"><?php _e('characters remaining', 'woocommerce_custom_text'); ?></span>
								</div>
							</div>

							<div class="col-12 additional-fields">
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
							</div>
							<div class="checkoutShipping__error"><?php _e('Some fields are empty!', 'woocommerce_custom_text'); ?></div>
							<div class="checkoutShipping__continue"><div class="btn button--black button--fz--md button--size--md"><?php _e('Continue', 'woocommerce_custom_text'); ?></div> </div>
						</div>
					</div>
				</div>
				<div class="checkoutShipping__result woocommerce-text lg">
					<div class="checkoutShipping__resultShipping">
						<div class="checkoutShipping__resultTitle"><?php _e('Shipping', 'woocommerce_custom_text'); ?> <span class="edit"><?php _e('Edit', 'woocommerce_custom_text'); ?></span></div>
						<div class="checkoutShipping__resultContent"></div>
					</div>
					<div class="checkoutShipping__resultBilling">
						<div class="checkoutShipping__resultTitle"><?php _e('Billing address', 'woocommerce_custom_text'); ?> <span class="edit"><?php _e('Edit', 'woocommerce_custom_text'); ?></span></div>
						<div class="checkoutShipping__resultContent"></div>
					</div>
				</div>
				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>
				<div class="checkoutTabs__listItem checkoutPayment hide">
					<h4 class="checkoutTabs__listItem__title sm"><?php _e('Payment', 'woocommerce_custom_text'); ?></h4>
					<div class="checkoutTabs__listItem__sublist">
						<div class="checkoutTabs__listItem__sublistContent">
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
										<br /><button type="submit"
											class="button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
											name="woocommerce_checkout_update_totals"
											value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
									</noscript>

									<?php wc_get_template( 'checkout/terms.php' ); ?>

									<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

									<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt' . esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ) . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

									<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

									<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
								</div>
							</div>
							<div class="checkoutMessage woocommerce-text xs italic">
								<?php _e('I hereby confirm that I have read and accepted the terms & conditions and I understand and give my consent to the privacy and cookies policies. See here our terms and conditions.', 'woocommerce_custom_text'); ?>
								</div>
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
