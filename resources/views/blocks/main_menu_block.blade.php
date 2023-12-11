<ul class="main-menu">
    @foreach($mainMenu as $menuKey => $itemMenu)
        <li {{ $menuKey == $activeMainMenu ? 'class=active' : '' }}>
            @if (request()->path() != '/' && !$itemMenu['href'])
                <a href="{{ route('home',['scroll' => $menuKey]) }}">{{ trans('menu.'.$menuKey) }}</a>
            @elseif (request()->path() == '/' && !$itemMenu['href'])
                <a data-scroll="{{ $menuKey }}" href="#">{{ trans('menu.'.$menuKey) }}</a>
            @else
                <a href="{{ route($menuKey) }}">{{ trans('menu.'.$menuKey) }}</a>
            @endif
        </li>
    @endforeach
</ul>
