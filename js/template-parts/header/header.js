import $  from 'jquery';

function header(){
    $('#nav-toggle').on('click',function(e){
        e.preventDefault();
        $('body').toggleClass('header-active');     
    });

    $('.menu-item__parent').each(function(){
        let block = $(this);
        let btn = $(this).find('.menu-item__icon');
        let subNav = $(this).next();
        btn.on('click',function(e){
            e.preventDefault();
            subNav.slideToggle();
            block.toggleClass('active');
        });
    })
    
    $(function() {
        
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 10) {
                    $("body").addClass('scrolled');
                } else {
                    //remove the background property so it comes transparent again (defined in your css)
                    $("body").removeClass('scrolled');
                }
            });
        
    });


    //header hide on scrolling
    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('.header__main').outerHeight();
    var footerHeight = $('footer').outerHeight();


    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 50);

    function hasScrolled() {
        var st = $(document).scrollTop();
        
        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;
        
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('body').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('body').removeClass('nav-up').addClass('nav-down');
            }
        }


        if($('footer').offset().top<st+$(window).height() || st<50){
        $('.bottomBar').addClass('hidden');
        //$('.bottomBar').css('bottom',$('footer').height());
        } else{
        $('.bottomBar').removeClass('hidden');
        //$('.bottomBar').css('bottom',0);
        }
        
        lastScrollTop = st;
    }
}


export { header };