@extends('layouts.cli')
@include('modals.client',['therapists'=>'therapists'])
@section('page-section')
	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4">
			<div class="card">
				<div class="card-header">
					<h5>Search</h5>
				</div>
				<div class="card-body">
						{!!Form::open(['method'=>'GET','url'=>'/client-search','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
							{{csrf_field()}}
							<div class="form-group col-md-12">
								{!! Form::inputGroup('text', 'Location', null, null, ['placeholder' => 'Your Location here...', 'id'=>'searchTextField'])  !!}
							</div>
							<div class="form-group col-md-12">
								<label>Therapist Type</label>
								{!! Form::select('therapist', array('Physical Therapist', 'Occupational Therapist'), ['id'=>'q']) !!}
							</div>
							<div class="form-group col-md-12">
								{!! Form::inputGroup('text', 'Specialty', 't_specialties', null, ['placeholder' => 'Specialty']) !!}
							</div>
							<div class="form-group col-md-12">
								<input name="latitude" class="MapLat" value="" type="text" placeholder="Latitude" style="width: 161px;" hidden>
								<input name="longitude" class="MapLon" value="" type="text" placeholder="Longitude" style="width: 161px;" hidden>
							</div>
							<div class="card-footer col-md-12">
								<button class="btn btn-default" type="submit">
					           		 <i class="fa fa-search"></i> Submit
					    		</button>
							</div>
						{!! Form::close() !!}
				</div>
			</div>
		</div>

			<div class="col-sm-4 col-md-8 col-lg-8">
				<div class="card text-white bg-success mb-3">
					<div class="card-header">
						<h5>Who's Nearby</h5>
					</div>
					<div class="card-body" style=" height: 400px;">
						<div class="row">
							<div class="col-md-12">
								<div id="map"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

	<div class="col-sm-6 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header bg-info">
			<h5>Therapists Found...</h5>
			</div>
			<div class="card-body" style="overflow: scroll; height: 300px;">
				<table>
					<tr>
						@foreach($therapists as $data)
						<td>
						<div class="card" style="width: 20em; padding: 5px;">
						<center>
							<i class="fas fa-user-circle fa-4x" style="padding: 5px;"></i>
							<div class="card-body">
								<h4>{{$data->fname}} {{$data->lname}}</h4>
								<h5 style="font-size: 8pt;">{{$data->therapist}}</h5>
								<p>
									<b>Distance:</b> 10km 
									<br>
									<b>Ratings/Reviews:</b> 4.5 stars
									<br>
									<b>Rate:</b> 500 per hour
								</p>

								<a href='{{url("/booktherapist/{$data->id}")}}' class="btn btn-sm btn-success">Book</a>
							</div>									
						</center>
						</div>
						</td>
						@endforeach
					</tr>
				</table>
			</div>
		</div>    	
	</div>

<br>

<script>
	function initMap() {
		//------------initial------------//
		function userLocation() {
			var defaultLat = parseFloat($('[name=latitude]').val()) ||  10.3157,
				defaultLng =  parseFloat($('[name=longitude]').val()) ||  123.8854;
			return {
				lat: defaultLat,
				lng: defaultLng
			}
    	}
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 16,
			center:  userLocation()
			});
		var marker = new google.maps.Marker({
			map: map,
			position: userLocation()
			});

		//------//

		infoWindow = new google.maps.InfoWindow;

		//------------Try HTML5 geolocation.------------//
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('<b style="color:green;">You are here</b>');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }


      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              '<text style="color:red;">Error: The Geolocation service failed.</text>' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

       //------------search functions------------//
		var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input, {
            types: ["geocode"]
        });
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
         		infowindow.close();
            	var place = autocomplete.getPlace();
            	if (place.geometry.viewport) {
                	map.fitBounds(place.geometry.viewport);
            	} else {
                	map.setCenter(place.geometry.location);
                	map.setZoom(17);
             	}
            	moveMarker(place.name, place.geometry.location);
            	$('.MapLat').val(place.geometry.location.lat());
            	$('.MapLon').val(place.geometry.location.lng());
         });

        google.maps.event.addListener(map, 'click', function (event) {
            $('.MapLat').val(event.latLng.lat());
            $('.MapLon').val(event.latLng.lng());
            infowindow.close();
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        	"latLng":event.latLng
                    	}, function (results, status) {
                        	console.log(results, status);
                        	if (status == google.maps.GeocoderStatus.OK) {
                            	console.log(results);
                            	var lat = results[0].geometry.location.lat(),
                                	lng = results[0].geometry.location.lng(),
                                	placeName = results[0].address_components[0].long_name,
                                	latlng = new google.maps.LatLng(lat, lng);
                            	moveMarker(placeName, latlng);
                            	$("#searchTextField").val(results[0].formatted_address);
                         }
                     });
         });
        
        function moveMarker(placeName, latlng) {
            marker.setIcon(marker);
            marker.setPosition(latlng);
            infowindow.setContent(placeName);
            //infowindow.open(map, marker);
         }
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD85clj7B85QRZPmO6m4Fky0Wi6P0MzVpA&libraries=places&callback=initMap"
async defer></script>
@endsection