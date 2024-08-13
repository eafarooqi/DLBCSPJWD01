<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->picture }}" class="avatar img-fluid rounded" alt="{{Auth::user()->username}}" />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ url('/profile') }}"><i class="align-middle me-1" data-feather="user"></i> {{ __('Profile') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/logout') }}"><i class="align-middle me-1" data-feather="log-out"></i> {{ __('Logout') }}</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
