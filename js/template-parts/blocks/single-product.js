import $ from 'jquery';

function singleProduct(){
    $(document).ready(function(){
        const btnHeight = $('.single_add_to_cart_button').outerHeight(),
              sliderHeight = $(window).height() - btnHeight - $('header').outerHeight() - $('.woocommerce-breadcrumb').outerHeight() - 10;
        $('.singleProduct__buttonLeftCol, .singleProduct__attributesPicker__itemTitle').css('height', btnHeight);
        $('.singleProduct__imagesList .singleProduct__imagesList__item').css('height', sliderHeight);
        if($('body').hasClass('single-product')){
            $(window).scrollTop(0);
            let descHeight = $('.singleProduct__description .woocommerce-text').outerHeight() + $('.singleProduct__description .attributesItem__list').outerHeight();
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
        }
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
        });
        if($('.productAddTocart').hasClass('variable')){
            const attrsTop = $('.singleProduct__description__wrapper .singleProduct__attributesPicker').offset().top + $('.singleProduct__description__wrapper .singleProduct__attributesPicker').outerHeight() - $('.singleProduct__description__wrapper .singleProduct__attributesPicker').height();
            if(attrsTop < $('.single_add_to_cart_button').offset().top){
                $('.single_add_to_cart_button').addClass('absolute');
                $('.single_add_to_cart_button').css('top', attrsTop);
            }
        }
    });
    $(window).scroll(function(){
        if($('.productAddTocart').hasClass('variable')){
            const attrsTop = $('.singleProduct__description__wrapper .singleProduct__attributesPicker').offset().top + $('.singleProduct__description__wrapper .singleProduct__attributesPicker').outerHeight() - $('.singleProduct__description__wrapper .singleProduct__attributesPicker').height();
            if(attrsTop < $('.single_add_to_cart_button').offset().top){
                $('.single_add_to_cart_button').addClass('absolute');
                $('.single_add_to_cart_button').css('top', attrsTop);
            }
            if($('.singleProduct__attributesPicker').outerHeight() > $(window).scrollTop()) {
                $('.single_add_to_cart_button').removeClass('absolute');
                $('.single_add_to_cart_button').css('top', 'auto');
            }
        }
    });
    $('.singleProduct__attributesPicker__itemTitle').click(function(){
        $(this).parent().find('.singleProduct__attributesPicker__itemPopup').addClass('opened');
    });
    $('.singleProduct__attributesPicker__itemPopup__close').click(function(){
        $(this).parent().removeClass('opened');
    });
    $('.singleProduct__attributesPicker__itemPopup__guide .popup-toggle').click(function(){
        $(this).closest('.singleProduct__attributesPicker__itemPopup__guide').toggleClass('openedPopup');
    });
    $(document).ready(function(){
        if($('.variations_form').length >= 1 && $('body').hasClass('single-product')){
            $('form.variations_form .variations tr').each(function(){
                console.log($(this).find('select option').length);
                if($(this).find('select option').length == 2){
                    $(this).find('select option').last().attr('selected', 'selected');
                }
            })
        }
    });
    $('.singleProduct__attributesPicker__itemPopup__listItem').click(function(){
        const element = $(this),
              elementAttr = element.find('.singleProduct__attributesPicker__itemPopup__listItem__title').attr('data-item'),
              attr = element.closest('.singleProduct__attributesPicker__item').attr('data-attribute');
        element.parent().find('.singleProduct__attributesPicker__itemPopup__listItem').removeClass('active');
        element.addClass('active');

        $(`#${attr} option[value="${elementAttr}"]`).attr('selected', 'selected');
        $(`#${attr}`).change();
    });
    if($('body').hasClass('single-product') && $('.woocommerce-notices-wrapper > div').length > 0){
        $('<div class="scroller"></div>').prependTo('.woocommerce-notices-wrapper');
        $('.scroller').animate({
            width: 0,
        }, 10000, function() {
            $('.woocommerce-notices-wrapper > div').remove();
        });
    }
}

function fixBtn(){
    
}

export {singleProduct}