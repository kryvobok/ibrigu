import $ from 'jquery';

function wishlist(){
    $(window).on('load', function(){
        updateContent();
        $('.wishlist__itemRemove').click(function(){
            $(this).closest('.wishlist__itemWrapper').remove();
            updateContent();
        });
    });
}
function updateContent(){ 
    let wishlistItems = $('.wishlist__itemWrapper').length;
    if(wishlistItems < 1) {
        $('.wishlist').addClass('empty');
    }
    else{
        $('.wishlist').removeClass('empty');
        $('.wishlist').addClass('hasItems');
    }
}

export{ wishlist }