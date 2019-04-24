<section>
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <section style="position:absolute; width:100%">
         @include('layouts.002._navigation')
      </section>
      <!-- Sliders -->
      <!-- Indicators -->
      <ol class="carousel-indicators">
         <?php 
            $counter = 0;
            $active = 'active'; //First indicator would be active by default.
            foreach($sliders as $slider){
            ?>
         <li data-target="#myCarousel" data-slide-to="<?=$counter?>" class="<?=$active?>"></li>
         <?php 
            $counter++;
            $active = ''; //Next indicators are not required to be active by default.
            }
            ?>
      </ol>
      <!-- Slider pictures -->
      <div class="carousel-inner">
         <?php 
            $active = 'active'; //First slider would be active by default.
            
            foreach($sliders as $slider){
            
            ?>
         <div class="item <?=$active?>">
            <img src="{{asset($slider->image)}}" style="width:100%" alt="<?=$slider->title?>">
            <div class="container">
               <div class="carousel-caption text-center">
                  <h1> <?=$slider->title?> </h1>
                  <p> </p>
               </div>
            </div>
         </div>
         <?php 
            $active = ''; //Next sliders are not required to be active by default.
            
            }
            
            ?>
      </div>
      <!-- Navigation for the sliders -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
   </div>
</section>
<!-- End of Sliders -->
