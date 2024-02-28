<li {{ $attributes->class(['sidebar-item', 'active' => $active]) }}>
    <a href="{{ $link }}" class="sidebar-link" @if($target) target="{{ $target }}" @endif>
        @if($abbr)
            <span class="sidebar-text-contracted">{{ $abbr }}</span>
        @endif

        @if($icon && $iconType == 'feather')
            <i class="align-middle" data-feather="{{ $icon }}"></i>
        @endif

        @if($icon && $iconType == 'awesome')
            <i class="align-middle {{ $icon }}"></i>
        @endif

        <span class="align-middle">{{ $title }}</span>
    </a>
</li>
