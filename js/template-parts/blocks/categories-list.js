import $ from 'jquery';

function categoriesList() {
    $(document).ready(function(){
        $('.catalog__categoriesList').slick({
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            variableWidth: true,
            centerMode: true
        });
    });
}

export {categoriesList};