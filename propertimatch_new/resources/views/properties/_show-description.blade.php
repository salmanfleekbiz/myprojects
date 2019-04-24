<!-- Show the main description of property from database -->
<style type="text/css">
	.row.other_prop_inf > span {
    margin-right: 20px;
}
</style>	
	<!-- Show amenities assigned to this property -->
	<div class="row other_prop_inf">
	<span>Bedrooms - {{$property->bedrooms ? $property->bedrooms : '0'}}</span><span>Bathrooms - {{$property->bathrooms ? $property->bathrooms : '0'}}</span><span>Year Built - {{$property->year_built ? $property->year_built : 'not mentioned'}}</span><span>Area - {{$property->area}} Sqt</span><span>Garages - {{$property->garages}} Car</span><span>Waterfrontage - {{$property->waterfrontage ? $property->waterfrontage : 'not mentioned' }}</span>
	</div>
	<div class="row">
	<div class="col-xs-12">
		<div class="flat-title-price">
		<span class="price">Asking Price: ${{$property->sale_price ? $property->sale_price : '0'}}</span>
		</div>   
		</div>
	</div>	
	<div class="row">
		<div class="col-lg-12 col-xs-12" style="">
			<div class="pro-details-condition text-left">
				<h5 style="text-align:left;">Amenities</h5>
				<div class="pro-details-condition-inner bg-gray">
				
					<ul class="condition-list about-property">
					@if(count($amenities)>0)
						@foreach ($amenities as $amenity)
						@if($amenity->added->first()->value=='Yes')		
						<li>
							{{$amenity->title}}
						</li>
						@endif	
						@endforeach
					@endif
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-lg-12 col-xs-12" style="">
			<div class="pro-details-condition text-left">
				<h5 style="text-align:left;">Features</h5>
				<div class="pro-details-condition-inner bg-gray">
				
					<ul class="condition-list about-property">
						@if(count($clicked_features)>0)
							@foreach ($clicked_features as $feature)			
								<li >
									{{$feature->title}} - {{$feature->value}} Miles
								</li>
							@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
	<div class="col-xs-12">
		<h5 style="float: left; width:100%">Lifestyle Categories</h5>
		<ul class="features">
		<?php if(!empty($property->lifestyle_category)) {
		$all_lifestyles = explode(",", $property->lifestyle_category);
		foreach ($all_lifestyles as $single) {
		$all_lifestyle_cats = DB::table('emt_lifestyle_category')->where('id',$single)->first();
		?>
			
			<li class="col-lg-4 col-sm-6">
				{{$all_lifestyle_cats->title}}
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		
			<?php } }?>
		</ul>
		<hr />
	</div>
	</div>

	<div class="row">
	<div class="col-xs-12">
		<h5 style="float: left; width:100%">Other Informations</h5>
		<ul class="features">
		@if($property->beach_right==1)
			<li class="col-lg-4 col-sm-6">
				Beach Right
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->heat_type==1)
			<li class="col-lg-4 col-sm-6">
				Heat Type
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->gated_property==1)
			<li class="col-lg-4 col-sm-6">
				Gated Property
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->tennis_court==1)
			<li class="col-lg-4 col-sm-6">
				Tennis Court
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->central_air_conditioning==1)
			<li class="col-lg-4 col-sm-6">
				Central Air Conditioning
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->fireplace==1)
			<li class="col-lg-4 col-sm-6">
				Fireplace
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->geo_thermal_heat==1)
			<li class="col-lg-4 col-sm-6">
				Geo Thermal Heat
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->solar_panels==1)
			<li class="col-lg-4 col-sm-6">
				Solar Panels
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->solar_water_heater==1)
			<li class="col-lg-4 col-sm-6">
				Solar Water Heater
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->windmill==1)
			<li class="col-lg-4 col-sm-6">
				Windmill
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->energy_star_appliances==1)
			<li class="col-lg-4 col-sm-6">
				Energy Star Appliances
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->docking==1)
			<li class="col-lg-4 col-sm-6">
				Docking Rights
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->pool==1)
			<li class="col-lg-4 col-sm-6">
				Pool
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->masterbedroom1st==1)
			<li class="col-lg-4 col-sm-6">
				1st Floor Master Bedroom
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->one_storey==1)
			<li class="col-lg-4 col-sm-6">
				One Story
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->two_storey==1)
			<li class="col-lg-4 col-sm-6">
				Two Story
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->hot_tub==1)
			<li class="col-lg-4 col-sm-6">
				Hot Tub
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->hurrican_impact==1)
			<li class="col-lg-4 col-sm-6">
				Hurricane Impact Windows
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		@if($property->hurrican_impact_panel==1)
			<li class="col-lg-4 col-sm-6">
				Hurricane Impact Panel
				<span class="pull-right">
					<strong>
						<i class="fa fa-check"></i>
					</strong>
				<span>
			</li>
		@endif
		</ul>
		<hr />
	</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12" style="">
			<div class="pro-details-condition text-left">
				<h5 style="text-align:left;">Address</h5>
				<div class="pro-details-condition-inner bg-gray">
				
					<ul class="condition-list about-property">
						<li>Address: {{$property->address}}</li>
						<li>Zip Code: {{$property->zip}}</li>
						<li>Town/Province: {{$property->city}}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>	
	
	<div class="row">
	<div class="col-sm-12 col-xs-12">
	
		<div class="pro-details-description mt-30 text-justify">
			<h5>Description</h5>
			{!!$property->description!!}
		</div>
		</div>
	</div>
	
	<!-- Show features assigned to this property -->

	



