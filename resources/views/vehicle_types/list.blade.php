@extends('layouts.base')
@section('css')

<!-- DataTables -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')

 <div class="content">
    
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Vehicle types</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Uplon</a></li>
                        <li class="breadcrumb-item active">Vehicle types</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Vehicle types List</b>  
                        <a class="btn btn-sm waves-effect btn-secondary" href="{{ route('vehicle_types.create') }}"> <i class="fa fa-plus"></i> </a>
                    </h4>
                    <p class="text-muted font-13 m-b-30">
                        Registered vehicle types
                    </p>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Cost Per Kilometer</th>
                            <th>Maintenance</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($types as $type)
                        <tr>
                            <td>{{ $type->type }}</td>
                            <td>$ {{ $type->cost_per_kilometer }}</td>
                            <td>$ {{ $type->maintenance }}</td>
                            <td>{{ $type->description }}</td>
                            <td>
                                <form action="{{ route('vehicle_types.destroy',$type->id) }}" method="post" accept-charset="utf-8">
                                    
                                    <a class="btn btn-sm waves-effect btn-secondary" href="{{ route('vehicle_types.edit',$type->id) }}"> <i class="fa fa-edit"></i> </a>
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-sm waves-effect waves-light btn-danger"> <i class="fa fa-remove"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container -->

</div>

@endsection

@section('js')
<!-- Required datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>
@endsection