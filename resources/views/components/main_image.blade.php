@props([
    'mainMenu' => $mainMenu,
    'secondMenu' => $secondMenu,
    'activeMainMenu' => '',
    'activeSecondMenu' => ''
])

<div id="main-image" {{ $attributes->class('') }}>
    <div id="hamburger"></div>
    <div id="float-menu">
        @include('blocks.main_menu_block', ['mainMenu' => $mainMenu, 'activeMainMenu' => $activeMainMenu])
        @include('blocks.second_menu_block', ['secondMenu' => $secondMenu, 'activeSecondMenu' => $activeSecondMenu])
        @include('blocks.menu_buttons_pair_block')
    </div>
    <div id="menu-container">
        <a href="{{ route('home') }}"><img id="logo" src="{{ asset('images/logo.svg') }}" /></a>
        <div id="top-container">
            <div id="top-line">
                @include('blocks.main_menu_block', ['mainMenu' => $mainMenu, 'activeMainMenu' => $activeMainMenu])
                @include('blocks.menu_buttons_pair_block')
            </div>
            @include('blocks.second_menu_block', ['secondMenu' => $secondMenu, 'activeSecondMenu' => $activeSecondMenu])
        </div>
    </div>
    {{ $slot }}
</div>
