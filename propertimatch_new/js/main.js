(function($){"use strict";jQuery('nav#dropdown').meanmenu();jQuery(window).bind("load",function(){new WOW().init();})
$.scrollUp({scrollText:'<i class="fa fa-angle-up"></i>',easingType:'linear',scrollSpeed:900,animation:'fade'});$('#ensign-nivoslider-3').nivoSlider({effect:'random',slices:15,boxCols:8,boxRows:4,animSpeed:500,pauseTime:5000,prevText:'p<br/>r<br/>e<br/>v',nextText:'n<br/>e<br/>x<br/>t',startSlide:0,directionNav:true,controlNav:true,controlNavThumbs:false,pauseOnHover:true,manualAdvance:false});$("#slider-range").slider({range:true,min:20,max:2500,values:[80,2000],slide:function(event,ui){$("#amount").val("$"+ui.values[0]+" - $"+ui.values[1]);}});$("#amount").val("$"+$("#slider-range").slider("values",0)+" - $"+$("#slider-range").slider("values",1));$("#slider-range1").slider({range:true,min:100,max:60000,values:[0,100],slide:function(event,ui){$("#amount1").val(ui.values[0]+" - "+ui.values[1]+"+ Sqt");}});$("#amount1").val(+$("#slider-range1").slider("values",0)+" -"+$("#slider-range1").slider("values",1)+" Sqt");$("#slider-range2").slider({range:true,min:0,max:1000,values:[0,100],slide:function(event,ui){$("#amount2").val(ui.values[0]+" - "+ui.values[1]+" Miles");}});$("#amount2").val(+$("#slider-range2").slider("values",0)+" -"+$("#slider-range2").slider("values",1)+" Miles");$('[data-toggle="tooltip"]').tooltip();$('.service-carousel').slick({arrows:false,dots:false,infinite:false,speed:300,slidesToShow:4,slidesToScroll:3,responsive:[{breakpoint:991,settings:{slidesToShow:3,slidesToScroll:2}},{breakpoint:767,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:479,settings:{slidesToShow:1,slidesToScroll:1}}]});$('.agents-carousel').slick({arrows:false,dots:false,infinite:false,speed:300,slidesToShow:4,slidesToScroll:3,responsive:[{breakpoint:991,settings:{slidesToShow:3,slidesToScroll:2}},{breakpoint:767,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:479,settings:{slidesToShow:1,slidesToScroll:1}}]});$('.testimonial-carousel').slick({arrows:false,dots:true,infinite:true,speed:300,slidesToShow:1,slidesToScroll:1});$('.blog-carousel').slick({arrows:false,dots:false,infinite:false,speed:300,slidesToShow:3,slidesToScroll:2,responsive:[{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:767,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:479,settings:{slidesToShow:1,slidesToScroll:1}}]});$('.brand-carousel').slick({arrows:false,dots:false,infinite:false,speed:300,slidesToShow:5,slidesToScroll:4,responsive:[{breakpoint:1169,settings:{slidesToShow:4,slidesToScroll:3}},{breakpoint:991,settings:{slidesToShow:3,slidesToScroll:2}},{breakpoint:767,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:479,settings:{slidesToShow:1,slidesToScroll:1}}]});$('.pro-details-carousel').slick({arrows:false,dots:false,infinite:false,speed:300,slidesToShow:4,slidesToScroll:3,responsive:[{breakpoint:991,settings:{slidesToShow:4,slidesToScroll:3}},{breakpoint:767,settings:{slidesToShow:3,slidesToScroll:2}},{breakpoint:479,settings:{slidesToShow:2,slidesToScroll:2}}]});$('.counter').counterUp({delay:10,time:1000});$(".youtube-bg").YTPlayer({videoURL:"Sz_1tkcU0Co",containment:'.youtube-bg',mute:true,loop:true,});})(jQuery);var hth=$('.header-top-bar').height();$(window).on('scroll',function(){if($(this).scrollTop()>hth){$('#sticky-header').addClass("sticky");}else{$('#sticky-header').removeClass("sticky");}});$(document).ready(function(){$("#unite-gallery").unitegallery({gallery_autoplay:true});});$('.carousel').carousel({interval:5000})
$(document).ready(function(){$('.main-menu ul li:last-child a').addClass('button-orange');$(".main-menu ul li:last-child a").prepend("<span><i class='fa fa-search'></i></span>");$(".more-filter").click(function(){$(".search-home").fadeToggle(1500);});});$(function(){$(".img-preload").unveil(300);});