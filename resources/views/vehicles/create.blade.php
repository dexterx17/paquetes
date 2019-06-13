@extends('layouts.base')

@section('content')

<div class="content">
   
   <div class="container-fluid">

       <div class="row">
           <div class="col-xl-12">
               <div class="page-title-box">
                   <h4 class="page-title float-left">Add vehicle</h4>

                   <ol class="breadcrumb float-right">
                       <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Uplon</a></li>
                       <li class="breadcrumb-item"><a href="{{ route('vehicles.index') }}">Vehicles</a></li>
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

                            <h4 class="header-title m-t-0">Vehicle info</h4>
                            <p class="text-muted font-13 m-b-10">
                                Insert details of vehicle
                            </p>

                            <div class="p-20">
                                <form action="{{ route('vehicles.store') }}" data-parsley-validate novalidate  method="POST" >
                                {{ csrf_field() }}
                                
                                    <div class="form-group">
                                        <label for="vehicle_type_id">Type<span class="text-danger">*</span></label>
                                        {{ Form::select('vehicle_type_id', $vehicle_types, '', ['class'=> 'form-control', 'id'=> 'vehicle_type_id', 'required' => 'required'] ) }}
                                    </div>

                                    <div class="form-group">
                                        <label for="model">Model<span class="text-danger"></span></label>
                                        <input type="text" name="model" parsley-trigger="change"
                                                placeholder="Enter model" class="form-control" id="model">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="plaque">Plaque<span class="text-danger">*</span></label>
                                        <input type="text" name="plaque" parsley-trigger="change" required
                                                placeholder="Enter plaque" class="form-control" id="plaque">
                                    </div>

                                    <div class="form-group">
                                        <label for="height">Height capacity<span class="text-danger">*</span></label>
                                        <input type="text" name="height" parsley-trigger="change" required
                                                placeholder="Enter Height capacity" class="form-control" id="height">
                                    </div>

                                    <div class="form-group">
                                        <label for="width">Width capacity<span class="text-danger">*</span></label>
                                        <input type="text" name="width" parsley-trigger="change" required
                                                placeholder="Enter Width capacity" class="form-control" id="width">
                                    </div>

                                    <div class="form-group">
                                        <label for="weight">Weight capacity<span class="text-danger">*</span></label>
                                        <input type="text" name="weight" parsley-trigger="change" required
                                                placeholder="Enter Weight capacity" class="form-control" id="weight">
                                    </div>

                                    <div class="form-group">
                                        <label for="length">Length capacity<span class="text-danger">*</span></label>
                                        <input type="text" name="length" parsley-trigger="change" required
                                                placeholder="Enter Length capacity" class="form-control" id="length">
                                    </div>

                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input id="refrigeration" type="checkbox" name="refrigeration">
                                            <label for="refrigeration"> Has refrigeration </label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="min_rf">Min temperature capacity</label>
                                        <input type="text" name="min_rf" parsley-trigger="change"
                                                placeholder="Enter Min temperature capacity" class="form-control" id="min_rf">
                                    </div>

                                    <div class="form-group">
                                        <label for="max_rf">Max temperature capacity</label>
                                        <input type="text" name="max_rf" parsley-trigger="change"
                                                placeholder="Enter Max temperature capacity" class="form-control" id="max_rf">
                                    </div>

                                    <div class="form-group">
                                        <label for="fuel_type_id">Fuel<span class="text-danger">*</span></label>
                                        {{ Form::select('fuel_type_id', $fuel_types, '', ['class'=> 'form-control', 'id'=> 'fuel_type_id', 'required' => 'required'] ) }}
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
@endsection