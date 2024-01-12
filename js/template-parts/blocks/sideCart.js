import $ from 'jquery';

function sideCart(){
    //Open
    $('.header__cart').click(function(e){
        const w = $(window).width();
        if( w > 992 ){
            e.preventDefault();
            $('.cartSidebar').addClass('cart-opened');
        }
    });
    $('.cartSidebar__close, .cartSidebar__overlay').click(function(){
        $('.cartSidebar').removeClass('cart-opened');
    });
}

export {sideCart};