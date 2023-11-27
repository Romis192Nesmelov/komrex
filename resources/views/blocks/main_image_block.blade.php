<div id="main-image" class="{{ $className }}">
    <div id="hamburger"></div>
    <div id="float-menu">
        @include('blocks.main_menu_block')
        @include('blocks.second_menu_block')
        @include('blocks.menu_buttons_pair_block')
    </div>
    <div id="menu-container">
        <a href="{{ route('home') }}"><img id="logo" src="{{ asset('images/logo.svg') }}" /></a>
        <div id="top-container">
            <div id="top-line">
                @include('blocks.main_menu_block')
                @include('blocks.menu_buttons_pair_block')
            </div>
            @include('blocks.second_menu_block')
        </div>
    </div>
    <div id="head-container">
        <h1>{{ trans('content.main_image_text') }}</h1>
    </div>
    <img id="arch" src="{{ asset('images/arch.svg') }}" />
    <img class="arrow-down" src="{{ asset('images/arrow_cir_to_down_yellow.svg') }}">
</div>
