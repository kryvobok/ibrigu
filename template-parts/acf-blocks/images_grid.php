<?php 

$columns = get_sub_field('columns');
$padding = get_sub_field('padding');
$blockID = get_sub_field('block_id');
$id = $blockID?'id="'.$blockID.'"':'';
?>
    <div <?php echo $id; ?> class="section imagesGrid py-<?php echo $padding ?> imagesGrid--<?php echo $columns; ?>">
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
 