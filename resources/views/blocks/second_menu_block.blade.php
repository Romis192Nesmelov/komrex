<h2>{{ trans('content.komrex_offers') }}</h2>
<div class="second-menu">
    @foreach($secondMenu as $menuKey => $itemMenu)
        @if (request()->path() != '/' && !$itemMenu['href'])
            <a href="{{ route('home',['scroll' => $menuKey == 'service_solutions_and_consulting' ? 'service_solutions' : $menuKey]) }}">
                @include('blocks.button_block',[
                    'addClass' => $activeSecondMenu == $menuKey ? 'active' : '',
                    'primary' => false,
                    'buttonText' => trans('menu.'.$menuKey)
                ])
            </a>
        @elseif (request()->path() == '/' && !$itemMenu['href'])
            @include('blocks.button_block',[
                'dataScroll' => $menuKey == 'service_solutions_and_consulting' ? 'service_solutions' : $menuKey,
                'addClass' => $activeMainMenu == $menuKey ? 'active' : '',
                'primary' => false,
                'buttonText' => trans('menu.'.$menuKey)
            ])
        @else
            <a href="{{ isset($itemMenu['slug']) ? route($menuKey,['slug' => $itemMenu['slug']]) : route($menuKey) }}">
                @include('blocks.button_block',[
                    'addClass' => $activeSecondMenu == $menuKey ? 'active' : '',
                    'primary' => false,
                    'buttonText' => trans('menu.'.$menuKey)
                ])
            </a>
        @endif
    @endforeach
</div>
