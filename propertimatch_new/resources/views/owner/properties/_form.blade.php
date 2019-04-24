 <link rel="stylesheet" href="https://cssgram-cssgram.netdna-ssl.com/cssgram.min.css">
<style type="text/css">
 .container {
  width: 400px;
  position: relative;
  font-family: 'Open Sans';
  font-size: 14px;
  margin:150px auto;
}

.container p {
  line-height: 12px;
  line-height: 0px;
  height: 0px;
  margin: 10px;
  color: #bbb
}

.action {
  width: 400px;
  height: 30px;
  margin: 10px 0;
}

.cropped {
  position: absolute;
  right: -230px;
  top: 0;
  width: 200px;
  border: 1px #ddd solid;
  height: 460px;
  padding: 4px;
  box-shadow: 0px 0px 12px #ddd;
  text-align: center;
}

.imageBox {
  position: relative;
  height: 250px;
  width: 400px;
  border: 1px solid #aaa;
  background: #fff;
  overflow: hidden;
  background-repeat: no-repeat;
  cursor: move;
  box-shadow: 4px 4px 12px #B0B0B0;
}

.imageBox .thumbBox {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 200px;
  height: 200px;
  margin-top: -100px;
  margin-left: -100px;
  box-sizing: border-box;
  border: 1px solid rgb(102, 102, 102);
  box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
  background: none repeat scroll 0% 0% transparent;
}

.imageBox .spinner {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  text-align: center;
  line-height: 400px;
  background: rgba(0,0,0,0.7);
}

.Btnsty_peyton {
  float: right;
  width: 66px;
  display: inline-block;
  margin-bottom: 10px;
  height: 57px;
  line-height: 57px;
  font-size: 20px;
  color: #FFFFFF;
  margin: 0px 2px;
  background-color: #f38e81;
  border-radius: 3px;
  text-decoration: none;
  cursor: pointer;
  box-shadow: 0px 0px 5px #B0B0B0;
  border: 0px #fff solid;
}

/*选择文件上传*/

.new-contentarea {
  width: 165px;
  overflow: hidden;
  margin: 0 auto;
  position: relative;
  float: left;
}

.new-contentarea label {
  width: 100%;
  height: 100%;
  display: block;
}

.new-contentarea input[type=file] {
  width: 188px;
  height: 60px;
  background: #333;
  margin: 0 auto;
  position: absolute;
  right: 50%;
  margin-right: -94px;
  top: 0;
  right/*\**/: 0px\9;
  margin-right/*\**/: 0px\9;
  width/*\**/: 10px\9;
  opacity: 0;
  filter: alpha(opacity=0);
  z-index: 2;
}

a.upload-img {
  width: 165px;
  display: inline-block;
  margin-bottom: 10px;
  height: 57px;
  line-height: 57px;
  font-size: 20px;
  color: #FFFFFF;
  background-color: #f38e81;
  border-radius: 3px;
  text-decoration: none;
  cursor: pointer;
  border: 0px #fff solid;
  box-shadow: 0px 0px 5px #B0B0B0;
}

a.upload-img:hover { background-color: #ec7e70; }

.tc { text-align: center; }
#visbleCanvas {
  position: absolute;
  top: 0;
  left: 0;
}
.thumbBox {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 200px;
  height: 200px;
  margin-top: -100px;
  margin-left: -100px;
  box-sizing: border-box;
  border: 1px solid #666666;
  box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
  background: none repeat scroll 0% 0% transparent;
}

</style>
<script type="text/javascript">
  (function(factory){
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else {
        factory(jQuery);
    }
}(function($){
        
    function BoxLayout(obj){  //盒模型
        
        this.x = obj.offset().left; //视口左边距
        this.y = obj.offset().top; //视口上边距
        this.width = obj.width(); 
        this.height = obj.height();
        this.left = obj.position().left; //相对parent左边距
        this.top = obj.position().top; //相对parent上边距
    }
    var vmousedown = "mousedown",
        vmousemove = "mousemove", 
        vmouseup = "mouseup";
    if("ontouchend" in document){
        vmousedown = "touchstart";
        vmousemove = "touchmove";
        vmouseup = "touchend";
    }
    /**
     * CanvasCrop canvas剪切图片插件
     * @param {
     *     opts: {
     *       limitOver: 初始图片大小( 0: 不限制;1: 以外容器为初始参照物,2: 以内部切图框为初始参照物)
     *     }
     *     el: 剪切插件对象,
     *     rot: 旋转角度,
     *     ratio: 放大/缩小倍数,
     *     innerRatio: 内部缩放倍数(图片过大是缩小canvas),
     *     visbleCanvas: 作为上传图片的canvas,
     *     visbleContext: 作为上传图片的context("2d"),
     *     drawArgument: 绘制背景canvas(visbleCanvas)参数,
     *     clipArgument: 生成剪切后图片参数对象,
     * }
     */
    
    $.CanvasCrop = function(options){
        
        var opts = $.extend({},{
                limitOver: 1,
                isMoveOver: false
            },options),
            el = $(options.cropBox)||$(".cropBox"),
            rot = 0,
            ratio = 1,
            innerRatio = 1,
            warpBox = new BoxLayout(el),
            thumb = options.thumbBox? $(options.thumbBox) : el.find(".thumbBox"),
            thumbBox = new BoxLayout(thumb),
            ImgSrc = options.imgSrc,
            img = new Image(),
            drawArgument = {},
            clipArgument = {
                dx : thumbBox.x - warpBox.x,
                dy : thumbBox.y - warpBox.y,
            },
            visbleCanvas,visbleContext,
            visbleCanvasBox = {
                left: 0,
                top: 0
            },
            CanvasCropInit = function(){
                if(ImgSrc){
                    canvasInit();
                    img.src = ImgSrc;
                    //thumbBoxInit();
                    
                    el.off(".CropDown").on(vmousedown+".CropDown",backgroudMove);
                }else{
                    throw "image src is not defined";
                }
                
            },
            canvasInit = function(){
                img.onload = function(){
                    visbleCanvas = document.createElement("canvas");
                    limitOver();
                    getScale();
                    visbleCanvas.id="visbleCanvas";
                    visbleCanvas.style.position = "absolute";
                    visbleContext = visbleCanvas.getContext("2d");
                    drawImage();
                    setPosition({x:(warpBox.width-visbleCanvas.width)/2,y:(warpBox.height-visbleCanvas.height)/2});
                    el.find("#visbleCanvas").remove();
                    el.prepend(visbleCanvas);
                    img.onload = img.onerror = null;
                }
                img.onerror = function(){
                }
            },
            limitOver = function(){
                var w = img.width,
                    h = img.height,
                    imgRatio = w/h;
                if(imgRatio<1){
                    if(opts.limitOver == 1){
                        h = warpBox.height;
                    }else if(opts.limitOver == 2){
                        w = thumbBox.width;
                        h = w/imgRatio;
                    }
                }else{
                    if(opts.limitOver == 1){
                        w = warpBox.width;
                        h = w/imgRatio;
                    }else if(opts.limitOver == 2){
                        h = thumbBox.height;
                    }
                }
                innerRatio = h/img.height;
            },
            thumbBoxInit = function(){
                var thumb = el.find(".thumbBox");
                var pointList = "<div class='cropPoint' style='left:-4px;top:-4px;' id='leftTopPoint'></div>"+
                                "<div class='cropPoint' style='right:-4px;top:-4px;' id='rightTopPoint'></div>"+
                                "<div class='cropPoint' style='left:-4px;bottom:-4px;' id='leftBottomPoint'></div>"+
                                "<div class='cropPoint' style='right:-4px;bottom:-4px;' id='rightBottomPoint'></div>";
                
                thumb.append(pointList);
                
            },
            backgroudMove = function(e){
                e.preventDefault();
                if(!visbleCanvas){
                    return false;
                }
                var oldBox = new BoxLayout($(visbleCanvas)),
                    pagesite =  getPagePos(e),
                    oldPointer = {
                        x: pagesite.pageX,
                        y: pagesite.pageY
                    };
                this.onselectstart = function(){
                    return false;
                }
                $(document).on(vmousemove+".CropMove",function(e){
                    e.preventDefault();
                    var pagesite =  getPagePos(e),
                        disX = pagesite.pageX - oldPointer.x,
                        disY = pagesite.pageY - oldPointer.y;
                        imgDis = {
                            x: oldBox.left + disX,
                            y: oldBox.top + disY
                        };
                    setPosition(imgDis);

                });
                $(document).on(vmouseup+".CropLeave",function(e){
                    e.preventDefault();
                    $(document).off(".CropMove").off(".CropLeave");
                });
            },
            getPagePos = function(evt){
                return {
                    pageX : hasTouch()? evt.originalEvent.touches[0].pageX : evt.pageX,
                    pageY : hasTouch()? evt.originalEvent.touches[0].pageY : evt.pageY
                }
            }
            innerRotate = function(){
                var w = visbleCanvas.width,
                    h = visbleCanvas.height,
                    rotation = Math.PI * rot / 180,
                    c = Math.round(Math.cos(rotation) * 1000) / 1000,
                    s = Math.round(Math.sin(rotation) * 1000) / 1000;
                //旋转后canvas标签的大小
                visbleCanvas.height = Math.abs(c*h) + Math.abs(s*w);
                visbleCanvas.width = Math.abs(c*w) + Math.abs(s*h);

                //改变中心点
                if (rotation <= Math.PI/2) {
                    visbleContext.translate(s*h,0);
                } else if (rotation <= Math.PI) {
                    visbleContext.translate(visbleCanvas.width,-c*h);
                } else if (rotation <= 1.5*Math.PI) {
                    visbleContext.translate(-c*w,visbleCanvas.height);
                } else {
                    visbleContext.translate(0,-s*w);
                }
                visbleContext.rotate(rotation);
                
            },
            hasTouch = function(){
                return "ontouchend" in document;
            }
            getScale = function(){  //获取缩放后的宽高
                drawArgument.w = visbleCanvas.width = img.width*innerRatio*ratio;
                drawArgument.h = visbleCanvas.height = img.height*innerRatio*ratio;
            },
            drawImage = function(){ //绘图
                visbleContext.clearRect(0,0,visbleCanvas.width,visbleCanvas.height);
                visbleContext.drawImage(img, 0, 0, drawArgument.w, drawArgument.h);
            },
            getPosition = function(oldWidth,oldHeight){
                return {
                    x: visbleCanvasBox.left + (oldWidth-visbleCanvas.width)/2,
                    y: visbleCanvasBox.top + (oldHeight-visbleCanvas.height)/2
                }
            },
            setPosition = function(imgDis){
                var thumbBoxPos = {
                    left: thumbBox.x-warpBox.x,
                    top: thumbBox.y-warpBox.y,
                    right: thumbBox.x-warpBox.x + thumbBox.width,
                    bottom: thumbBox.y-warpBox.y + thumbBox.height
                }
                if(opts.isMoveOver){
                    if(thumbBoxPos.left-imgDis.x<0){
                        imgDis.x = thumbBoxPos.left;
                    }else if(thumbBoxPos.right > imgDis.x + visbleCanvas.width){
                        imgDis.x = thumbBoxPos.right - visbleCanvas.width;
                    }
                    if(thumbBoxPos.top-imgDis.y<0){
                        imgDis.y = thumbBoxPos.top;
                    }else if(thumbBoxPos.bottom > imgDis.y + visbleCanvas.height){
                        imgDis.y = thumbBoxPos.bottom - visbleCanvas.height;
                    }
                }

                $(visbleCanvas).css({
                    left: imgDis.x,
                    top: imgDis.y
                });
                visbleCanvasBox = {  //将canvas坐标保存起来
                    left: imgDis.x,
                    top: imgDis.y
                };
                clipArgument = {  //将生成剪切后图片坐标保存起来
                    dx: imgDis.x - thumbBoxPos.left,
                    dy: imgDis.y - thumbBoxPos.top
                };  
                
            },
            canvasTransform = function(options){
                if(!visbleCanvas){
                    return false;
                }
                var oldWidth = visbleCanvas.width,
                    oldHeight = visbleCanvas.height;
                
                ratio = typeof options.ratio === "undefined"? ratio : options.ratio;
                rot = typeof options.rot === "undefined"? rot : options.rot;
                
                //保存canvas状态
                visbleContext.save();
                //缩放
                getScale(); 
                //旋转
                innerRotate();
                drawImage();
                //恢复canvas状态
                visbleContext.restore();
                
                var pos = getPosition(oldWidth,oldHeight); //计算变化后的坐标
                setPosition(pos); //设定变化后的坐标
            };
        
        var returnObj = {
            rotate : function(deg){
                canvasTransform({
                    rot: deg
                });
            },
            scale: function(ratio){
                canvasTransform({
                    ratio: ratio
                });
            },
            getDataURL: function(type){
                var type = type||"png",
                    width = thumbBox.width,
                    height = thumbBox.height,
                    hiddenCanvas = document.createElement("canvas"),
                    hiddenContext = hiddenCanvas.getContext("2d");
                
                hiddenCanvas.width = width;
                hiddenCanvas.height = height;
                //hiddenContext.drawImage(visbleCanvas, clipArgument.sx, clipArgument.sy, width, height, 0, 0, width, height);
                hiddenContext.drawImage(visbleCanvas, clipArgument.dx, clipArgument.dy, visbleCanvas.width,visbleCanvas.height);
                return hiddenCanvas.toDataURL('image/'+type);
            }
        }
        
        CanvasCropInit();
        
        return returnObj;
    }
}));
</script>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@if(isset($property->id))
<input type="hidden" name="id" value="{{ $property->id }}">
@endif
<div class="col-md-12">
  <fieldset>
    <legend>General Details</legend>
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Title/Name<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input 
            type="text"
            name = "title"
            placeholder="Enter title here"
            value="@if(old('title')){!! old('title') !!}@elseif(isset($property->title)){!!$property->title!!}@endif"
            class="form-control"
            />
        </div>
      </div>
      <div class="form-group" style="display: none;">
        <label class="col-sm-4 col-xs-12 control-label">Slug<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input name="slug" type="text" id="slug" class="form-control" 
            value="@if(old('slug')){!! old('slug') !!}@elseif(isset($property->slug)){!!$property->slug!!}@endif"
            />
        </div>
      </div>
      <div class="form-group" style="display: none;">
        <label class="col-sm-4 col-xs-12 control-label">Code/SKU<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input name="code" type="text" id="code" class="form-control" 
            value="123456"
            />
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Category<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <select name="category" class="form-control">
          <option value=""
          @if (!isset($property->category_id) or old('category') == "") {{ 'selected="selected"' }} @endif
          > - select - </option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}"
          @if (old('category') == $category->id) {!!'selected="selected"'!!} 
          @elseif (isset($property->category_id) and $property->category_id == $category->id) {!!'selected="selected"'!!} 
          @endif
          >{!!$category->title!!}</option>
          @endforeach
          </select>
        </div>
      </div>
      <!-- <div class="form-group">
      <?php
        $classes_selected = array();
        if(@$property){
        foreach ($property->classez as $class) {
          array_push($classes_selected, $class->class_id);
        }
      
      }
      ?>
        <label class="col-sm-4 col-xs-12 control-label">Classes<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <select name="classes[]" class="form-control property-classes" multiple="multiple">
          @foreach ($classes as $class)
          <option value="{{ $class->id }}" 
          <?php if(in_array($class->id, $classes_selected)){
          echo 'selected="selected"';
          }
          ?>
          >{!!$class->title!!}</option>
          @endforeach
          </select>
          <script type="text/javascript">
            $(".property-classes").select2();
          </script>
        </div>
      </div> -->
      <div class="form-group" style="display: none;">
        <label class="col-sm-4 col-xs-12 control-label">Minimum stay<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <div class="input-group"> 
          <input name="minimum_stay_nights" type="text" class="form-control" 
            value="@if(old('minimum_stay_nights')){!! old('minimum_stay_nights') !!}@elseif(isset($property->minimum_stay_nights)){!!$property->minimum_stay_nights!!}@endif"
            /><span class="input-group-addon">nights</span></div>
        </div>
      </div><!-- upgrade - 12/10/2016 - minimum_nights -->
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Bedrooms<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input name="bedrooms" type="number" class="form-control" 
            value="@if(old('bedrooms')){!! old('bedrooms') !!}@elseif(isset($property->bedrooms)){!!$property->bedrooms!!}@endif"
            />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Bathrooms<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input name="bathrooms" type="number" class="form-control" 
            value="@if(old('bathrooms')){!! old('bathrooms') !!}@elseif(isset($property->bathrooms)){!!$property->bathrooms!!}@endif"
            />
        </div>
      </div>
      <div class="form-group" style="display: none;">
        <label class="col-sm-4 col-xs-12 control-label">Sleeps<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input name="sleeps" type="text" class="form-control" 
            value="@if(old('sleeps')){!! old('sleeps') !!}@elseif(isset($property->sleeps)){!!$property->sleeps!!}@endif"
            />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Garages<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
         <select name="garages" id="garages" class="form-control">
          <option value=""> - Select - </option>
          <option value="1" @if (old('garages') == '1') {!!'selected="selected"'!!} 
          @elseif (isset($property->garages) and $property->garages == '1') {!!'selected="selected"'!!} 
          @endif >1 Car</option>
          <option value="2" @if (old('garages') == '2') {!!'selected="selected"'!!} 
          @elseif (isset($property->garages) and $property->garages == '2') {!!'selected="selected"'!!} 
          @endif >2 Car</option>
          <option value="3" @if (old('garages') == '3') {!!'selected="selected"'!!} 
          @elseif (isset($property->garages) and $property->garages == '3') {!!'selected="selected"'!!} 
          @endif >3 Car</option>
          <option value="4" @if (old('garages') == '4') {!!'selected="selected"'!!} 
          @elseif (isset($property->garages) and $property->garages == '4') {!!'selected="selected"'!!} 
          @endif >4 Car</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Address<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input name="address" type="text" id="address" class="form-control" 
            value="@if(old('address')){!! old('address') !!}@elseif(isset($property->address)){!!$property->address!!}@endif"
            />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Area (Sq. Feet) <font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input name="area" type="number" id="zip" class="form-control" 
            value="@if(old('area')){!! old('area') !!}@elseif(isset($property->area)){!!$property->area!!}@endif"
            />
        </div>
      </div>
    </div>
    <div class="col-md-6">
      
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Town/Province<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <select name="city" id="city" class="form-control">
          <option value="New York" @if (old('city') == 'New York') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'New York') {!!'selected="selected"'!!} 
          @endif >New York</option>
          <option value="Los Angeles" @if (old('city') == 'Los Angeles') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Los Angeles') {!!'selected="selected"'!!} 
          @endif>Los Angeles</option>
          <option value="Chicago" @if (old('city') == 'Chicago') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Chicago') {!!'selected="selected"'!!} 
          @endif>Chicago</option>
          <option value="Houston" @if (old('city') == 'Houston') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Houston') {!!'selected="selected"'!!} 
          @endif>Houston</option>
          <option value="Phoenix" @if (old('city') == 'Phoenix') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Phoenix') {!!'selected="selected"'!!} 
          @endif>Phoenix</option>
          <option value="Philadelphia" @if (old('city') == 'Philadelphia') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Philadelphia') {!!'selected="selected"'!!} 
          @endif>Philadelphia</option>
          <option value="San Antonio" @if (old('city') == 'San Antonio') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'San Antonio') {!!'selected="selected"'!!} 
          @endif>San Antonio</option>
          <option value="San Diego" @if (old('city') == 'San Diego') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'San Diego') {!!'selected="selected"'!!} 
          @endif>San Diego</option>
          <option value="Dallas" @if (old('city') == 'Dallas') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Dallas') {!!'selected="selected"'!!} 
          @endif>Dallas</option>
          <option value="San Jose" @if (old('city') == 'San Jose') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'San Jose') {!!'selected="selected"'!!} 
          @endif>San Jose</option>
          <option value="Austin" @if (old('city') == 'Austin') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Austin') {!!'selected="selected"'!!} 
          @endif>Austin</option>
          <option value="Jacksonville" @if (old('city') == 'Jacksonville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Jacksonville') {!!'selected="selected"'!!} 
          @endif>Jacksonville</option>
          <option value="San Francisco" @if (old('city') == 'San Francisco') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'San Francisco') {!!'selected="selected"'!!} 
          @endif>San Francisco</option>
          <option value="Columbus" @if (old('city') == 'Columbus') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Columbus') {!!'selected="selected"'!!} 
          @endif>Columbus</option>
          <option value="Indianapolis" @if (old('city') == 'Indianapolis') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Indianapolis') {!!'selected="selected"'!!} 
          @endif>Indianapolis</option>
          <option value="Fort Worth" @if (old('city') == 'Fort Worth') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fort Worth') {!!'selected="selected"'!!} 
          @endif>Fort Worth</option>
          <option value="Charlotte" @if (old('city') == 'Charlotte') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Charlotte') {!!'selected="selected"'!!} 
          @endif>Charlotte</option>
          <option value="Seattle" @if (old('city') == 'Seattle') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Seattle') {!!'selected="selected"'!!} 
          @endif>Seattle</option>
          <option value="Denver" @if (old('city') == 'Denver') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Denver') {!!'selected="selected"'!!} 
          @endif>Denver</option>
          <option value="El Paso" @if (old('city') == 'El Paso') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'El Paso') {!!'selected="selected"'!!} 
          @endif>El Paso</option>
          <option value="Washington" @if (old('city') == 'Washington') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Washington') {!!'selected="selected"'!!} 
          @endif>Washington</option>
          <option value="Boston" @if (old('city') == 'Boston') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Boston') {!!'selected="selected"'!!} 
          @endif>Boston</option>
          <option value="Detroit" @if (old('city') == 'Detroit') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Detroit') {!!'selected="selected"'!!} 
          @endif>Detroit</option>
          <option value="Nashville" @if (old('city') == 'Nashville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Nashville') {!!'selected="selected"'!!} 
          @endif>Nashville</option>
          <option value="Memphis" @if (old('city') == 'Memphis') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Memphis') {!!'selected="selected"'!!} 
          @endif>Memphis</option>
          <option value="Portland" @if (old('city') == 'Portland') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Portland') {!!'selected="selected"'!!} 
          @endif>Portland</option>
          <option value="Oklahoma City" @if (old('city') == 'Oklahoma City') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Oklahoma City') {!!'selected="selected"'!!} 
          @endif>Oklahoma City</option>
          <option value="Las Vegas" @if (old('city') == 'Las Vegas') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Las Vegas') {!!'selected="selected"'!!} 
          @endif>Las Vegas</option>
          <option value="Louisville" @if (old('city') == 'Louisville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Louisville') {!!'selected="selected"'!!} 
          @endif>Louisville</option>
          <option value="Baltimore" @if (old('city') == 'Baltimore') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Baltimore') {!!'selected="selected"'!!} 
          @endif>Baltimore</option>
          <option value="Milwaukee" @if (old('city') == 'Milwaukee') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Milwaukee') {!!'selected="selected"'!!} 
          @endif>Milwaukee</option>
          <option value="Albuquerque" @if (old('city') == 'Albuquerque') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Albuquerque') {!!'selected="selected"'!!} 
          @endif>Albuquerque</option>
          <option value="Tucson" @if (old('city') == 'Tucson') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Tucson') {!!'selected="selected"'!!} 
          @endif>Tucson</option>
          <option value="Fresno" @if (old('city') == 'Fresno') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fresno') {!!'selected="selected"'!!} 
          @endif>Fresno</option>
          <option value="Sacramento" @if (old('city') == 'Sacramento') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Sacramento') {!!'selected="selected"'!!} 
          @endif>Sacramento</option>
          <option value="Mesa" @if (old('city') == 'Mesa') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Mesa') {!!'selected="selected"'!!} 
          @endif>Mesa</option>
          <option value="Kansas City" @if (old('city') == 'Kansas City') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Kansas City') {!!'selected="selected"'!!} 
          @endif>Kansas City</option>
          <option value="Atlanta" @if (old('city') == 'Atlanta') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Atlanta') {!!'selected="selected"'!!} 
          @endif>Atlanta</option>
          <option value="Long Beach" @if (old('city') == 'Long Beach') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Long Beach') {!!'selected="selected"'!!} 
          @endif>Long Beach</option>
          <option value="Colorado Springs" @if (old('city') == 'Colorado Springs') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Colorado Springs') {!!'selected="selected"'!!} 
          @endif>Colorado Springs</option>
          <option value="Raleigh" @if (old('city') == 'Raleigh') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Raleigh') {!!'selected="selected"'!!} 
          @endif>Raleigh</option>
          <option value="Miami" @if (old('city') == 'Miami') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Miami') {!!'selected="selected"'!!} 
          @endif>Miami</option>
          <option value="Virginia Beach" @if (old('city') == 'Virginia Beach') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Virginia Beach') {!!'selected="selected"'!!} 
          @endif>Virginia Beach</option>
          <option value="Omaha" @if (old('city') == 'Omaha') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Omaha') {!!'selected="selected"'!!} 
          @endif>Omaha</option>
          <option value="Oakland" @if (old('city') == 'Oakland') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Oakland') {!!'selected="selected"'!!} 
          @endif>Oakland</option>
          <option value="Minneapolis" @if (old('city') == 'Minneapolis') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Minneapolis') {!!'selected="selected"'!!} 
          @endif>Minneapolis</option>
          <option value="Tulsa" @if (old('city') == 'Tulsa') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Tulsa') {!!'selected="selected"'!!} 
          @endif>Tulsa</option>
          <option value="Arlington" @if (old('city') == 'Arlington') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Arlington') {!!'selected="selected"'!!} 
          @endif>Arlington</option>
          <option value="New Orleans" @if (old('city') == 'New Orleans') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'New Orleans') {!!'selected="selected"'!!} 
          @endif>New Orleans</option>
          <option value="Wichita" @if (old('city') == 'Wichita') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Wichita') {!!'selected="selected"'!!} 
          @endif>Wichita</option>
          <option value="Cleveland" @if (old('city') == 'Cleveland') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Cleveland') {!!'selected="selected"'!!} 
          @endif>Cleveland</option>
          <option value="Tampa" @if (old('city') == 'Tampa') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Tampa') {!!'selected="selected"'!!} 
          @endif>Tampa</option>
          <option value="Bakersfield" @if (old('city') == 'Bakersfield') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Bakersfield') {!!'selected="selected"'!!} 
          @endif>Bakersfield</option>
          <option value="Aurora" @if (old('city') == 'Aurora') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Aurora') {!!'selected="selected"'!!} 
          @endif>Aurora</option>
          <option value="Honolulu" @if (old('city') == 'Honolulu') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Honolulu') {!!'selected="selected"'!!} 
          @endif>Honolulu</option>
          <option value="Anaheim" @if (old('city') == 'Anaheim') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Anaheim') {!!'selected="selected"'!!} 
          @endif>Anaheim</option>
          <option value="Santa Ana" @if (old('city') == 'Santa Ana') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Santa Ana') {!!'selected="selected"'!!} 
          @endif>Santa Ana</option>
          <option value="Corpus Christi" @if (old('city') == 'Corpus Christi') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Corpus Christi') {!!'selected="selected"'!!} 
          @endif>Corpus Christi</option>
          <option value="Riverside" @if (old('city') == 'Riverside') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Riverside') {!!'selected="selected"'!!} 
          @endif>Riverside</option>
          <option value="Lexington" @if (old('city') == 'Lexington') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lexington') {!!'selected="selected"'!!} 
          @endif>Lexington</option>
          <option value="St. Louis" @if (old('city') == 'St. Louis') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'St. Louis') {!!'selected="selected"'!!} 
          @endif>St. Louis</option>
          <option value="Stockton" @if (old('city') == 'Stockton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Stockton') {!!'selected="selected"'!!} 
          @endif>Stockton</option>
          <option value="Pittsburgh" @if (old('city') == 'Pittsburgh') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Pittsburgh') {!!'selected="selected"'!!} 
          @endif>Pittsburgh</option>
          <option value="Saint Paul" @if (old('city') == 'Saint Paul') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Saint Paul') {!!'selected="selected"'!!} 
          @endif>Saint Paul</option>
          <option value="Cincinnati" @if (old('city') == 'Cincinnati') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Cincinnati') {!!'selected="selected"'!!} 
          @endif>Cincinnati</option>
          <option value="Anchorage" @if (old('city') == 'Anchorage') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Anchorage') {!!'selected="selected"'!!} 
          @endif>Anchorage</option>
          <option value="Henderson" @if (old('city') == 'Henderson') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Henderson') {!!'selected="selected"'!!} 
          @endif>Henderson</option>
          <option value="Greensboro" @if (old('city') == 'Greensboro') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Greensboro') {!!'selected="selected"'!!} 
          @endif>Greensboro</option>
          <option value="Plano" @if (old('city') == 'Plano') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Plano') {!!'selected="selected"'!!} 
          @endif>Plano</option>
          <option value="Newark" @if (old('city') == 'Newark') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Newark') {!!'selected="selected"'!!} 
          @endif>Newark</option>
          <option value="Lincoln" @if (old('city') == 'Lincoln') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lincoln') {!!'selected="selected"'!!} 
          @endif>Lincoln</option>
          <option value="Toledo" @if (old('city') == 'Toledo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Toledo') {!!'selected="selected"'!!} 
          @endif>Toledo</option>
          <option value="Orlando" @if (old('city') == 'Orlando') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Orlando') {!!'selected="selected"'!!} 
          @endif>Orlando</option>
          <option value="Chula Vista" @if (old('city') == 'Chula Vista') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Chula Vista') {!!'selected="selected"'!!} 
          @endif>Chula Vista</option>
          <option value="Irvine" @if (old('city') == 'Irvine') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Irvine') {!!'selected="selected"'!!} 
          @endif>Irvine</option>
          <option value="Fort Wayne" @if (old('city') == 'Fort Wayne') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fort Wayne') {!!'selected="selected"'!!} 
          @endif>Fort Wayne</option>
          <option value="Jersey City" @if (old('city') == 'Jersey City') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Jersey City') {!!'selected="selected"'!!} 
          @endif>Jersey City</option>
          <option value="Durham" @if (old('city') == 'Durham') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Durham') {!!'selected="selected"'!!} 
          @endif>Durham</option>
          <option value="St. Petersburg" @if (old('city') == 'St. Petersburg') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'St. Petersburg') {!!'selected="selected"'!!} 
          @endif>St. Petersburg</option>
          <option value="Laredo" @if (old('city') == 'Laredo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Laredo') {!!'selected="selected"'!!} 
          @endif>Laredo</option>
          <option value="Buffalo" @if (old('city') == 'Buffalo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Buffalo') {!!'selected="selected"'!!} 
          @endif>Buffalo</option>
          <option value="Madison" @if (old('city') == 'Madison') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Madison') {!!'selected="selected"'!!} 
          @endif>Madison</option>
          <option value="Lubbock" @if (old('city') == 'Lubbock') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lubbock') {!!'selected="selected"'!!} 
          @endif>Lubbock</option>
          <option value="Chandler" @if (old('city') == 'Chandler') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Chandler') {!!'selected="selected"'!!} 
          @endif>Chandler</option>
          <option value="Scottsdale" @if (old('city') == 'Scottsdale') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Scottsdale') {!!'selected="selected"'!!} 
          @endif>Scottsdale</option>
          <option value="Glendale" @if (old('city') == 'Glendale') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Glendale') {!!'selected="selected"'!!} 
          @endif>Glendale</option>
          <option value="Reno" @if (old('city') == 'Reno') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Reno') {!!'selected="selected"'!!} 
          @endif>Reno</option>
          <option value="Norfolk" @if (old('city') == 'Norfolk') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Norfolk') {!!'selected="selected"'!!} 
          @endif>Norfolk</option>
          <option value="Winston Salem" @if (old('city') == 'Winston Salem') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Winston Salem') {!!'selected="selected"'!!} 
          @endif>Winston Salem</option>
          <option value="North Las Vegas" @if (old('city') == 'North Las Vegas') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'North Las Vegas') {!!'selected="selected"'!!} 
          @endif>North Las Vegas</option>
          <option value="Irving" @if (old('city') == 'Irving') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Irving') {!!'selected="selected"'!!} 
          @endif>Irving</option>
          <option value="Chesapeake" @if (old('city') == 'Chesapeake') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Chesapeake') {!!'selected="selected"'!!} 
          @endif>Chesapeake</option>
          <option value="Gilbert" @if (old('city') == 'Gilbert') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Gilbert') {!!'selected="selected"'!!} 
          @endif>Gilbert</option>
          <option value="Hialeah" @if (old('city') == 'Hialeah') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Hialeah') {!!'selected="selected"'!!} 
          @endif>Hialeah</option>
          <option value="Garland" @if (old('city') == 'Garland') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Garland') {!!'selected="selected"'!!} 
          @endif>Garland</option>
          <option value="Fremont" @if (old('city') == 'Fremont') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fremont') {!!'selected="selected"'!!} 
          @endif>Fremont</option>
          <option value="Richmond" @if (old('city') == 'Richmond') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Richmond') {!!'selected="selected"'!!} 
          @endif>Richmond</option>
          <option value="Boise" @if (old('city') == 'Boise') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Boise') {!!'selected="selected"'!!} 
          @endif>Boise</option>
          <option value="San Bernardino" @if (old('city') == 'San Bernardino') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'San Bernardino') {!!'selected="selected"'!!} 
          @endif>San Bernardino</option>
          <option value="Spokane" @if (old('city') == 'Spokane') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Spokane') {!!'selected="selected"'!!} 
          @endif>Spokane</option>
          <option value="Des Moines" @if (old('city') == 'Des Moines') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Des Moines') {!!'selected="selected"'!!} 
          @endif>Des Moines</option>
          <option value="Modesto" @if (old('city') == 'Modesto') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Modesto') {!!'selected="selected"'!!} 
          @endif>Modesto</option>
          <option value="Birmingham" @if (old('city') == 'Birmingham') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Birmingham') {!!'selected="selected"'!!} 
          @endif>Birmingham</option>
          <option value="Tacoma" @if (old('city') == 'Tacoma') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Tacoma') {!!'selected="selected"'!!} 
          @endif>Tacoma</option>
          <option value="Fontana" @if (old('city') == 'Fontana') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fontana') {!!'selected="selected"'!!} 
          @endif>Fontana</option>
          <option value="Rochester" @if (old('city') == 'Rochester') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Rochester') {!!'selected="selected"'!!} 
          @endif>Rochester</option>
          <option value="Oxnard" @if (old('city') == 'Oxnard') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Oxnard') {!!'selected="selected"'!!} 
          @endif>Oxnard</option>
          <option value="Moreno Valley" @if (old('city') == 'Moreno Valley') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Moreno Valley') {!!'selected="selected"'!!} 
          @endif>Moreno Valley</option>
          <option value="Fayetteville" @if (old('city') == 'Fayetteville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fayetteville') {!!'selected="selected"'!!} 
          @endif>Fayetteville</option>
          <option value="Aurora" @if (old('city') == 'Aurora') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Aurora') {!!'selected="selected"'!!} 
          @endif>Aurora</option>
          <option value="Glendale" @if (old('city') == 'Glendale') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Glendale') {!!'selected="selected"'!!} 
          @endif>Glendale</option>
          <option value="Yonkers" @if (old('city') == 'Yonkers') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Yonkers') {!!'selected="selected"'!!} 
          @endif>Yonkers</option>
          <option value="Huntington Beach" @if (old('city') == 'Huntington Beach') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Huntington Beach') {!!'selected="selected"'!!} 
          @endif>Huntington Beach</option>
          <option value="Montgomery" @if (old('city') == 'Montgomery') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Montgomery') {!!'selected="selected"'!!} 
          @endif>Montgomery</option>
          <option value="Amarillo" @if (old('city') == 'Amarillo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Amarillo') {!!'selected="selected"'!!} 
          @endif>Amarillo</option>
          <option value="Little Rock" @if (old('city') == 'Little Rock') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Little Rock') {!!'selected="selected"'!!} 
          @endif>Little Rock</option>
          <option value="Akron" @if (old('city') == 'Akron') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Akron') {!!'selected="selected"'!!} 
          @endif>Akron</option>
          <option value="Columbus" @if (old('city') == 'Columbus') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Columbus') {!!'selected="selected"'!!} 
          @endif>Columbus</option>
          <option value="Augusta" @if (old('city') == 'Augusta') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Augusta') {!!'selected="selected"'!!} 
          @endif>Augusta</option>
          <option value="Grand Rapids" @if (old('city') == 'Grand Rapids') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Grand Rapids') {!!'selected="selected"'!!} 
          @endif>Grand Rapids</option>
          <option value="Shreveport" @if (old('city') == 'Shreveport') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Shreveport') {!!'selected="selected"'!!} 
          @endif>Shreveport</option>
          <option value="Salt Lake City" @if (old('city') == 'Salt Lake City') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Salt Lake City') {!!'selected="selected"'!!} 
          @endif>Salt Lake City</option>
          <option value="Huntsville" @if (old('city') == 'Huntsville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Huntsville') {!!'selected="selected"'!!} 
          @endif>Huntsville</option>
          <option value="Mobile" @if (old('city') == 'Mobile') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Mobile') {!!'selected="selected"'!!} 
          @endif>Mobile</option>
          <option value="Tallahassee" @if (old('city') == 'Tallahassee') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Tallahassee') {!!'selected="selected"'!!} 
          @endif>Tallahassee</option>
          <option value="Grand Prairie" @if (old('city') == 'Grand Prairie') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Grand Prairie') {!!'selected="selected"'!!} 
          @endif>Grand Prairie</option>
          <option value="Overland Park" @if (old('city') == 'Overland Park') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Overland Park') {!!'selected="selected"'!!} 
          @endif>Overland Park</option>
          <option value="Knoxville" @if (old('city') == 'Knoxville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Knoxville') {!!'selected="selected"'!!} 
          @endif>Knoxville</option>
          <option value="Port St. Lucie" @if (old('city') == 'Port St. Lucie') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Port St. Lucie') {!!'selected="selected"'!!} 
          @endif>Port St. Lucie</option>
          <option value="Worcester" @if (old('city') == 'Worcester') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Worcester') {!!'selected="selected"'!!} 
          @endif>Worcester</option>
          <option value="Brownsville" @if (old('city') == 'Brownsville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Brownsville') {!!'selected="selected"'!!} 
          @endif>Brownsville</option>
          <option value="Tempe" @if (old('city') == 'Tempe') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Tempe') {!!'selected="selected"'!!} 
          @endif>Tempe</option>
          <option value="Santa Clarita" @if (old('city') == 'Santa Clarita') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Santa Clarita') {!!'selected="selected"'!!} 
          @endif>Santa Clarita</option>
          <option value="Newport News" @if (old('city') == 'Newport News') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Newport News') {!!'selected="selected"'!!} 
          @endif>Newport News</option>
          <option value="Cape Coral" @if (old('city') == 'Cape Coral') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Cape Coral') {!!'selected="selected"'!!} 
          @endif>Cape Coral</option>
          <option value="Providence" @if (old('city') == 'Providence') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Providence') {!!'selected="selected"'!!} 
          @endif>Providence</option>
          <option value="Fort Lauderdale" @if (old('city') == 'Fort Lauderdale') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fort Lauderdale') {!!'selected="selected"'!!} 
          @endif>Fort Lauderdale</option>
          <option value="Chattanooga" @if (old('city') == 'Chattanooga') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Chattanooga') {!!'selected="selected"'!!} 
          @endif>Chattanooga</option>
          <option value="Rancho Cucamonga" @if (old('city') == 'Rancho Cucamonga') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Rancho Cucamonga') {!!'selected="selected"'!!} 
          @endif>Rancho Cucamonga</option>
          <option value="Oceanside" @if (old('city') == 'Oceanside') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Oceanside') {!!'selected="selected"'!!} 
          @endif>Oceanside</option>
          <option value="Santa Rosa" @if (old('city') == 'Santa Rosa') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Santa Rosa') {!!'selected="selected"'!!} 
          @endif>Santa Rosa</option>
          <option value="Garden Grove" @if (old('city') == 'Garden Grove') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Garden Grove') {!!'selected="selected"'!!} 
          @endif>Garden Grove</option>
          <option value="Vancouver" @if (old('city') == 'Vancouver') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Vancouver') {!!'selected="selected"'!!} 
          @endif>Vancouver</option>
          <option value="Sioux Falls" @if (old('city') == 'Sioux Falls') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Sioux Falls') {!!'selected="selected"'!!} 
          @endif>Sioux Falls</option>
          <option value="Ontario" @if (old('city') == 'Ontario') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Ontario') {!!'selected="selected"'!!} 
          @endif>Ontario</option>
          <option value="McKinney" @if (old('city') == 'McKinney') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'McKinney') {!!'selected="selected"'!!} 
          @endif>McKinney</option>
          <option value="Elk Grove" @if (old('city') == 'Elk Grove') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Elk Grove') {!!'selected="selected"'!!} 
          @endif>Elk Grove</option>
          <option value="Jackson" @if (old('city') == 'Jackson') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Jackson') {!!'selected="selected"'!!} 
          @endif>Jackson</option>
          <option value="Pembroke Pines" @if (old('city') == 'Pembroke Pines') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Pembroke Pines') {!!'selected="selected"'!!} 
          @endif>Pembroke Pines</option>
          <option value="Salem" @if (old('city') == 'Salem') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Salem') {!!'selected="selected"'!!} 
          @endif>Salem</option>
          <option value="Springfield" @if (old('city') == 'Springfield') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Springfield') {!!'selected="selected"'!!} 
          @endif>Springfield</option>
          <option value="Corona" @if (old('city') == 'Corona') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Corona') {!!'selected="selected"'!!} 
          @endif>Corona</option>
          <option value="Eugene" @if (old('city') == 'Eugene') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Eugene') {!!'selected="selected"'!!} 
          @endif>Eugene</option>
          <option value="Fort Collins" @if (old('city') == 'Fort Collins') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fort Collins') {!!'selected="selected"'!!} 
          @endif>Fort Collins</option>
          <option value="Peoria" @if (old('city') == 'Peoria') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Peoria') {!!'selected="selected"'!!} 
          @endif>Peoria</option>
          <option value="Frisco" @if (old('city') == 'Frisco') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Frisco') {!!'selected="selected"'!!} 
          @endif>Frisco</option>
          <option value="Cary" @if (old('city') == 'Cary') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Cary') {!!'selected="selected"'!!} 
          @endif>Cary</option>
          <option value="Lancaster" @if (old('city') == 'Lancaster') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lancaster') {!!'selected="selected"'!!} 
          @endif>Lancaster</option>
          <option value="Hayward" @if (old('city') == 'Hayward') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Hayward') {!!'selected="selected"'!!} 
          @endif>Hayward</option>
          <option value="Palmdale" @if (old('city') == 'Palmdale') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Palmdale') {!!'selected="selected"'!!} 
          @endif>Palmdale</option>
          <option value="Salinas" @if (old('city') == 'Salinas') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Salinas') {!!'selected="selected"'!!} 
          @endif>Salinas</option>
          <option value="Alexandria" @if (old('city') == 'Alexandria') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Alexandria') {!!'selected="selected"'!!} 
          @endif>Alexandria</option>
          <option value="Lakewood" @if (old('city') == 'Lakewood') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lakewood') {!!'selected="selected"'!!} 
          @endif>Lakewood</option>
          <option value="Springfield" @if (old('city') == 'Springfield') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Springfield') {!!'selected="selected"'!!} 
          @endif>Springfield</option>
          <option value="Pasadena" @if (old('city') == 'Pasadena') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Pasadena') {!!'selected="selected"'!!} 
          @endif>Pasadena</option>
          <option value="Sunnyvale" @if (old('city') == 'Sunnyvale') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Sunnyvale') {!!'selected="selected"'!!} 
          @endif>Sunnyvale</option>
          <option value="Macon" @if (old('city') == 'Macon') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Macon') {!!'selected="selected"'!!} 
          @endif>Macon</option>
          <option value="Pomona" @if (old('city') == 'Pomona') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Pomona') {!!'selected="selected"'!!} 
          @endif>Pomona</option>
          <option value="Hollywood" @if (old('city') == 'Hollywood') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Hollywood') {!!'selected="selected"'!!} 
          @endif>Hollywood</option>
          <option value="Kansas City" @if (old('city') == 'Kansas City') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Kansas City') {!!'selected="selected"'!!} 
          @endif>Kansas City</option>
          <option value="Escondido" @if (old('city') == 'Escondido') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Escondido') {!!'selected="selected"'!!} 
          @endif>Escondido</option>
          <option value="Clarksville" @if (old('city') == 'Clarksville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Clarksville') {!!'selected="selected"'!!} 
          @endif>Clarksville</option>
          <option value="Joliet" @if (old('city') == 'Joliet') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Joliet') {!!'selected="selected"'!!} 
          @endif>Joliet</option>
          <option value="Rockford" @if (old('city') == 'Rockford') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Rockford') {!!'selected="selected"'!!} 
          @endif>Rockford</option>
          <option value="Torrance" @if (old('city') == 'Torrance') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Torrance') {!!'selected="selected"'!!} 
          @endif>Torrance</option>
          <option value="Naperville" @if (old('city') == 'Naperville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Naperville') {!!'selected="selected"'!!} 
          @endif>Naperville</option>
          <option value="Paterson" @if (old('city') == 'Paterson') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Paterson') {!!'selected="selected"'!!} 
          @endif>Paterson</option>
          <option value="Savannah" @if (old('city') == 'Savannah') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Savannah') {!!'selected="selected"'!!} 
          @endif>Savannah</option>
          <option value="Bridgeport" @if (old('city') == 'Bridgeport') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Bridgeport') {!!'selected="selected"'!!} 
          @endif>Bridgeport</option>
          <option value="Mesquite" @if (old('city') == 'Mesquite') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Mesquite') {!!'selected="selected"'!!} 
          @endif>Mesquite</option>
          <option value="Killeen" @if (old('city') == 'Killeen') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Killeen') {!!'selected="selected"'!!} 
          @endif>Killeen</option>
          <option value="Syracuse" @if (old('city') == 'Syracuse') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Syracuse') {!!'selected="selected"'!!} 
          @endif>Syracuse</option>
          <option value="McAllen" @if (old('city') == 'McAllen') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'McAllen') {!!'selected="selected"'!!} 
          @endif>McAllen</option>
          <option value="Pasadena" @if (old('city') == 'Pasadena') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Pasadena') {!!'selected="selected"'!!} 
          @endif>Pasadena</option>
          <option value="Bellevue" @if (old('city') == 'Bellevue') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Bellevue') {!!'selected="selected"'!!} 
          @endif>Bellevue</option>
          <option value="Fullerton" @if (old('city') == 'Fullerton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fullerton') {!!'selected="selected"'!!} 
          @endif>Fullerton</option>
          <option value="Orange" @if (old('city') == 'Orange') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Orange') {!!'selected="selected"'!!} 
          @endif>Orange</option>
          <option value="Dayton" @if (old('city') == 'Dayton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Dayton') {!!'selected="selected"'!!} 
          @endif>Dayton</option>
          <option value="Miramar" @if (old('city') == 'Miramar') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Miramar') {!!'selected="selected"'!!} 
          @endif>Miramar</option>
          <option value="Thornton" @if (old('city') == 'Thornton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Thornton') {!!'selected="selected"'!!} 
          @endif>Thornton</option>
          <option value="West Valley City" @if (old('city') == 'West Valley City') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'West Valley City') {!!'selected="selected"'!!} 
          @endif>West Valley City</option>
          <option value="Olathe" @if (old('city') == 'Olathe') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Olathe') {!!'selected="selected"'!!} 
          @endif>Olathe</option>
          <option value="Hampton" @if (old('city') == 'Hampton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Hampton') {!!'selected="selected"'!!} 
          @endif>Hampton</option>
          <option value="Warren" @if (old('city') == 'Warren') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Warren') {!!'selected="selected"'!!} 
          @endif>Warren</option>
          <option value="Midland" @if (old('city') == 'Midland') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Midland') {!!'selected="selected"'!!} 
          @endif>Midland</option>
          <option value="Waco" @if (old('city') == 'Waco') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Waco') {!!'selected="selected"'!!} 
          @endif>Waco</option>
          <option value="Charleston" @if (old('city') == 'Charleston') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Charleston') {!!'selected="selected"'!!} 
          @endif>Charleston</option>
          <option value="Columbia" @if (old('city') == 'Columbia') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Columbia') {!!'selected="selected"'!!} 
          @endif>Columbia</option>
          <option value="Denton" @if (old('city') == 'Denton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Denton') {!!'selected="selected"'!!} 
          @endif>Denton</option>
          <option value="Carrollton" @if (old('city') == 'Carrollton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Carrollton') {!!'selected="selected"'!!} 
          @endif>Carrollton</option>
          <option value="Surprise" @if (old('city') == 'Surprise') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Surprise') {!!'selected="selected"'!!} 
          @endif>Surprise</option>
          <option value="Roseville" @if (old('city') == 'Roseville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Roseville') {!!'selected="selected"'!!} 
          @endif>Roseville</option>
          <option value="Sterling Heights" @if (old('city') == 'Sterling Heights') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Sterling Heights') {!!'selected="selected"'!!} 
          @endif>Sterling Heights</option>
          <option value="Murfreesboro" @if (old('city') == 'Murfreesboro') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Murfreesboro') {!!'selected="selected"'!!} 
          @endif>Murfreesboro</option>
          <option value="Gainesville" @if (old('city') == 'Gainesville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Gainesville') {!!'selected="selected"'!!} 
          @endif>Gainesville</option>
          <option value="Cedar Rapids" @if (old('city') == 'Cedar Rapids') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Cedar Rapids') {!!'selected="selected"'!!} 
          @endif>Cedar Rapids</option>
          <option value="Visalia" @if (old('city') == 'Visalia') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Visalia') {!!'selected="selected"'!!} 
          @endif>Visalia</option>
          <option value="Coral Springs" @if (old('city') == 'Coral Springs') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Coral Springs') {!!'selected="selected"'!!} 
          @endif>Coral Springs</option>
          <option value="New Haven" @if (old('city') == 'New Haven') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'New Haven') {!!'selected="selected"'!!} 
          @endif>New Haven</option>
          <option value="Stamford" @if (old('city') == 'Stamford') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Stamford') {!!'selected="selected"'!!} 
          @endif>Stamford</option>
          <option value="Thousand Oaks" @if (old('city') == 'Thousand Oaks') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Thousand Oaks') {!!'selected="selected"'!!} 
          @endif>Thousand Oaks</option>
          <option value="Concord" @if (old('city') == 'Concord') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Concord') {!!'selected="selected"'!!} 
          @endif>Concord</option>
          <option value="Elizabeth" @if (old('city') == 'Elizabeth') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Elizabeth') {!!'selected="selected"'!!} 
          @endif>Elizabeth</option>
          <option value="Lafayette" @if (old('city') == 'Lafayette') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lafayette') {!!'selected="selected"'!!} 
          @endif>Lafayette</option>
          <option value="Kent" @if (old('city') == 'Kent') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Kent') {!!'selected="selected"'!!} 
          @endif>Kent</option>
          <option value="Topeka" @if (old('city') == 'Topeka') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Topeka') {!!'selected="selected"'!!} 
          @endif>Topeka</option>
          <option value="Simi Valley" @if (old('city') == 'Simi Valley') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Simi Valley') {!!'selected="selected"'!!} 
          @endif>Simi Valley</option>
          <option value="Santa Clara" @if (old('city') == 'Santa Clara') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Santa Clara') {!!'selected="selected"'!!} 
          @endif>Santa Clara</option>
          <option value="Athens" @if (old('city') == 'Athens') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Athens') {!!'selected="selected"'!!} 
          @endif>Athens</option>
          <option value="Hartford" @if (old('city') == 'Hartford') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Hartford') {!!'selected="selected"'!!} 
          @endif>Hartford</option>
          <option value="Victorville" @if (old('city') == 'Victorville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Victorville') {!!'selected="selected"'!!} 
          @endif>Victorville</option>
          <option value="Abilene" @if (old('city') == 'Abilene') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Abilene') {!!'selected="selected"'!!} 
          @endif>Abilene</option>
          <option value="Norman" @if (old('city') == 'Norman') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Norman') {!!'selected="selected"'!!} 
          @endif>Norman</option>
          <option value="Vallejo" @if (old('city') == 'Vallejo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Vallejo') {!!'selected="selected"'!!} 
          @endif>Vallejo</option>
          <option value="Berkeley" @if (old('city') == 'Berkeley') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Berkeley') {!!'selected="selected"'!!} 
          @endif>Berkeley</option>
          <option value="Round Rock" @if (old('city') == 'Round Rock') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Round Rock') {!!'selected="selected"'!!} 
          @endif>Round Rock</option>
          <option value="Ann Arbor" @if (old('city') == 'Ann Arbor') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Ann Arbor') {!!'selected="selected"'!!} 
          @endif>Ann Arbor</option>
          <option value="Fargo" @if (old('city') == 'Fargo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fargo') {!!'selected="selected"'!!} 
          @endif>Fargo</option>
          <option value="Columbia" @if (old('city') == 'Columbia') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Columbia') {!!'selected="selected"'!!} 
          @endif>Columbia</option>
          <option value="Allentown" @if (old('city') == 'Allentown') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Allentown') {!!'selected="selected"'!!} 
          @endif>Allentown</option>
          <option value="Evansville" @if (old('city') == 'Evansville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Evansville') {!!'selected="selected"'!!} 
          @endif>Evansville</option>
          <option value="Beaumont" @if (old('city') == 'Beaumont') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Beaumont') {!!'selected="selected"'!!} 
          @endif>Beaumont</option>
          <option value="Odessa" @if (old('city') == 'Odessa') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Odessa') {!!'selected="selected"'!!} 
          @endif>Odessa</option>
          <option value="Wilmington" @if (old('city') == 'Wilmington') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Wilmington') {!!'selected="selected"'!!} 
          @endif>Wilmington</option>
          <option value="Arvada" @if (old('city') == 'Arvada') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Arvada') {!!'selected="selected"'!!} 
          @endif>Arvada</option>
          <option value="Independence" @if (old('city') == 'Independence') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Independence') {!!'selected="selected"'!!} 
          @endif>Independence</option>
          <option value="Provo" @if (old('city') == 'Provo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Provo') {!!'selected="selected"'!!} 
          @endif>Provo</option>
          <option value="Lansing" @if (old('city') == 'Lansing') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lansing') {!!'selected="selected"'!!} 
          @endif>Lansing</option>
          <option value="El Monte" @if (old('city') == 'El Monte') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'El Monte') {!!'selected="selected"'!!} 
          @endif>El Monte</option>
          <option value="Springfield" @if (old('city') == 'Springfield') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Springfield') {!!'selected="selected"'!!} 
          @endif>Springfield</option>
          <option value="Fairfield" @if (old('city') == 'Fairfield') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Fairfield') {!!'selected="selected"'!!} 
          @endif>Fairfield</option>
          <option value="Clearwater" @if (old('city') == 'Clearwater') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Clearwater') {!!'selected="selected"'!!} 
          @endif>Clearwater</option>
          <option value="Peoria" @if (old('city') == 'Peoria') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Peoria') {!!'selected="selected"'!!} 
          @endif>Peoria</option>
          <option value="Rochester" @if (old('city') == 'Rochester') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Rochester') {!!'selected="selected"'!!} 
          @endif>Rochester</option>
          <option value="Carlsbad" @if (old('city') == 'Carlsbad') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Carlsbad') {!!'selected="selected"'!!} 
          @endif>Carlsbad</option>
          <option value="Westminster" @if (old('city') == 'Westminster') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Westminster') {!!'selected="selected"'!!} 
          @endif>Westminster</option>
          <option value="West Jordan" @if (old('city') == 'West Jordan') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'West Jordan') {!!'selected="selected"'!!} 
          @endif>West Jordan</option>
          <option value="Pearland" @if (old('city') == 'Pearland') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Pearland') {!!'selected="selected"'!!} 
          @endif>Pearland</option>
          <option value="Richardson" @if (old('city') == 'Richardson') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Richardson') {!!'selected="selected"'!!} 
          @endif>Richardson</option>
          <option value="Downey" @if (old('city') == 'Downey') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Downey') {!!'selected="selected"'!!} 
          @endif>Downey</option>
          <option value="Miami Gardens" @if (old('city') == 'Miami Gardens') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Miami Gardens') {!!'selected="selected"'!!} 
          @endif>Miami Gardens</option>
          <option value="Temecula" @if (old('city') == 'Temecula') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Temecula') {!!'selected="selected"'!!} 
          @endif>Temecula</option>
          <option value="Costa Mesa" @if (old('city') == 'Costa Mesa') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Costa Mesa') {!!'selected="selected"'!!} 
          @endif>Costa Mesa</option>
          <option value="College Station" @if (old('city') == 'College Station') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'College Station') {!!'selected="selected"'!!} 
          @endif>College Station</option>
          <option value="Elgin" @if (old('city') == 'Elgin') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Elgin') {!!'selected="selected"'!!} 
          @endif>Elgin</option>
          <option value="Murrieta" @if (old('city') == 'Murrieta') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Murrieta') {!!'selected="selected"'!!} 
          @endif>Murrieta</option>
          <option value="Gresham" @if (old('city') == 'Gresham') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Gresham') {!!'selected="selected"'!!} 
          @endif>Gresham</option>
          <option value="High Point" @if (old('city') == 'High Point') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'High Point') {!!'selected="selected"'!!} 
          @endif>High Point</option>
          <option value="Antioch" @if (old('city') == 'Antioch') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Antioch') {!!'selected="selected"'!!} 
          @endif>Antioch</option>
          <option value="Inglewood" @if (old('city') == 'Inglewood') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Inglewood') {!!'selected="selected"'!!} 
          @endif>Inglewood</option>
          <option value="Cambridge" @if (old('city') == 'Cambridge') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Cambridge') {!!'selected="selected"'!!} 
          @endif>Cambridge</option>
          <option value="Lowell" @if (old('city') == 'Lowell') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lowell') {!!'selected="selected"'!!} 
          @endif>Lowell</option>
          <option value="Manchester" @if (old('city') == 'Manchester') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Manchester') {!!'selected="selected"'!!} 
          @endif>Manchester</option>
          <option value="Billings" @if (old('city') == 'Billings') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Billings') {!!'selected="selected"'!!} 
          @endif>Billings</option>
          <option value="Pueblo" @if (old('city') == 'Pueblo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Pueblo') {!!'selected="selected"'!!} 
          @endif>Pueblo</option>
          <option value="Palm Bay" @if (old('city') == 'Palm Bay') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Palm Bay') {!!'selected="selected"'!!} 
          @endif>Palm Bay</option>
          <option value="Centennial" @if (old('city') == 'Centennial') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Centennial') {!!'selected="selected"'!!} 
          @endif>Centennial</option>
          <option value="Richmond" @if (old('city') == 'Richmond') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Richmond') {!!'selected="selected"'!!} 
          @endif>Richmond</option>
          <option value="Ventura" @if (old('city') == 'Ventura') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Ventura') {!!'selected="selected"'!!} 
          @endif>Ventura</option>
          <option value="Pompano Beach" @if (old('city') == 'Pompano Beach') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Pompano Beach') {!!'selected="selected"'!!} 
          @endif>Pompano Beach</option>
          <option value="North Charleston" @if (old('city') == 'North Charleston') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'North Charleston') {!!'selected="selected"'!!} 
          @endif>North Charleston</option>
          <option value="Everett" @if (old('city') == 'Everett') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Everett') {!!'selected="selected"'!!} 
          @endif>Everett</option>
          <option value="Waterbury" @if (old('city') == 'Waterbury') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Waterbury') {!!'selected="selected"'!!} 
          @endif>Waterbury</option>
          <option value="West Palm Beach" @if (old('city') == 'West Palm Beach') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'West Palm Beach') {!!'selected="selected"'!!} 
          @endif>West Palm Beach</option>
          <option value="Boulder" @if (old('city') == 'Boulder') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Boulder') {!!'selected="selected"'!!} 
          @endif>Boulder</option>
          <option value="West Covina" @if (old('city') == 'West Covina') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'West Covina') {!!'selected="selected"'!!} 
          @endif>West Covina</option>
          <option value="Broken Arrow" @if (old('city') == 'Broken Arrow') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Broken Arrow') {!!'selected="selected"'!!} 
          @endif>Broken Arrow</option>
          <option value="Clovis" @if (old('city') == 'Clovis') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Clovis') {!!'selected="selected"'!!} 
          @endif>Clovis</option>
          <option value="Daly City" @if (old('city') == 'Daly City') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Daly City') {!!'selected="selected"'!!} 
          @endif>Daly City</option>
          <option value="Lakeland" @if (old('city') == 'Lakeland') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lakeland') {!!'selected="selected"'!!} 
          @endif>Lakeland</option>
          <option value="Santa Maria" @if (old('city') == 'Santa Maria') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Santa Maria') {!!'selected="selected"'!!} 
          @endif>Santa Maria</option>
          <option value="Norwalk" @if (old('city') == 'Norwalk') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Norwalk') {!!'selected="selected"'!!} 
          @endif>Norwalk</option>
          <option value="Sandy Springs" @if (old('city') == 'Sandy Springs') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Sandy Springs') {!!'selected="selected"'!!} 
          @endif>Sandy Springs</option>
          <option value="Hillsboro" @if (old('city') == 'Hillsboro') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Hillsboro') {!!'selected="selected"'!!} 
          @endif>Hillsboro</option>
          <option value="Green Bay" @if (old('city') == 'Green Bay') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Green Bay') {!!'selected="selected"'!!} 
          @endif>Green Bay</option>
          <option value="Tyler" @if (old('city') == 'Tyler') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Tyler') {!!'selected="selected"'!!} 
          @endif>Tyler</option>
          <option value="Wichita Falls" @if (old('city') == 'Wichita Falls') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Wichita Falls') {!!'selected="selected"'!!} 
          @endif>Wichita Falls</option>
          <option value="Lewisville" @if (old('city') == 'Lewisville') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lewisville') {!!'selected="selected"'!!} 
          @endif>Lewisville</option>
          <option value="Burbank" @if (old('city') == 'Burbank') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Burbank') {!!'selected="selected"'!!} 
          @endif>Burbank</option>
          <option value="Greeley" @if (old('city') == 'Greeley') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Greeley') {!!'selected="selected"'!!} 
          @endif>Greeley</option>
          <option value="San Mateo" @if (old('city') == 'San Mateo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'San Mateo') {!!'selected="selected"'!!} 
          @endif>San Mateo</option>
          <option value="El Cajon" @if (old('city') == 'El Cajon') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'El Cajon') {!!'selected="selected"'!!} 
          @endif>El Cajon</option>
          <option value="Jurupa Valley" @if (old('city') == 'Jurupa Valley') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Jurupa Valley') {!!'selected="selected"'!!} 
          @endif>Jurupa Valley</option>
          <option value="Rialto" @if (old('city') == 'Rialto') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Rialto') {!!'selected="selected"'!!} 
          @endif>Rialto</option>
          <option value="Davenport" @if (old('city') == 'Davenport') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Davenport') {!!'selected="selected"'!!} 
          @endif>Davenport</option>
          <option value="League City" @if (old('city') == 'League City') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'League City') {!!'selected="selected"'!!} 
          @endif>League City</option>
          <option value="Edison" @if (old('city') == 'Edison') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Edison') {!!'selected="selected"'!!} 
          @endif>Edison</option>
          <option value="Davie" @if (old('city') == 'Davie') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Davie') {!!'selected="selected"'!!} 
          @endif>Davie</option>
          <option value="Las Cruces" @if (old('city') == 'Las Cruces') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Las Cruces') {!!'selected="selected"'!!} 
          @endif>Las Cruces</option>
          <option value="South Bend" @if (old('city') == 'South Bend') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'South Bend') {!!'selected="selected"'!!} 
          @endif>South Bend</option>
          <option value="Vista" @if (old('city') == 'Vista') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Vista') {!!'selected="selected"'!!} 
          @endif>Vista</option>
          <option value="Woodbridge" @if (old('city') == 'Woodbridge') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Woodbridge') {!!'selected="selected"'!!} 
          @endif>Woodbridge</option>
          <option value="Renton" @if (old('city') == 'Renton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Renton') {!!'selected="selected"'!!} 
          @endif>Renton</option>
          <option value="Lakewood" @if (old('city') == 'Lakewood') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Lakewood') {!!'selected="selected"'!!} 
          @endif>Lakewood</option>
          <option value="San Angelo" @if (old('city') == 'San Angelo') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'San Angelo') {!!'selected="selected"'!!} 
          @endif>San Angelo</option>
          <option value="Clinton" @if (old('city') == 'Clinton') {!!'selected="selected"'!!} 
          @elseif (isset($property->city) and $property->city == 'Clinton') {!!'selected="selected"'!!} 
          @endif>Clinton</option>
          </select>
        </div>
      </div>
      <div class="form-group" style="display: none;">
        <label class="col-sm-4 col-xs-12 control-label">State<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <select name="state" class="form-control">
          @foreach ($states as $state)
          <option value="{{ $state->id }}"
          @if (old('state') == $state->id) {!!'selected="selected"'!!} 
          @elseif (isset($property->state_id) and $property->state_id == $state->id) {!!'selected="selected"'!!} 
          @endif
          >{!!$state->title!!}</option>
          @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Zip Code<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <input name="zip" type="text" id="zip" class="form-control" 
            value="@if(old('zip')){!! old('zip') !!}@elseif(isset($property->zip)){!!$property->zip!!}@endif"
            />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Lat,Long</label>
        <div class="col-sm-8 col-xs-12">
          <div class="input-group">
            <input name="latitude" type="text" id="latitude" class="form-control" 
              value="@if(old('latitude')){!! old('latitude') !!}@elseif(isset($property->latitude)){!!$property->latitude!!}@endif"
              />
            <input name="longitude" type="text" id="longitude" class="form-control" 
              value="@if(old('longitude')){!! old('longitude') !!}@elseif(isset($property->longitude)){!!$property->longitude!!}@endif"
              />
            <span class="input-group-addon">
            <a href="#myMapModal" data-toggle="modal">Open Map</a>
            </span> 
          </div>
        </div>
      </div>
      <div class="form-group" style="display: none;">
        <label class="col-sm-4 col-xs-12 control-label">Display Order</label>
        <div class="col-sm-8 col-xs-12">
          <input name="display_order" type="text" class="form-control" 
            value="@if(old('display_order')){!! old('display_order') !!}@elseif(isset($property->display_order)){!!$property->display_order!!}@endif"
            />
        </div>
      </div>
       <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Year Built <font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <select name="year_built" class="form-control">
           <option value="">-select-</option>
          <?php $from_year = date("Y",strtotime("-20 year")); ?>
          @for($i=$from_year;$i<=date('Y');$i++)
          <option value="{{$i}}" <?php if($property->year_built == $i){ echo 'selected="selected"'; }else{} ?>>{{$i}}</option>
          @endfor
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Master Bedroom <font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
          <select name="master_bedroom" class="form-control">
          <option value="">-select-</option>
          @for($i=1;$i<=10;$i++)
          <option value="{{$i}}" <?php if($property->master_bedroom == $i){ echo 'selected="selected"'; }else{} ?>>{{$i}}</option>
          @endfor
          </select>
        </div>
      </div>
    <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Waterfrontage<font color="#FF0000">*</font></label>
        <div class="col-sm-8 col-xs-12">
         <select name="waterfrontage" id="waterfrontage" class="form-control">
          <option value=""> - Select - </option>
          <option value="Ocean" @if (old('waterfrontage') == 'Ocean') {!!'selected="selected"'!!} 
          @elseif (isset($property->waterfrontage) and $property->waterfrontage == 'Ocean') {!!'selected="selected"'!!} 
          @endif >Ocean</option>
          <option value="Lake" @if (old('waterfrontage') == 'Lake') {!!'selected="selected"'!!} 
          @elseif (isset($property->waterfrontage) and $property->waterfrontage == 'Lake') {!!'selected="selected"'!!} 
          @endif >Lake</option>
          <option value="Bay" @if (old('waterfrontage') == 'Bay') {!!'selected="selected"'!!} 
          @elseif (isset($property->waterfrontage) and $property->waterfrontage == 'Bay') {!!'selected="selected"'!!} 
          @endif >Bay</option>
          <option value="River" @if (old('waterfrontage') == 'River') {!!'selected="selected"'!!} 
          @elseif (isset($property->waterfrontage) and $property->waterfrontage == 'River') {!!'selected="selected"'!!} 
          @endif >River</option>
          <option value="Canal" @if (old('waterfrontage') == 'Canal') {!!'selected="selected"'!!} 
          @elseif (isset($property->waterfrontage) and $property->waterfrontage == 'Canal') {!!'selected="selected"'!!} 
          @endif >Canal</option>
          <option value="Harbor/Marina" @if (old('waterfrontage') == 'Harbor/Marina') {!!'selected="selected"'!!} 
          @elseif (isset($property->waterfrontage) and $property->waterfrontage == 'Harbor/Marina') {!!'selected="selected"'!!} 
          @endif >Harbor/Marina</option>
          </select>
        </div>
      </div>
  </fieldset>
  <br/><br/>
</div>
<div class="col-md-12" style="display: none;">
  <fieldset class="checkbox">
    <legend>Indexing Control</legend>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4 col-sm-6 col-xs-12 ">
          <label>
          <input name="is_active" type="checkbox" value="1"
          @if(old('is_active')){{'checked="checked"'}}
          @elseif(isset($property->is_active) and ($property->is_active=='1')){{'checked="checked"'}}@endif />
          Property is Active</label>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 ">
          <label>
          <input name="is_featured" type="checkbox" value="1"
          @if(old('is_featured')){{'checked="checked"'}}
          @elseif(isset($property->is_featured) and ($property->is_featured=='1')){{'checked="checked"'}}@endif />
          Featured Property</label>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 ">
          <label>
          <input name="is_new" type="checkbox" value="1"
          @if(old('is_new')){{'checked="checked"'}}
          @elseif(isset($property->is_new) and ($property->is_new=='1')){{'checked="checked"'}}@endif />
          Mark as New</label>
        </div>
        <!-- <div class="col-md-4 col-xs-6">
          <label>
          <input name="is_vacation" type="checkbox" value="1"
          @if(old('is_vacation')){{'checked="checked"'}}
          @elseif(isset($property->is_vacation) and ($property->is_vacation=='1')){{'checked="checked"'}}@endif />
          Available for Vacation Rental</label>
        </div> -->
        <div class="col-md-4 col-sm-6 col-xs-12 ">
          <label>
          <input name="is_sale" type="checkbox" value="1"
          @if(old('is_sale')){{'checked="checked"'}}
          @elseif(isset($property->is_sale) and ($property->is_sale=='1')){{'checked="checked"'}}@endif />
          Displaying for Sale</label>
        </div>
        <!-- <div class="col-md-4 col-xs-6">
          <label>
          <input name="is_long_term" type="checkbox" value="1"
          @if(old('is_long_term')){{'checked="checked"'}}
          @elseif(isset($property->is_long_term) and ($property->is_long_term=='1')){{'checked="checked"'}}@endif />
          Available for Long Term Rental</label>
          </div> -->
        <!-- <div class="col-md-4 col-xs-6">
          <label>
          <input name="is_calendar" type="checkbox" value="1"
          @if(old('is_calendar')){{'checked="checked"'}}
          @elseif(isset($property->is_calendar) and ($property->is_calendar=='1')){{'checked="checked"'}}@endif />
          User can see Availability Calendar</label>
          </div> -->
        <!-- <div class="col-md-4 col-xs-6">
          <label>
          <input name="is_rates" type="checkbox" value="1"
          @if(old('is_rates')){{'checked="checked"'}}
          @elseif(isset($property->is_rates) and ($property->is_rates=='1')){{'checked="checked"'}}@endif />
          User can see Rental Rates </label>
        </div> -->
      </div>
    </div>
    <br/><br/>
  </fieldset>
</div>
<!---POPUP BUTTONS-->
<div class="col-md-12">
  <fieldset>
    <legend>Property Data</legend>
    <div class="col-md-12 user" role="tabpanel">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs " role="tablist">
        <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
        <li role="presentation"><a href="#pictures" aria-controls="pictures" role="tab" data-toggle="tab">Pictures</a></li>
        <li role="presentation"><a href="#rates" aria-controls="rates" role="tab" data-toggle="tab">Pricing</a></li>
        <li role="presentation"><a href="#features" aria-controls="features" role="tab" data-toggle="tab">Distance</a></li>
        <li role="presentation"><a href="#lifestyle_cats" aria-controls="lifestyle_cats" role="tab" data-toggle="tab">Lifestyle Category</a></li>
        <li role="presentation"><a href="#amenities" aria-controls="amenities" role="tab" data-toggle="tab">Add Amenities</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="description">
          <div class="form-group">
            <label class="col-sm-2 col-xs-12 control-label">Description<font color="#FF0000">*</font></label>
            <div class="col-sm-10 col-xs-12">
              <textarea name="description" class="form-control mceEditor"
                placeholder="Enter property detail here."
                >@if(old('description')){!! old('description') !!}@elseif(isset($property->description)){!!$property->description!!}@endif</textarea>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="pictures"> 

          <!-- EDIT asdas-->
          <?php //echo '<pre>'; print_r($images); 
            $imgcountt = 1;
            foreach ($images as $key => $value) {
            ?>
            <article class="col-md-3" id="crop-pictuer-<?php echo $imgcountt; ?>">
            <input class="crop-width" value="800" type="hidden">
            <input class="crop-height" value="600" type="hidden">
            <input name="image_db_id_<?php echo $imgcountt; ?>" value="NA" type="hidden">
            <input name="tmp_img_path_<?php echo $imgcountt; ?>" class="img-path" value="http://server/propertimatch_new/<?php echo $value->image; ?>" type="hidden">
            <input class="site-url" value="http://server/propertimatch_new" type="hidden">
            <input class="csrf_token" value="QWxjNx2egzaTkkpssH1FMkrpyDyvU6ZJDN3gLGXi" type="hidden">
            <input class="image-src" type="hidden">
            <!-- Current image -->
            <div id="<?php echo $imgcountt; ?>" class="image-view image-view-4x3 crop-initiate" data-original-title="" title="">
            <img src="http://server/propertimatch_new/<?php echo $value->image; ?>">
            </div>
            <div class="checkbox"><label><input name="image_delete_<?php echo $imgcountt; ?>" value="<?php echo $value->id; ?>" type="checkbox">Delete</label></div>
            </article>
            <?php        
            $imgcountt++;        
            }

          ?>
          

          <div class="container">
          <div class="imageBox" >
          <div class="mask"></div>
          <div class="thumbBox"></div>
          <div class="spinner" style="display: none">Loading...</div>
          </div>
          <div class="tools clearfix">
          <span id="rotateLeft" >rotateLeft</span>
          <span id="rotateRight" >rotateRight</span>
          <span id="zoomIn" >zoomIn</span>
          <span id="zoomOut" >zoomOut</span>
          <span id="crop" >Crop</span>
          <div class="upload-wapper">
          Select An Image
          <input type="file" id="upload-file" value="Upload" />
          </div>
          </div>
          <input id="images_total" name="images_total" value="" type="hidden">
          </div>
          <script type="text/javascript">
            $(function(){
            var i = 0;  
            var rot = 0,ratio = 1;
            var CanvasCrop = $.CanvasCrop({
            cropBox : ".imageBox",
            imgSrc : "images/avatar.jpg",
            limitOver : 2
            });
            $('#upload-file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
            CanvasCrop = $.CanvasCrop({
            cropBox : ".imageBox",
            imgSrc : e.target.result,
            limitOver : 2
            });
            rot =0 ;
            ratio = 1;
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
            });
            $("#rotateLeft").on("click",function(){
            rot -= 90;
            rot = rot<0?270:rot;
            CanvasCrop.rotate(rot);
            });
            $("#rotateRight").on("click",function(){
            rot += 90;
            rot = rot>360?90:rot;
            CanvasCrop.rotate(rot);
            });
            $("#zoomIn").on("click",function(){
            ratio =ratio*0.9;
            CanvasCrop.scale(ratio);
            });
            $("#zoomOut").on("click",function(){
            ratio =ratio*1.1;
            CanvasCrop.scale(ratio);
            });
            $("#alertInfo").on("click",function(){
            var canvas = document.getElementById("visbleCanvas");
            var context = canvas.getContext("2d");
            context.clearRect(0,0,canvas.width,canvas.height);
            });
            $("#crop").on("click",function(){
            var src = CanvasCrop.getDataURL("jpeg");
            //$("body").append("<div style='word-break: break-all;'>"+src+"</div>");  
            i++;
            document.getElementById('images_total').value = i;
            var show_image = '';
            show_image += '<article id="crop-pictuer-'+i+'" class="col-md-3 cur'+i+'">';
            show_image += '<input class="crop-width" value="800" type="hidden">';
            show_image += '<input class="crop-height" value="600" type="hidden">';
            show_image += '<input name="image_insert_'+i+'" id="image_insert_'+i+'" value="" type="hidden">';
            show_image += '<input name="image_db_id_'+i+'" value="NA" type="hidden">';
            show_image += '<input name="tmp_img_path_'+i+'" class="img-path" value="'+src+'" type="hidden">';
            show_image += '<input class="site-url" value="http://server/propertimatch_new" type="hidden">';
            show_image += '<input name="imgclass_name'+i+'" id="imgclass_name'+i+'" value="" type="hidden">';
            show_image += '<input class="csrf_token" value="QWxjNx2egzaTkkpssH1FMkrpyDyvU6ZJDN3gLGXi" type="hidden">';
            show_image += '<input class="image-src" type="hidden">';
            show_image += '<div id="imgsss'+i+'" class="image-view image-view-4x3 crop-initiate" data-original-title="" title="">';
            show_image += '<img src="'+src+'" />';
            show_image += '</div>';
            show_image += '<a class="checkbox image_remove_instantly" rel="'+i+'" href="javascript:void(0);">Delete</a>';
            show_image += '</article>';
            show_image += '<div class="colrs'+i+'">';
            show_image += '<ul>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="aden" id="imgclass_name'+i+'">Aden</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="brannan" id="imgclass_name'+i+'"></a>Brannan</li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="brooklyn" id="imgclass_name'+i+'">Brooklyn</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="clarendon" id="imgclass_name'+i+'">Clarendon</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="earlybird" id="imgclass_name'+i+'">Earlybird</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="gingham" id="imgclass_name'+i+'">Gingham</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="hudson" id="imgclass_name'+i+'">Hudson</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="inkwell" id="imgclass_name'+i+'">Inkwell</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="kelvin" id="imgclass_name'+i+'">Kelvin</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="lark" id="imgclass_name'+i+'">Lark</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="lofi" id="imgclass_name'+i+'">Lo-Fi</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="maven" id="imgclass_name'+i+'">Maven</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="mayfair" id="imgclass_name'+i+'">Mayfair</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="moon" id="imgclass_name'+i+'">Moon</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="nashville" id="imgclass_name'+i+'">Nashville</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="perpetua" id="imgclass_name'+i+'">Perpetua</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="reyes" id="imgclass_name'+i+'">Reyes</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="rise" id="imgclass_name'+i+'">Rise</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="slumber" id="imgclass_name'+i+'">Slumber</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="stinson" id="imgclass_name'+i+'">Stinson</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="toaster" id="imgclass_name'+i+'">Toaster</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="valencia" id="imgclass_name'+i+'">Valencia</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="walden" id="imgclass_name'+i+'">Walden</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="willow" id="imgclass_name'+i+'">Willow</a></li>';
            show_image += '<li><a class="choosecolor" rel="imgsss'+i+'" color="xpro2" id="imgclass_name'+i+'">X-pro II</a></li>';
            show_image += '</ul>';
            show_image += '</div>';
            $(".container").append(show_image);
            //  sendimageurl(src);
            });
            
            console.log("ontouchend" in document);
            })
            $(document).on("click", ".image_remove_instantly", function () {
              var rel = $(this).attr("rel");
              $(".cur"+rel).attr("style","display:none");
              $(".colrs"+rel).attr("style","display:none");
              document.getElementById('image_insert_'+rel).value = 'no';
              //$(".cur"+rel).remove();
              //$(".colrs"+rel).remove();
              //var totl = $('#images_total').val();
              //var min_val = totl - 1;
              //document.getElementById('images_total').value = min_val;
              //alert(min_val);
            }); 
             $(document).on("click", ".choosecolor", function () {
              var rel = $(this).attr("rel");
              var color = $(this).attr("color");
              var id = $(this).attr("id");
              $("#"+rel).removeAttr("class");
              $("#"+rel).addClass("image-view image-view-4x3 crop-initiate "+color);
              document.getElementById(id).value = color;
            });  
            function sendimageurl(url){
            var imageurl = url; 
            $.ajax({
            url: "http://server/propertimatch_new/cropupload.php",
            data: {imageurl: imageurl},
            type: 'POST',
            beforeSend: function () {
            },
            success: function (result) {
            },
            error: function () {
            }
            }); 
            }
            </script>




        </div>
        <div role="tabpanel" class="tab-pane" id="rates"> 

          <h4> Sale Price </h4>

          <div class="form-group">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="input-group"><span class="input-group-addon">$</span>
              <input name="sale_price" type="text" id="sale_price" class="form-control" 
                value="@if(old('sale_price')){!! old('sale_price') !!}@elseif(isset($property->sale_price)){!!$property->sale_price!!}@endif"
                />
                </div>
            </div>
          </div>
          <br/><br/>
         </div>
        <div role="tabpanel" class="tab-pane" id="features"> @include ('admin.properties._features') </div>
        <div role="tabpanel" class="tab-pane" id="lifestyle_cats"> 
        @include ('admin.properties._lifestyles') 
        </div>
        <div role="tabpanel" class="tab-pane" id="amenities"> @include ('admin.properties._amenities') </div>
      </div>
    </div>
  </fieldset>
  <br/><br/>
</div>



<div class="col-md-12">
  <fieldset>
    <legend>Other Information</legend>
    <div class="row">
    <div class="col-md-8">
      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Beach Right</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="beach_right" value="1" @if(old('beach_right')=='1'){{'checked="checked"'}}
          @elseif(isset($property->beach_right) and ($property->beach_right=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="beach_right" value="0" <?php if($property->beach_right == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group" style="display: none;">
      <label class="col-sm-4 col-xs-12 control-label">Staff Accomodation</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="staff_accomodation" value="1" @if(old('staff_accomodation')=='1'){{'checked="checked"'}}
          @elseif(isset($property->staff_accomodation) and ($property->staff_accomodation=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="staff_accomodation" value="0" <?php if($property->staff_accomodation == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">One Story</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="one_storey" value="1" @if(old('one_storey')=='1'){{'checked="checked"'}}
          @elseif(isset($property->one_storey) and ($property->one_storey=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="one_storey" value="0" <?php if($property->one_storey == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Two Story</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="two_storey" value="1" @if(old('two_storey')=='1'){{'checked="checked"'}}
          @elseif(isset($property->two_storey) and ($property->two_storey=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="two_storey" value="0" <?php if($property->two_storey == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Hot Tub</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="hot_tub" value="1" @if(old('hot_tub')=='1'){{'checked="checked"'}}
          @elseif(isset($property->hot_tub) and ($property->hot_tub=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="hot_tub" value="0" <?php if($property->hot_tub == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Hurricane Impact Windows</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="hurrican_impact" value="1" @if(old('hurrican_impact')=='1'){{'checked="checked"'}}
          @elseif(isset($property->hurrican_impact) and ($property->hurrican_impact=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="hurrican_impact" value="0" <?php if($property->hurrican_impact == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Hurricane Impact Panel</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="hurrican_impact_panel" value="1" @if(old('hurrican_impact_panel')=='1'){{'checked="checked"'}}
          @elseif(isset($property->hurrican_impact_panel) and ($property->hurrican_impact_panel=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="hurrican_impact_panel" value="0" <?php if($property->hurrican_impact_panel == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Heat Type</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="heat_type" value="1" @if(old('heat_type')=='1'){{'checked="checked"'}}
          @elseif(isset($property->heat_type) and ($property->heat_type=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="heat_type" value="0" <?php if($property->heat_type == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Gated Property</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="gated_property" value="1" @if(old('gated_property')=='1'){{'checked="checked"'}}
          @elseif(isset($property->gated_property) and ($property->gated_property=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="gated_property" value="0" <?php if($property->gated_property == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Tennis Court</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="tennis_court" value="1" @if(old('tennis_court')=='1'){{'checked="checked"'}}
          @elseif(isset($property->tennis_court) and ($property->tennis_court=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="tennis_court" value="0" <?php if($property->tennis_court == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Central Air Conditioning</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="central_air_conditioning" value="1" @if(old('central_air_conditioning')=='1'){{'checked="checked"'}}
          @elseif(isset($property->central_air_conditioning) and ($property->central_air_conditioning=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="central_air_conditioning" value="0" <?php if($property->central_air_conditioning == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Fireplace</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="fireplace" value="1" @if(old('fireplace')=='1'){{'checked="checked"'}}
          @elseif(isset($property->fireplace) and ($property->fireplace=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="fireplace" value="0" <?php if($property->fireplace == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>
      
      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Docking Rights</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="docking" value="1" @if(old('docking')=='1'){{'checked="checked"'}}
          @elseif(isset($property->docking) and ($property->docking=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="docking" value="0" <?php if($property->docking == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">Pool</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="pool" value="1" @if(old('pool')=='1'){{'checked="checked"'}}
          @elseif(isset($property->pool) and ($property->pool=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="pool" value="0" <?php if($property->pool == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

      <div class="form-group">
      <label class="col-sm-4 col-xs-12 control-label">1st Floor Master Bedroom</label>
        <div class="col-sm-8 col-xs-12">
        <label class="radio-inline">
          <input type="radio" name="masterbedroom1st" value="1" @if(old('masterbedroom1st')=='1'){{'checked="checked"'}}
          @elseif(isset($property->masterbedroom1st) and ($property->masterbedroom1st=='1')){{'checked="checked"'}}@endif> Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="masterbedroom1st" value="0" <?php if($property->masterbedroom1st == 0){ echo 'checked="checked"'; }else{} ?>> No
        </label>
        </div>
      </div>

    </div>
    <div class="col-md-4">
     <h4>Energy Efficent</h4>
     <div class="form-group">
        <div class="checkbox">
          <label>
          <input id="" type="checkbox" name="geo_thermal_heat" value="1"
          @if(old('geo_thermal_heat')){{'checked="checked"'}}
          @elseif(isset($property->geo_thermal_heat) and ($property->geo_thermal_heat=='1')){{'checked="checked"'}}@endif/>
            Geo Thermal Heat
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label>
          <input id="" type="checkbox" name="solar_panels" value="1"
          @if(old('solar_panels')){{'checked="checked"'}}
          @elseif(isset($property->solar_panels) and ($property->solar_panels=='1')){{'checked="checked"'}}@endif/>
           Solar Panels
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label>
          <input id="" type="checkbox" name="solar_water_heater" value="1"
          @if(old('solar_water_heater')){{'checked="checked"'}}
          @elseif(isset($property->solar_water_heater) and ($property->solar_water_heater=='1')){{'checked="checked"'}}@endif/>
           Solar Water Heater
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label>
          <input id="" type="checkbox" name="windmill" value="1"
          @if(old('windmill')){{'checked="checked"'}}
          @elseif(isset($property->windmill) and ($property->windmill=='1')){{'checked="checked"'}}@endif/>
           Windmill
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label>
          <input id="" type="checkbox" name="energy_star_appliances" value="1"
          @if(old('energy_star_appliances')){{'checked="checked"'}}
          @elseif(isset($property->energy_star_appliances) and ($property->energy_star_appliances=='1')){{'checked="checked"'}}@endif/>
           Energy Star Appliances
          </label>
        </div>
      </div>
      
 
    </div>
    </div>
  </fieldset>
  <br/><br/>
</div>
<div class="col-md-12">
  <fieldset>
    <legend>Attorney's Information</legend>
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Name</label>
        <div class="col-sm-8 col-xs-12">
          <input name="att_name" type="text" class="form-control" 
            value="@if(old('att_name')){!! old('att_name') !!}@elseif(isset($property->att_name)){!!$property->att_name!!}@endif"
            />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Email</label>
        <div class="col-sm-8 col-xs-12">
          <input name="att_email" type="text" class="form-control" 
            value="@if(old('att_email')){!! old('att_email') !!}@elseif(isset($property->att_email)){!!$property->att_email!!}@endif"
            />
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Phone</label>
        <div class="col-sm-8 col-xs-12">
          <input name="att_phone" type="text" class="form-control" 
            value="@if(old('att_phone')){!! old('att_phone') !!}@elseif(isset($property->att_phone)){!!$property->att_phone!!}@endif"
            />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 col-xs-12 control-label">Address</label>
        <div class="col-sm-8 col-xs-12">
          <input name="att_address" type="text" class="form-control" 
            value="@if(old('att_address')){!! old('att_address') !!}@elseif(isset($property->att_address)){!!$property->att_address!!}@endif"
            />
        </div>
      </div>
    </div>
  </fieldset>
</div>
<!-- <div class="col-md-12">
  <fieldset>
    <div class="form-group text-center">
      @if (isset($edit))
      <div class="checkbox">
        <label>
        <input id="generate-duplicate" type="checkbox" />
        Generate Duplicate
        </label>
      </div>
      @endif 
    </div>
  </fieldset>
</div> -->



<!-- Google Map Modal -->
<div class="modal fade modal-fullscreen force-fullscreen" id="myMapModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Google Map</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="google-map-canvas" class=""></div>
        </div>
        <div class="row">
          <div class="col-md-12 white">
            <div class="col-md-4"><b>Status:</b></div>
            <div class="col-md-8 ">
              <div id="markerStatus">Click and drag the marker.</div>
            </div>
          </div>
          <div class="col-md-12 white">
            <div class="col-md-4"><b>Current position:</b></div>
            <div class="col-md-6">
              <div id="marker-latlng"></div>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success pull-right applyLatLong">Apply</button>
            </div>
          </div>
          <div class="col-md-12 white">
            <div class="col-md-4"><b>Nearest address:</b></div>
            <div class="col-md-6">
              <div id="address"></div>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End of Google Map Modal -->
<!-- Change action of the form if you want to dulicate the data -->
<script>

  function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
      return true;
    }
  }


  $('#generate-duplicate').on('change', function(){
      if ($(this).is(':checked')) {
          $('form').attr('action', "{{ url('/admin/properties/create') }}");
      } else {
          $('form').attr('action', "{{ url('/admin/properties/update') }}");
      }
  });

  $(document).ready(function(){
    $('[id^=sale_price]').keypress(validateNumber);
  });
</script>


<!-- jQuery: Customization for Google Map  -->

<script type='text/javascript' src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCZZVtmb8wiYJ9c1HfLC7KSOoDJS4w1BZ4&sensor=false"></script>

<script type='text/javascript'>
  $(document).on('click', '.applyLatLong', function() {
    var latlong = $('#marker-latlng').html();
    latlongsplit = latlong.split(',');
    $('#latitude').val(latlongsplit[0]);
    $('#longitude').val(latlongsplit[1]);
    $('.applyLatLong').prop('disabled', true);
    $('.applyLatLong').html('Applied');

  });
  $(document).ready(function() {
    var geocoder = new google.maps.Geocoder();
    var map;        
    @if(old('latitude') and old('longitude'))
    var latLng = new google.maps.LatLng("{{old('latitude')}}","{{old('longitude')}}");
    @elseif(isset($property->latitude) and isset($property->longitude))
    var latLng = new google.maps.LatLng("{{$property->latitude}}","{{$property->longitude}}");
    @else
  var latLng = new google.maps.LatLng("{{$settings->latitude}}","{{$settings->longitude}}"); //Load office address as default location
  @endif

  var marker=new google.maps.Marker({
    position:latLng,
    map: map,
    draggable: true
  });
  
  function geocodePosition(pos) {
    geocoder.geocode({
      latLng: pos
    }, function(responses) {
      if (responses && responses.length > 0) {
        updateMarkerAddress(responses[0].formatted_address);
      } else {
        updateMarkerAddress('Cannot determine address at this location.');
      }
    });
  }
  
  function updateMarkerStatus(str) {
    document.getElementById('markerStatus').innerHTML = str;
  }
  
  function updateMarkerPosition(latLng) {
    document.getElementById('marker-latlng').innerHTML = [
    latLng.lat().toFixed(5),
    latLng.lng().toFixed(5)
    ].join(', ');
    $('.applyLatLong').prop('disabled', false);
    $('.applyLatLong').html('Apply');
  }
  
  function updateMarkerAddress(str) {
    document.getElementById('address').innerHTML = str;
  }
  
  function initialize() {
    var mapProp = {
      center:latLng,
      zoom: 14,
      draggable: true,
      scrollwheel: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };

  // Update current position info.
  
  map=new google.maps.Map(document.getElementById("google-map-canvas"),mapProp);
  marker.setMap(map);
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(contentString);
    infowindow.open(map, marker);
  });
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
  
};
google.maps.event.addDomListener(window, 'load', initialize);

google.maps.event.addDomListener(window, "resize", resizingMap());

$('#myMapModal').on('shown.bs.modal', function() {
  //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
resizeMap();
})

function resizeMap() {
  if(typeof map =="undefined") return;
  setTimeout( function(){resizingMap();} , 400);
}

function resizingMap() {
  if(typeof map =="undefined") return;
  var center = map.getCenter();
  google.maps.event.trigger(map, "resize");
  map.setCenter(center); 
}

});

</script>