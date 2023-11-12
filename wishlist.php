<?php get_header() ?>
<?php $customer = new WC_Customer( get_current_user_id() ); 
if($customer->first_name != "" or $customer->last_name != ""): 
    $customer_name = $customer->last_name . " " . $customer->first_name; 
else: 
    $customer_name = $customer->display_name; 
endif;
$empty_wishlist_text = get_field('empty_wishlist_text', 'options');
$slider_title = get_field('empty_wishlist_related_products_title', 'options');
?>
<section class="wishlist">
    <div class="wishlist__top">
        <div class="wishlist__userName myAccount__userName"><?php echo 'Welcome ' . $customer_name . '!'; ?></div>
        <div class="wishlist__menu account__menu">
            <h5 class="account__menuItem">
                <a href="<?php echo get_home_url() . '/my-account'; ?>">My information</a>
            </h5>
            <h5 class="account__menuItem current">
                My wishlist
            </h5>
        </div>
        <h1 class="wishlist__title myAccount__title sm"><?php the_title(); ?></h1>
    </div>
    <div class="wishlist__itemsList">
        <?php foreach ( $wishlist_items as $item ) :
            global $product;
            $product      = $item->get_product();
            $availability = $product->get_availability();
            $stock_status = isset( $availability['class'] ) ? $availability['class'] : false; ?>
            <div class="wishlist__itemWrapper">
                <div class="wishlist__item">
                    <div class="wishlist__itemImage"><?php echo $product->get_image(); ?></div>
                    <div class="wishlist__itemTitle"><?php echo $product->get_title(); ?></div>
                    <div class="wishlist__itemBottom">
                        <div class="wishlist__itemAttributes">
                            <h5 class="wishlist__itemPrice"><?php do_action('woocommerce_product_price'); ?></h5>
                            <div class="wishlist__itemAttributes__list">
                                <?php 
                                $attributes = $product->get_attributes();
                                foreach($attributes as $attribute):
                                    $attributelabel = wc_attribute_label( $attribute['name'] );
                                    $results = woocommerce_get_product_terms($product->id, $attribute['name'], 'names');?>
                                    <div class="wishlist__itemAttributes__item">
                                        <div class="wishlist__itemAttributes__itemLabel"><?php echo $attributelabel . ': '; ?></div>
                                        <div class="wishlist__itemAttributes__itemOptions">
                                            <?php $count = count($results); ?>
                                            <?php $i = 1; foreach($results as $result): ?>
                                                <?php 
                                                    echo $result; 
                                                    if($i != $count){
                                                        echo ', ';
                                                    }
                                                ?>
                                            <?php $i++; endforeach;?>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="wishlist__itemRemove"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ) ?></div>
                            </div>
                        </div>
                        <div class="wishlist__itemButton productAddTocart"><?php do_action('woocommerce_product_add_to_cart'); ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="wishlist__empty">
        <?php 
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 3,
            'post__not_in' => array (get_the_ID()),
        );
        $the_query = new WP_Query($args);
        ?>
        <?php if($empty_wishlist_text): ?>
            <div class="wishlist__emptyText"><?php echo $empty_wishlist_text ?></div>
        <?php endif; ?>
        <div class="wishlist__relatedProducts relatedProducts">
            <?php if($slider_title): ?>
                <div class="wishlist__relatedProductsTitle"><?php echo $slider_title; ?></div>
            <?php endif; ?>
            <?php if($the_query->have_posts()): ?>
                <div class="relatedProducts__list singleProductCardsList">
                    <?php while($the_query->have_posts()): $the_query->the_post(); ?>
                        <div class="relatedProducts__cardWrapper singleProductCard__wrapper">
                            <div class="relatedProducts__card singleProductCard">
                                <?php if(!empty(get_the_post_thumbnail_url(  ))):
                                    $image = get_the_post_thumbnail_url(  );
                                else:
                                    $image = wc_placeholder_img_src();
                                endif; ?>
                                <div class="relatedProducts__image singleProductCard__image"><img src="<?php echo $image; ?>" alt=""></div>
                                <h5 class="relatedProducts__title singleProductCard__title"><?php the_title(); ?></h5>
                                <a href="<?php the_permalink() ?>" class="relatedProducts__link singleProductCard__link"><h5>See more</h5></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="wishlist__subscribtion"></div>
    </div>
</section>
<?php get_footer(  ) ?>