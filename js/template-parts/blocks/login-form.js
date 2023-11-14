import $ from 'jquery';

function loginForm(){
    $(document).ready(function(){
        $('.form-switchBtn').click(function(){
            $(this).closest('.woocommerce').toggleClass('registerForm');
        });
        if($('body').hasClass('woocommerce-account') && $('body').hasClass('logged-in') == false && $('.woocommerce-notices-wrapper .woocommerce-error').length > 0){
            let error = $('.woocommerce-notices-wrapper .woocommerce-error li').html().trim().split('</strong>');
            error = error[1].trim();
            console.log(error);
            if(error != 'The password field is empty.' && error != 'Username is required.'){
                $('#main .page-blocks > .woocommerce').addClass('registerForm');
            }
        }
    });
}

export {loginForm}