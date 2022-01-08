import $  from 'jquery';
import 'slick-carousel';

function heroSlider(){
        $('.hero-slider__slides').slick({
                dots: false,
                infinite: true,
                speed: 1000,
                slidesToShow: 1,
                fade: true,
                adaptiveHeight: false,
                nextArrow: $('.hero-slider__slick--next')
        });
}
                      
export { heroSlider };