<?php get_header();?>

<?php if (!post_password_required()): ?>
    

    <div class="blog-post__content">
        <?php the_acf_loop(); ?>
    </div>


<?php else: ?>
    
    <?php 
    // we will show password form here
    echo get_the_password_form();
    ?>

<?php endif; ?>

<?php get_footer();?>