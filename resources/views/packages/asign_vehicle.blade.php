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
                                        <input type="text" name="weight" parsley-trigger="change" required value="0"
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

                                    <div class="form-group">
                                        <label for="vehicle_type_id">Vechicle asigned<span class="text-danger">*</span></label>
                                        {{ Form::select('vehicle_id', $vs, '', ['class'=> 'form-control', 'id'=> 'vehicle_id', 'required' => 'required'] ) }}
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


       <div class="row">
           
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <h4 class="header-title m-t-0">Map route

                <small  class="label label-info pull-right"><i id="distance">0</i> km</small>
                </h4>
                <hr>
                <div id="map"></div>
                <div id="warnings-panel">
                    
                </div>
            </div>
            <!--<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <h4 class="header-title m-t-0">Available vehicles
                </h4>
                 <hr>
                 <table  class="table table-condensed table-striped" data-tablesaw-mode="stack" id="table-vehicles">
                     <thead>
                         <tr>
                             <th>Vehicle</th>
                             <th class="text-center">
                              Volume capacity <br>
                              <small id="volume_info" class="label label-primary pull-right">0 VC</small>
                              </th>
                             <th class="text-center">Weight <br>
                              <small id="weight_info" class="label label-success pull-right">0 W</small>
                             </th>
                             <th class="text-center">Refrigeration <br>
                              <small id="refrigeration_info" class="label label-info pull-right">0</small>

                             </th>
                             <th class="text-center">Fragile <br>
                             <small id="fragile_info" class="label label-danger pull-right">0</small></th>
                             <th>Price x kilometer</th>
                             <th>Total Price</th>
                             <th>Formule</th>
                         </tr>
                     </thead>
                     <tbody id="vehicles">
                        @foreach($vehicles as $v)
                         <tr id="{{$v->id}}">
                             <td>{{ $v->model }} - {{ $v->type->type }}</td>
                             <td class="vc">{{ $v->volume_capacity }}</td>
                             <td class="lc">{{ $v->load_capacity }}</td>
                             <td class="ref">{{ $v->refrigeration }}</td>
                             <td class="fragil">{{ $v->fragile }}</td>
                             <td class="kpg">@if($v->type->kilometers_per_gallon != 0) {{ number_format(($v->fuel->cost / $v->type->kilometers_per_gallon), 2) }} @else 0 @endif</td>
                              <td class="total">
                              </td>
                              <td class="formula"></td>

                         </tr>
                         @endforeach
                     </tbody>
                 </table>
            </div>-->
            
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="3">
                                Entity Type
                            </th>
                            <th colspan="4" class="text-center">Filtering Values</th>
                            <th colspan="6" class="text-center">Ranking Values</th>
                            <th rowspan="3">Ranking Function <small>Total</small></th>
                            <th rowspan="3">Shipping price</th>
                        </tr>
                        <tr>
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
                            <th>Length <small>cm</small></th>
                            <th>Width <small>cm</small></th>
                            <th>Height <small>cm</small></th>
                            <th>Weight <small>cm</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Packet</th>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>500</td>
                            <td>-26</td>
                            <td>-24</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>500</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Car 1</th>
                            <td>200</td>
                            <td>100</td>
                            <td>100</td>
                            <td>700</td>
                            <td>-26</td>
                            <td>-24</td>
                            <td>200</td>
                            <td>100</td>
                            <td>100</td>
                            <td>500</td>
                            <td>0.84</td>
                            <td>32.99</td>
                        </tr>
                        <tr>
                            <th>Van 1</th>
                            <td>300</td>
                            <td>150</td>
                            <td>150</td>
                            <td>1000</td>
                            <td>-26</td>
                            <td>-24</td>
                            <td>300</td>
                            <td>150</td>
                            <td>150</td>
                            <td>1000</td>
                            <td>0.63</td>
                            <td>36.84</td>
                        </tr>
                        <tr>
                            <th>Truck 1</th>
                            <td>500</td>
                            <td>260</td>
                            <td>500</td>
                            <td>7000</td>
                            <td>-26</td>
                            <td>-24</td>
                            <td>500</td>
                            <td>260</td>
                            <td>600</td>
                            <td>7000</td>
                            <td>0.37</td>
                            <td>56.48</td>
                        </tr>
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
    
    <script type="text/javascript">

        function sortTable(table, col, reverse) {
            var tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
                tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
                i;
            reverse = -((+reverse) || -1);
            tr = tr.sort(function (a, b) { // sort rows
                return reverse // `-1 *` if want opposite order
                    * (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
                        .localeCompare(b.cells[col].textContent.trim())
                    );
            });
            for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
        }

        $(document).ready(function() {
            $('form').parsley();
        });

        $('#length, #width, #height, #weight').on('keyup',function(){
            ($(this).val().trim()!="")
          calculate_volumetric_weigth();
        });

        $('#refrigeration, #fragile').on('change',function(){
          calculate_volumetric_weigth();
        });

        function calculate_volumetric_weigth(){
          var length = parseFloat($('#length').val());
          var width = parseFloat($('#width').val());
          var height = parseFloat($('#height').val());
          var refrigeration = $('#refrigeration').is(':checked')? 1: 0;
          var fragile = $('#fragile').is(':checked')? 1: 0;

          console.log('refrigeration: '+ refrigeration);
          console.log('fragile: '+ fragile);

          var weight = parseFloat($('#weight').val());

          var kms = parseFloat($('#distance').html());

          var volume_capacity = (length * width * height)/5000;

          $('#volume_capacity').html(volume_capacity);
          $('#volume_info').html(volume_capacity + ' VC');
          $('#weight_info').html(weight + ' W');
          $('#refrigeration_info').html(refrigeration);
          $('#fragile_info').html(fragile);

          

          $('#vehicles tr').each(function(el){
            var counter = 0;
            var total_formula = 0;
            console.log('=================================');
            var vc = parseFloat($(this).find('.vc').html());
            if(volume_capacity < vc){
                $(this).find('.vc').removeClass('label-danger').addClass('label-success');
                total_formula += (vc*0.9);
                //total_formula += (length*0.9); //descomentar para aumentar el length en la formula
                //total_formula += (width*0.9); //descomentar para aumentar el width en la formula
                //total_formula += (height*0.9); //descomentar para aumentar el height en la formula
                counter++;
            }else{
                total_formula += (vc*0.1);
                //total_formula += (length*0.1); //descomentar para aumentar el length en la formula
                //total_formula += (width*0.1); //descomentar para aumentar el width en la formula
                //total_formula += (height*0.1); //descomentar para aumentar el height en la formula
                $(this).find('.vc').removeClass('label-success').addClass('label-danger');
            }

            var lc = parseFloat($(this).find('.lc').html());
            if(weight < lc){
              $(this).find('.lc').removeClass('label-danger').addClass('label-success');
              total_formula += (lc*0.9);
              counter++;
            }else{
              $(this).find('.lc').removeClass('label-success').addClass('label-danger');
              total_formula += (lc*0.1);
            }

            var ref = parseInt($(this).find('.ref').html().trim());
             if(refrigeration == ref){
              $(this).find('.ref').removeClass('label-danger').addClass('label-success');
              counter++;
              total_formula += (1*0.9);
            }else{
              $(this).find('.ref').removeClass('label-success').addClass('label-danger');
              total_formula += (1*0.1);
            }

            var fragil = $(this).find('.fragil').html();
            if(fragile == fragil){
                total_formula += (1*0.9);
                $(this).find('.fragil').removeClass('label-danger').addClass('label-success');
                counter++;
            }else{
              $(this).find('.fragil').removeClass('label-success').addClass('label-danger');
              total_formula += (1*0.1);
            }

            var kpg = parseFloat($(this).find('.kpg').html().trim());
            var total = $(this).find('.total');
            var formula_container = $(this).find('.formula');
            console.log('vc');
            console.log(volume_capacity);
            console.log(vc);
            console.log(lc);
            console.log(ref);
            console.log(fragil);
            console.log('kpg: '+ kpg);

            var t = kpg * kms;

            total.html(t.toFixed(2));
            formula_container.html(total_formula.toFixed(2));

            $(this).attr('valores',counter);
            if(counter<4){
                $(this).addClass('hidden');
            }else{
                $(this).removeClass('hidden');
            }

        });
            sortTable(document.getElementById('table-vehicles'),5 , false);
            var elegido = $('#vehicles tr[valores=4]:first()').attr('id');

            if(typeof(elegido) !== "undefined"){
                $('#vehicle_id').val(elegido);
            }else{
                alert('Ningun vehiculo cumple las condiciones para transportar este paquete');
            }
            
        }
        calculate_volumetric_weigth();
    </script>

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
        document.getElementById('distance').innerHTML = total;
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHQdHZjhN23Uc7hNNZ7ozxezHC2avJ4Lw&callback=initMap">
    </script>

@endsection