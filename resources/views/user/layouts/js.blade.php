<script>
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
</script>
<script src="{{ asset('assets/user/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/user/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('assets/user/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('assets/user/js/app.js') }}"></script>
<script src="{{ asset('assets/user/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/user/owlcarousel2/owl.carousel.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.chay-sp').slick({
            lazyLoad: 'progressive', infinite: true, accessibility:true, vertical:false, slidesToShow: 4,  
            slidesToScroll: 1, autoplay:true,  autoplaySpeed:3000, speed:1000, arrows:true, 
            centerMode:false,  dots:false,  draggable:true,  responsive: [ 
            {  breakpoint: 871, settings: { slidesToShow: 2, slidesToScroll: 1,arrows:true} } ]
        });    
        $('.chay-yk').slick({
            lazyLoad: 'progressive', infinite: true, accessibility:true, vertical:false, slidesToShow: 2,  
            slidesToScroll: 1, autoplay:true,  autoplaySpeed:3000, speed:1000, arrows:false, 
            centerMode:false,  dots:false,  draggable:true,  responsive: [ 
            {  breakpoint: 871, settings: { slidesToShow: 1, slidesToScroll: 1,arrows:false} } ]
        }); 
        $('.chay-tt').slick({
            lazyLoad: 'progressive', infinite: true, accessibility:true, vertical:false, slidesToShow: 2,  
            slidesToScroll: 1, autoplay:true,  autoplaySpeed:3000, speed:1000, arrows:false, 
            centerMode:false,  dots:false,  draggable:true,  responsive: [ 
            {  breakpoint: 871, settings: { slidesToShow: 1, slidesToScroll: 1,arrows:false} } ]
        });           
    });
</script>