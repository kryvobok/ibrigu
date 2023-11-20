import $ from 'jquery';

function cart() {
    $('.wishlist_toggle').click(function(){
        let wrapper = $(this).parent();
        console.log('213');
        wrapper.toggleClass('add_to_wishlistWrapper');
        wrapper.toggleClass('remove_from_wishlistWrapper');
        // if(wrapper.hasClass('remove_from_wishlistWrapper')){
        //     $(document).on('ajaxStop', function(){
                
        //     })
        // }else{
        //     $(document).on('ajaxStop', function(){
        //         wrapper.removeClass('add_to_wishlistWrapper');
        //         wrapper.addClass('remove_from_wishlistWrapper');
        //         console.log('123');
        //     })
        // }
    });
}

export {cart};