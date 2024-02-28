<li {{ $attributes->class(['sidebar-item', 'active' => $active]) }}>
    <a data-bs-target="#sidebar-{{$id}}" data-bs-toggle="collapse" class="sidebar-link @if(!$active) collapsed @endif">

        @if($icon && $iconType == 'feather')
            <i class="align-middle" data-feather="{{ $icon }}"></i>
        @endif

        @if($icon && $iconType == 'awesome')
            <i class="align-middle {{ $icon }}"></i>
        @endif

        <span class="align-middle">{{ $title }}</span>
    </a>
    <ul id="sidebar-{{$id}}" class="sidebar-dropdown list-unstyled collapse @if($active) show @endif" data-bs-parent="#sidebar">
        {{ $slot }}
    </ul>
</li>
