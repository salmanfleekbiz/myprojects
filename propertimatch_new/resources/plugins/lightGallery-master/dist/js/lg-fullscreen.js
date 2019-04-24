(function($,window,document,undefined){'use strict';var defaults={fullScreen:true};var Fullscreen=function(element){this.core=$(element).data('lightGallery');this.$el=$(element);this.core.s=$.extend({},defaults,this.core.s);this.init();return this;};Fullscreen.prototype.init=function(){var fullScreen='';if(this.core.s.fullScreen){if(!document.fullscreenEnabled&&!document.webkitFullscreenEnabled&&!document.mozFullScreenEnabled&&!document.msFullscreenEnabled){return;}else{fullScreen='<span class="lg-fullscreen lg-icon"></span>';this.core.$outer.find('.lg-toolbar').append(fullScreen);this.fullScreen();}}};Fullscreen.prototype.reuestFullscreen=function(){var el=document.documentElement;if(el.requestFullscreen){el.requestFullscreen();}else if(el.msRequestFullscreen){el.msRequestFullscreen();}else if(el.mozRequestFullScreen){el.mozRequestFullScreen();}else if(el.webkitRequestFullscreen){el.webkitRequestFullscreen();}};Fullscreen.prototype.exitFullscreen=function(){if(document.exitFullscreen){document.exitFullscreen();}else if(document.msExitFullscreen){document.msExitFullscreen();}else if(document.mozCancelFullScreen){document.mozCancelFullScreen();}else if(document.webkitExitFullscreen){document.webkitExitFullscreen();}};Fullscreen.prototype.fullScreen=function(){var _this=this;$(document).on('fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg',function(){_this.core.$outer.toggleClass('lg-fullscreen-on');});this.core.$outer.find('.lg-fullscreen').on('click.lg',function(){if(!document.fullscreenElement&&!document.mozFullScreenElement&&!document.webkitFullscreenElement&&!document.msFullscreenElement){_this.reuestFullscreen();}else{_this.exitFullscreen();}});};Fullscreen.prototype.destroy=function(){this.exitFullscreen();$(document).off('fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg');};$.fn.lightGallery.modules.fullscreen=Fullscreen;})(jQuery,window,document);