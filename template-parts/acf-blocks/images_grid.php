<?php 

$columns = get_sub_field('columns');
$paddingTop = get_sub_field('paddingTop');
$paddingBottom = get_sub_field('paddingBottom');
$paddingTop_mobile = get_sub_field('paddingTop_mobile');
$paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';
?>
    <div <?php echo $id; ?> class="section imagesGrid pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?> imagesGrid--<?php echo $columns; ?>">
        <ul class="row imagesGrid__row">
            <?php if( have_rows('images') ): ?>
                <?php  while( have_rows('images') ) : the_row(); 
                    $image = get_sub_field('image');
                    $align = get_sub_field_object( 'align' );
                    $value = $align['value'];
                ?>
                <li class="col-12 imagesGrid__item col-md-<?php echo 12/$columns; ?> align-self-<?php echo esc_attr($value); ?>">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
 