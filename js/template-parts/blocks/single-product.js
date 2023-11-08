import $ from 'jquery';

function singleProduct(){
    $(document).ready(function(){
        let descHeight = $('.singleProduct__description .woocommerce-text').outerHeight() + $('.singleProduct__description .attributesItem__list').outerHeight();
        console.log(descHeight);
        $('.showContentBtn').click(function(){
            $('.singleProduct__description__wrapper').toggleClass('opened');
            if($(this).hasClass('more')){
                $('.singleProduct__description').animate({'max-height': descHeight}, 300);
            }
            else{
                $('.singleProduct__description').animate({'max-height': '3.5em'}, 300);
            }
        });
        $('.singleProduct__infoTab__title').click(function(){
            $(this).closest('.singleProduct__infoTab__wrapper').find('.singleProduct__infoTab__popup').addClass('opened');
        });
        $('.singleProduct__infoTab__popupClose').click(function(){
            $(this).parent().removeClass('opened');
        });
        $('.relatedProducts__list').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
        });
        $('.singleProduct__imagesList').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            vertical: true,
            verticalSwiping: true,
            infinite: false,
        })
    });
}

export {singleProduct}