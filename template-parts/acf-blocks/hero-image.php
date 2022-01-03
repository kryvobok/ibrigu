<?php 
$backgroundImage = get_sub_field('background_image');
$backgroundImageMobile = get_sub_field('background_image_mobile');
$heading = get_sub_field('heading');

if($heading) : ?>
    <section class="hero-image d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="container">
            <h1 class="text--center text--white"><?php echo $heading ?></h1>
        </div>
    </section>
<?php endif; ?>
<style>
    .hero-image{
        background-image: url(<?php echo $backgroundImage ?>)
    }
    @media only screen and (max-width: 600px) {
    .hero-image {
        background-image: url(<?php echo $backgroundImageMobile ?>)
        }
    }
</style>