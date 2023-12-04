<div id="main-image" {{ $mode != 'home' ? 'class='.$mode : '' }}>
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
    @if ($mode == 'home')
        <div id="head-container">
            <h1>{{ $contents[0]->text }}</h1>
        </div>
    @elseif (isset($chapter))
        <h1 class="chapter">{{ $chapter }}</h1>
    @endif
    @if ($mode == 'home')
        <a data-scroll="our_offers" href="#"><img class="arrow-down" src="{{ asset('images/arrow_cir_to_down_yellow.svg') }}"></a>
    @endif
</div>
