<?php 
    $logo = get_field('logo','option')
?>
<header id="header">
    <div class="container header__container">
        <div class="header__logo__wrapper">
            <div class="header__logo">
                <?php if( !empty( $logo ) ): ?>
                    <?php echo file_get_contents(esc_url(wp_get_original_image_path($logo['id']))); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="header__row">
            <div class="header__nav__wrapper">
                <nav class="header__nav">
                    <div class="main-nav">
                        <?php wp_nav_menu( array('menu_id'=>'main-nav','container_class' => '','theme_location' => 'main-menu') ); ?>
                    </div>
                </nav>
            </div>
            <div class="header__lang__switcher">
                
            </div>
        </div>
    </div>
</header>