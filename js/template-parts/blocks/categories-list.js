import $ from 'jquery';

function categoriesList() {
    $(document).ready(function(){
        sliderInit();
        slidesChange();
    });
}

function sliderInit() {
    let sliderWidth = 0;
    $('.catalog__categoriesList .catalog__categoriesList__itemWrapper.active').each(function(){
        sliderWidth += $(this).outerWidth();
        $('.catalog__categoriesList').css('width', sliderWidth);
    });
}

function slidesChange(){
    $('.catalog__categoriesList__arrow').click(function(){
        const nextSlide = $('.catalog__categoriesList__itemWrapper.active').last().index() + 1,
              prevSlide = $('.catalog__categoriesList__itemWrapper.active').first().index() - 1,
              prevSlideWidth = $('.catalog__categoriesList__itemWrapper').eq(prevSlide).outerWidth(),
              nextSlideWidth = $('.catalog__categoriesList__itemWrapper').eq(nextSlide - 3).outerWidth(),
              slideRange = $('.catalog__categoriesList__slider').css('left').split('px');
        
        if($(this).hasClass('catalog__categoriesList__next')){
            let newSlideRange = +slideRange[0] - nextSlideWidth;
            $('.catalog__categoriesList__itemWrapper.active').first().removeClass('active');
            $('.catalog__categoriesList__itemWrapper').eq(nextSlide).addClass('active');
            $('.catalog__categoriesList__slider').css('left', newSlideRange);
        } else if($(this).hasClass('catalog__categoriesList__prev')){
            let newSlideRange = +slideRange[0] + prevSlideWidth;
            $('.catalog__categoriesList__itemWrapper.active').last().removeClass('active');
            $('.catalog__categoriesList__itemWrapper').eq(prevSlide).addClass('active');
            $('.catalog__categoriesList__slider').css('left', newSlideRange);
        }
        

        if($('.catalog__categoriesList__itemWrapper').last().hasClass('active')){
            $('.catalog__categoriesList__next').addClass('disabled');
        } else{
            $('.catalog__categoriesList__next').removeClass('disabled');
        }

        if($('.catalog__categoriesList__itemWrapper').first().hasClass('active')){
            $('.catalog__categoriesList__prev').addClass('disabled');
        } else{
            $('.catalog__categoriesList__prev').removeClass('disabled');
        }

        sliderInit();
    })
}

export {categoriesList};