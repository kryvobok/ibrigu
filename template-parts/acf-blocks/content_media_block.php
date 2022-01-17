<?php 
$content = get_sub_field('content');

$imageLayout = get_sub_field('media_layout');
$imagePosition = get_sub_field('image_position');
$imageType = get_sub_field('image_type');
$image = get_sub_field('image');
$video = get_sub_field('video_file');
$lottie = get_sub_field('lottie_svg');

$paralaxLogo = get_sub_field('show_parallax_logo');

$backgroundColor = get_sub_field('background_color');

$checkbox = get_sub_field('checkbox');

$additionalImage = get_sub_field('additional_image');
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$paddingTop_mobile = get_sub_field('paddingTop_mobile');
$paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
$block_title = get_sub_field('block_title');
//$imageClasses = '';
//$contentClasses = '';
//if($imagePosition=='left'):
//    $contentClasses.= 'offset-lg-2';
//    $imageClasses.= '';
//else:
//    $contentClasses.= 'offset-lg-1';
//    $imageClasses.= 'offset-lg-2';
//endif; 

$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';
?>
<section <?php echo $id; ?> class="section  contentImageBlock  pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?> contentImageBlock--<?php echo $imagePosition; ?> contentImageBlock--<?php echo $imageLayout; ?>" style="background-color: <?php echo $backgroundColor; ?>">
    <div class="container contentImageBlock__container">
        <div class="row contentImageBlock__row">
            <div class="col-12 contentImageBlock__title__mobile animate fade-up"><h2><?php echo $block_title; ?></h2></div>
            <div class="col-12  col-lg-6 <?php echo $contentClasses; ?> contentImageBlock__content">
                    <div class="contentImageBlock__content__inner">
                        <?php if($content): ?>
                            <div class="content-block animate fade-up">
                                <?php if($block_title): ?>
                                    <div class="contentImageBlock__title"><h2><?php echo $block_title; ?></h2></div>
                                <?php endif; ?>
                                <?php echo $content; ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        if( get_sub_field('checkbox') ) {?>
                            <img class="contentImageBlock__content__inner__image animate fade-up" src="<?php echo esc_url($additionalImage['url']); ?>" alt="<?php echo esc_attr($additionalImage['alt']); ?>" />
                        <?php } ?>
                    </div>
            </div>
            <div class="col-12 col-lg-6 <?php echo $imageClasses;?> contentImageBlock__image contentImageBlock__image--<?php echo $imageLayout; ?>">
                <div class="contentImageBlock__image__inner animate fade-up">
                    <?php if($imageType == 'image'): ?>
                        <?php if($image): ?>
                            <img class="contentImageBlock__image__item" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif;?>
                    <?php elseif($imageType == 'video'): ?>
                        <?php if($video): ?>
                            <div class="videoBlock">
                                <video loop width="100%" height="auto" class="video">
                                    <source src="<?php echo $video['url']; ?>" type="video/mp4">
                                    <?php _e('Your browser does not support the video tag.', 'ibrigu');?>
                                </video>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($lottie): ?>
                            <div class="lottie" data-path="<?php echo $lottie['url']; ?>"></div>
                        <?php endif; ?>
                    <?php endif; ?>
                   
                </div>
            </div>
        </div>
    </div>
</section>