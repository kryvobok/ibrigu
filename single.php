<?php get_header();?>

<?php if (!post_password_required()): ?>
    
    <?php get_template_part('template-parts/post/header', 'post'); ?>

    <div class="blog-post__content">
        <?php the_acf_loop(); ?>
    </div>

	  <?php get_template_part('template-parts/post/footer', 'post'); ?>

<?php else: ?>
    
    <?php 
    // we will show password form here
    echo get_the_password_form();
    ?>

<?php endif; ?>

<?php get_footer();?>