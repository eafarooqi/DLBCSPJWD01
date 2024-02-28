<li {{ $attributes->class(['sidebar-item', 'active' => $active]) }}>
    <a href="{{ $link }}" class="sidebar-link">
        @if($abbr)
            <span class="sidebar-text-contracted {{ $active ? 'ms-n2': ''  }}">
                @if($active)
                    <span class="icon-badge-active-sidebar-contracted rounded-circle tmh-bg-white"></span>
                @endif
                {{ $abbr }}
            </span>
        @endif

        @if($icon)
            <i class="fa {{ $icon }}"></i>
        @endif
        <span class="sidebar-text {{ $active ? 'ms-n2-5': ''  }}">
            @if($active)
                <span class="icon-badge-active-sidebar rounded-circle tmh-bg-white "></span>
            @endif
            {{ $title }}
        </span>
    </a>
</li>
