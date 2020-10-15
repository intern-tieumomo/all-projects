jQuery(document).ready(function($) {

    "use strict";

    if($('body').hasClass("rtl")) {
        var rtlValue = true;
    } else {
        var rtlValue = false;
    }

    /**
     * Ticker script
     */
    $("#newsTicker").lightSlider({
        item: 1,
        vertical: true,
        loop: true,
        verticalHeight: 35,
        pager: false,
        enableTouch: false,
        enableDrag: false,
        auto: true,
        controls: true,
        speed: 2000,
        pause: 6000,
        rtl: rtlValue,
        prevHtml: '<i class="fa fa-chevron-left"></i>',
        nextHtml: '<i class="fa fa-chevron-right"></i>',
        onSliderLoad: function() {
            $('#nv-newsTicker').removeClass('cS-hidden');
        }
    });

    /**
     * Slider script
     */
    $('.slider-posts').each(function() {
        $(".nv-main-slider").lightSlider({
            item: 1,
            auto: true,
            pager: false,
            loop: true,
            speed: 1350,
            pause: 5200,
            enableTouch: false,
            enableDrag: false,
            rtl: rtlValue,
            prevHtml: '<i class="fa fa-angle-left"></i>',
            nextHtml: '<i class="fa fa-angle-right"></i>',
            onSliderLoad: function() {
                $('.nv-main-slider').removeClass('cS-hidden');
            }
        });
    });

    /**
     * Block carousel layout
     */
    $('.carousel-posts').each(function() {
        var Id = $(this).parent().attr('id');
        var NewId = Id;
        var crsItem = $(this).data('items');

        NewId = $('#' + Id + " #blockCarousel").lightSlider({
            auto: true,
            loop: true,
            pauseOnHover: true,
            pager: false,
            controls: false,
            prevHtml: '<i class="fa fa-angle-left"></i>',
            nextHtml: '<i class="fa fa-angle-right"></i>',
            item: 4,
            rtl: rtlValue,
            onSliderLoad: function() {
                $('#' + Id + " #blockCarousel").removeClass('cS-hidden');
            },
            responsive: [{
                    breakpoint: 840,
                    settings: {
                        item: 2,
                        slideMove: 1,
                        slideMargin: 6,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        item: 1,
                        slideMove: 1,
                    }
                }
            ]
        });

        $('#' + Id + ' .nv-navPrev').click(function() {
            NewId.goToPrevSlide();
        });
        $('#' + Id + ' .nv-navNext').click(function() {
            NewId.goToNextSlide();
        });
    });

    /**
     * Default widget tabbed
     */
    $("#nv-tabbed-widget").tabs();


    //Search toggle
    $('.nv-header-search-wrapper .search-main').click(function() {
        $('.search-form-main').toggleClass('active-search');
        $('.search-form-main .search-field').focus();
    });

    //responsive menu toggle
    $('.nv-header-menu-wrapper .menu-toggle').click(function(event) {
        $('.nv-header-menu-wrapper #site-navigation').slideToggle('slow');
    });

    //responsive sub menu toggle
    $('#site-navigation .menu-item-has-children,#site-navigation .page_item_has_children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');

    $('#site-navigation .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });

    /**
     * Scroll To Top
     */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1000) {
            $('#nv-scrollup').fadeIn('slow');
        } else {
            $('#nv-scrollup').fadeOut('slow');
        }
    });

    $('#nv-scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /**
     * Toggle for top featured posts section
     */
    $('.nv-top-featured-toggle').click(function(e) {
        e.preventDefault();
        $(this).parents('.nv-top-header-wrap').next('.nv-top-featured-wrapper').slideToggle('slow');
        $(this).toggleClass('toggle-opened');
    });

});