@extends('layouts.main')

@section('content')
    <div id="main-image" class="home">
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
        <div id="arch"></div>
        <img class="arrow-down" src="{{ asset('images/arrow_cir_to_down_yellow.svg') }}">
    </div>
    <div id="content">
        <h1 class="w-100 text-center">{{ $contents[0]->head }}</h1>
        <div id="head-text">
            <img class="quotes" src="{{ asset('images/quotes_open.svg') }}" />
            <p>{{ $contents[0]->text }}</p>
            <img class="quotes" src="{{ asset('images/quotes_close.svg') }}" />
        </div>
    </div>
    @if ($scroll)
        <script>window.scrollAnchor = "{{ $scroll }}";</script>
    @endif
@endsection
