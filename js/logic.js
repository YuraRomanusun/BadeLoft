$ = jQuery;
$(document).ready(function () {
    var width = document.body.clientWidth;

    var serieClick = $('.serie .item')
    serieClick.on("click", function(){
        serieClick.removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('data-id');
        loadGalleryAjax(id);
    });

    /*setTimeout(function () {
     if (getCookie("hide_60pop") != "hide" ) {
     $.fancybox.open({
     src  : '#ckmodal',
     type : 'inline',
     opts : {
     onComplete : function() {
     console.info('done!');
     }
     }
     });
     document.cookie = 'hide_60pop=hide;';
     }
     }, 30000);*/

    setTimeout(function () {
        if (localStorage.getItem('popState') != 'shown') {
            $.fancybox.open({
                src  : '#ckmodal',
                type : 'inline',
                opts : {
                    onComplete : function() {
                        console.info('done!');
                    }
                }
            });
            localStorage.setItem('popState','shown')
        }
    }, 30000);



    $("#viewfullspec").on("click", function(){
        $("a[href='#tab-additional_information']").click()
    });


    $(".readmore").each(function(){
        if($(this).find(".moreText").text() != "")
        {
            $( this ).append('<a class="more" href="#">read more</a>');
        }
    });
    $(document).on('click','.readmore a.more', function(){
        var $parent = $(this).parent();
        if($parent.data('visible')) {
            $parent.data('visible', false).find('.ellipsis').show()
                .end().find('.moreText').hide()
                .end().find('a.more').text('show more');
        } else {
            $parent.data('visible', true).find('.ellipsis').hide()
                .end().find('.moreText').css( "display", "inline" )
                .end().find('a.more').text('show less');
        }
        return false;
    });

    $('.ck-modal .button').click(function () {
        $.fancybox.close();
    });

    //CUSTOM SELECT
    $('#billing_contact_method').wrap('<span class="n-sel"></span>').parent().append('<span class="n-arrow"></span>');
    $('.tpl-commercial-request select, .tpl-landing select').wrap('<span class="n-sel"></span>').parent().append('<span class="n-arrow"></span>');

    //DatePicker init
    $('#est_shipp_date').pickadate();

    $("#menuOpen").click(function (e) {
        $(this).toggleClass("opened");
    });

    var blogCounter = $('.blog-how-to .item').size();

    if (blogCounter <= 3) {
        $('.blog-how-to').addClass('blog-center');
    }

    <!-- Initialize Swiper -->
    var swiperG = new Swiper('.gal-bw', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30,
        hashNav:true});

    $('a[data-slide]').click(function(e){
        e.preventDefault();
        swiperG.slideTo( $(this).data('slide') );
    });

    var slides;
    if ($(window).width() > 768) {slides = 4}
    if ($(window).width() < 768) {slides = 3}
    if ($(window).width() < 640) {slides = 2}
    if ($(window).width() < 481) {slides = 1}

    var swiper = new Swiper('.simple-slider', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30,
        slidesPerView: slides
    });

    var swiper = new Swiper('.main-slider', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
        slidesPerView: 1,
        autoplay: 20000,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        loop: true
    });

    var swiperP = new Swiper('.prod-categories-slider', {
        spaceBetween: 30,
        slidesPerView: 1,
        hashNav:true
    });

    var swiper = new Swiper('.post-slider', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
        slidesPerView: 1
    });

    var swiper = new Swiper('.sp-slider', {
        spaceBetween: 30,
        slidesPerView: 1
    });

    /*var swiper = new Swiper('.thumbSlider', {
     spaceBetween: 30,
     slidesPerView: 1
     });

     var swiper = new Swiper('.galleryThumbs', {
     spaceBetween: 30,
     slidesPerView: 3
     });*/

    $(".slider-images").each(function (index, el) {
        var gtop = $(".thumbSlider", this);
        var gtmb = $(".galleryThumbs", this);
        var galleryTop = new Swiper(gtop, {
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 1,
            autoHeight: true
        });
        var galleryThumbs = new Swiper(gtmb, {
            spaceBetween: 8,
            centeredSlides: true,
            slidesPerView: 3,
            touchRatio: 0.2,
            slideToClickedSlide: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
        });

        galleryTop.params.control = galleryThumbs;
        galleryThumbs.params.control = galleryTop;
    });

    $('a[data-slidep]').click(function(e){
        e.preventDefault();
        swiperP.slideTo( $(this).data('slidep') );
    });

    $('.h-search').hover(
        function() {
            $( this ).addClass( "hover" );
        }, function() {
            $( this ).removeClass( "hover" );
        }
    );
    $('.h-search input').click(function () {
        $('.h-search').addClass( "active" );
    });
    $(document).mouseup(function (e) {
        var container = $(".h-search");
        if (container.has(e.target).length === 0){
            container.removeClass( "active" );
        }
    });
    faqChange(1);



    if ($(window).width() <= 960) {
        $(".bl-single .st").trigger("sticky_kit:detach");
    } else {
        $(".bl-single .st").stick_in_parent({
            parent: "[data-sticky_parent]",
            spacer: ".sticky-spacer", // fix scroll
            offset_top:  150
        });
    }


    /*********STICKY**********/
    $(window).resize(function () {
        if ($(window).width() <= 960) {
            $(".bl-single .st").trigger("sticky_kit:detach");
        } else {
            $(".bl-single .st").stick_in_parent({
                parent: "[data-sticky_parent]",
                spacer: ".sticky-spacer", // fix scroll

            });
        }
    });

    $('.woocommerce-tabs li').click(function () {
        $('html,body').animate({
            scrollTop: $(window).scrollTop() + 1
        }, 0);
    });

    $('.anchor').click(function (e) {
        e.preventDefault();
        var l_anchor = $(this).attr('href');
        $('html,body').animate({
            scrollTop: $(l_anchor).offset().top - $('header').outerHeight()
        }, 500);
    });

    $('.switch-grid .row').click(function () {
        $('.category-page').addClass('grid-rows');
    });

    $('.switch-grid .tile').click(function () {
        $('.category-page').removeClass('grid-rows');
    });

    //WPCF7
    $(this).on('click', '.wpcf7-not-valid-tip', function () {
        $(this).prev().trigger('focus');
        $(this).fadeOut(500, function () {
            $(this).remove();
        });
    });




    $("[href='#order']").fancybox({
        onComplete: function( instance, slide ) {
            $('#product_name').val(slide.opts.$orig.parent().find('h4').text());
        }
    });


    $(window).load(function () {


        $(".fancybox").fancybox({
            afterShow: function( instance, slide ) {
                $(".fancybox-image").attr('alt', $("img", slide.opts.$orig).attr("alt"));
            }
        });


        $(".videos-scroll").customScrollbar({updateOnWindowResize:true});
    });

    $('.has-submenu').click(function () {
        $(this).find('.mob-submenu').slideToggle();
    });

    $('.menu-open').click(function () {
        $('.mobile-menu').addClass('active');
    });

    $('.mob-close').click(function () {
        $('.mobile-menu').removeClass('active');
    });

    $(document).on('click', '#newspress-more', function(){
        var ajaxcontent = $('.news-press');
        var paged = $(this).data('paged');
        var button = $(this);

        $.ajax({
            type: 'POST',
            url: window.wp_data.ajax_url,
            data: {
                action: "loadMoreNewsPress",
                paged: paged,
            },
            success: function (html) {
                ajaxcontent.append(html);
                $(button).remove();
            }
        });

    });

    $(document).on("click", "#button_more", function(){

        var category = $(this).data('cat');
        paged = $(this).data('paged');
        var ajaxcontent = $('.blog-how-to');
        var button = $(this);
        var notinids = $("#notinids").val();

        $.ajax({
            type: 'POST',
            url: window.wp_data.ajax_url,
            data: {
                action: "loadMorePosts",
                cat_id: category,
                paged: paged,
                ids: notinids
            },
            success: function (html) {
                console.log(paged);
                console.log(window.wp_data.ajax_url);
                paged += 1;
                $("#button_more").data('paged', paged);
                ajaxcontent.append(html);
                if($("#nobutton").length)
                {
                    $("#button_more").remove();
                }
            }
        });

        return false;
    });

    $('.taber-headings .item:first-child').click();

    var updateSlider  = document.getElementById('slider-range');
    var updateSliderValue = document.getElementById('slider-update-value');

    var rangeValues = $('#slider-range').attr('data-heights');
    if ($('.illustrations-box').length > 0) {
        var res = rangeValues.split(" ");
        res = res.filter(function(entry) { return entry.trim() != ''; });
        var stepCount = res.length;
        var curPos, curElement;

        noUiSlider.create(updateSlider, {
            range: {
                'min': 0,
                'max': stepCount - 1
            },
            start: 0,
            margin: 2,
            step: 1
        });
        updateSlider.noUiSlider.on('update', function( values, handle ) {
            curPos = Math.floor(values[handle]);
            curElement = res[curPos];
            //updateSliderValue.innerHTML = curElement;
            $('.illustrations-box .right figure').hide().eq(curPos).fadeIn();
            //$('.slider-values > div').removeClass('active');
            $('.slider-values > div').removeClass('active').eq(curPos).addClass('active');
        });
    }

    $('input[type="tel"]').mask('(000) 000-0000');

    $('.cg-categories >div:first-of-type').click();

    $('.cg-series > div:first-of-type > div:first-of-type').click();

    $('#customerPhotos').click(function () {
        $('.cs-images a:first-of-type').click();
        return false;
    });

});

$clickItem = $('.cg-categories > div');
$itemToShow = $('.cg-series > div');
$clickItem.click(function () {
    $($clickItem).removeClass('active');
    $(this).addClass('active');
    $itemToShow.hide();
    $itemToShow.eq($(this).index()).show();
});



/////////////////


function faqChange(num) {
    if($('body').hasClass('tpl-faq')) {
        var fcitem = ".faq-container .faq-content:nth-child(" +num+ ")";
        var fbitem = ".faq-buttons .item:nth-child(" +num+ ")";
        $('.faq-buttons .item').removeClass('active');
        $(fbitem).addClass('active');
        $('.faq-content').css("display", "none");
        $(fcitem).css("display", "block");
    }
}
//////
$('.taber-headings .item').click(function () {
    $('.taber-headings .item').removeClass('active');
    $(this).addClass('active');
    $('.taber-content .item').hide().eq($(this).index()).show();
});

$(function(){
    // bind change event to select
    $('#dynamic_select option').on('click', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
});

window.getCookie = function (name) {
    match = document.cookie.match(new RegExp(name + '=([^;]+)'));
    if (match) return match[1];
};

$('.mobile-menu .menu-item-has-children > a').click(function (event) {
    event.preventDefault();
    $(this).toggleClass('active').parent().find('.sub-menu').slideToggle();
});

/*$('#wpcf7-f1164-o1.wpcf7').on('wpcf7:mailsent', function(event){
 $.fancybox.close();
 });*/


$('.ht-container').click(function () {
    localStorage.setItem('popState','shown');
});

// $('#illustrationHeight').change(function () {
//     //alert($(this).val());
//     $('.illustrations-box .right figure').hide().eq($(this).val()).fadeIn();
// });



function loadGalleryAjax(id)
{
    var ajaxcontent = $('.cg-gallery');

    //PRELOADER START
    ajaxcontent.append('<div class="gal-preloader"><img src="/wp-content/themes/badeloft/images/5.gif" alt=""></div>');
    $.ajax({
        type: 'POST',
        url: window.wp_data.ajax_url,
        data: {
            action: "loadGallery",
            id: id,
        },
        success: function (html) {
            var result = JSON.parse(html);
            ajaxcontent.html(result.html);
            //PRELOADER END
            $('.gal-preloader').remove();
            loadlater();
        }
    });
    return false;
}



function load_defer_img(source) {
    'use strict';
    return $.Deferred (function (task) {
        var image = new Image();
        image.onload = function () {task.resolve(image);};
        image.onerror = function () {task.reject();};
        image.src=source;
    }).promise();
}

function loadlater() {
    'use strict';
    $('[data-defer]').each(function(){
        var t = $(this),
            pre = t.data('pre'),
            img = t.data('defer');
        $.when(load_defer_img(img)).done(function (image) {
            t.removeAttr('data-defer');
            if(t.is('img')) {
                t.prop('src', img);
            } else {
                if(t.has('> img:not([data-defer])').length > 0) {
                    return;
                }
                if(typeof pre !== 'undefined') {
                    t.prepend(image);
                } else {
                    t.append(image);
                }
            }
        });
    });
}


// $(window).scroll(function() {
//     clearTimeout($.data(this, 'scrollTimer'));
//     $.data(this, 'scrollTimer', setTimeout(function() {
//         // do something
//         stickySidebar();
//         console.log("Haven't scrolled in 250ms!");
//     }, 20));
// });
//
// function stickySidebar() {
//     var sidebar = $('.bl-single aside');
//     var sidebarPosition = $(document).scrollTop();
//     sidebar.animate({
//         top: sidebarPosition
//     }, 500);
//     console.log(sidebarPosition);
// }

$(document).ready(function () {


    /************Offset***************/

    // if ($('.bl-single').length && $('aside').length && $(window).width() > 960) {
    //     sidebar_offset();
    //     $(window).resize(function () {
    //         if ($(window).width() > 960) {
    //             sidebar_offset();
    //         }
    //     });
    // }

    // if ($('.bl-single').length && $('aside').length && $(window).width() > 960) {
    //     sidebar_offset();
    //     $(window).resize(function () {
    //         if ($(window).width() > 960) {
    //             sidebar_offset();
    //         }
    //     });
    // }
});



function sidebar_offset() {
    var sidebar = $('.bl-single aside');
    var container = $('.bl-single .container');
    var article = $('.bl-single article');
    var offset_left = container.offset().left + article.outerWidth( true );
    var sidebar_width = container.width() - article.outerWidth( true );
    var max_height = $(window).height() - $('header').outerHeight( true );
    sidebar.css('left', ''+offset_left+'px').css('width', ''+sidebar_width+'px').css('max-height', ''+max_height+'px');
    $('.bl-single aside img').css('max-height', ''+max_height+'px');

}


var showRooms = [];
var showRoomAdress, userPosition, geoResult;
// $(window).load(function () {
//     var raw_coordinates = $('#coordinates').attr('data-coords');
//     var showroom_coordinates_line = raw_coordinates.split("|");
//     $.each(showroom_coordinates_line, function(index, item){
//        var tempArray = this.split(",");
//        showRooms.push(tempArray);
//     });
//     geolocation();
// });

var options = {
    enableHighAccuracy: true,
    //timeout: 5000,
    maximumAge: 0
};

function geolocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, geoError, options);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    userPosition = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    //userPosition = new google.maps.LatLng(48.860557, 2.339608);
    $.each(showRooms, function(index, item) {
        showRoomAdress = new google.maps.LatLng(this[1], this[2]);
        geoResult = calcDistance(userPosition, showRoomAdress);
        if (geoResult <= 50) {
            $('#showroom_popup a').attr('href', this[3]);
            $('#showroom_popup').show();
            return false;
        }
    });
}

function geoError(err) {
    console.warn('Geolocation Error', err.code, err.message);
}

//calculates distance between two points in miles
function calcDistance(p1, p2) {
    return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1609.34).toFixed(2);
}

$('a[href^="#"]:not(a[href="#"])').click(function (e) {
    e.preventDefault();
    var scroll_object = $(this).attr('href');
    console.log(scroll_object);
    $('html, body').animate({
        scrollTop: ($(''+scroll_object+'').offset().top) - ($('header').outerHeight())
    }, 1000);
    //console.log($(''+scroll_object+'').offset().top);
    //return false;
});
//alert('Test');