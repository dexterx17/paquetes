@extends('layouts.base')

@section('css')

@endsection
  <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        width: 100%;
        height: 400px;
      }
      /* Optional: Makes the sample page fill the window. */
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #warnings-panel {
        width: 100%;
        height:10%;
        text-align: center;
      }
    </style>

@section('content')

<div class="content">
   
   <div class="container-fluid">

       <div class="row">
           <div class="col-xl-12">
               <div class="page-title-box">
                   <h4 class="page-title float-left">Add package</h4>

                   <ol class="breadcrumb float-right">
                       <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Uplon</a></li>
                       <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Packages</a></li>
                       <li class="breadcrumb-item active">New</li>
                   </ol>

                   <div class="clearfix"></div>
               </div>
           </div>
       </div>
       <!-- end row -->
       <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12">

                            <h4 class="header-title m-t-0">Package info</h4>
                            <p class="text-muted font-13 m-b-10">
                                Insert details of Package
                            </p>

                            <div class="p-20">
                                <form action="{{ route('packages.store') }}" data-parsley-validate novalidate  method="POST" >
                                {{ csrf_field() }}
                                <input type="hidden" name="vehicle_id" value="1" id="vehicle_id">
                                    <div class="form-group">
                                        <label for="description">Description<span class="text-danger"></span></label>
                                        <input type="text" name="description" parsley-trigger="change"
                                                placeholder="Enter description" class="form-control" id="description">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="length">Volume capacity <small>(0.0)</small> </label>
                                        
                                        <div class="row">
                                            <small for="length" class="col-lg-1 col-md-1">Length: <span class="text-danger">*</span> </small>
                                            <input type="text" name="length" parsley-trigger="change" required value="0"
                                                    placeholder="Enter length" class="form-control col-lg-3 col-md-3" id="length">
                                            <small for="length" class="col-lg-1 col-md-1">Width: <span class="text-danger">*</span> </small>
                                            <input type="text" name="width" parsley-trigger="change" required value="0"
                                                    placeholder="Enter width" class="form-control col-lg-3 col-md-3" id="width">
                                            <small for="length" class="col-lg-1 col-md-1">Height: <span class="text-danger">*</span> </small>
                                            <input type="text" name="height" parsley-trigger="change" required value="0"
                                                    placeholder="Enter height" class="form-control col-lg-3 col-md-3" id="height">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="weight">Weight<span class="text-danger">*</span></label>
                                        <input type="text" name="weight" parsley-trigger="change" required
                                                placeholder="Enter weight" class="form-control" id="weight">
                                    </div>


                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input id="refrigeration" type="checkbox" name="refrigeration">
                                            <label for="refrigeration"> Needs refrigeration </label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input id="fragile" type="checkbox" name="fragile">
                                            <label for="fragile"> Is fragil </label>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="origen">Origen<span class="text-danger">*</span></label>
                                        <input type="text" name="origen" parsley-trigger="change" required
                                                placeholder="Enter origen" class="form-control" id="origen">
                                    </div>


                                    <div class="form-group">
                                        <label for="destino">Destino<span class="text-danger">*</span></label>
                                        <input type="text" name="destino" parsley-trigger="change" required
                                                placeholder="Enter destino" class="form-control" id="destino">
                                    </div>

                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->

                </div>
            </div><!-- end col-->

        </div>
        <!-- end row --> 


       <div class="row">
           
            <div class="col-12">
                <div class="card-box">

                    <div class="row">
                        <div class="col-sm-6 col-xs-6 col-md-6">
                            <div id="floating-panel">
                                <b>Start: </b>
                                <select id="start">
                                  <option value="chicago, il">Chicago</option>
                                  <option value="st louis, mo">St Louis</option>
                                  <option value="joplin, mo">Joplin, MO</option>
                                  <option value="oklahoma city, ok">Oklahoma City</option>
                                  <option value="amarillo, tx">Amarillo</option>
                                  <option value="gallup, nm">Gallup, NM</option>
                                  <option value="flagstaff, az">Flagstaff, AZ</option>
                                  <option value="winona, az">Winona</option>
                                  <option value="kingman, az">Kingman</option>
                                  <option value="barstow, ca">Barstow</option>
                                  <option value="san bernardino, ca">San Bernardino</option>
                                  <option value="los angeles, ca">Los Angeles</option>
                                </select>
                                <b>End: </b>
                                <select id="end">
                                  <option value="chicago, il">Chicago</option>
                                  <option value="st louis, mo">St Louis</option>
                                  <option value="joplin, mo">Joplin, MO</option>
                                  <option value="oklahoma city, ok">Oklahoma City</option>
                                  <option value="amarillo, tx">Amarillo</option>
                                  <option value="gallup, nm">Gallup, NM</option>
                                  <option value="flagstaff, az">Flagstaff, AZ</option>
                                  <option value="winona, az">Winona</option>
                                  <option value="kingman, az">Kingman</option>
                                  <option value="barstow, ca">Barstow</option>
                                  <option value="san bernardino, ca">San Bernardino</option>
                                  <option value="los angeles, ca">Los Angeles</option>
                                </select>
                            </div>
                            <div id="map"></div>
                            <div id="warnings-panel">
                                
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-6">
                            <h4 class="header-title m-t-0">Available vehicles

                            <small id="distance" class="label label-info pull-right">0 km</small>
                            </h4>
                             <hr>
                             <table class="table table-striped">
                                 <thead>
                                     <tr>
                                         <th>Vehicle</th>
                                         <th>Volume capacity</th>
                                         <th>Weight</th>
                                         <th>Refrigeration</th>
                                         <th>Fragile</th>
                                         <th>Price</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($vehicles as $v)
                                     <tr>
                                         <td>{{ $v->model }} - {{ $v->type->type }}</td>
                                         <td>{{ $v->volume_capacity }}</td>
                                         <td>{{ $v->load_capacity }}</td>
                                         <td>{{ $v->refrigeration }}</td>
                                         <td>{{ $v->fragile }}</td>
                                         <td></td>

                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
            </div><!-- end col-->

        </div>
        <!-- end row --> 

   </div> <!-- container -->

</div>

@endsection

@section('js')
    <!-- Validation js (Parsleyjs) -->
    <script type="text/javascript" src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>

        <script>
      function initMap() {
        var markerArray = [];

        // Instantiate a directions service.
        var directionsService = new google.maps.DirectionsService;

        // Create a map and center it on Manhattan.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 40.771, lng: -73.974}
        });

        // Create a renderer for directions and bind it to the map.
        var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

        // Instantiate an info window to hold step text.
        var stepDisplay = new google.maps.InfoWindow;

        // Display the route between the initial start and end selections.
        calculateAndDisplayRoute(
            directionsDisplay, directionsService, markerArray, stepDisplay, map);
        // Listen to change events from the start and end lists.
        var onChangeHandler = function() {
          calculateAndDisplayRoute(
              directionsDisplay, directionsService, markerArray, stepDisplay, map);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsDisplay, directionsService,
          markerArray, stepDisplay, map) {
        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
          markerArray[i].setMap(null);
        }

        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'WALKING'
        }, function(response, status) {
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') {
            console.log(response);
            document.getElementById('distance').innerHTML = response.routes[0].legs[0].distance.value+" km.";
            document.getElementById('warnings-panel').innerHTML =
                '<b>' + response.routes[0].warnings + '</b>';
            directionsDisplay.setDirections(response);
            showSteps(response, markerArray, stepDisplay, map);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

      function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];
        for (var i = 0; i < myRoute.steps.length; i++) {
          var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
          marker.setMap(map);
          marker.setPosition(myRoute.steps[i].start_location);
          attachInstructionText(
              stepDisplay, marker, myRoute.steps[i].instructions, map);
        }
      }

      function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
          // Open an info window when the marker is clicked on, containing the text
          // of the step.
          stepDisplay.setContent(text);
          stepDisplay.open(map, marker);
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHQdHZjhN23Uc7hNNZ7ozxezHC2avJ4Lw&callback=initMap">
    </script>

@endsection