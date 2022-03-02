<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="#"><img src="{{ asset('files/logo.png') }}" alt="Legacy Network Logo" class="img-responsive logo" style="width: 235px; padding: 15px;"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>

        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url('/') }}/images/user.png" class="img-circle" alt="Avatar">
                        <span>{{ Auth::user()->first_name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('distributor') }}" ><i class="lnr lnr-user"></i> <span>Distributor Dashboard</span></a></li>
                        <li><a href="{{ url('logout') }}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->
