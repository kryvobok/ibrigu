<?php 
    $logo = get_field('logo','option')
?>
<header id="header" class="header">
    <div class="header__logo__wrapper">
        <a href="<?php echo get_home_url(); ?>" class="header__logo">
            <?php if( !empty( $logo ) ): ?>
                <?php echo file_get_contents(esc_url(wp_get_original_image_path($logo['id']))); ?>
            <?php endif; ?>
        </a>
    </div>
    <div class="container header__container">
        <div class="header__row">
            <div class="header__nav__wrapper">
                
                <nav class="header__nav">
                    <span id="nav-toggle" class="nav-toggle">
                        <div class="nav-toggle-icon">
                            <span class="nav-toggle-icon__inner"></span>
                        </div>
                    </span>
                    <div class="main-nav">
                        <?php wp_nav_menu( array('menu_id'=>'main-nav','container_class' => '','theme_location' => 'main-menu') ); ?>
                    </div>
                </nav>
            </div>
            <div class="header__lang">
                <ul class="header__lang__list">
                    <li class="header__lang__item">
                        <a href="#" class="header__lang__item__link">IT</a>
                    </li>
                    <li class="header__lang__item-sep">/</li>
                    <li class="header__lang__item">
                        <a href="#" class="header__lang__item__link">EN</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>