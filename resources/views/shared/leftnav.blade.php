<ul class="list-group">
    @foreach($menu as $item)
        <li class="list-group-item {{ $item->active ? 'active': '' }}"><a href="{{ $item->path }}">{{ $item->name }}</a></li>
    @endforeach
</ul>
