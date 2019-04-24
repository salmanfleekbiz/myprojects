/*lg-hash.js*/

(function($,window,document,undefined){'use strict';var defaults={hash:true};var Hash=function(element){this.core=$(element).data('lightGallery');this.core.s=$.extend({},defaults,this.core.s);if(this.core.s.hash){this.oldHash=window.location.hash;this.init();}return this;};Hash.prototype.init=function(){var _this=this;var _hash;_this.core.$el.on('onAfterSlide.lg.tm',function(event,prevIndex,index){window.location.hash='lg='+_this.core.s.galleryId+'&slide='+index;});$(window).on('hashchange',function(){_hash=window.location.hash;var _idx=parseInt(_hash.split('&slide=')[1],10);if((_hash.indexOf('lg='+_this.core.s.galleryId)>-1)){_this.core.slide(_idx);}else if(_this.core.lGalleryOn){_this.core.destroy();}});};Hash.prototype.destroy=function(){if(this.oldHash&&this.oldHash.indexOf('lg='+this.core.s.galleryId)<0){window.location.hash=this.oldHash;}else{if(history.pushState){history.pushState('',document.title,window.location.pathname+window.location.search);}else{window.location.hash='';}}};$.fn.lightGallery.modules.hash=Hash;})(jQuery,window,document);

/*lg-autoplay.js*/

(function($,window,document,undefined){'use strict';var defaults={autoplay:false,pause:5000,progressBar:true,fourceAutoplay:false,autoplayControls:true,appendAutoplayControlsTo:'.lg-toolbar'};var Autoplay=function(element){this.core=$(element).data('lightGallery');this.$el=$(element);if(this.core.$items.length<2){return false;}this.core.s=$.extend({},defaults,this.core.s);this.interval=false;this.fromAuto=true;this.canceledOnTouch=false;this.fourceAutoplayTemp=this.core.s.fourceAutoplay;if(!this.core.doCss()){this.core.s.progressBar=false;}this.init();return this;};Autoplay.prototype.init=function(){var _this=this;if(_this.core.s.autoplayControls){_this.controls();}if(_this.core.s.progressBar){_this.core.$outer.find('.lg').append('<div class="lg-progress-bar"><div class="lg-progress"></div></div>');}_this.progress();if(_this.core.s.autoplay){_this.startlAuto();}_this.$el.on('onDragstart.lg.tm touchstart.lg.tm',function(){if(_this.interval){_this.cancelAuto();_this.canceledOnTouch=true;}});_this.$el.on('onDragend.lg.tm touchend.lg.tm onSlideClick.lg.tm',function(){if(!_this.interval&&_this.canceledOnTouch){_this.startlAuto();_this.canceledOnTouch=false;}});};Autoplay.prototype.progress=function(){var _this=this;var _$progressBar;var _$progress;_this.$el.on('onBeforeSlide.lg.tm',function(){if(_this.core.s.progressBar&&_this.fromAuto){_$progressBar=_this.core.$outer.find('.lg-progress-bar');_$progress=_this.core.$outer.find('.lg-progress');if(_this.interval){_$progress.removeAttr('style');_$progressBar.removeClass('lg-start');setTimeout(function(){_$progress.css('transition','width '+(_this.core.s.speed+_this.core.s.pause)+'ms ease 0s');_$progressBar.addClass('lg-start');},20);}}if(!_this.fromAuto&&!_this.core.s.fourceAutoplay){_this.cancelAuto();}_this.fromAuto=false;});};Autoplay.prototype.controls=function(){var _this=this;var _html='<span class="lg-autoplay-button lg-icon"></span>';$(this.core.s.appendAutoplayControlsTo).append(_html);_this.core.$outer.find('.lg-autoplay-button').on('click.lg',function(){if($(_this.core.$outer).hasClass('lg-show-autoplay')){_this.cancelAuto();_this.core.s.fourceAutoplay=false;}else{if(!_this.interval){_this.startlAuto();_this.core.s.fourceAutoplay=_this.fourceAutoplayTemp;}}});};Autoplay.prototype.startlAuto=function(){var _this=this;_this.core.$outer.find('.lg-progress').css('transition','width '+(_this.core.s.speed+_this.core.s.pause)+'ms ease 0s');_this.core.$outer.addClass('lg-show-autoplay');_this.core.$outer.find('.lg-progress-bar').addClass('lg-start');_this.interval=setInterval(function(){if(_this.core.index+1<_this.core.$items.length){_this.core.index=_this.core.index;}else{_this.core.index=-1;}_this.core.index++;_this.fromAuto=true;_this.core.slide(_this.core.index,false,false);},_this.core.s.speed+_this.core.s.pause);};Autoplay.prototype.cancelAuto=function(){clearInterval(this.interval);this.interval=false;this.core.$outer.find('.lg-progress').removeAttr('style');this.core.$outer.removeClass('lg-show-autoplay');this.core.$outer.find('.lg-progress-bar').removeClass('lg-start');};Autoplay.prototype.destroy=function(){this.cancelAuto();this.core.$outer.find('.lg-progress-bar').remove();};$.fn.lightGallery.modules.autoplay=Autoplay;})(jQuery,window,document);

/*lg-fullscreen.js*/

(function($,window,document,undefined){'use strict';var defaults={fullScreen:true};var Fullscreen=function(element){this.core=$(element).data('lightGallery');this.$el=$(element);this.core.s=$.extend({},defaults,this.core.s);this.init();return this;};Fullscreen.prototype.init=function(){var fullScreen='';if(this.core.s.fullScreen){if(!document.fullscreenEnabled&&!document.webkitFullscreenEnabled&&!document.mozFullScreenEnabled&&!document.msFullscreenEnabled){return;}else{fullScreen='<span class="lg-fullscreen lg-icon"></span>';this.core.$outer.find('.lg-toolbar').append(fullScreen);this.fullScreen();}}};Fullscreen.prototype.reuestFullscreen=function(){var el=document.documentElement;if(el.requestFullscreen){el.requestFullscreen();}else if(el.msRequestFullscreen){el.msRequestFullscreen();}else if(el.mozRequestFullScreen){el.mozRequestFullScreen();}else if(el.webkitRequestFullscreen){el.webkitRequestFullscreen();}};Fullscreen.prototype.exitFullscreen=function(){if(document.exitFullscreen){document.exitFullscreen();}else if(document.msExitFullscreen){document.msExitFullscreen();}else if(document.mozCancelFullScreen){document.mozCancelFullScreen();}else if(document.webkitExitFullscreen){document.webkitExitFullscreen();}};Fullscreen.prototype.fullScreen=function(){var _this=this;$(document).on('fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg',function(){_this.core.$outer.toggleClass('lg-fullscreen-on');});this.core.$outer.find('.lg-fullscreen').on('click.lg',function(){if(!document.fullscreenElement&&!document.mozFullScreenElement&&!document.webkitFullscreenElement&&!document.msFullscreenElement){_this.reuestFullscreen();}else{_this.exitFullscreen();}});};Fullscreen.prototype.destroy=function(){this.exitFullscreen();$(document).off('fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg');};$.fn.lightGallery.modules.fullscreen=Fullscreen;})(jQuery,window,document);

/*lg-thumbnail.js*/

(function($,window,document,undefined){'use strict';var defaults={thumbnail:true,animateThumb:true,currentPagerPosition:'middle',thumbWidth:100,thumbContHeight:100,thumbMargin:5,exThumbImage:false,showThumbByDefault:true,toogleThumb:true,pullCaptionUp:true,enableThumbDrag:true,enableThumbSwipe:true,swipeThreshold:50,loadYoutubeThumbnail:true,youtubeThumbSize:1,loadVimeoThumbnail:true,vimeoThumbSize:'thumbnail_small',loadDailymotionThumbnail:true};var Thumbnail=function(element){this.core=$(element).data('lightGallery');this.core.s=$.extend({},defaults,this.core.s);this.$el=$(element);this.$thumbOuter=null;this.thumbOuterWidth=0;this.thumbTotalWidth=(this.core.$items.length*(this.core.s.thumbWidth+this.core.s.thumbMargin));this.thumbIndex=this.core.index;this.left=0;this.init();return this;};Thumbnail.prototype.init=function(){if(this.core.s.thumbnail&&this.core.$items.length>1){if(this.core.s.showThumbByDefault){this.core.$outer.addClass('lg-thumb-open');}if(this.core.s.pullCaptionUp){this.core.$outer.addClass('lg-pull-caption-up');}this.build();if(this.core.s.animateThumb){if(this.core.s.enableThumbDrag&&!this.core.isTouch&&this.core.doCss()){this.enableThumbDrag();}if(this.core.s.enableThumbSwipe&&this.core.isTouch&&this.core.doCss()){this.enableThumbSwipe();}this.thumbClickable=false;}else{this.thumbClickable=true;}this.toogle();this.thumbkeyPress();}};Thumbnail.prototype.build=function(){var _this=this;var thumbList='';var vimeoErrorThumbSize='';var $thumb;var html='<div class="lg-thumb-outer">'+'<div class="lg-thumb group">'+'</div>'+'</div>';switch(this.core.s.vimeoThumbSize){case'thumbnail_large':vimeoErrorThumbSize='640';break;case'thumbnail_medium':vimeoErrorThumbSize='200x150';break;case'thumbnail_small':vimeoErrorThumbSize='100x75';}_this.core.$outer.addClass('lg-has-thumb');_this.core.$outer.find('.lg').append(html);_this.$thumbOuter=_this.core.$outer.find('.lg-thumb-outer');_this.thumbOuterWidth=_this.$thumbOuter.width();if(_this.core.s.animateThumb){_this.core.$outer.find('.lg-thumb').css({width:_this.thumbTotalWidth+'px',position:'relative'});}if(this.core.s.animateThumb){_this.$thumbOuter.css('height',_this.core.s.thumbContHeight+'px');}function getThumb(src,thumb,index){var isVideo=_this.core.isVideo(src,index)||{};var thumbImg;var vimeoId='';if(isVideo.youtube||isVideo.vimeo||isVideo.dailymotion){if(isVideo.youtube){if(_this.core.s.loadYoutubeThumbnail){thumbImg='//img.youtube.com/vi/'+isVideo.youtube[1]+'/'+_this.core.s.youtubeThumbSize+'.jpg';}else{thumbImg=thumb;}}else if(isVideo.vimeo){if(_this.core.s.loadVimeoThumbnail){thumbImg='//i.vimeocdn.com/video/error_'+vimeoErrorThumbSize+'.jpg';vimeoId=isVideo.vimeo[1];}else{thumbImg=thumb;}}else if(isVideo.dailymotion){if(_this.core.s.loadDailymotionThumbnail){thumbImg='//www.dailymotion.com/thumbnail/video/'+isVideo.dailymotion[1];}else{thumbImg=thumb;}}}else{thumbImg=thumb;}thumbList+='<div data-vimeo-id="'+vimeoId+'" class="lg-thumb-item" style="width:'+_this.core.s.thumbWidth+'px; margin-right: '+_this.core.s.thumbMargin+'px"><img src="'+thumbImg+'" /></div>';vimeoId='';}if(_this.core.s.dynamic){for(var i=0;i<_this.core.s.dynamicEl.length;i++){getThumb(_this.core.s.dynamicEl[i].src,_this.core.s.dynamicEl[i].thumb,i);}}else{_this.core.$items.each(function(i){if(!_this.core.s.exThumbImage){getThumb($(this).attr('href')||$(this).attr('data-src'),$(this).find('img').attr('src'),i);}else{getThumb($(this).attr('href')||$(this).attr('data-src'),$(this).attr(_this.core.s.exThumbImage),i);}});}_this.core.$outer.find('.lg-thumb').html(thumbList);$thumb=_this.core.$outer.find('.lg-thumb-item');$thumb.each(function(){var $this=$(this);var vimeoVideoId=$this.attr('data-vimeo-id');if(vimeoVideoId){$.getJSON('http://www.vimeo.com/api/v2/video/'+vimeoVideoId+'.json?callback=?',{format:'json'},function(data){$this.find('img').attr('src',data[0][_this.core.s.vimeoThumbSize]);});}});$thumb.eq(_this.core.index).addClass('active');_this.core.$el.on('onBeforeSlide.lg.tm',function(){$thumb.removeClass('active');$thumb.eq(_this.core.index).addClass('active');});$thumb.on('click.lg touchend.lg',function(){var _$this=$(this);setTimeout(function(){if((_this.thumbClickable&&!_this.core.lgBusy)||!_this.core.doCss()){_this.core.index=_$this.index();_this.core.slide(_this.core.index,false,true);}},50);});_this.core.$el.on('onBeforeSlide.lg.tm',function(){_this.animateThumb(_this.core.index);});$(window).on('resize.lg.thumb orientationchange.lg.thumb',function(){setTimeout(function(){_this.animateThumb(_this.core.index);_this.thumbOuterWidth=_this.$thumbOuter.width();},200);});};Thumbnail.prototype.setTranslate=function(value){this.core.$outer.find('.lg-thumb').css({transform:'translate3d(-'+(value)+'px, 0px, 0px)'});};Thumbnail.prototype.animateThumb=function(index){var $thumb=this.core.$outer.find('.lg-thumb');if(this.core.s.animateThumb){var position;switch(this.core.s.currentPagerPosition){case'left':position=0;break;case'middle':position=(this.thumbOuterWidth/2)-(this.core.s.thumbWidth/2);break;case'right':position=this.thumbOuterWidth-this.core.s.thumbWidth;}this.left=((this.core.s.thumbWidth+this.core.s.thumbMargin)*index-1)-position;if(this.left>(this.thumbTotalWidth-this.thumbOuterWidth)){this.left=this.thumbTotalWidth-this.thumbOuterWidth;}if(this.left<0){this.left=0;}if(this.core.lGalleryOn){if(!$thumb.hasClass('on')){this.core.$outer.find('.lg-thumb').css('transition-duration',this.core.s.speed+'ms');}if(!this.core.doCss()){$thumb.animate({left:-this.left+'px'},this.core.s.speed);}}else{if(!this.core.doCss()){$thumb.css('left',-this.left+'px');}}this.setTranslate(this.left);}};Thumbnail.prototype.enableThumbDrag=function(){var _this=this;var startCoords=0;var endCoords=0;var isDraging=false;var isMoved=false;var tempLeft=0;_this.$thumbOuter.addClass('lg-grab');_this.core.$outer.find('.lg-thumb').on('mousedown.lg.thumb',function(e){if(_this.thumbTotalWidth>_this.thumbOuterWidth){e.preventDefault();startCoords=e.pageX;isDraging=true;_this.core.$outer.scrollLeft+=1;_this.core.$outer.scrollLeft-=1;_this.thumbClickable=false;_this.$thumbOuter.removeClass('lg-grab').addClass('lg-grabbing');}});$(window).on('mousemove.lg.thumb',function(e){if(isDraging){tempLeft=_this.left;isMoved=true;endCoords=e.pageX;_this.$thumbOuter.addClass('lg-dragging');tempLeft=tempLeft-(endCoords-startCoords);if(tempLeft>(_this.thumbTotalWidth-_this.thumbOuterWidth)){tempLeft=_this.thumbTotalWidth-_this.thumbOuterWidth;}if(tempLeft<0){tempLeft=0;}_this.setTranslate(tempLeft);}});$(window).on('mouseup.lg.thumb',function(){if(isMoved){isMoved=false;_this.$thumbOuter.removeClass('lg-dragging');_this.left=tempLeft;if(Math.abs(endCoords-startCoords)<_this.core.s.swipeThreshold){_this.thumbClickable=true;}}else{_this.thumbClickable=true;}if(isDraging){isDraging=false;_this.$thumbOuter.removeClass('lg-grabbing').addClass('lg-grab');}});};Thumbnail.prototype.enableThumbSwipe=function(){var _this=this;var startCoords=0;var endCoords=0;var isMoved=false;var tempLeft=0;_this.core.$outer.find('.lg-thumb').on('touchstart.lg',function(e){if(_this.thumbTotalWidth>_this.thumbOuterWidth){e.preventDefault();startCoords=e.originalEvent.targetTouches[0].pageX;_this.thumbClickable=false;}});_this.core.$outer.find('.lg-thumb').on('touchmove.lg',function(e){if(_this.thumbTotalWidth>_this.thumbOuterWidth){e.preventDefault();endCoords=e.originalEvent.targetTouches[0].pageX;isMoved=true;_this.$thumbOuter.addClass('lg-dragging');tempLeft=_this.left;tempLeft=tempLeft-(endCoords-startCoords);if(tempLeft>(_this.thumbTotalWidth-_this.thumbOuterWidth)){tempLeft=_this.thumbTotalWidth-_this.thumbOuterWidth;}if(tempLeft<0){tempLeft=0;}_this.setTranslate(tempLeft);}});_this.core.$outer.find('.lg-thumb').on('touchend.lg',function(){if(_this.thumbTotalWidth>_this.thumbOuterWidth){if(isMoved){isMoved=false;_this.$thumbOuter.removeClass('lg-dragging');if(Math.abs(endCoords-startCoords)<_this.core.s.swipeThreshold){_this.thumbClickable=true;}_this.left=tempLeft;}else{_this.thumbClickable=true;}}else{_this.thumbClickable=true;}});};Thumbnail.prototype.toogle=function(){var _this=this;if(_this.core.s.toogleThumb){_this.core.$outer.addClass('lg-can-toggle');_this.$thumbOuter.append('<span class="lg-toogle-thumb lg-icon"></span>');_this.core.$outer.find('.lg-toogle-thumb').on('click.lg',function(){_this.core.$outer.toggleClass('lg-thumb-open');});}};Thumbnail.prototype.thumbkeyPress=function(){var _this=this;$(window).on('keydown.lg.thumb',function(e){if(e.keyCode===38){e.preventDefault();_this.core.$outer.addClass('lg-thumb-open');}else if(e.keyCode===40){e.preventDefault();_this.core.$outer.removeClass('lg-thumb-open');}});};Thumbnail.prototype.destroy=function(){if(this.core.s.thumbnail&&this.core.$items.length>1){$(window).off('resize.lg.thumb orientationchange.lg.thumb keydown.lg.thumb');this.$thumbOuter.remove();this.core.$outer.removeClass('lg-has-thumb');}};$.fn.lightGallery.modules.Thumbnail=Thumbnail;})(jQuery,window,document);

/*lg-pagers.js*/

(function($,window,document,undefined){'use strict';var defaults={pager:false};var Pager=function(element){this.core=$(element).data('lightGallery');this.$el=$(element);this.core.s=$.extend({},defaults,this.core.s);if(this.core.s.pager&&this.core.$items.length>1){this.init();}return this;};Pager.prototype.init=function(){var _this=this;var pagerList='';var $pagerCont;var $pagerOuter;var timeout;_this.core.$outer.find('.lg').append('<div class="lg-pager-outer"></div>');if(_this.core.s.dynamic){for(var i=0;i<_this.core.s.dynamicEl.length;i++){pagerList+='<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="'+_this.core.s.dynamicEl[i].thumb+'" /></div></span>';}}else{_this.core.$items.each(function(){if(!_this.core.s.exThumbImage){pagerList+='<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="'+$(this).find('img').attr('src')+'" /></div></span>';}else{pagerList+='<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="'+$(this).attr(_this.core.s.exThumbImage)+'" /></div></span>';}});}$pagerOuter=_this.core.$outer.find('.lg-pager-outer');$pagerOuter.html(pagerList);$pagerCont=_this.core.$outer.find('.lg-pager-cont');$pagerCont.on('click.lg touchend.lg',function(){var _$this=$(this);_this.core.index=_$this.index();_this.core.slide(_this.core.index,false,false);});$pagerOuter.on('mouseover.lg',function(){clearTimeout(timeout);$pagerOuter.addClass('lg-pager-hover');});$pagerOuter.on('mouseout.lg',function(){timeout=setTimeout(function(){$pagerOuter.removeClass('lg-pager-hover');});});_this.core.$el.on('onBeforeSlide.lg.tm',function(e,prevIndex,index){$pagerCont.removeClass('lg-pager-active');$pagerCont.eq(index).addClass('lg-pager-active');});};Pager.prototype.destroy=function(){};$.fn.lightGallery.modules.pager=Pager;})(jQuery,window,document);

/*lg-Video.js*/

(function($,window,document,undefined){'use strict';var defaults={videoMaxWidth:'855px',youtubePlayerParams:false,vimeoPlayerParams:false,dailymotionPlayerParams:false,videojs:false};var Video=function(element){this.core=$(element).data('lightGallery');this.$el=$(element);this.core.s=$.extend({},defaults,this.core.s);this.videoLoaded=false;this.init();return this;};Video.prototype.init=function(){var _this=this;_this.core.$el.on('hasVideo.lg.tm',function(event,index,src,html){_this.core.$slide.eq(index).find('.lg-video').append(_this.loadVideo(src,'lg-object',true,index,html));if(html){if(_this.core.s.videojs){try{videojs(_this.core.$slide.eq(index).find('.lg-html5').get(0),{},function(){if(!_this.videoLoaded){this.play();}});}catch(e){console.error('Make sure you have included videojs');}}else{_this.core.$slide.eq(index).find('.lg-html5').get(0).play();}}});_this.core.$el.on('onAferAppendSlide.lg.tm',function(event,index){_this.core.$slide.eq(index).find('.lg-video-cont').css('max-width',_this.core.s.videoMaxWidth);_this.videoLoaded=true;});var loadOnClick=function($el){if($el.find('.lg-object').hasClass('lg-has-poster')){if(!$el.hasClass('lg-has-video')){$el.addClass('lg-video-palying lg-has-video');var _src;var _html;var _loadVideo=function(_src,_html){$el.find('.lg-video').append(_this.loadVideo(_src,'',false,_this.core.index,_html));if(_html){if(_this.core.s.videojs){try{videojs(_this.core.$slide.eq(_this.core.index).find('.lg-html5').get(0),{},function(){this.play();});}catch(e){console.error('Make sure you have included videojs');}}else{_this.core.$slide.eq(_this.core.index).find('.lg-html5').get(0).play();}}};if(_this.core.s.dynamic){_src=_this.core.s.dynamicEl[_this.core.index].src;_html=_this.core.s.dynamicEl[_this.core.index].html;_loadVideo(_src,_html);}else{_src=_this.core.$items.eq(_this.core.index).attr('href')||_this.core.$items.eq(_this.core.index).attr('data-src');_html=_this.core.$items.eq(_this.core.index).attr('data-html');_loadVideo(_src,_html);}var $tempImg=$el.find('.lg-object');$el.find('.lg-video').append($tempImg);if(!$el.find('.lg-video-object').hasClass('lg-html5')){$el.removeClass('lg-complete');$el.find('.lg-video-object').on('load.lg error.lg',function(){$el.addClass('lg-complete');});}}else{var youtubePlayer=$el.find('.lg-youtube').get(0);var vimeoPlayer=$el.find('.lg-vimeo').get(0);var dailymotionPlayer=$el.find('.lg-dailymotion').get(0);var html5Player=$el.find('.lg-html5').get(0);if(youtubePlayer){youtubePlayer.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}','*');}else if(vimeoPlayer){try{$f(vimeoPlayer).api('play');}catch(e){console.error('Make sure you have included froogaloop2 js');}}else if(dailymotionPlayer){dailymotionPlayer.contentWindow.postMessage('play','*');}else if(html5Player){if(_this.core.s.videojs){try{videojs(html5Player).play();}catch(e){console.error('Make sure you have included videojs');}}else{html5Player.play();}}$el.addClass('lg-video-palying');}}};if(_this.core.doCss()&&_this.core.$items.length>1&&((_this.core.s.enableSwipe&&_this.core.isTouch)||(_this.core.s.enableDrag&&!_this.core.isTouch))){_this.core.$el.on('onSlideClick.lg.tm',function(){var $el=_this.core.$slide.eq(_this.core.index);loadOnClick($el);});}else{_this.core.$slide.on('click.lg',function(){loadOnClick($(this));});}_this.core.$el.on('onBeforeSlide.lg.tm',function(event,prevIndex){var $videoSlide=_this.core.$slide.eq(prevIndex);var youtubePlayer=$videoSlide.find('.lg-youtube').get(0);var vimeoPlayer=$videoSlide.find('.lg-vimeo').get(0);var dailymotionPlayer=$videoSlide.find('.lg-dailymotion').get(0);var html5Player=$videoSlide.find('.lg-html5').get(0);if(youtubePlayer){youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}','*');}else if(vimeoPlayer){try{$f(vimeoPlayer).api('pause');}catch(e){console.error('Make sure you have included froogaloop2 js');}}else if(dailymotionPlayer){dailymotionPlayer.contentWindow.postMessage('pause','*');}else if(html5Player){if(_this.core.s.videojs){try{videojs(html5Player).pause();}catch(e){console.error('Make sure you have included videojs');}}else{html5Player.pause();}}});_this.core.$el.on('onAfterSlide.lg.tm',function(event,prevIndex){_this.core.$slide.eq(prevIndex).removeClass('lg-video-palying');});};Video.prototype.loadVideo=function(src,addClass,noposter,index,html){var video='';var autoplay=1;var a='';var isVideo=this.core.isVideo(src,index)||{};if(noposter){if(this.videoLoaded){autoplay=0;}else{autoplay=1;}}if(isVideo.youtube){a='?wmode=opaque&autoplay='+autoplay+'&enablejsapi=1';if(this.core.s.youtubePlayerParams){a=a+'&'+$.param(this.core.s.youtubePlayerParams);}video='<iframe class="lg-video-object lg-youtube '+addClass+'" width="560" height="315" src="//www.youtube.com/embed/'+isVideo.youtube[1]+a+'" frameborder="0" allowfullscreen></iframe>';}else if(isVideo.vimeo){a='?autoplay='+autoplay+'&api=1';if(this.core.s.vimeoPlayerParams){a=a+'&'+$.param(this.core.s.vimeoPlayerParams);}video='<iframe class="lg-video-object lg-vimeo '+addClass+'" width="560" height="315"  src="http://player.vimeo.com/video/'+isVideo.vimeo[1]+a+'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';}else if(isVideo.dailymotion){a='?wmode=opaque&autoplay='+autoplay+'&api=postMessage';if(this.core.s.dailymotionPlayerParams){a=a+'&'+$.param(this.core.s.dailymotionPlayerParams);}video='<iframe class="lg-video-object lg-dailymotion '+addClass+'" width="560" height="315" src="//www.dailymotion.com/embed/video/'+isVideo.dailymotion[1]+a+'" frameborder="0" allowfullscreen></iframe>';}else if(isVideo.html5){var fL=html.substring(0,1);if(fL==='.'||fL==='#'){html=$(html).html();}video=html;}return video;};Video.prototype.destroy=function(){this.videoLoaded=false;};$.fn.lightGallery.modules.video=Video;})(jQuery,window,document);

/*lg-zoom.js*/

(function($,window,document,undefined){'use strict';var defaults={scale:1,zoom:true,enableZoomAfter:300};var Zoom=function(element){this.core=$(element).data('lightGallery');this.core.s=$.extend({},defaults,this.core.s);if(this.core.s.zoom&&this.core.doCss()){this.init();this.zoomabletimeout=false;this.pageX=$(window).width()/2;this.pageY=($(window).height()/2)+$(window).scrollTop();}return this;};Zoom.prototype.init=function(){var _this=this;var zoomIcons='<span id="lg-zoom-in" class="lg-icon"></span><span id="lg-zoom-out" class="lg-icon"></span>';this.core.$outer.find('.lg-toolbar').append(zoomIcons);_this.core.$el.on('onSlideItemLoad.lg.tm.zoom',function(event,index,delay){var _speed=_this.core.s.enableZoomAfter+delay;if($('body').hasClass('lg-from-hash')&&delay){_speed=0;}else{$('body').removeClass('lg-from-hash');}_this.zoomabletimeout=setTimeout(function(){_this.core.$slide.eq(index).addClass('lg-zoomable');},_speed+30);});var scale=1;var zoom=function(scaleVal){var $image=_this.core.$outer.find('.lg-current .lg-image');var _x;var _y;var offsetX=($(window).width()-$image.width())/2;var offsetY=(($(window).height()-$image.height())/2)+$(window).scrollTop();_x=_this.pageX-offsetX;_y=_this.pageY-offsetY;var x=(scaleVal-1)*(_x);var y=(scaleVal-1)*(_y);$image.css('transform','scale3d('+scaleVal+', '+scaleVal+', 1)').attr('data-scale',scaleVal);$image.parent().css('transform','translate3d(-'+x+'px, -'+y+'px, 0)').attr('data-x',x).attr('data-y',y);};var callScale=function(){if(scale>1){_this.core.$outer.addClass('lg-zoomed');}else{_this.resetZoom();}if(scale<1){scale=1;}zoom(scale);};_this.core.$el.on('onAferAppendSlide.lg.tm.zoom',function(event,index){var $image=_this.core.$slide.eq(index).find('.lg-image');$image.dblclick(function(event){var w=$image.width();var nw=_this.core.$items.eq(index).attr('data-width')||$image[0].naturalWidth||w;var _scale;if(_this.core.$outer.hasClass('lg-zoomed')){scale=1;}else{if(nw>w){_scale=nw/w;scale=_scale||2;}}_this.pageX=event.pageX;_this.pageY=event.pageY;callScale();setTimeout(function(){_this.core.$outer.removeClass('lg-grabbing').addClass('lg-grab');},10);});});$(window).on('resize.lg.zoom scroll.lg.zoom orientationchange.lg.zoom',function(){_this.pageX=$(window).width()/2;_this.pageY=($(window).height()/2)+$(window).scrollTop();zoom(scale);});$('#lg-zoom-out').on('click.lg',function(){if(_this.core.$outer.find('.lg-current .lg-image').length){scale-=_this.core.s.scale;callScale();}});$('#lg-zoom-in').on('click.lg',function(){if(_this.core.$outer.find('.lg-current .lg-image').length){scale+=_this.core.s.scale;callScale();}});_this.core.$el.on('onBeforeSlide.lg.tm',function(){_this.resetZoom();});if(!_this.core.isTouch){_this.zoomDrag();}if(_this.core.isTouch){_this.zoomSwipe();}};Zoom.prototype.resetZoom=function(){this.core.$outer.removeClass('lg-zoomed');this.core.$slide.find('.lg-img-wrap').removeAttr('style data-x data-y');this.core.$slide.find('.lg-image').removeAttr('style data-scale');this.pageX=$(window).width()/2;this.pageY=($(window).height()/2)+$(window).scrollTop();};Zoom.prototype.zoomSwipe=function(){var _this=this;var startCoords={};var endCoords={};var isMoved=false;var allowX=false;var allowY=false;_this.core.$slide.on('touchstart.lg',function(e){if(_this.core.$outer.hasClass('lg-zoomed')){var $image=_this.core.$slide.eq(_this.core.index).find('.lg-object');allowY=$image.outerHeight()*$image.attr('data-scale')>_this.core.$outer.find('.lg').height();allowX=$image.outerWidth()*$image.attr('data-scale')>_this.core.$outer.find('.lg').width();if((allowX||allowY)){e.preventDefault();startCoords={x:e.originalEvent.targetTouches[0].pageX,y:e.originalEvent.targetTouches[0].pageY};}}});_this.core.$slide.on('touchmove.lg',function(e){if(_this.core.$outer.hasClass('lg-zoomed')){var _$el=_this.core.$slide.eq(_this.core.index).find('.lg-img-wrap');var distanceX;var distanceY;e.preventDefault();isMoved=true;endCoords=e.originalEvent.targetTouches[0].pageX;endCoords={x:e.originalEvent.targetTouches[0].pageX,y:e.originalEvent.targetTouches[0].pageY};_this.core.$outer.addClass('lg-zoom-dragging');if(allowY){distanceY=(-Math.abs(_$el.attr('data-y')))+(endCoords.y-startCoords.y);}else{distanceY=-Math.abs(_$el.attr('data-y'));}if(allowX){distanceX=(-Math.abs(_$el.attr('data-x')))+(endCoords.x-startCoords.x);}else{distanceX=-Math.abs(_$el.attr('data-x'));}_$el.css('transform','translate3d('+distanceX+'px, '+distanceY+'px, 0)');}});_this.core.$slide.on('touchend.lg',function(){if(_this.core.$outer.hasClass('lg-zoomed')){if(isMoved){isMoved=false;_this.core.$outer.removeClass('lg-zoom-dragging');_this.touchendZoom(startCoords,endCoords,allowX,allowY);}}});};Zoom.prototype.zoomDrag=function(){var _this=this;var startCoords={};var endCoords={};var isDraging=false;var isMoved=false;var allowX=false;var allowY=false;_this.core.$slide.on('mousedown.lg.zoom',function(e){var $image=_this.core.$slide.eq(_this.core.index).find('.lg-object');allowY=$image.outerHeight()*$image.attr('data-scale')>_this.core.$outer.find('.lg').height();allowX=$image.outerWidth()*$image.attr('data-scale')>_this.core.$outer.find('.lg').width();if(_this.core.$outer.hasClass('lg-zoomed')){if($(e.target).hasClass('lg-object')&&(allowX||allowY)){e.preventDefault();startCoords={x:e.pageX,y:e.pageY};isDraging=true;_this.core.$outer.scrollLeft+=1;_this.core.$outer.scrollLeft-=1;_this.core.$outer.removeClass('lg-grab').addClass('lg-grabbing');}}});$(window).on('mousemove.lg.zoom',function(e){if(isDraging){var _$el=_this.core.$slide.eq(_this.core.index).find('.lg-img-wrap');var distanceX;var distanceY;isMoved=true;endCoords={x:e.pageX,y:e.pageY};_this.core.$outer.addClass('lg-zoom-dragging');if(allowY){distanceY=(-Math.abs(_$el.attr('data-y')))+(endCoords.y-startCoords.y);}else{distanceY=-Math.abs(_$el.attr('data-y'));}if(allowX){distanceX=(-Math.abs(_$el.attr('data-x')))+(endCoords.x-startCoords.x);}else{distanceX=-Math.abs(_$el.attr('data-x'));}_$el.css('transform','translate3d('+distanceX+'px, '+distanceY+'px, 0)');}});$(window).on('mouseup.lg.zoom',function(e){if(isDraging){isDraging=false;_this.core.$outer.removeClass('lg-zoom-dragging');if(isMoved&&((startCoords.x!==endCoords.x)||(startCoords.y!==endCoords.y))){endCoords={x:e.pageX,y:e.pageY};_this.touchendZoom(startCoords,endCoords,allowX,allowY);}isMoved=false;}_this.core.$outer.removeClass('lg-grabbing').addClass('lg-grab');});};Zoom.prototype.touchendZoom=function(startCoords,endCoords,allowX,allowY){var _this=this;var _$el=_this.core.$slide.eq(_this.core.index).find('.lg-img-wrap');var $image=_this.core.$slide.eq(_this.core.index).find('.lg-object');var distanceX=(-Math.abs(_$el.attr('data-x')))+(endCoords.x-startCoords.x);var distanceY=(-Math.abs(_$el.attr('data-y')))+(endCoords.y-startCoords.y);var minY=(_this.core.$outer.find('.lg').height()-$image.outerHeight())/2;var maxY=Math.abs(($image.outerHeight()*Math.abs($image.attr('data-scale')))-_this.core.$outer.find('.lg').height()+minY);var minX=(_this.core.$outer.find('.lg').width()-$image.outerWidth())/2;var maxX=Math.abs(($image.outerWidth()*Math.abs($image.attr('data-scale')))-_this.core.$outer.find('.lg').width()+minX);if(allowY){if(distanceY<=-maxY){distanceY=-maxY;}else if(distanceY>=-minY){distanceY=-minY;}}if(allowX){if(distanceX<=-maxX){distanceX=-maxX;}else if(distanceX>=-minX){distanceX=-minX;}}if(allowY){_$el.attr('data-y',Math.abs(distanceY));}else{distanceY=-Math.abs(_$el.attr('data-y'));}if(allowX){_$el.attr('data-x',Math.abs(distanceX));}else{distanceX=-Math.abs(_$el.attr('data-x'));}_$el.css('transform','translate3d('+distanceX+'px, '+distanceY+'px, 0)');};Zoom.prototype.destroy=function(){var _this=this;_this.core.$el.off('.lg.zoom');$(window).off('.lg.zoom');_this.core.$slide.off('.lg.zoom');_this.core.$el.off('.lg.tm.zoom');_this.resetZoom();clearTimeout(_this.zoomabletimeout);_this.zoomabletimeout=false;};$.fn.lightGallery.modules.zoom=Zoom;})(jQuery,window,document);
