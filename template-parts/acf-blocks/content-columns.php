<?php
    $backgroundColor = get_sub_field('background_color');
    $image1 = get_sub_field('image1');
    $image2 = get_sub_field('image2');
    $image3 = get_sub_field('image3');
    $image4 = get_sub_field('image4');
    $image5 = get_sub_field('image5');
    $content = get_sub_field('content');
    
?>
<section class="section content-columns" style="background-color: <?php echo $backgroundColor; ?>">
    <div class="container">
        <div class="row content-columns__row">
            <div class="col-lg-6  content-columns__item content-columns__imagesCol">
                <?php if( !empty( $image1 ) ): ?>
                    <img class="content-columns__image  content-columns__image__big" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
                <?php endif; ?>
                <div class="row d-flex justify-content-around align-items-center">
                    <div class="col-auto">
                        <?php if( !empty( $image2 ) ): ?>
                            <img class="content-columns__image" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="col-auto">
                        <?php if( !empty( $image3 ) ): ?>
                            <img class="content-columns__image" src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 content-columns__item content-columns__image d-flex justify-content-center align-items-center">
                <?php if( !empty( $image4 ) ): ?>
                    <img class="content-columns__image" src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="col-lg-2 content-columns__item content-columns__item__text">
                <div class="content-columns__item__image">
                    <?php if( !empty( $image5 ) ): ?>
                        <img class="content-columns__image" src="<?php echo esc_url($image5['url']); ?>" alt="<?php echo esc_attr($image5['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="content-columns__item__content">
                    <?php if($content): ?>
                        <?php echo $content; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>