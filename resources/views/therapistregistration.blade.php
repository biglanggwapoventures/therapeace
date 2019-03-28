<!-- oninput="this.className = ''" -->
@extends('layouts.app')

@section('page-body')

 <!--   <link rel="stylesheet" type="text/css" href="css/client.css"> -->
<div class="col-md-10 offset-1">
 <div class="col-md-10 offset-1">
   <form id="regForm" action="{{ route('therapist.store') }}" method="POST" enctype="multipart/form-data">
  
    @csrf
    <h1>Therapist Registration</h1>
    <hr>
    <!-- One "tab form-group" for each step in the form: -->

      <div class="tab form-group">
        <div class="form-group col-md-12">
          <sub>Upload profile picture</sub>
          <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image" id="fileToUpload" class="form-control" data-validation-message="Please fill this up"> 
        </div>
        <div class="form-group col-md-12">
          <input placeholder="First name..."  name="fname" class="form-control" >
        </div>
        <div class="form-group col-md-12">
          <input placeholder="Last name..."  name="lname" class="form-control">
        </div>
        <div class="form-group col-md-12">
          <input placeholder="Email"  name="email" class="form-control">
        </div>
        <div class="form-group col-md-12">
          <input placeholder="Contact Number"  name="number" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <select id="gender" class="form-control" name="gender">
                <option value="">SELECT GENDER</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>   
      </div>
    

    <div class="tab form-group">Address
      <div class="form-group col-md-12">
        <input id="autocomplete" placeholder="Enter Your Address " onfocus="geolocate()" type="text" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <input placeholder="Street Address"  name="streetaddress" id="route" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <input placeholder="Barangay"  name="barangay" id="sublocality" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <input placeholder="City"  class="form-control" name="city" id="locality">
      </div>
      <div class="form-group col-md-12">
        <input placeholder="Province"  name="province" id="administrative_area_level_2" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <input placeholder="Postal Code"  name="postal_code" id="postal_code" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <input placeholder="Country"  name="country" id="country" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <input name="latitude" name="latitude" id="latitude" type="text" placeholder="Latitude" style="width: 161px;" hidden>
      </div>
      <div class="form-group col-md-12">
        <input name="longitude" name="longitude" id="longitude" type="text" placeholder="Longitude" style="width: 161px;" hidden>
      </div>  
    </div>

    <div class="tab form-group">License
      <div class="form-group col-md-12">
        <select select class="form-control select2" name="therapist" class="form-control">
         <option value="Physical Therapist" style="width:250px">Physical Therapist</option>
         <option value="Occupational Therapist" style="width:250px">Occupational therapy</option>
      </select>
      </div>
      <div class="form-group col-md-12">
        <input placeholder="License Number"  name="license_number" type="number" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <input class="form-control" placeholder="Expriry Date"  name="expiry_date" type="date">
      </div>
      <div class="form-group col-md-12">
        <label>License Imgae</label>
        <input type="file" name="license_image" id="fileUpload2" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <label>NBI Imgae</label>
        <input type="file" name="nbi_image" id="fileUpload3" class="form-control">
      </div>
      <div class="form-group col-md-12">
        <label>Barangay Clearance Imgae</label>
        <input type="file" name="bc_image" id="fileUpload4" class="form-control">
      </div>  
   </div>

    <div class="tab form-group">Profile
      <div class="form-group col-md-12">
        <input placeholder="User Name"  name="username" class="form-control">
      </div>
      <div class="form-group col-md-12">
         <input placeholder="Password"  name="password" type="password" class="form-control" data-confirmed="re-password">
      </div>
      <div class="form-group col-md-12">
        <input placeholder="Re-type Password"  name="re-password" type="password" class="form-control">
      </div>

    </div>

    <div class="tab form-group">Done
      <div class="col-md-12">
        <p style="text-align: justify;">Lorem ipsum dolor sit amet, sea harum delenit in. Ut omnis affert mel. Vel ea tantas labores officiis. Ignota noster elaboraret cum ad. No pri munere vocent interpretaris, ei sea mandamus laboramus tincidunt.

        Cum magna fuisset sadipscing in. Delenit labores quo ea, et est autem minim copiosae. Ea error utroque omnesque nam, facer tincidunt ut est, quis dicant aliquid ut vel. Cum at possim eleifend. Fuisset consetetur cu eum, scripserit persequeris cu vel.

        Te graeco imperdiet per, pri ea summo voluptatibus. Fierent voluptua pri ea, nam ex causae audire nominati. Eirmod aliquid gloriatur quo ne. Sed ea petentium philosophia, nibh pericula quaerendum vel at. Homero causae persius cum id. At pri natum error, ei vel dicant nostrud scriptorem.

        Nisl elit epicuri id vis, sea alterum commune deterruisset cu. Ea vel rebum fabulas deseruisse, mei cu nulla minim munere. Offendit placerat iracundia cum id, mea at brute vocent quaeque. Rebum feugait oportere at pro, sit regione persecuti eu, vel explicari accusamus splendide in. Sea at blandit ponderum.

        Essent accusamus scripserit per ad. Prima iracundia in nam, et qui graece facilis antiopam. Fastidii nominati contentiones duo ea. Has ne corpora albucius voluptaria.</p>

      </div>
      
       <div class="col-md-4 radio-inline">
        <span><input type="checkbox" style="float: left;">I accept the terms and conditions.</span>
       </div>  
    </div>

    <div style="overflow:auto;">
      <div style="float:right;">
        <button class="btn btn-sm-success" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button class="btn btn-sm-success" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        <button class="btn btn-sm-success" type="submit" id="subBtn" style="display:none">Submit</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>
 </div>

 <script>
      var placeSearch, autocomplete;
      var componentForm = {  
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_2: 'short_name',
        sublocality: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
      };
      
      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
     
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
     
        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }
        
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
      
      }
      google.maps.event.addDomListener(window, "load", initAutocomplete);
      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        
        }
     
     }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD85clj7B85QRZPmO6m4Fky0Wi6P0MzVpA&libraries=places&callback=initAutocomplete"
async defer></script>

@endsection