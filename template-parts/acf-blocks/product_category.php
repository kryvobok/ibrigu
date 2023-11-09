<?php
    $categories = get_sub_field('categories');
    $paddingTop = get_sub_field('paddingTop');
    $paddingBottom = get_sub_field('paddingBottom');
    $paddingTop_mobile = get_sub_field('paddingTop_mobile');
    $paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
?>

<?php if ($categories) : ?>
    <div class="section productCategory pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>">
        <div class="container--full">
            <ul class="productCategory__list">
                <?php foreach ($categories as $category) : ?>
                    <?php
                    $link = get_term_link($category);
                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                    $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
                    ?>

                    <?php if($thumbnail_url) :?>
                        <li class="productCategory__item">
                            <div class="productCategory__item-wrap d-flex">
                                <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $category->name; ?>"
                                     class="productCategory__item-img">
                                <a href="<?php echo $link; ?>" class="productCategory__item-btn">
                                    <span><?php _e('Shop ' . $category->name); ?></span>
                                </a>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
