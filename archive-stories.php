<?php 
    /*
    Template Name: BStories
    */
?>
<?php get_header(); ?>
    <section class="stories">
        <div class="container stories__container">
            <ul class="row stories__list">
                <?php
                    $args = array(
                        'numberposts' => 6,
                        'post_type' => 'stories',
                        'suppres_filters' => true,
                    );
                    $posts = get_posts( $args );

                    foreach($posts as $post){ setup_postdata($post);
                        $color = get_field('color');
                        $titleClass = '';
                        if($color=='white'):
                            $titleClass.= 'text--white';
                        else:
                           $titleClass.= 'ddd';
                        endif; 
                    ?>
                        <li class="stories__item col-lg-4 col-6">
                            <a class="stories__imageWrapper" href="<?php the_permalink(); ?>">
                                <img class="stories__image" src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                            </a>
                            <div class="stories__itemHeading">
                                <div class="<?php echo $titleClass ?> stories__itemTitle"><?php echo get_the_title() ?></div>
                                <div class="<?php echo $titleClass ?> stories__itemDate"><?php echo get_the_date('F jS Y'); ?></div>
                            </div>
                        </li>
                <?php }
                wp_reset_postdata();?>
            </ul>
        </div>
    </section>
<?php get_footer(); ?>