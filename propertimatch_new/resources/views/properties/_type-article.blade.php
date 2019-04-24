<!-- Search Result Items: Included as partial file on search page. -->



				<?php
				   $filter_keys = '"all", ';
				   foreach( $property->classez as $class ) { $filter_keys .= '"'.$class->theclass->slug . '", '; }
				   ?>
   
   
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="flat-item">
					   <div class="flat-item-image">
					   @if($property->is_featured=='1')
						  <span class="for-sale">Featured</span>
					   @endif	  
						@if($property->is_sold=='1')
						<span class="for-sale sold-types"><img class="img-responsive" src="{{asset('pictures/puppy-sold-new.png')}}" alt="Sold"></span>
						@endif

						  <a href="#">
						  <img src="{{asset(@$property->images->first()->image_small)}}" alt=""></a>                                        
						  <div class="flat-link"> 
						  <a href="{{url('show/'.$property->slug)}}">More Details</a>     
						  </div>
						  <ul class="flat-desc">
							 <li><img src="{{ asset('resources/images/icons/4.png') }}" alt=""><span>{{$property->area ? $property->area : '0'}}</span></li>
							 <li><img src="{{ asset('resources/images/icons/5.png') }}" alt=""><span>{{$property->bedrooms}}</span></li>
							 <li><img src="{{ asset('resources/images/icons/6.png') }}" alt=""><span>{{$property->bathrooms}}</span> </li>
						  </ul>
					   </div>
					   <div class="flat-item-info">
							<div class="flat-title-price">
								<h5><a href="#">{{$property->title}} </a></h5>
									<span class="price">
											
											@if($property->is_sale=='1')
											${{$property->sale_price}}
											
											@endif
									</span>                                        
							</div>
							<p><img src="{{ asset('resources/images/icons/location.png') }}" alt="">{{$property->city}}, {{$property->zip}}, {{@$property->location->title}}</p>
					   </div>
					</div>
				 </div>
				 
				<?php /* 
				<div class="col-md-12 item row-equal-height" data-groups='[<?php echo rtrim($filter_keys,', '); ?>]'>
					<div class="col-sm-12 col-md-4" >
						<a href="{{url('show/'.$property->slug)}}">
							<!-- Future: where is_main==1 -->
							<img class="img-responsive img-hover" src="{{asset(@$property->images->first()->image_small)}}" alt="{{@$property->title}}"> 
						</a>
					</div>
					<div class="col-sm-12 col-md-5 property-type-article-description" >
						<h3>
							{{$property->title}} 
						</h3>
						<p><i class="fa fa-map-marker"></i> {{$property->city}}, {{$property->zip}}, {{@$property->location->title}}</p>
						<p>
							{!!$property->summary!!}
						</p>
						<p>
							@foreach($property->amenities as $amenity)
							@if($amenity->value=='Yes')
							<div class="col-md-6"><i class="fa fa-check"></i>&nbsp;{{$amenity->amenity->title}}&nbsp;&nbsp;</div>
							@endif
							@endforeach
						</p>
					</div>
					<div class="col-sm-12 col-md-3 text-center property-type-article-price info-cell">
						<br/> 
						<p>
							Sleeping Capacity <span>{{$property->sleeps}}</span>
						</p>
						<p>
							Bedrooms <span>{{$property->bedrooms}}</span>
						</p>
						<p>
							Bathroom <span>{{$property->bathrooms}}</span>
						</p>
							@if($property->is_vacation=='1')

						<h4>
							@if($property->is_price_daily==1 and $property->is_vacation==1)
							${{number_format($property->price_daily,2)}}/night
							@elseif($property->is_price_monthly==1)
							${{number_format($property->price_monthly,2)}}/month
							@endif
						</h4>
				  
						<a class="btn" href="{{url('reserve/'.$property->slug)}}">
							<i class="fa fa-plane"></i> Reserve 
						</a>
				  
						@endif
						@if($property->is_sale=='1')
						<h4> ${{$property->sale_price}} </h4>
						<a class="btn" href="{{url('sale/'.$property->slug)}}">
							<i class="fa fa-shopping-cart"></i> Buy 
						</a>
						@endif
					</div>
				</div>
				*/ ?>
			