<?php
$content = get_sub_field('content');
$backgroundColor = get_sub_field('background_color');

$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';
if($content):
    ?>
    <div <?php echo $id; ?> class="section section--spacing--lg contentBlock" style="background-color: <?php echo $backgroundColor; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="content-block animate fade-up"><?php echo $content; ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php
endif;