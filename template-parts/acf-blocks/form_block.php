<?php 
$content = get_sub_field('text');
$image = get_sub_field('image');
$backgroundColor = get_sub_field('background_color');
$form = get_sub_field('form_shortcode');
$hideLabel = get_sub_field('hide_parallax_label');
$wideContent = get_sub_field('wide_content');

$contentClasses = '';
if($wideContent){
    $contentClasses = 'col-12 col-lg-8 col-md-8 offset-md-4';
} else{
    $contentClasses = 'col-12 col-lg-4 col-md-6 offset-md-6';
}

$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'id="request_a_quote"';
?>
<section <?php echo $id; ?> class="section formImageBlock formImageBlock--<?php echo $imagePosition; ?>" style="background-color: <?php echo $backgroundColor; ?>">
    <div class="formImageBlock__sideImg">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/jean-philippe-delberghe-xrjusFfOksI-unsplash.jpg';?>" alt="" class="formImageBlock__sideImg">
    </div>
    <div class="container">
        <div class="row">

            <?php if(!$hideLabel): ?>
                <div id="iconTyped" class="formImageBlock__parallax-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-vertical.svg" alt="">
                </div>
            <?php endif; ?>
            
            <div class="<?php echo $contentClasses; ?> formImageBlock__content text-color-white">
                    <div class="formImageBlock__content__inner">
                        <?php if($content): ?>
                            <div class="content-block animate fade-up"><?php echo $content; ?></div>
                        <?php endif; ?>
                        <?php if($form): ?>
                            <div class="form form--request-demo animate fade-up delay-1"><?php echo do_shortcode($form);?></div>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    </div>
</section>