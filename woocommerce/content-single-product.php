<?php 
global $product;

$attachment_ids = $product->get_gallery_image_ids();
$post_image = get_the_post_thumbnail_url(  );
$products_list_title = get_field('single_product_products_list_title', 'options');
$products_slider_title = get_field('single_product_products_slider_title', 'options');
$products = get_field('products_list');
do_action( 'woocommerce_before_single_product' ); 
?>
<section id="product-<?php the_ID(); ?>" <?php wc_product_class( 'singleProduct', $product ); ?>>
    <div class="singleProduct__breadcrumbs"></div>
    <div class="singleProduct__imagesList">
        <?php if(!empty($attachment_ids) || !empty($post_image)): ?>
            <?php if(!empty($post_image)): ?>
                <div class="singleProduct__imagesList__item">
                    <img src="<?php echo $post_image; ?>" alt="">
                </div>
            <?php endif; 
            if(!empty($attachment_ids)):
                foreach( $attachment_ids as $attachment_id ) {
                    $image_link = wp_get_attachment_url( $attachment_id ); ?>
                    <div class="singleProduct__imagesList__item">
                        <img src="<?php echo $image_link; ?>" alt="">
                    </div>
                <?php } 
            endif; ?>
        <?php else: ?>
            <div class="singleProduct__imagesList__item">
                <img src="<?php echo wc_placeholder_img_src(); ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
    <div class="singleProduct__button">
        <div class="singleProduct__buttonLeftCol"><h2 class="sm"><?php the_title(); ?></h2><div class="wishlistIcon"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ) ?></div></div>
        <div class="singleProduct__buttonCart">
            <?php do_action('woocommerce_product_add_to_cart'); ?>
        </div>
    </div>
    <div class="singleProduct__description__wrapper">
        <div class="singleProduct__description">
            <div class="attributesItem__list">
                <?php 
                $attributes = $product->get_attributes();
                foreach($attributes as $attribute):
                    $attributelabel = wc_attribute_label( $attribute['name'] );
                    $results = woocommerce_get_product_terms($product->id, $attribute['name'], 'names');?>
                    <div class="attributesItem">
                        <div class="attributesItem__label"><?php echo $attributelabel . ': '; ?></div>
                        <div class="attributesItem__options">
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
            </div>
            <div class="woocommerce-text"><?php the_content(); ?></div>
        </div>
        <div class="showContent">
            <div class="more showContentBtn">See more +</div>
            <div class="less showContentBtn">See less -</div>
        </div>
    </div>
    
    <?php if(have_rows('features')): ?>
        <div class="singleProduct__features">
            <?php while(have_rows('features')): the_row(); ?>
                <?php 
                $icon = get_sub_field('icon');
                $text = get_sub_field('text');
                ?>
                <div class="singleProduct__featuresItem">
                    <?php if($icon): ?>
                        <div class="singleProduct__featuresItem__icon"><img src="<?php echo $icon; ?>"></div>
                    <?php endif; ?>
                    <?php if($text): ?>
                        <div class="singleProduct__featuresItem__title"><?php echo $text; ?></div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php if(have_rows('info_tabs')): ?>
        <div class="singleProduct__infoTabs__list">
            <?php while(have_rows('info_tabs')): the_row(); ?>
                <?php 
                $title = get_sub_field('tab_title');
                $image = get_sub_field('tab_image');
                $text = get_sub_field('tab_text');
                if($title): ?>
                    <div class="singleProduct__infoTab__wrapper">
                        <div class="singleProduct__infoTab">
                            <div class="singleProduct__infoTab__title"><?php echo $title; ?></div>
                        </div>
                        <div class="singleProduct__infoTab__popup">
                            <div class="singleProduct__infoTab__popupClose"></div>
                            <h5 class="singleProduct__infoTab__popupTitle"><?php echo $title; ?></h5>
                            <?php if($text): ?>
                                <div class="singleProduct__infoTab__popupText woocommerce-text"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php if($image): ?>
                                <div class="singleProduct__infoTab__popupImage"><img src="<?php echo $image; ?>"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>
<?php if($products): ?>
<section class="productCompleteLook singleProductCardsList__wrapper">
    <?php if($products_list_title): ?>
        <div class="productCompleteLook__title singleProductCardsList__title"><?php echo $products_list_title; ?></div>
    <?php endif; ?>
    <div class="productCompleteLook__list singleProductCardsList">
        <?php foreach($products as $post): setup_postdata( $post ); ?>
            <div class="productCompleteLook__cardWrapper singleProductCard__wrapper">
                <div class="productCompleteLook__card singleProductCard">
                <?php if(!empty(get_the_post_thumbnail_url(  ))):
                        $image = get_the_post_thumbnail_url(  );
                    else:
                        $image = wc_placeholder_img_src();
                    endif; ?>
                    <div class="productCompleteLook__cardImage singleProductCard__image"><img src="<?php echo $image; ?>" alt=""></div>
                    <h5 class="productCompleteLook__cardTitle singleProductCard__title"><?php the_title(); ?></h5>
                    <h5 class="productCompleteLook__cardPrice singleProductCard__price"><?php do_action('woocommerce_product_price'); ?></h5>
                </div>
            </div>
        <?php endforeach; wp_reset_postdata(  ); ?>
    </div>
</section>
<?php endif; ?>
<?php 
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 3,
    'post__not_in' => array (get_the_ID()),
);
$the_query = new WP_Query($args);
if($the_query->have_posts()):
?>
<section class="relatedProducts singleProductCardsList__wrapper">
    <?php if($products_slider_title): ?>
        <div class="relatedProducts__title singleProductCardsList__title"><?php echo $products_slider_title; ?></div>
    <?php endif; ?>
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
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<?php endif; ?>