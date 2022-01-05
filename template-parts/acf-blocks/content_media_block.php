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
<section <?php echo $id; ?> class="section  contentImageBlock contentImageBlock--<?php echo $imagePosition; ?> contentImageBlock--<?php echo $imageLayout; ?>" style="background-color: <?php echo $backgroundColor; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12  col-lg-6 <?php echo $contentClasses; ?> contentImageBlock__content">
                    <div class="contentImageBlock__content__inner">
                        <?php if($content): ?>
                            <div class="content-block animate fade-up"><?php echo $content; ?></div>
                        <?php endif; ?>
                        <?php
                        if( get_sub_field('checkbox') ) {?>
                            <img class="contentImageBlock__content__inner__image" src="<?php echo esc_url($additionalImage['url']); ?>" alt="<?php echo esc_attr($additionalImage['alt']); ?>" />
                        <?php } ?>
                    </div>
            </div>
            <div class="col-12 col-lg-6 <?php echo $imageClasses;?> contentImageBlock__image contentImageBlock__image--<?php echo $imageLayout; ?>">
                <div class="contentImageBlock__image__inner">
                    <?php if($imageType == 'image'): ?>
                        <?php if($image): ?>
                            <img class="contentImageBlock__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif;?>
                    <?php elseif($imageType == 'video'): ?>
                        <?php if($video): ?>
                            <div class="videoBlock">
                                <video loop width="100%" height="auto" class="video">
                                    <source src="<?php echo $video['url']; ?>" type="video/mp4">
                                    <?php _e('Your browser does not support the video tag.', 'rocket-sass');?>
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