<?php 
    /*
    Template Name: BStories
    */
?>
<?php get_header(); ?>
    <section class="stories">
        <div class="container">
            <ul class="row stories__list">
                <?php
                    $args = array(
                        'numberposts' => 6,
                        'post_type' => 'stories',
                        'suppres_filters' => true,
                    );
                    $posts = get_posts( $args );

                    foreach($posts as $post){ setup_postdata($post);
                ?>
                <li class="stories__item col-lg-4 col-md-6">
                    <a href="<?php the_permalink(); ?>">
                        <img class="stories__image" src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                    </a>
                    <div class="stories__itemHeading">
                        <div class="stories__itemTitle"><?php echo get_the_title() ?></div>
                        <div class="stories__itemDate"><?php echo get_the_date('F jS Y'); ?></div>
                    </div>
                </li>
                <?php }
                wp_reset_postdata();?>
            </ul>
        </div>
    </section>
<?php get_footer(); ?>