<?php
$content = get_sub_field('content');
$backgroundColor = get_sub_field('background_color');
$backgroundImage = get_sub_field('background_image');
$blockHeight = get_sub_field('block_height');
$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';
if($content):
    ?>
    <div <?php echo $id; ?> class="section section--spacing--lg contentBlock" style="background-color: <?php echo $backgroundColor; ?>;background-image: url(<?php echo $backgroundImage; ?>);height:<?php echo $blockHeight; ?> ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="content-block animate fade-up"><?php echo $content; ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php
endif;