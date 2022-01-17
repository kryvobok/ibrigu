<?php 
$backgroundImage = get_sub_field('background_image');
$backgroundImageMobile = get_sub_field('background_image_mobile');
$heading = get_sub_field('heading');
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$paddingTop_mobile = get_sub_field('paddingTop_mobile');
$paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
$style = get_sub_field('layout');
if($heading) : ?>
<?php if($style == 'full'): ?>
    <section class="hero-image  pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>" >
            <div class="hero-image__image">
                <?php if( !empty( $backgroundImage ) ): ?>
                    <?php image_acf($backgroundImage); ?>
                <?php endif; ?>
            </div>
            <div class="hero-image__mobile">
                <?php if( !empty( $backgroundImageMobile ) ): ?>
                    <?php image_acf($backgroundImageMobile); ?>
                <?php endif; ?>
            </div>
            <h1 class="text--center text--white hero-image__title"><?php echo $heading ?></h1>
    </section>
<?php else: ?>
    <section class="hero-image  pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>" >
<div class="container hero-image__container">
            <div class="hero-image__image">
                <?php if( !empty( $backgroundImage ) ): ?>
                    <?php image_acf($backgroundImage); ?>
                <?php endif; ?>
            </div>
            <div class="hero-image__mobile">
                <?php if( !empty( $backgroundImageMobile ) ): ?>
                    <?php image_acf($backgroundImageMobile); ?>
                <?php endif; ?>
            </div>
            <h1 class="text--center text--white hero-image__title"><?php echo $heading ?></h1>
            </div>
    </section>
    <?php endif; ?>
    <?php endif; ?>