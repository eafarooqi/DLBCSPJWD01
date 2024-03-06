<div class="row p-2 ps-5 pb-0">
    <div class="col-lg-10">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/')  }}"><span class="fa fa-home"></span></a></li>
            @foreach ($links as $link)
                <li class="breadcrumb-item"><a href="{{ $link['url'] }}">{{ $link['key'] }}</a></li>
            @endforeach
            {{ $slot }}
            <li class="breadcrumb-item active"><strong>{{ $activePage }}</strong></li>
        </ol>
    </div>
</div>
