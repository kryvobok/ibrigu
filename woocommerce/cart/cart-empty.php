<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
<?php $image = get_field('empty_cart_image', 'options'); ?>
	<div class="emptyCart">
        <div class="emptyCart__container">
            <div class="emptyCart__title woocommerce-text"><?php _e('Cart', 'woocommerce_custom_text'); ?> (0)</div>
            <div class="emptyCart__subtitle woocommerce-text"><?php _e('Your cart is empty.', 'woocommerce_custom_text'); ?></div>
            <?php if($image): ?>
                <div class="emptyCart__image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"></div>
            <?php endif; ?>
            <a href="<?php echo get_home_url(  ) ?>/shop" class="emptyCart__button btn button--fz--md button--black button--size--md"><?php _e('SHOP NOW', 'woocommerce_custom_text'); ?></a>
            <a href="<?php echo get_home_url(  ) ?>/shop" class="emptyCart__closeIcon "></a>
        </div>
    </div>
<?php endif; ?>
