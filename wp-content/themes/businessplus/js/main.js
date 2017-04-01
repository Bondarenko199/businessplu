jQuery(function($){
    $(document).ready(function(){
        $('#owl').owlCarousel({
            items: 1,
            startPosition: 1,
            loop: true,
            nav: false,
            dots: true,
            // dotsEach: true,
            navText: [],
            smartSpeed: 1000
        });

        $('#owlSecond').owlCarousel({
            items: 3,
            margin: 20,
            loop: true,
            nav: false,
            navText: [],
            smartSpeed: 500
        });

        $('#owl-3').owlCarousel({
            items: 6,
            startPosition: 1,
            loop: true,
            nav: false,
            dots: true,
            navText: [],
            smartSpeed: 250
        });

        $('.footer-nav ul .page_item').addClass('fa fa-caret-right');
    });
});