import $ from 'jquery';

function shopFilters() {
    $(document).ready(function(){
        filtersSidebar();
        sidebarAttributes();
    });
}

function filtersSidebar() {
    $('.catalog__filter').click(function(){
        $('.catalog__filtersMenu').addClass('opened');
    });

    $('.catalog__filtersClose').click(function(){
        $('.catalog__filtersMenu').removeClass('opened');
    });
}
function sidebarAttributes(){
    $('.catalog__filtersList__attributeLabel').click(function(){
        $('.catalog__filtersList__attributeSublist').not($( $(this).parent().find('.catalog__filtersList__attributeSublist'))).slideUp();
        $('.catalog__filtersList__attribute').not($(this).parent()).removeClass('opened');

        $(this).parent().find('.catalog__filtersList__attributeSublist').slideToggle();
        $(this).parent().toggleClass('opened');
    });

    $('.catalog__filtersList__attributeItem').click(function(){
        $('.sort .catalog__filtersList__attributeItem').removeClass('active');
        $(this).toggleClass('active');
    });

    $('.catalog__filtersList__attributeItem__apply').click(function(){
        let colors = [],
            sizes = [],
            sort = [],
            isCategoryPage = $('body').hasClass('tax-product_cat'),
            termSlug;
        if(isCategoryPage){
            termSlug = $('body').attr('class').split('term-');
            termSlug = termSlug[1].split(' ');
        }
        else{
            termSlug = ' ';
        }
        $('.catalog__filtersList__attribute').each(function(){
            let arr = [];
            $(this).find('.catalog__filtersList__attributeItem').each(function(){
                if($(this).hasClass('active')){
                    arr.push($(this).find('h4').attr('data-slug'));
                }
            });
            if($(this).hasClass('colors')){
                colors.push(arr);
            }
            if($(this).hasClass('size')){
                sizes.push(arr);
            }
            if($(this).hasClass('sort')){
                sort.push(arr);
            }
        });
        $.ajax({
            url: customjs_ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'products_filter',
                colors: colors,
                sizes: sizes,
                sort: sort.join(),
                isCategoryPage: isCategoryPage,
                category: termSlug[0],
            },
            success: function(response){
                $('.catalog__list').html(response);
            }
        });
        $('.catalog__filtersMenu').removeClass('opened');
    });
}
export { shopFilters };