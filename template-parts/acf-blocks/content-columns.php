<?php
    $backgroundColor = get_sub_field('background_color');
    $image1 = get_sub_field('image1');
    $image2 = get_sub_field('image2');
    $image3 = get_sub_field('image3');
    $image4 = get_sub_field('image4');
    $image5 = get_sub_field('image5');
    $content = get_sub_field('content');
    $paddingTop = get_sub_field('paddingTop');
    $paddingBottom = get_sub_field('paddingBottom');
    $paddingTop_mobile = get_sub_field('paddingTop_mobile');
    $paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
    
?>
<section class="section content-columns pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>" style="background-color: <?php echo $backgroundColor; ?>">
    <div class="container">
        <div class="row content-columns__row">
            <div class="col-md-5 col-8 content-columns__item-1 content-columns__item content-columns__imagesCol animate fade-up">
                <?php if( !empty( $image1 ) ): ?>
                    <img class="content-columns__image  content-columns__image__big" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-6 content-columns__item-2 content-columns__item content-columns__image d-flex justify-content-center align-items-center animate fade-up">
                <?php if( !empty( $image4 ) ): ?>
                    <img class="content-columns__image" src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="col-md-2 col-4 content-columns__item-3 content-columns__item content-columns__item__text">
                <div class="content-columns__item__image">
                    <?php if( !empty( $image5 ) ): ?>
                        <img class="content-columns__image" src="<?php echo esc_url($image5['url']); ?>" alt="<?php echo esc_attr($image5['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-5 col-12 content-columns__item-4 row d-flex justify-content-around align-items-center ">
                <div class="col-4 align-self-baseline align-self-md-center animate fade-up">
                    <?php if( !empty( $image2 ) ): ?>
                        <img class="content-columns__image" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="col-6 animate fade-up">
                    <?php if( !empty( $image3 ) ): ?>
                        <img class="content-columns__image" src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-3 col-6 content-columns__item-5 content-columns__item__content animate fade-up">
                <?php if($content): ?>
                    <?php echo $content; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>