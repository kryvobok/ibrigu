<?php 
/*
Template Name: Shop
*/
get_header();
?>
<?php 
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => array(
       
    ),
);
$size_args = array(
    'taxonomy' => 'pa_size',
    'field' => 'slug',
    'terms' => array('123', 'sdhlfusa'),
);
array_push($args["tax_query"], $size_args);
var_dump($args);
?>
<section class="catalog">
    <div class="container">
        <h1 class="catalog__category lg">CLOTHING</h1>
        <div class="catalog__categoriesList">
            <div class="catalog__categoriesList__itemWrapper">
                <h4 class="catalog__categoriesList__item">Jackets</h4>
            </div>
            <div class="catalog__categoriesList__itemWrapper">
                <h4 class="catalog__categoriesList__item">Accessories</h4>
            </div>
            <div class="catalog__categoriesList__itemWrapper">
                <h4 class="catalog__categoriesList__item">Foulards</h4>
            </div>
            <div class="catalog__categoriesList__itemWrapper">
                <h4 class="catalog__categoriesList__item">Cufflinks</h4>
            </div>
        </div>
        <h4 class="catalog__filter">Filters</h4>
        <div class="catalog__list row">
            <div class="catalog__listItem__wrapper col-6">
                <div class="catalog__listItem">
                    <div class="catalog__listItem__image"><img src="<?php echo get_template_directory_uri(  ) . '/assets/images/product_img_1.png' ?>" alt=""></div>
                    <div class="catalog__listItem__title">UNIQUE SILK KIMONO JACKET</div>
                    <div class="catalog__listItem__price">500 €</div>
                </div>
            </div>
            <div class="catalog__listItem__wrapper col-6">
                <div class="catalog__listItem">
                    <div class="catalog__listItem__image"><img src="<?php echo get_template_directory_uri(  ) . '/assets/images/product_img_2.png' ?>" alt=""></div>
                    <div class="catalog__listItem__title">CINTURA LEATHER</div>
                    <div class="catalog__listItem__price">450 €</div>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog__filtersMenu">
        <div class="catalog__filtersClose"></div>
        <h4 class="catalog__filtersMenu__title">Filters</div>
        <div class="catalog__filtersList">
            <div class="catalog__filtersList__item">
                <div class="catalog__filtersList__itemLabel"></div>
            </div>
            <div class="catalog__filtersList__item"></div>
            <div class="catalog__filtersList__item"></div>
        </div>
    </div>
</section>
<?php get_footer(); ?>