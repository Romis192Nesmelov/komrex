@props([
    'mainMenu' => $mainMenu,
    'secondMenu' => $secondMenu,
    'activeMainMenu' => '',
    'activeSecondMenu' => '',
    'mainPhone' => ''
])

<div id="main-image" {{ $attributes->class('wow animate__animated animate__fadeIn') }}>
    <div id="hamburger"></div>
    <div id="float-menu">
        @include('blocks.main_menu_block', ['mainMenu' => $mainMenu, 'activeMainMenu' => $activeMainMenu])
        @include('blocks.second_menu_block', ['secondMenu' => $secondMenu, 'activeSecondMenu' => $activeSecondMenu])
{{--        <img class="phone-icon" src="{{ asset('images/phone_icon_white.svg') }}" />--}}
        @include('blocks.menu_buttons_pair_block', ['mainPhone' => $mainPhone])
    </div>
    <div id="menu-container">
        <a href="{{ route('home') }}"><img id="logo" src="{{ asset('images/logo.svg') }}" /></a>
        <div id="top-container">
            <div id="top-line">
                @include('blocks.main_menu_block', ['mainMenu' => $mainMenu, 'activeMainMenu' => $activeMainMenu])
{{--                <img class="phone-icon" src="{{ asset('images/phone_icon_white.svg') }}" />--}}
                @include('blocks.menu_buttons_pair_block', ['mainPhone' => $mainPhone])
            </div>
            @include('blocks.second_menu_block', ['secondMenu' => $secondMenu, 'activeSecondMenu' => $activeSecondMenu])
        </div>
    </div>
    {{ $slot }}
</div>
