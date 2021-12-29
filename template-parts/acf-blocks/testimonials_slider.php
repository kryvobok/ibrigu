<?php 

$heading = get_sub_field('heading');
$items = get_sub_field('items');


if($items):
?>
<section class="section testimonials-slider">
    <div class="container">
        <div class="row">
            <?php if($heading): ?>
            <div class="col-lg-4 testimonials-slider__heading">
                <div class="content-block"><?php echo $heading; ?></div>
            </div>
            <?php endif; ?>
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 testimonials-slider__container">
                <div class="testimonials-slider__wrapper">
                    <div class="testimonials-slider__quotes ">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-quotes.svg" alt="">
                    </div>
                    <ul class="testimonials-slider__list">
                        <?php foreach($items as $item): 
                            $testimonial = $item['testimonial'];
                            $text = get_field('text',$testimonial);
                            $image = get_field('image',$testimonial);
                            $name = get_field('name',$testimonial);
                            $position = get_field('position',$testimonial);
                            ?>
                            <li class="testimonials-slider__item">
                                <div class="testimonials-slider__item__inner">
                                    <div class="h2 testimonials-slider__item__content">
                                        <?php echo $text; ?>
                                    </div>
                                    <div class="text--size--14 font-weight-500 testimonials-slider__item__footer">
                                        <?php if($name): ?>
                                            <span><?php echo $name; ?></span>
                                        <?php endif; ?>
                                        <?php if($position): ?>
                                            <span><?php echo $position; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; 
                        ?>
                    </ul>
                    <div class="testimonials-slider__nav">
                        <span id="prev" class="testimonials-slider__nav__btn testimonials-slider__nav__prev"><?php echo get_inline_svg('icon-slider-arrow.svg'); ?></span>
                        <span id="next" class="testimonials-slider__nav__btn testimonials-slider__nav__next"><?php echo get_inline_svg('icon-slider-arrow.svg'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>