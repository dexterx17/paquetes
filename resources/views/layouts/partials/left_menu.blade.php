<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="{{ route('dashboard') }}" class="waves-effect"><span class="label label-pill label-primary float-right">1</span><i class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i> <span> Packages </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('packages.create') }}">Add package</a></li>
                        <li><a href="{{ route('packages.index') }}">Packages list</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-album"></i> <span> Vehicles </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('vehicles.create') }}">Add vehicle</a></li>
                        <li><a href="{{ route('vehicles.index') }}">Vehicles list</a></li>
                        <li><a href="#">-------</a></li>
                        <li><a href="#">Fuel Types</a></li>
                        <li><a href="#">Vehicle Types</a></li>
                    </ul>
                </li>
            
                <li class="text-muted menu-title">More</li>
             
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
</div>