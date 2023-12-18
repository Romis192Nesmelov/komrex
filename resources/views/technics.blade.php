@extends('layouts.main')

@section('content')
    <x-main_image class="slim" :mainMenu="$mainMenu" :secondMenu="$secondMenu" :activeMainMenu="$activeMainMenu" :activeSecondMenu="$activeSecondMenu" :mainPhone="$mainPhone">
        @include('blocks.h_underline_block',['h' => 1, 'addClass' => 'align-self-lg-start mt-0 mb-5 mb-lg-3', 'head' => trans('menu.technics')])
    </x-main_image>
    <div class="content-container pt-3">
        <div class="content ps-0 pe-0 pt-2 pt-lg-5">
            <div class="buttons row mb-4 justify-content-center justify-content-lg-between">
                <div class="row col-lg-4 col-md-12 wow animate__animated animate__slideInLeft" data-wow-offset="10">
                    <div class="col-lg-6 col-md-12 ps-1 pe-1 mb-2 mb-lg-0">
                        <a href="{{ route('technics',['slug' => 'komrex', 'id' => request('id')]) }}">
                            @include('blocks.button_block',[
                                'addClass' => 'white w-100'.($slug == 'komrex' ? ' active' : ''),
                                'primary' => false,
                                'buttonText' => trans('content.komrex_technics')
                            ])
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 ps-1 pe-1">
                        <a href="{{ route('technics',['slug' => 'current-offer', 'id' => request('id')]) }}">
                            @include('blocks.button_block',[
                                'addClass' => 'white w-100'.($slug == 'current-offer' ? ' active' : ''),
                                'primary' => false,
                                'buttonText' => trans('content.current_offer')
                            ])
                        </a>
                    </div>
                </div>
                <div class="icons-view col-1 d-none d-lg-flex align-items-center justify-content-end wow animate__animated animate__slideInRight" data-wow-offset="10">
                    <img id="view-columns" class="icon active me-1" src="{{ asset('images/icon_columns.svg') }}">
                    <img id="view-rows" class="icon" src="{{ asset('images/icon_rows.svg') }}">
                </div>
            </div>
            <div class="tech-container">
                <div class="left-menu">
                    @include('blocks.left_menu_block', [
                        'types' => $technic_types,
                        'hideActive' => false
                    ])
                    @include('blocks.dropdown_left_menu_block',[
                        'types' => $technic_types
                    ])
                    @include('blocks.advertising_block')
                </div>
                <div class="tech-block row">
                    @foreach ($technics[$relation] as $k => $technic)
                        @if ($technic->images->count())
                            <div class="col-lg-4 col-md-12 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.1 }}s">
                                <div class="technic-block row">
                                    <div class="image col-lg-12 col-md-12">
                                        <a href="{{ route('technic',['id' => $technic->id]) }}">
                                            <img class="w-100" src="{{ asset($technic->images[0]->image) }}" />
                                        </a>
                                    </div>
                                    <div class="content col-lg-12 col-md-12 p-3">
                                        <a class="row" href="{{ route('technic',['id' => $technic->id]) }}">
                                            <div class="head col-lg-12 col-sm-12 p-2">
                                                <h1>{{ $technic->name }}</h1>
{{--                                                {{ substr(explode(' ',$technics->name)[0],0,-2) }}--}}
                                                {{ $technics->name }}
                                            </div>
                                            <div class="col-lg-12 col-sm-12 p-2">
                                                {{ trans('content.operating_weight') }}<br>
                                                {{ $technic->weight.trans('content.kg') }}
                                            </div>
                                            <div class="col-lg-12 col-sm-12 p-2">
                                                {{ trans('content.net_power') }}<br>
                                                {{ $technic->power.trans('content.kilowatt').' ('.(round($technic->power * 1.3596)).trans('content.horse_power').')' }}
                                            </div>
                                            <div class="col-lg-12 col-sm-12 p-2">
                                                {{ trans('content.engine_model') }}<br>
                                                {{ $technic->engine_model }}
                                            </div>
                                        </a>
                                        <div class="button col-12 pt-2 ps-0 pe-0">
                                            @include('blocks.button_block',[
                                                'id' => 'technic'.$technic->id,
                                                'addClass' => 'technic-button m-auto',
                                                'primary' => false,
                                                'buttonText' => trans('content.request_a_price')
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('blocks.technic_feedback_modal_block')
@endsection
