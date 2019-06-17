@extends('layouts.base')

@section('content')

<div class="content">
   
   <div class="container-fluid">

       <div class="row">
           <div class="col-xl-12">
               <div class="page-title-box">
                   <h4 class="page-title float-left">Add Vehicle type</h4>

                   <ol class="breadcrumb float-right">
                       <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Uplon</a></li>
                       <li class="breadcrumb-item"><a href="{{ route('vehicle_types.index') }}">Vehicle types</a></li>
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

                            <h4 class="header-title m-t-0">Vehicle type info</h4>
                            <p class="text-muted font-13 m-b-10">
                                Insert details of Vehicle type
                            </p>

                            <div class="p-20">
                                <form action="{{ route('vehicle_types.store') }}" data-parsley-validate novalidate  method="POST" >
                                {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="type">Type<span class="text-danger">*</span></label>
                                        <input type="text" name="type" parsley-trigger="change" required 
                                                placeholder="Enter type" class="form-control" id="type">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" parsley-trigger="change"
                                                placeholder="Enter description" class="form-control" id="description">
                                    </div>

                                    <div class="form-group">
                                        <label for="cost_per_kilometer">Cost per gallon<span class="text-danger">*</span></label>
                                        <input type="text" name="cost_per_kilometer" parsley-trigger="change" required
                                                placeholder="Enter cost_per_kilometer capacity" class="form-control" id="cost_per_kilometer">
                                    </div>

                                    <div class="form-group">
                                        <label for="maintenance">Maintenance<span class="text-danger">*</span></label>
                                        <input type="text" name="maintenance" parsley-trigger="change" required
                                                placeholder="Enter maintenance capacity" class="form-control" id="maintenance">
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