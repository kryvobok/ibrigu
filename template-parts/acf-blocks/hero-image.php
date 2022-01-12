<?php 
$backgroundImage = get_sub_field('background_image');
$backgroundImageMobile = get_sub_field('background_image_mobile');
$heading = get_sub_field('heading');
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$paddingTop_mobile = get_sub_field('paddingTop_mobile');
$paddingBottom_mobile = get_sub_field('paddingBottom_mobile');

if($heading) : ?>
    <section class="hero-image  pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>" >
        <div class="hero-image__contentWrapper d-flex align-items-center justify-content-center">
            <?php if( !empty( $backgroundImage ) ): ?>
                <img class="hero-image__image" src="<?php echo esc_url($backgroundImage['url']); ?>" alt="<?php echo esc_attr($backgroundImage['alt']); ?>" />
            <?php endif; ?>
            <?php if( !empty( $backgroundImageMobile ) ): ?>
                <img class="hero-image__image__mobile" src="<?php echo esc_url($backgroundImageMobile['url']); ?>" alt="<?php echo esc_attr($backgroundImageMobile['alt']); ?>" />
            <?php endif; ?>
            <h1 class="text--center text--white"><?php echo $heading ?></h1>
        </div>
    </section>
<?php endif; ?>