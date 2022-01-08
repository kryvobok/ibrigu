<?php
$content = get_sub_field('content');
$backgroundColor = get_sub_field('background_color');
$backgroundImage = get_sub_field('background_image');
$blockHeight = get_sub_field('block_height');
$blockID = get_sub_field('block_id');
$blockLayout = get_sub_field('block_layout');
$id = $blockID?'id="'.$blockID.'"':'';
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');

$contentClasses = '';
if($blockLayout=='wrapped'):
    $contentClasses.= 'col-lg-8 offset-lg-2';
else:
    $contentClasses.= 'col-12';
endif; 
if($content):
    ?>
    <div <?php echo $id; ?> class="section contentBlock pt-<?php echo $paddingTop ?> pb-<?php echo $paddingBottom ?>" style="background-color: <?php echo $backgroundColor; ?>;background-image: url(<?php echo $backgroundImage; ?>);height:<?php echo $blockHeight; ?> ">
        <div class="container">
            <div class="row">
                <div class="<?php echo $contentClasses?> ">
                    <div class="content-block animate fade-up"><?php echo $content; ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php
endif;