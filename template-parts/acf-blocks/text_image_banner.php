<?php 
$content = get_sub_field('text');
$image = get_sub_field('image');
$backgroundColor = get_sub_field('background_color');
$offset = get_sub_field('add_image_offset');
$blockID = get_sub_field('block_id');
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$paddingTop_mobile = get_sub_field('paddingTop_mobile');
$paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
$id = $blockID?'id="'.$blockID.'"':'';
?>
<section <?php echo $id; ?> class="textImageBanner pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?> <?php if($offset) echo 'textImageBanner--offset'; ?>" style="background-color: <?php echo $backgroundColor; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <?php if($content): ?>
                    <div class="content-block textImageBanner__content text-color-white"><?php echo $content; ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 offset-lg-2 offset-md-1">
                <?php if($image): ?>
                    <div class="textImageBanner__image">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>