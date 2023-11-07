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
    <div class="wishlist__userName"><?php echo 'Welcome ' . $customer_name . '!'; ?></div>
    <div class="wishlist__menu account__menu">
        <h5 class="account__menuItem">
            <a href="<?php echo get_home_url() . '/my-account'; ?>">My information</a>
        </h5>
        <h5 class="account__menuItem current">
            My wishlist
        </h5>
    </div>
    <h1 class="wishlist__title sm"><?php the_title(); ?></h1>
    <?php if($wishlist->has_items()): ?>

    <?php else: ?>
        <?php 
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 3,
            'post__not_in' => array (get_the_ID()),
        );
        $the_query = new WP_Query($args);
        ?>
        <?php if($empty_wishlist_text): ?>
            <div class="wishlist__empty"><?php echo $empty_wishlist_text ?></div>
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
    <?php endif; ?>
</section>
<?php get_footer(  ) ?>