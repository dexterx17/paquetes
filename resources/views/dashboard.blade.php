@extends('layouts.base')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Dashboard</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Uplon</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-layers float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Packages</h6>
                    <h2 class="m-b-20" data-plugin="counterup">1,587</h2>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-paypal float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Vehicles</h6>
                    <h2 class="m-b-20"><span data-plugin="counterup">12</span></h2>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-chart float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Fuel Types</h6>
                    <h2 class="m-b-20"><span data-plugin="counterup">3</span></h2>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-rocket float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Vehicle Types</h6>
                    <h2 class="m-b-20" data-plugin="counterup">5</h2>
                </div>
            </div>
        </div>
        <!-- end row -->





    </div> <!-- container -->

</div>
@endsection

@section('js')
        <!-- Page specific js -->
<script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>

@endsection