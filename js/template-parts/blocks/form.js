import $ from 'jquery';

function form() {
    $(document).ready(function(){
        //checkbox
        $('.form-checkbox-wrapper').click(function(){
            const checkbox = $(this).find('.form-checkbox input');
            if(checkbox.is(':checked')){
                $(this).removeClass('checked');
                checkbox.prop('checked', false);
            }else{
                $(this).addClass('checked');
                checkbox.prop('checked', true); 
            }
        });

        //textarea
        $('#order_comments_field span').click(function(){
            console.log('123');
            $(this).find('input').focus();
        });
        //textarea characters limit
        const charCount = $('#order_comments_field input').attr('maxlength');
        $('.charactersLimit .count').html(charCount);
        $('#order_comments_field').find('input').on('input', function(){
            $('.charactersLimit .count').html(charCount - $(this).val().length);
        });
    });
}

export{ form };