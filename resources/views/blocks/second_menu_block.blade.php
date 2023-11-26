<h2>{{ trans('content.komrex_offers') }}</h2>
<div class="second-menu">
    @foreach($secondMenu as $menuKey => $itemMenu)
        @include('blocks.button_block',[
            'primary' => false,
            'buttonText' => trans('menu.'.$menuKey)
        ])
    @endforeach
</div>
