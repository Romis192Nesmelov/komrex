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
                    <img id="view-columns" class="icon me-1" src="{{ asset('images/icon_columns.svg') }}">
                    <img id="view-rows" class="icon active" src="{{ asset('images/icon_rows.svg') }}">
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
                            <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.1 }}s">
                                <div class="technic-block row">
                                    <div class="image col-lg-3 col-md-12">
                                        @if ($technic->description)
                                            <a href="{{ route('technic',['id' => $technic->id]) }}">
                                                <img class="w-100" src="{{ asset($technic->images[0]->image) }}" />
                                            </a>
                                        @else
                                            <img class="w-100" src="{{ asset($technic->images[0]->image) }}" />
                                        @endif
                                    </div>
                                    <div class="content col-lg-9 col-md-12 p-3">
                                        @if ($technic->description)
                                            <a class="row" href="{{ route('technic',['id' => $technic->id]) }}">
                                                @include('blocks.technic_list_block')
                                            </a>
                                        @else
                                            <div class="row">
                                                @include('blocks.technic_list_block')
                                            </div>
                                        @endif
                                        <div class="button col-4 pt-2 ps-0 pe-0">
                                            @include('blocks.button_block',[
                                                'id' => 'technic'.$technic->id,
                                                'addClass' => 'technic-button',
                                                'primary' => false,
                                                'buttonText' => trans('content.find_out_a_price')
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
