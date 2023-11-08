<?php
/*
=====================
	Add Styles And Scripts
=====================
*/

add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );
function theme_load_scripts(){
	
    wp_enqueue_script( 'jquery' );
  

    //main.js
    wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/dist/main.min.js', false , false , true);
    wp_localize_script( 'main', 'customjs_ajax_object',
        array( 
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'ajax_nonce' => wp_create_nonce( "secure_nonce_name" )
        )
    );

    /* fonts */

    /*theme css*/
	wp_enqueue_style( 'main',get_template_directory_uri() . '/dist/main.min.css');

	/*additional css*/
    wp_enqueue_style( 'slick',get_template_directory_uri() . '/js/libs/slick/slick.css');
    wp_enqueue_style( 'plyr',get_template_directory_uri() . '/js/libs/plyr/plyr.css');
}

//additional variables
function javascript_variables(){ ?>
  <script type="text/javascript">
      var ajax_url = '<?php echo admin_url( "admin-ajax.php" ); ?>';
      var ajax_nonce = '<?php echo wp_create_nonce( "secure_nonce_name" ); ?>';
  </script><?php
}
add_action ( 'wp_head', 'javascript_variables' );
