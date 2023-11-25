@extends('layouts.main')

@section('content')
    <div id="main-image" class="home">
        <div class="d-flex justify-content-between align-items-top" style="width: 95%;">
            <a href="{{ route('home') }}"><img id="logo" src="{{ asset('images/logo.svg') }}" /></a>
            <div id="top-container">
                <div id="top-line">
                    <ul id="main-menu">
                        @foreach($mainMenu as $menuKey => $itemMenu)
                            <li><a href="#">{{ trans('menu.'.$menuKey) }}</a></li>
                        @endforeach
                    </ul>
                    <div class="d-flex justify-content-center align-items-center">
                        <img id="phone-icon" src="{{ asset('images/phone_icon.svg') }}" />
                        @include('blocks.button_block',[
                            'primary' => true,
                            'buttonText' => trans('content.get_service')
                        ])
                    </div>
                </div>
                <h2>{{ trans('content.komrex_offers') }}</h2>
                <div id="second-menu">
                    @foreach($secondMenu as $menuKey => $itemMenu)
                        @include('blocks.button_block',[
                            'primary' => false,
                            'buttonText' => trans('menu.'.$menuKey)
                        ])
                    @endforeach
                </div>
            </div>
        </div>
        <div id="head-container">
            <h1>{!! trans('content.main_image_text') !!}</h1>
        </div>
        <div id="arch"></div>
        <img class="arrow-down" src="{{ asset('images/arrow_cir_to_down_yellow.svg') }}">
    </div>
    @if ($scroll)
        <script>window.scrollAnchor = "{{ $scroll }}";</script>
    @endif
@endsection
