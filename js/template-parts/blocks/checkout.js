import $ from 'jquery';

function checkout(){
    $('.guestLogin').on('submit', function(e){
		e.preventDefault();
        let email = $('.guestLogin .email').val();
        let name = $('.guestLogin .name').val();
        let surname = $('.guestLogin .surname').val();
        let phoneNumber = $('.guestLogin .phoneNumber').val();
        // let fiscalCode = $('.guestLogin .fiscalCode').val();
        $('.woocommerce-billing-fields #billing_first_name').val(name);
        $('.woocommerce-billing-fields #billing_last_name').val(surname);
        $('.woocommerce-billing-fields #billing_email').val(email);
        $('.woocommerce-billing-fields #billing_phone').val(phoneNumber);
        // $('.woocommerce-billing-fields #billing_first_name').val(name);

        $.ajax({
            url: customjs_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action:   'add_order_expense_cf',
                email: email,
                name:  name,
                surname:  surname,
                phoneNumber: phoneNumber,
                fiscalCode: fiscalCode,
            },
            success: function( response ) {
                const color   = response.success ? 'green' : 'red',
                      message = response.data;
                $('#message-response').html(response.data).css('color',color).fadeIn().delay(2000).fadeOut();
                $('.formResult').html(response);
                console.log(response);
            },
            error: function( error ) {
                $('#message-response').html('Something went wrong, try later please.').css('color','red').fadeIn().delay(2000).fadeOut();
                console.log(error);
            }
        });
	});
}

export {checkout}