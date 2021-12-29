<?php 

$images = get_sub_field('images');
$columns = get_sub_field('columns');

$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';

if( $images ): ?>
    <div <?php echo $id; ?> class="container section imagesGrid imagesGrid--<?php echo $columns; ?>">
        <ul class="row imagesGrid__row">
            <?php foreach( $images as $image ): ?>
                <li class="col-12 imagesGrid__item col-md-auto">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?> 
