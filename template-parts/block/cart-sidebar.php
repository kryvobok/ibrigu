<div class="cartSidebar<?php if(count( WC()->cart->get_cart() ) == 0){echo ' cart-empty';} ?>">
    <div class="cartSidebar__content">
        <?php if(count( WC()->cart->get_cart() ) == 0): ?>
            <div class="cartSidebar__empty">
                <?php get_template_part('template-parts/block/empty-cart-content'); ?>
            </div>
        <?php else: ?>
            <div class="cartSidebar__list">
                <?php get_template_part('template-parts/block/cart-content'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="cartSidebar__close"></div>
</div>
<div class="cartSidebar__overlay"></div>
