<?php 
    $product_colors = get_terms(array(
        'taxonomy' => 'pa_color',
        'hide_empty' => false,
    ));
    $product_sizes = get_terms(array(
        'taxonomy' => 'pa_size',
        'hide_empty' => false,
    ));
?>
<h4 class="catalog__filter">Filters</h4>
<div class="catalog__filtersMenu">
    <div class="catalog__filtersClose"></div>
    <h4 class="catalog__filtersMenu__title">Filters</h4>
    <div class="catalog__filtersList">
        <div class="catalog__filtersList__attribute sort">
            <h4 class="catalog__filtersList__attributeLabel">Sort by</h4>
            <div class="catalog__filtersList__attributeSublist">
                <h4 class="catalog__filtersList__attributeLabel">Sort by</h4>
                <div class="catalog__filtersList__attributeList">
                    <div class="catalog__filtersList__attributeColumn">
                        <div class="catalog__filtersList__attributeItem">
                            <div class="catalog__filtersList__attributeItem__checkbox"></div>
                            <h4 class="catalog__filtersList__attributeItem__name lg" data-slug="price-desc">Descending Price</h4>
                        </div>
                        <div class="catalog__filtersList__attributeItem">
                            <div class="catalog__filtersList__attributeItem__checkbox"></div>
                            <h4 class="catalog__filtersList__attributeItem__name lg" data-slug="price">Ascending Price</h4>
                        </div>
                        <div class="catalog__filtersList__attributeItem">
                            <div class="catalog__filtersList__attributeItem__checkbox"></div>
                            <h4 class="catalog__filtersList__attributeItem__name lg" data-slug="availability">Availability</h4>
                        </div>
                        <div class="catalog__filtersList__attributeItem">
                            <div class="catalog__filtersList__attributeItem__checkbox"></div>
                            <h4 class="catalog__filtersList__attributeItem__name lg" data-slug="date">Most recent</h4>
                        </div>
                    </div>
                </div>
                <h4 class="catalog__filtersList__attributeItem__apply button sm">APPLICA</h4>
            </div>
        </div>
        <div class="catalog__filtersList__attribute colors">
            <h4 class="catalog__filtersList__attributeLabel">Colors</h4>
            <div class="catalog__filtersList__attributeSublist">
                <h4 class="catalog__filtersList__attributeLabel">Colors</h4>
                <div class="catalog__filtersList__attributeList">
                    <div class="catalog__filtersList__attributeColumn">
                        <?php $i = 1; foreach($product_colors as $color): ?>
                            <?php $colorHex = get_field('color', 'pa_color_' . $color->term_id); ?>
                            <div class="catalog__filtersList__attributeItem">
                                <?php if($colorHex): ?>
                                    <div class="catalog__filtersList__attributeItem__box" style="background-color: <?php echo $colorHex; ?>"></div>
                                <?php endif; ?>
                                <h4 class="catalog__filtersList__attributeItem__name lg" data-slug="<?php echo $color->slug; ?>"><?php echo $color->name; ?></h4>
                            </div>
                            <?php if($i % 8 == 0): ?>
                                </div>
                                <div class="catalog__filtersList__attributeColumn">
                            <?php endif; ?>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
                <h4 class="catalog__filtersList__attributeItem__apply button sm">APPLICA</h4>
            </div>
        </div>
        <div class="catalog__filtersList__attribute size">
            <h4 class="catalog__filtersList__attributeLabel">Size</h4>
            <div class="catalog__filtersList__attributeSublist">
                <h4 class="catalog__filtersList__attributeLabel">Size</h4>
                <div class="catalog__filtersList__attributeList">
                    <div class="catalog__filtersList__attributeColumn">
                        <?php $i = 1; foreach($product_sizes as $size): ?>
                            <div class="catalog__filtersList__attributeItem">
                                <div class="catalog__filtersList__attributeItem__checkbox"></div>
                                <h4 class="catalog__filtersList__attributeItem__name lg" data-slug="<?php echo $size->slug; ?>"><?php echo $size->name ?></h4>
                            </div>
                        <?php $i++; endforeach; ?>
                        </div>
                    </div>
                <h4 class="catalog__filtersList__attributeItem__apply button sm">APPLICA</h4>
            </div>
        </div>
    </div>
</div>