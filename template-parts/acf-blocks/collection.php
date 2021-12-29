<?php   
    $heading = get_sub_field('heading');
?>
<section class="section collection">
    <div class="container">
        <?php if($heading): ?>
            <div class="row">
                <div class="col-lg-6 offset-lg-3 heading content-block text--center">
                    <?php echo $heading; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if( have_rows('collection_row') ):?>
            <div class="row collection__card__row">
                <?php  while( have_rows('collection_row') ) : the_row();
                 $image = get_sub_field('image');
                 $title = get_sub_field('title');
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 collection__card">
                        <?php if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                        <?php if($title): ?>
                            <span>
                                <?php echo $title; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endwhile;?>
            </div>
        <?php endif; ?>
    </div>
</section>
