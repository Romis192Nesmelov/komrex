<ul class="main-menu">
    @foreach($mainMenu as $menuKey => $itemMenu)
        <li {{ $menuKey == $activeMainMenu ? 'class=active' : '' }}>
            <a {{ !$itemMenu['href'] ? 'data-scroll='.$menuKey : '' }} href="#">{{ trans('menu.'.$menuKey) }}</a>
        </li>
    @endforeach
</ul>
