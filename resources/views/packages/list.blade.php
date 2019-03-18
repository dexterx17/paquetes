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
                    <h4 class="page-title float-left">Packages</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Uplon</a></li>
                        <li class="breadcrumb-item active">Packages</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Packages List</b>  
                        <a class="btn btn-sm waves-effect btn-secondary" href="{{ route('packages.create') }}"> <i class="fa fa-plus"></i> </a>
                    </h4>
                    <p class="text-muted font-13 m-b-30">
                        Registered4ackages
                    </p>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Dimensions</th>
                            <th>Volumentric Weight</th>
                            <th>Weight</th>
                            <th>Refrigeration</th>
                            <th>Fragile</th>
                            <th>Route</th>
                            <th>Actions</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($packages as $p)
                        <tr>
                            <td>{{ $p->description }}</td>
                            <td>
                                <ul>
                                    <li>Lenght: {{ $p->length }}</li>
                                    <li>Width: {{ $p->width }}</li>
                                    <li>Height: {{ $p->height }}</li>
                                </ul>
                            </td>
                            <td>{{  $p->volumetricWeight  }}</td>
                            <td>{{ $p->weight }}</td>
                            <td>{{ $p->refrigeration }}</td>
                            <td>{{ $p->fragile }}</td>
                            <td>{{ $p->origen }} - {{ $p->destino }} </td>
                            <td>
                                <a class="btn btn-sm waves-effect btn-secondary" href="{{ route('packages.edit',$p->id) }}"> <i class="fa fa-edit"></i> </a>
                                <button class="btn btn-sm waves-effect waves-light btn-danger"> <i class="fa fa-remove"></i> </button>
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