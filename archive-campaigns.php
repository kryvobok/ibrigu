<?php 
    /*
    Template Name: campaigns
    */
?>
<?php get_header(); ?>
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