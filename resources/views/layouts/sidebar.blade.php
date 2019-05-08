<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <!--<a href="index.html" class="logo text-center">Admiria</a>-->
            <a href="{{route('dashboard')}}" class="logo"><img src="{{asset('assets/images/logo-sm.png')}}" height="36" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                </li>
                @if(isset($permissions))

                    @if(hasResourcePermission($permissions,'users'))
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user text-muted"></i><span> Users <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="list-unstyled">
                            @if(hasActionResourcePermission($permissions,'users','create'))
                                <li><a href="{{route('users.create')}}">Add New</a></li>
                            @endif
                            @if(hasActionResourcePermission($permissions,'users','index'))
                                <li><a href="{{route('users.index')}}">Users List</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if(hasResourcePermission($permissions,'roles'))
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ion-person-stalker text-muted"></i><span> Roles <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="list-unstyled">
                                @if(hasActionResourcePermission($permissions,'roles','create'))
                                    <li><a href="{{route('roles.create')}}">Add New</a></li>
                                @endif
                                @if(hasActionResourcePermission($permissions,'roles','index'))
                                    <li><a href="{{route('roles.index')}}">Roles List</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(hasResourcePermission($permissions,'permissions') && hasActionResourcePermission($permissions, 'permissions','index'))
                        <li>
                            <a href="{{route('permissions.index')}}" class="waves-effect"><i class="dripicons-gear text-muted"></i> <span> Permissions </span> </a>
                        </li>
                    @endif

                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->