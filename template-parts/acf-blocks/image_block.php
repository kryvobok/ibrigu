<?php
$image = get_sub_field('image');
$imgWidth = $image['width'];
$imgHeight = $image['height'];
$imgRatio = 100*$imgHeight/$imgWidth;

$style = get_sub_field('layout');

$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';

if( !empty( $image ) ): ?>
    <div <?php echo $id; ?> class="section imageBlock">
        <?php if($style == 'full'): ?>
            <?php image_acf($image); ?>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2"><?php image_acf($image); ?></div>
            </div>
        <?php endif;  ?>
    </div>
<?php endif;