<!-- breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        @foreach($steps as $path => $step)
            @if($path === 'active')
                <li class="breadcrumb-item active" aria-current="page">{{ $step }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $path }}">{{ $step }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
