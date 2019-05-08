<!-- Top Bar Start -->
<div class="topbar">

    <nav class="navbar-custom">
        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input" type="search" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <ul class="list-inline float-right mb-0">
            <!-- User-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user profile-box" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <?php $profile_path = Auth::user()->profile ? asset('/uploads/profile/'.Auth::user()->profile):asset('/images/default-profile.png'); ?>
                    <img src="{{$profile_path}}" alt="{{Auth::user()->name}}" class="rounded-circle">
                    <h6><?php echo Auth::user()->name; ?></h6>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown" style="margin-right: 25px;">
                    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{URL::to('password/change')}}"><i class="fa fa-bars"></i> Change Password</a>
                    <a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="dripicons-exit text-muted"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>

        <!-- Page title -->
        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
            <li class="hide-phone list-inline-item app-search">
                <h3 class="page-title">@yield('page-title')</h3>
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>

</div>
<!-- Top Bar End -->