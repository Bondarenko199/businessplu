jQuery(function($){
    $(document).ready(function(){
        $('#owl').owlCarousel({
            items: 1,
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