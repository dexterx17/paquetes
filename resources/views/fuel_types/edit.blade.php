@extends('layouts.base')

@section('content')

<div class="content">
   
   <div class="container-fluid">

       <div class="row">
           <div class="col-xl-12">
               <div class="page-title-box">
                   <h4 class="page-title float-left">Edit Fuel Type</h4>

                   <ol class="breadcrumb float-right">
                       <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Uplon</a></li>
                       <li class="breadcrumb-item"><a href="{{ route('fuel_types.index') }}">Fuel Types</a></li>
                       <li class="breadcrumb-item active">Edit</li>
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

                            <h4 class="header-title m-t-0">Fuel Type info</h4>
                            <p class="text-muted font-13 m-b-10">
                                Insert details of Fuel Type
                            </p>

                            <div class="p-20">
                                <form action="{{ route('fuel_types.update', $type->id) }}" data-parsley-validate novalidate  method="POST" >
                                {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="put">

                                    <div class="form-group">
                                        <label for="fuel">Fuel<span class="text-danger">*</span></label>
                                        <input type="text" name="fuel" parsley-trigger="change" value="{{ $type->fuel }}" required
                                                placeholder="Enter fuel" class="form-control" id="fuel">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="description">Description<span class="text-danger">*</span></label>
                                        <input type="text" name="description" parsley-trigger="change"  value="{{ $type->description }}"
                                                placeholder="Enter description" class="form-control" id="description">
                                    </div>

                                    <div class="form-group">
                                        <label for="cost">Cost per killometer<span class="text-danger">*</span></label>
                                        <input type="text" name="cost" parsley-trigger="change" required   value="{{ $type->cost }}"
                                                placeholder="Enter cost per killometer" class="form-control" id="cost">
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