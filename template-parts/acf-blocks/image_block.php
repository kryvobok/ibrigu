<?php
$image = get_sub_field('image');
$imgWidth = $image['width'];
$imgHeight = $image['height'];
$imgRatio = 100*$imgHeight/$imgWidth;
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$paddingTop_mobile = get_sub_field('paddingTop_mobile');
$paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
$style = get_sub_field('layout');

$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';

if( !empty( $image ) ): ?>
    <div <?php echo $id; ?> class="section imageBlock pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>">
        <?php if($style == 'full'): ?>
            <?php image_acf($image); ?>
        <?php else: ?>
            <div class="row">
                <div class="col-12"><?php image_acf($image); ?></div>
            </div>
        <?php endif;  ?>
    </div>
<?php endif;