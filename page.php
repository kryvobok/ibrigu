<?php /*DEFAULT PAGE TEMPLATE*/ ?>

<?php get_header(); ?>
    <div id="app-wrapper" role="main">
        <div id="app" class="app-container"
             data-class="<?php if (get_field('white_header')) echo 'header-white'; ?> <?php if (get_field('transparent_header')) echo 'header-transparent'; ?> <?php echo get_field('page_classes'); ?>">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if(!is_front_page()) :?>
                    <div class="page-heading">
                        <?php if (!empty(get_the_title())) : ?>
                            <div class="page-heading__title">
                                <h1><?php the_title(); ?></h1>
                            </div>
                        <?php endif; ?>
        
                        <?php if (!empty(get_the_content())) : ?>
                            <div class="page-heading__content">
                                <div>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="page-blocks">
                    <?php if (!post_password_required()) : ?>
                        <?php
                        get_template_part('template-parts/page/content', 'page');
                        the_acf_loop();
                        ?>
                    <?php else : ?>
                        <?php
                        // we will show password form here
                        echo get_the_password_form();
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>