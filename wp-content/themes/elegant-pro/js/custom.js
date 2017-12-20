jQuery(document).ready(function($){
    
    /** Main Slider Script **/
    $('.main-slider').owlCarousel({
        stagePadding: 10,
        loop:true,
        margin:5,
        pagination: true,
        responsive:{
            0:{
                items:1,
                stagePadding:0,
            },
            600:{
                items:1,
                stagePadding:0,
            },
            1280:{
                items:1,
               stagePadding: 86.4,                                            
            },
            1366:{
                items:1,
                stagePadding: 97,            
            },
            1920:{
                items:1,            
                stagePadding: 376,
            }        
        }
    });
    /*main slider two*/
    $('.main-slider-up').owlCarousel({
        autoplay:true,
        controls:false,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
        items:1,
        loop:true,
        dots: true,
        mouseDrag: false,
        nav: false,
        navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    })
    
    /** Feature Slider Script **/
    $('.feature-slider').owlCarousel({
        loop:true,
        pagination: false,
        nav: true,
        margin:10,
        dots:false,
        navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1280:{
                items:3,                                           
            },
            1366:{
                items:3,          
            },
            1920:{
                items:3,
            }        
        }
    });
    
    // Scroll Top  
    $('#ed-top').css('opacity',0);
    $(window).scroll(function(){
        if($(this).scrollTop() > 300){
            $('#ed-top').css('opacity',1);
        }else{
            $('#ed-top').css('opacity',0);
        }
    });
    
    $("#ed-top").click(function(){
      $('html,body').animate({scrollTop:0},600);
    });

    //Search Box Toogle
    $('.site-header').on('click', '.search-toggle', function(e) {
        var selector = $(this).data('selector');
      
        $(selector).toggleClass('show').find('.search-field').focus();
        $(this).toggleClass('active');
      
        e.preventDefault();
      });
    
    //Sickey Sidebar
    $('.right-sidebar,.left-sidebar').theiaStickySidebar();
    
    
    //Menu Toggle
    jQuery('.menu-toggle').click(function(e){
        
        jQuery('.menu').toggleClass('open');
        e.preventDefault();
        
    });
    

    // Parallax Background
    $(window).load(function(){
        $('.header-banner').parallax('50%', 0.4, true); 
    });
    
     
    /*wow js file*/
    new WOW().init();
    
    //Menu Toggle
    $(".icon").click(function(){
        //$(".menu").toggleClass("open");
        $(".site-header").toggleClass("bt-toggle");
    });


    //////////////////////////////////
    /////Video modal view/////////////
    //////////////////////////////
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
        /* Dynamic top menu positioning
    *
    */

    //fixed header on scroll layout - 2
    var num = 0; //number of pixels before modifying styles

    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > num) {
            $('.site-header.layout-2').addClass('fixed');
        } else {
            $('.site-header.layout-2').removeClass('fixed');
        }
    });


});
