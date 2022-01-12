<?php
    $form = get_sub_field('form');
    $paddingTop = get_sub_field('paddingTop');
    $paddingBottom = get_sub_field('paddingBottom');
    $paddingTop_mobile = get_sub_field('paddingTop_mobile');
    $paddingBottom_mobile = get_sub_field('paddingBottom_mobile');
?>
<section class="section pt-<?php echo $paddingTop_mobile ?> pb-<?php echo $paddingBottom_mobile ?> pt-md-<?php echo $paddingTop ?> pb-md-<?php echo $paddingBottom ?>">
    <div class="container">
        <div class="contatc__row row">
            <div class="col-lg-6 contact__infoWrapper row">
                <?php if( have_rows('offices') ):?>
                    <ul class="col-sm-6 contact__officesList">
                        <?php  while( have_rows('offices') ) : the_row();
                            $office = get_sub_field('office');
                        ?>
                            <?php if($office) :?>
                                <li class="contact__officesItem">
                                    <?php echo $office ?>
                                </li>
                            <?php endif;?>
                        <?php endwhile; ?>
                    </ul>
                <?php endif;?>
                <?php if( have_rows('contacts') ):?>
                    <ul class="col-sm-6 contact__contactsList">
                        <?php  while( have_rows('contacts') ) : the_row();
                            $contacts = get_sub_field('contactsItem');
                        ?>
                            <?php if($contacts) :?>
                                <li class="contact__contactsItem">
                                    <?php echo $contacts ?>
                                </li>
                            <?php endif;?>
                        <?php endwhile; ?>    
                    </ul>
                <?php endif;?>
            </div>
            <div class="col-lg-6 contact__formWrapper">
                <?php echo $form ?>
            </div>
        </div>
        <?php if( have_rows('social_list') ):?>
            <ul class="contact__social row d-flex align-items-center justify-content-center">
                <?php  while( have_rows('social_list') ) : the_row();
                    $social = get_sub_field('social');
                ?>
                    <li class="contact__socialItem">
                    <?php 
                        if( $social ): 
                            $link_url = $social['url'];
                            $link_title = $social['title'];
                            $link_target = $social['target'] ? $social['target'] : '_self';
                            ?>
                            <a class="contact__socialItemLink" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif;?>
    </div>
</section>