<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @section('header')
        @include('sections.default._head')
    @show
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">

<div class="wrapper jscontainer">

    @section('sidebar')
        @include('sections.default._sidenav')
    @show

    <div class="main">
        @section('topbar')
            @include('sections.default._topbar')
        @show

        @section('breadcrumb')
            @include('sections.default._breadcrumb')
        @show

        @yield('content')
        @yield('modals')
        @yield('canvas')
        {{ $slot ?? '' }}

        @section('footer')
            @include('sections.default._footer')
        @show
    </div>

    @section('scripts')
        @include('sections.default._scripts')
    @show

</div>
</body>
</html>
