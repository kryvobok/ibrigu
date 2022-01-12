<?php 
    /*
    Template Name: campaigns
    */
?>
<?php get_header(); ?>
    <section class="stories">
        <div class="container">
            <ul class="campaigns__list">
                <?php
                    $args = array(
                        'numberposts' => 6,
                        'post_type' => 'campaigns',
                        'suppres_filters' => true,
                    );
                    $posts = get_posts( $args );

                    foreach($posts as $post){ setup_postdata($post);
                        $heading = get_field('heading');
                        $image = get_field('image');
                        $content = get_field('content');

                        $headingLayout = get_field('heading_layout');
                        $contentLayout = get_field('content_layout');

                        $headingClasses = '';
                        if($headingLayout=='wrapped'):
                            $headingClasses.= 'col-lg-8 offset-lg-2';
                        else:
                            $headingClasses.= 'col-12';
                        endif; 

                        $contentClasses = '';
                        if($contentLayout=='wrapped'):
                            $contentClasses.= 'col-lg-8 offset-lg-2';
                        else:
                            $contentClasses.= 'col-12';
                        endif; 

                        
                ?>
                <li class="campaigns__item col-12">
                    <a href="<?php the_permalink(); ?>">
                        <?php if($heading) :?>
                            <div class="section contentBlock">
                                    <div class="row">
                                        <div class="<?php echo $headingClasses ?>">
                                            <div class="content-block animate fade-up"><?php echo $heading; ?></div>
                                        </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <ul class="row imagesGrid__row">
                        <?php if( have_rows('images') ): ?>
                            <?php  while( have_rows('images') ) : the_row(); 
                                $image = get_sub_field('image');
                            ?>
                            <li class="imagesGrid__item col-6">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                    <?php if($content) :?>
                        <div class="section contentBlock">
                                <div class="row">
                                    <div class="<?php echo $contentClasses ?>">
                                        <div class="content-block animate fade-up"><?php echo $content; ?></div>
                                    </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </a>
                </li>
                <?php }
                wp_reset_postdata();?>
            </ul>
        </div>
    </section>
    <div class="page-blocks">
              <?php 
                if ( ! post_password_required() ) :
                    // Your custom code should here
                    get_template_part('template-parts/page/content','page');
                    the_acf_loop();
                else :
                  // we will show password form here
                  echo get_the_password_form();
                endif;
              ?>
            </div>
<?php get_footer(); ?>