!function(a,b,c){function Y(c,d,e){var g=b.createElement(c);return d&&(g.id=f+d),e&&(g.style.cssText=e),a(g)}function Z(){return c.innerHeight?c.innerHeight:a(c).height()}function $(b,c){c!==Object(c)&&(c={}),this.cache={},this.el=b,this.value=function(b){var e;return void 0===this.cache[b]&&(e=a(this.el).attr("data-cbox-"+b),void 0!==e?this.cache[b]=e:void 0!==c[b]?this.cache[b]=c[b]:void 0!==d[b]&&(this.cache[b]=d[b])),this.cache[b]},this.get=function(b){var c=this.value(b);return a.isFunction(c)?c.call(this.el,this):c}}function _(a){var b=v.length,c=(N+a)%b;return c<0?b+c:c}function ab(a,b){return Math.round((/%/.test(a)?("x"===b?w.width():Z())/100:1)*parseInt(a,10))}function bb(a,b){return a.get("photo")||a.get("photoRegex").test(b)}function cb(a,b){return a.get("retinaUrl")&&c.devicePixelRatio>1?b.replace(a.get("photoRegex"),a.get("retinaSuffix")):b}function db(a){"contains"in o[0]&&!o[0].contains(a.target)&&a.target!==n[0]&&(a.stopPropagation(),o.focus())}function eb(a){eb.str!==a&&(o.add(n).removeClass(eb.str).addClass(a),eb.str=a)}function fb(b){N=0,b&&b!==!1&&"nofollow"!==b?(v=a("."+g).filter(function(){var c=a.data(this,e),d=new $(this,c);return d.get("rel")===b}),N=v.index(I.el),-1===N&&(v=v.add(I.el),N=v.length-1)):v=a(I.el)}function gb(c){a(b).trigger(c),H.triggerHandler(c)}function ib(c){var d;if(!R){if(d=a(c).data(e),I=new $(c,d),fb(I.get("rel")),!P){P=Q=!0,eb(I.get("className")),o.css({visibility:"hidden",display:"block",opacity:""}),x=Y(U,"LoadedContent","width:0; height:0; overflow:hidden; visibility:hidden"),q.css({width:"",height:""}).append(x),J=r.height()+u.height()+q.outerHeight(!0)-q.height(),K=s.width()+t.width()+q.outerWidth(!0)-q.width(),L=x.outerHeight(!0),M=x.outerWidth(!0);var f=ab(I.get("initialWidth"),"x"),g=ab(I.get("initialHeight"),"y"),i=I.get("maxWidth"),j=I.get("maxHeight");I.w=Math.max((i!==!1?Math.min(f,ab(i,"x")):f)-M-K,0),I.h=Math.max((j!==!1?Math.min(g,ab(j,"y")):g)-L-J,0),x.css({width:"",height:I.h}),T.position(),gb(h),I.get("onOpen"),G.add(A).hide(),o.focus(),I.get("trapFocus")&&b.addEventListener&&(b.addEventListener("focus",db,!0),H.one(l,function(){b.removeEventListener("focus",db,!0)})),I.get("returnFocus")&&H.one(l,function(){a(I.el).focus()})}var k=parseFloat(I.get("opacity"));n.css({opacity:k===k?k:"",cursor:I.get("overlayClose")?"pointer":"",visibility:"visible"}).show(),I.get("closeButton")?F.html(I.get("close")).appendTo(q):F.appendTo("<div/>"),lb()}}function jb(){o||(X=!1,w=a(c),o=Y(U).attr({id:e,"class":a.support.opacity===!1?f+"IE":"",role:"dialog",tabindex:"-1"}).hide(),n=Y(U,"Overlay").hide(),z=a([Y(U,"LoadingOverlay")[0],Y(U,"LoadingGraphic")[0]]),p=Y(U,"Wrapper"),q=Y(U,"Content").append(A=Y(U,"Title"),B=Y(U,"Current"),E=a('<button type="button"/>').attr({id:f+"Previous"}),D=a('<button type="button"/>').attr({id:f+"Next"}),C=a('<button type="button"/>').attr({id:f+"Slideshow"}),z),F=a('<button type="button"/>').attr({id:f+"Close"}),p.append(Y(U).append(Y(U,"TopLeft"),r=Y(U,"TopCenter"),Y(U,"TopRight")),Y(U,!1,"clear:left").append(s=Y(U,"MiddleLeft"),q,t=Y(U,"MiddleRight")),Y(U,!1,"clear:left").append(Y(U,"BottomLeft"),u=Y(U,"BottomCenter"),Y(U,"BottomRight"))).find("div div").css({"float":"left"}),y=Y(U,!1,"position:absolute; width:9999px; visibility:hidden; display:none; max-width:none;"),G=D.add(E).add(B).add(C)),b.body&&!o.parent().length&&a(b.body).append(n,o.append(p,y))}function kb(){function c(a){a.which>1||a.shiftKey||a.altKey||a.metaKey||a.ctrlKey||(a.preventDefault(),ib(this))}return o?(X||(X=!0,D.click(function(){T.next()}),E.click(function(){T.prev()}),F.click(function(){T.close()}),n.click(function(){I.get("overlayClose")&&T.close()}),a(b).bind("keydown."+f,function(a){var b=a.keyCode;P&&I.get("escKey")&&27===b&&(a.preventDefault(),T.close()),P&&I.get("arrowKey")&&v[1]&&!a.altKey&&(37===b?(a.preventDefault(),E.click()):39===b&&(a.preventDefault(),D.click()))}),a.isFunction(a.fn.on)?a(b).on("click."+f,"."+g,c):a("."+g).live("click."+f,c)),!0):!1}function lb(){var b,d,g,e=T.prep,h=++V;if(Q=!0,O=!1,gb(m),gb(i),I.get("onLoad"),I.h=I.get("height")?ab(I.get("height"),"y")-L-J:I.get("innerHeight")&&ab(I.get("innerHeight"),"y"),I.w=I.get("width")?ab(I.get("width"),"x")-M-K:I.get("innerWidth")&&ab(I.get("innerWidth"),"x"),I.mw=I.w,I.mh=I.h,I.get("maxWidth")&&(I.mw=ab(I.get("maxWidth"),"x")-M-K,I.mw=I.w&&I.w<I.mw?I.w:I.mw),I.get("maxHeight")&&(I.mh=ab(I.get("maxHeight"),"y")-L-J,I.mh=I.h&&I.h<I.mh?I.h:I.mh),b=I.get("href"),S=setTimeout(function(){z.show()},100),I.get("inline")){var j=a(b).eq(0);g=a("<div>").hide().insertBefore(j),H.one(m,function(){g.replaceWith(j)}),e(j)}else I.get("iframe")?e(" "):I.get("html")?e(I.get("html")):bb(I,b)?(b=cb(I,b),O=I.get("createImg"),a(O).addClass(f+"Photo").bind("error."+f,function(){e(Y(U,"Error").html(I.get("imgError")))}).one("load",function(){h===V&&setTimeout(function(){var b;I.get("retinaImage")&&c.devicePixelRatio>1&&(O.height=O.height/c.devicePixelRatio,O.width=O.width/c.devicePixelRatio),I.get("scalePhotos")&&(d=function(){O.height-=O.height*b,O.width-=O.width*b},I.mw&&O.width>I.mw&&(b=(O.width-I.mw)/O.width,d()),I.mh&&O.height>I.mh&&(b=(O.height-I.mh)/O.height,d())),I.h&&(O.style.marginTop=Math.max(I.mh-O.height,0)/2+"px"),v[1]&&(I.get("loop")||v[N+1])&&(O.style.cursor="pointer",a(O).bind("click."+f,function(){T.next()})),O.style.width=O.width+"px",O.style.height=O.height+"px",e(O)},1)}),O.src=b):b&&y.load(b,I.get("data"),function(b,c){h===V&&e("error"===c?Y(U,"Error").html(I.get("xhrError")):a(this).contents())})}var n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,I,J,K,L,M,N,O,P,Q,R,S,T,X,d={html:!1,photo:!1,iframe:!1,inline:!1,transition:"elastic",speed:300,fadeOut:300,width:!1,initialWidth:"600",innerWidth:!1,maxWidth:!1,height:!1,initialHeight:"450",innerHeight:!1,maxHeight:!1,scalePhotos:!0,scrolling:!0,opacity:.9,preloading:!0,className:!1,overlayClose:!0,escKey:!0,arrowKey:!0,top:!1,bottom:!1,left:!1,right:!1,fixed:!1,data:void 0,closeButton:!0,fastIframe:!0,open:!1,reposition:!0,loop:!0,slideshow:!1,slideshowAuto:!0,slideshowSpeed:2500,slideshowStart:"start slideshow",slideshowStop:"stop slideshow",photoRegex:/\.(gif|png|jp(e|g|eg)|bmp|ico|webp|jxr|svg)((#|\?).*)?$/i,retinaImage:!1,retinaUrl:!1,retinaSuffix:"@2x.$1",current:"image {current} of {total}",previous:"previous",next:"next",close:"close",xhrError:"This content failed to load.",imgError:"This image failed to load.",returnFocus:!0,trapFocus:!0,onOpen:!1,onLoad:!1,onComplete:!1,onCleanup:!1,onClosed:!1,rel:function(){return this.rel},href:function(){return a(this).attr("href")},title:function(){return this.title},createImg:function(){var b=new Image,c=a(this).data("cbox-img-attrs");return"object"===typeof c&&a.each(c,function(a,c){b[a]=c}),b},createIframe:function(){var c=b.createElement("iframe"),d=a(this).data("cbox-iframe-attrs");return"object"===typeof d&&a.each(d,function(a,b){c[a]=b}),"frameBorder"in c&&(c.frameBorder=0),"allowTransparency"in c&&(c.allowTransparency="true"),c.name=(new Date).getTime(),c.allowFullscreen=!0,c}},e="colorbox",f="cbox",g=f+"Element",h=f+"_open",i=f+"_load",j=f+"_complete",k=f+"_cleanup",l=f+"_closed",m=f+"_purge",H=a("<a/>"),U="div",V=0,W={},hb=function(){function e(){clearTimeout(d)}function g(){(I.get("loop")||v[N+1])&&(e(),d=setTimeout(T.next,I.get("slideshowSpeed")))}function h(){C.html(I.get("slideshowStop")).unbind(c).one(c,l),H.bind(j,g).bind(i,e),o.removeClass(b+"off").addClass(b+"on")}function l(){e(),H.unbind(j,g).unbind(i,e),C.html(I.get("slideshowStart")).unbind(c).one(c,function(){T.next(),h()}),o.removeClass(b+"on").addClass(b+"off")}function m(){a=!1,C.hide(),e(),H.unbind(j,g).unbind(i,e),o.removeClass(b+"off "+b+"on")}var a,d,b=f+"Slideshow_",c="click."+f;return function(){a?I.get("slideshow")||(H.unbind(k,m),m()):I.get("slideshow")&&v[1]&&(a=!0,H.one(k,m),I.get("slideshowAuto")?h():l(),C.show())}}();a[e]||(a(jb),T=a.fn[e]=a[e]=function(b,c){var d,f=this;return b=b||{},a.isFunction(f)&&(f=a("<a/>"),b.open=!0),f[0]?(jb(),kb()&&(c&&(b.onComplete=c),f.each(function(){var c=a.data(this,e)||{};a.data(this,e,a.extend(c,b))}).addClass(g),d=new $(f[0],b),d.get("open")&&ib(f[0])),f):f},T.position=function(b,c){function k(){r[0].style.width=u[0].style.width=q[0].style.width=parseInt(o[0].style.width,10)-K+"px",q[0].style.height=s[0].style.height=t[0].style.height=parseInt(o[0].style.height,10)-J+"px"}var d,i,j,e=0,g=0,h=o.offset();if(w.unbind("resize."+f),o.css({top:-9e4,left:-9e4}),i=w.scrollTop(),j=w.scrollLeft(),I.get("fixed")?(h.top-=i,h.left-=j,o.css({position:"fixed"})):(e=i,g=j,o.css({position:"absolute"})),g+=I.get("right")!==!1?Math.max(w.width()-I.w-M-K-ab(I.get("right"),"x"),0):I.get("left")!==!1?ab(I.get("left"),"x"):Math.round(Math.max(w.width()-I.w-M-K,0)/2),e+=I.get("bottom")!==!1?Math.max(Z()-I.h-L-J-ab(I.get("bottom"),"y"),0):I.get("top")!==!1?ab(I.get("top"),"y"):Math.round(Math.max(Z()-I.h-L-J,0)/2),o.css({top:h.top,left:h.left,visibility:"visible"}),p[0].style.width=p[0].style.height="9999px",d={width:I.w+M+K,height:I.h+L+J,top:e,left:g},b){var l=0;a.each(d,function(a){return d[a]!==W[a]?void(l=b):void 0}),b=l}W=d,b||o.css(d),o.dequeue().animate(d,{duration:b||0,complete:function(){k(),Q=!1,p[0].style.width=I.w+M+K+"px",p[0].style.height=I.h+L+J+"px",I.get("reposition")&&setTimeout(function(){w.bind("resize."+f,T.position)},1),a.isFunction(c)&&c()},step:k})},T.resize=function(a){var b;P&&(a=a||{},a.width&&(I.w=ab(a.width,"x")-M-K),a.innerWidth&&(I.w=ab(a.innerWidth,"x")),x.css({width:I.w}),a.height&&(I.h=ab(a.height,"y")-L-J),a.innerHeight&&(I.h=ab(a.innerHeight,"y")),a.innerHeight||a.height||(b=x.scrollTop(),x.css({height:"auto"}),I.h=x.height()),x.css({height:I.h}),b&&x.scrollTop(b),T.position("none"===I.get("transition")?0:I.get("speed")))},T.prep=function(c){function h(){return I.w=I.w||x.width(),I.w=I.mw&&I.mw<I.w?I.mw:I.w,I.w}function i(){return I.h=I.h||x.height(),I.h=I.mh&&I.mh<I.h?I.mh:I.h,I.h}if(P){var d,g="none"===I.get("transition")?0:I.get("speed");x.remove(),x=Y(U,"LoadedContent").append(c),x.hide().appendTo(y.show()).css({width:h(),overflow:I.get("scrolling")?"auto":"hidden"}).css({height:i()}).prependTo(q),y.hide(),a(O).css({"float":"none"}),eb(I.get("className")),d=function(){function i(){a.support.opacity===!1&&o[0].style.removeAttribute("filter")}var d,h,c=v.length;P&&(h=function(){clearTimeout(S),z.hide(),gb(j),I.get("onComplete")},A.html(I.get("title")).show(),x.show(),c>1?("string"===typeof I.get("current")&&B.html(I.get("current").replace("{current}",N+1).replace("{total}",c)).show(),D[I.get("loop")||N<c-1?"show":"hide"]().html(I.get("next")),E[I.get("loop")||N?"show":"hide"]().html(I.get("previous")),hb(),I.get("preloading")&&a.each([_(-1),_(1)],function(){var c,d=v[this],f=new $(d,a.data(d,e)),g=f.get("href");g&&bb(f,g)&&(g=cb(f,g),c=b.createElement("img"),c.src=g)})):G.hide(),I.get("iframe")?(d=I.get("createIframe"),I.get("scrolling")||(d.scrolling="no"),a(d).attr({src:I.get("href"),"class":f+"Iframe"}).one("load",h).appendTo(x),H.one(m,function(){d.src="//about:blank"}),I.get("fastIframe")&&a(d).trigger("load")):h(),"fade"===I.get("transition")?o.fadeTo(g,1,i):i())},"fade"===I.get("transition")?o.fadeTo(g,0,function(){T.position(0,d)}):T.position(g,d)}},T.next=function(){!Q&&v[1]&&(I.get("loop")||v[N+1])&&(N=_(1),ib(v[N]))},T.prev=function(){!Q&&v[1]&&(I.get("loop")||N)&&(N=_(-1),ib(v[N]))},T.close=function(){P&&!R&&(R=!0,P=!1,gb(k),I.get("onCleanup"),w.unbind("."+f),n.fadeTo(I.get("fadeOut")||0,0),o.stop().fadeTo(I.get("fadeOut")||0,0,function(){o.hide(),n.hide(),gb(m),x.remove(),setTimeout(function(){R=!1,gb(l),I.get("onClosed")},1)}))},T.remove=function(){o&&(o.stop(),a[e].close(),o.stop(!1,!0).remove(),n.remove(),R=!1,o=null,a("."+g).removeData(e).removeClass(g),a(b).unbind("click."+f).unbind("keydown."+f))},T.element=function(){return a(I.el)},T.settings=d)}(jQuery,document,window);