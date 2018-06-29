@foreach($menu as $item)
<a href="{{ $item->path }}">{{ $item->name }}</a>
@endforeach
