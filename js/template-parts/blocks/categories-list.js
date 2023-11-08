import $ from 'jquery';

function categoriesList() {
    $(document).ready(function(){
        let slider = $('.catalog__categoriesList');
        slider.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            variableWidth: true,
            centerMode: true,
            initialSlide: 1,
        });
        slider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
            console.log(nextSlide);
            if(nextSlide <= 1 || nextSlide >= 3){
                slider.slick('slickSetOption', {
                    draggable: false
                }, true);
                slider.addClass('no-draggable');
            }
            else{
                slider.slick('slickSetOption', {
                    draggable: true
                }, true);
                slider.removeClass('no-draggable');
            }
        })
        // var swiper = new Swiper(".catalog__categoriesList", {
        //     slidesPerView: 'auto',
        //     centeredSlides: true
        // });
    });
}

export {categoriesList};