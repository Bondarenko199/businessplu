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

        $('#owl-2').owlCarousel({
            items: 3,
            margin: 20,
            startPosition: 1,
            loop: true,
            nav: false,
            dots: true,
            dotsEach: true,
            navText: [],
            smartSpeed: 1000
        });
    });
});