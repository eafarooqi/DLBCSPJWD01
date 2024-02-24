<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
            <span class="sidebar-brand-text align-middle">
                {{ config('app.name') }}
            </span>
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
                 stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="{{ Auth::user()->picture }}" class="avatar img-fluid rounded me-1" alt="{{Auth::user()->lastname}}" />
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="{{ route('profile') }}"><i class="align-middle me-1" data-feather="user"></i> {{ __('Profile') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}"><i class="align-middle me-1" data-feather="log-out"></i> {{ __('.Logout') }}</a>
                    </div>

                    <div class="sidebar-user-subtitle">User</div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <x-dynamic-component :component="'sidebars.'.$activeApp.'-sidebar'" :active="$activeSidebarItem" />
        </ul>
    </div>
</nav>
