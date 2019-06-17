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
                   <h4 class="page-title float-left">Info package</h4>

                   <ol class="breadcrumb float-right">
                       <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Uplon</a></li>
                       <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Packages</a></li>
                       <li class="breadcrumb-item active">Info</li>
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

                            <h4 class="header-title m-t-0">Package info
                                @if( $package->assign_attempt==0 )
                                <form action="{{ route('packages.assign', $package->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="distance" id="distance" readonly="readonly" >
                                    <button type="submit" class="btn btn-primary pull-right">Assing vehicle</button>
                                </form>
                                @else
                                    <a href="{{ route('packages.show',$package->id) }}#vehicles"  class="btn btn-secondary pull-right">Assigned Vehicle</a>
                                @endif
                            </h4>
                            <p class="text-muted font-13 m-b-10">
                                Details of Package
                            </p>

                            <div class="p-20">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="description">Description<span class="text-danger">*</span></label>
                                                <input type="text" name="description" parsley-trigger="change" required value="{{ $package->description }}"
                                                        placeholder="Enter description" class="form-control" id="description" disabled="disabled">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="length">Volume capacity <small id="volume_capacity" class="label label-info">(0.0)</small> </label>
                                                
                                                <div class="row">
                                                    <small for="length" class="col-lg-1 col-md-1">Length: <span class="text-danger">*</span> </small>
                                                    <input type="text" name="length" parsley-trigger="change" required value="{{ $package->length }}" disabled="disabled"
                                                            placeholder="Enter length" class="form-control col-lg-3 col-md-3" id="length">
                                                    <small for="width" class="col-lg-1 col-md-1">Width: <span class="text-danger">*</span> </small>
                                                    <input type="text" name="width" parsley-trigger="change" required value="{{ $package->width }}" disabled="disabled"
                                                            placeholder="Enter width" class="form-control col-lg-3 col-md-3" id="width">
                                                    <small for="height" class="col-lg-1 col-md-1">Height: <span class="text-danger">*</span> </small>
                                                    <input type="text" name="height" parsley-trigger="change" required value="{{ $package->height }}" disabled="disabled"
                                                            placeholder="Enter height" class="form-control col-lg-3 col-md-3" id="height">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="weight">Weight<span class="text-danger">*</span></label>
                                                <input type="text" name="weight" parsley-trigger="change" required value="{{ $package->weight }}" disabled="disabled"
                                                        placeholder="Enter weight" class="form-control" id="weight">
                                            </div>


                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <input id="refrigeration" type="checkbox" name="refrigeration" @if($package->refrigeration) checked @endif  disabled="disabled">
                                                    <label for="refrigeration"> Needs refrigeration </label>
                                                </div>
                                                <div class="row">
                                                    <small for="min_temp" class="col-lg-2 col-md-2">Min temperature: <span class="text-danger">*</span> </small>
                                                    <input type="number" name="min_temp" parsley-trigger="change" value="{{ $package->min_temp }}"  disabled="disabled"
                                                            placeholder="Enter length" class="form-control col-lg-4 col-md-4" id="min_temp">
                                                    <small for="max_temp" class="col-lg-2 col-md-2">Max temperature: <span class="text-danger">*</span> </small>
                                                    <input type="number" name="max_temp" parsley-trigger="change"  value="{{ $package->max_temp }}"  disabled="disabled"
                                                            placeholder="Enter width" class="form-control col-lg-4 col-md-4" id="max_temp">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="origen">Origen<span class="text-danger">*</span></label>
                                                <div class="row">
                                                  <input type="text" name="origen" parsley-trigger="change" required value="{{ $package->origen }}"  disabled="disabled"
                                                      placeholder="Enter origen" class="form-control col-lg-12 col-md-12" id="origen">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="destino">Destino<span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <input type="text" name="destino" parsley-trigger="change" required value="{{ $package->destino }}"  disabled="disabled"
                                                        placeholder="Enter destino" class="form-control col-lg-12 col-md-12" id="destino">
                                                </div>      
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6 col-xs-12">
                                            <h4 class="header-title m-t-0">Map

                                            <small class="pull-right"> 
                                              <label for="distance">Distance: </label>
                                                <span class="distance"></span>
                                              </small>
                                            </h4>
                                            <hr>
                                            <div id="map"></div>
                                            <div id="warnings-panel">
                                                
                                            </div>
                                        </div>
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

        <div class="row" id="vehicles">
    
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Entity Type
                            </th>
                            <th>Length <small>cm</small></th>
                            <th>Width <small>cm</small></th>
                            <th>Height <small>cm</small></th>
                            <th>Weight <small>cm</small></th>
                            <th colspan="2">
                                <table>
                                <tr><td colspan="2">Refrigeration</td></tr>
                                <tr>
                                    <th>Min_rf</th>
                                    <th>Max_rf</th>
                                </tr>
                                </table>
                            </th>
                            <th rowspan="3">Ranking Function <small>Total</small></th>
                            <th rowspan="3">Shipping price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Packet</th>
                            <td>{{ $package->length }}</td>
                            <td>{{ $package->width }}</td>
                            <td>{{ $package->height }}</td>
                            <td>{{ $package->weight }}</td>
                            <td>{{ $package->min_temp }}</td>
                            <td>{{ $package->max_temp }}</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        @if( $package->assign_attempt==0 )
                        <tr>
                            <td>Aún no has asignado un vehículo</td>
                        </tr>
                        @else
                            @if( $package->assign_attempt==0 )
                                @foreach($package->vehicles as $v)
                                <tr @if($v->winner) class="bg-success" @endif>
                                    <th class="text-center">{{ $v->vehicle->model }}</th>
                                    <td class="text-center">{{ $v->vehicle->length }}</td>
                                    <td class="text-center">{{ $v->vehicle->width }}</td>
                                    <td class="text-center">{{ $v->vehicle->height }}</td>
                                    <td class="text-center">{{ $v->vehicle->weight }}</td>
                                    <td class="text-center">{{ $v->vehicle->min_rf }}</td>
                                    <td class="text-center">{{ $v->vehicle->max_rf }}</td>
                                    <td class="text-center">{{  number_format($v->value, 2)  }}</td>
                                    <td class="text-center">{{ number_format($v->cost, 2) }}</td>
                                </tr>
                                @endforeach
                            @else
                            
                            @endif
                        @endif
                    </tbody>
                </table>
            </div>
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
            });

            geocodeOrigen(geocoder,map);
            geocodeDestino(geocoder,map);
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
        $('#distance').val(total);
        $('.distance').html(total+' km');
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHQdHZjhN23Uc7hNNZ7ozxezHC2avJ4Lw&callback=initMap">
    </script>

@endsection