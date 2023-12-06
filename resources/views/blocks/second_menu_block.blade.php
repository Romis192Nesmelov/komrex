<h2>{{ trans('content.komrex_offers') }}</h2>
<div class="second-menu">
    @foreach($secondMenu as $menuKey => $itemMenu)
        @if ($itemMenu['href'])
            <a href="{{ route($menuKey) }}">
                @include('blocks.button_block',[
                    'addClass' => $activeSecondMenu == $menuKey ? 'active' : '',
                    'primary' => false,
                    'buttonText' => trans('menu.'.$menuKey)
                ])
            </a>
        @else
            @include('blocks.button_block',[
                'addClass' => $activeMainMenu == $menuKey ? 'active' : '',
                'primary' => false,
                'buttonText' => trans('menu.'.$menuKey)
            ])
        @endif
    @endforeach
</div>
