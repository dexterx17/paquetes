@extends('layouts.base')

@section('css')

    <!--tablesaw css-->
    <link href="{{ asset('assets/plugins/tablesaw/dist/tablesaw.css') }}" rel="stylesheet" type="text/css" />

  <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        width: 100%;
        height: 350px;
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
      #vehicles tr.hidden{
          opacity: 0.4;
      }
    </style>

@endsection
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

                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="description">Description<span class="text-danger">*</span></label>
                                                <input type="text" name="description" parsley-trigger="change" required 
                                                        placeholder="Enter description" class="form-control" id="description">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="length">Volume capacity <small id="volume_capacity" class="label label-info">(0.0)</small> </label>
                                                
                                                <div class="row">
                                                    <small for="length" class="col-lg-1 col-md-1">Length: <span class="text-danger">*</span> </small>
                                                    <input type="text" name="length" parsley-trigger="change" required value="0"
                                                            placeholder="Enter length" class="form-control col-lg-3 col-md-3" id="length">
                                                    <small for="width" class="col-lg-1 col-md-1">Width: <span class="text-danger">*</span> </small>
                                                    <input type="text" name="width" parsley-trigger="change" required value="0"
                                                            placeholder="Enter width" class="form-control col-lg-3 col-md-3" id="width">
                                                    <small for="height" class="col-lg-1 col-md-1">Height: <span class="text-danger">*</span> </small>
                                                    <input type="text" name="height" parsley-trigger="change" required value="0"
                                                            placeholder="Enter height" class="form-control col-lg-3 col-md-3" id="height">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="weight">Weight<span class="text-danger">*</span></label>
                                                <input type="text" name="weight" parsley-trigger="change" required value="0"
                                                        placeholder="Enter weight" class="form-control" id="weight">
                                            </div>


                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <input id="refrigeration" type="checkbox" name="refrigeration">
                                                    <label for="refrigeration"> Needs refrigeration </label>
                                                </div>
                                                <div class="row">
                                                    <small for="min_temp" class="col-lg-2 col-md-2">Min temperature: <span class="text-danger">*</span> </small>
                                                    <input type="number" name="min_temp" parsley-trigger="change" value="0"
                                                            placeholder="Enter length" class="form-control col-lg-4 col-md-4" id="min_temp">
                                                    <small for="max_temp" class="col-lg-2 col-md-2">Max temperature: <span class="text-danger">*</span> </small>
                                                    <input type="number" name="max_temp" parsley-trigger="change"  value="0"
                                                            placeholder="Enter width" class="form-control col-lg-4 col-md-4" id="max_temp">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="origen">Origen<span class="text-danger">*</span></label>
                                                <div class="row">
                                                  <input type="text" name="origen" parsley-trigger="change" required
                                                      placeholder="Enter origen" class="form-control col-lg-10 col-md-10" id="origen">
                                                      <button type="button" class="btn btn-primary col-lg-2 col-md-2" id="btn-origen">Locate</button>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="destino">Destino<span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <input type="text" name="destino" parsley-trigger="change" required
                                                        placeholder="Enter destino" class="form-control col-lg-10 col-md-10" id="destino">
                                                    <button type="button" class="btn btn-primary col-lg-2 col-md-2" id="btn-destino">Locate</button>
                                                </div>      
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6 col-xs-12">
                                            <h4 class="header-title m-t-0">Map

                                            <small class="pull-right"> 
                                              <label for="distance">Distance</label>
                                                <input type="text" name="distance" id="distance" value="0" readonly="readonly">
                                              </small>
                                            </h4>
                                            <hr>
                                            <div id="map"></div>
                                            <div id="warnings-panel">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group text-center m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Submit Package
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

   </div> <!-- container -->

</div>

@endsection

@section('js')
    <!-- Validation js (Parsleyjs) -->
    <script type="text/javascript" src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
        <script>

        var geocoder;
        var map;
        var directionsService;
        var directionsDisplay;

        var puntoOrigen;
        var puntoDestino;

        $('#btn-origen').on('click',function(){
            console.log('');
            geocodeOrigen(geocoder,map);
        });

        $('#btn-destino').on('click',function(){
            console.log('');
            geocodeDestino(geocoder,map);
        });

        function geocodeOrigen(geocoder, resultsMap) {
            var address = document.getElementById('origen').value;
            geocoder.geocode({'address': address}, function(results, status) {
              if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                puntoOrigen = new google.maps.Marker({
                  map: resultsMap,
                  position: results[0].geometry.location
                });
                calcularRuta();
                
              } else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });


        }

        function geocodeDestino(geocoder, resultsMap) {
            var address = document.getElementById('destino').value;
            geocoder.geocode({'address': address}, function(results, status) {
              if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                puntoDestino = new google.maps.Marker({
                  map: resultsMap,
                  position: results[0].geometry.location
                });
                calcularRuta();
              } else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });
        }

        function calcularRuta(){

            console.log('origen');
            console.log(puntoOrigen);

            console.log('destino');
            console.log(puntoDestino);

            var origen 
            if((typeof puntoOrigen !== "undefined") && (typeof puntoDestino !== "undefined")){

                 var origen = document.getElementById('origen').value;
                 var destino = document.getElementById('destino').value;
                displayRoute(origen, destino, directionsService, directionsDisplay);
            }
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 4,
              center: {lat: -0.183503, lng: -78.464876}  // Quito
            });

            directionsService = new google.maps.DirectionsService;
            directionsDisplay = new google.maps.DirectionsRenderer({
              draggable: true,
              map: map,
              panel: document.getElementById('right-panel')
            });

            geocoder = new google.maps.Geocoder();

            directionsDisplay.addListener('directions_changed', function() {
              computeTotalDistance(directionsDisplay.getDirections());
              calculate_volumetric_weigth();
            });


         
        }

      function displayRoute(origin, destination, service, display) {
        service.route({
          origin: origin,
          destination: destination,
          //waypoints: [{location: 'Adelaide, SA'}, {location: 'Broken Hill, NSW'}],
          waypoints: [],
          travelMode: 'DRIVING',
          avoidTolls: true
        }, function(response, status) {
          if (status === 'OK') {
            display.setDirections(response);
          } else {
            alert('Could not display directions due to: ' + status);
          }
        });
      }

      function computeTotalDistance(result) {
        console.log(result);
        var total = 0;
        var myroute = result.routes[0];
        var origen = myroute.legs[0].start_address;
        var destino = myroute.legs[0].end_address;
        $('#origen').val(origen);
        $('#destino').val(destino);
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('distance').value = total;
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHQdHZjhN23Uc7hNNZ7ozxezHC2avJ4Lw&callback=initMap">
    </script>

@endsection