import $ from 'jquery';

function loginForm(){
    $(document).ready(function(){
        $('.registerAccountBtn').click(function(){
            $(this).closest('.woocommerce').addClass('registerForm');
        }); 
    });
}

export {loginForm}