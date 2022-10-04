<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($links as $link)
            @if($link['link'] == '/')
                <li class="breadcrumb-item">{{ $link['name'] }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $link['link'] }}">{{ $link['name'] }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
