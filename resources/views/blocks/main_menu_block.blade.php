<ul class="main-menu">
    @foreach($mainMenu as $menuKey => $itemMenu)
        <li><a href="#">{{ trans('menu.'.$menuKey) }}</a></li>
    @endforeach
</ul>
