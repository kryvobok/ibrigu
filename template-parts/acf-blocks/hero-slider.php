
<?php 
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$paddingTop_mobile = get_sub_field('paddingTop_mobile');
$paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
if( have_rows('slides') ):?>
    <section class="section hero pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>">
        <div class="container">
            <ul class="hero-slider__slides">
                <?php while( have_rows('slides') ) : the_row();
                    $slideImage1 = get_sub_field('slideImage1');
                    $slideImage2 = get_sub_field('slideImage2');
                    $slideImage3 = get_sub_field('slideImage3');
                    
                ?>
                    <li>
                        <div class="hero-slider__slide row">
                            <div class="hero-slider__img__wrapper col-lg-5 col-4 d-flex justify-content-lg-end justify-content-sm-center align-items-center">
                                <?php if( !empty( $slideImage1 ) ): ?>
                                    <img class="hero-slider__slide__img-1 hero-slider__slide__img " src="<?php echo esc_url($slideImage1['url']); ?>" alt="<?php echo esc_attr($slideImage1['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="hero-slider__img__wrapper col-lg-2 col-2 d-flex justify-content-center align-items-center">
                                <?php if( !empty( $slideImage2 ) ): ?>
                                    <img class="hero-slider__slide__img-2 hero-slider__slide__img " src="<?php echo esc_url($slideImage2['url']); ?>" alt="<?php echo esc_attr($slideImage2['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="hero-slider__img__wrapper col-lg-5 col-5 d-flex justify-content-center align-items-center">
                                <?php if( !empty( $slideImage3 ) ): ?>
                                    <img class="hero-slider__slide__img-3 hero-slider__slide__img " src="<?php echo esc_url($slideImage3['url']); ?>" alt="<?php echo esc_attr($slideImage3['alt']); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile;?>
            </ul>
            <div class="hero-slider__slick--next">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path id="Icon_material-arrow_back" data-name="Icon material-arrow_back" d="M30,16.5H11.745L20.13,8.115,18,6l-6.837,6.837L6,18,18,30l2.115-2.115L11.745,19.5H30Z" transform="translate(30 30) rotate(180)"/>
                </svg>
            </div>
        </div>
    </section>
<?php endif; ?>