@extends('layouts.main')

@section('content')
    <x-main_image class="slim" :mainMenu="$mainMenu" :secondMenu="$secondMenu" :activeMainMenu="$activeMainMenu" :activeSecondMenu="$activeSecondMenu" :mainPhone="$mainPhone">
        @include('blocks.h_underline_block',['h' => 1, 'addClass' => 'align-self-lg-start mt-0 mb-5 mb-lg-3', 'head' => trans('menu.units_and_components')])
    </x-main_image>
    <div class="content-container pt-3">
        <div class="content ps-0 pe-0 pt-2 pt-lg-5">
            <div class="tech-container">
                <div class="left-menu">
                    @include('blocks.left_menu_block', [
                        'types' => $unit_types,
                        'hideActive' => false
                    ])
                    @include('blocks.dropdown_left_menu_block',[
                        'types' => $unit_types
                    ])
                    @include('blocks.advertising_block')
                </div>
                <div class="tech-block row">
                    @foreach ($units->unitsActive as $k => $unit)
                        <div class="row mb-3 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.1 }}s">
                            <div class="image col-lg-4 col-md-12">
                                <img class="w-100" src="{{ asset($unit->image) }}" />
                            </div>
                            <div class="content col-lg-8 col-md-12 p-3">
                                <div class="head col-lg-12 col-sm-12 p-2">
                                    <h1>{{ $unit->name }}</h1>
                                    {{ $units->name }}
                                </div>
                                <div class="p-2">
                                    {{ $unit->description }}
                                </div>
                                <div class="d-flex flex-column flex-lg-row justify-content-lg-start pt-2 ps-0 pe-0">
                                    @include('blocks.button_block',[
                                        'id' => 'unit'.$unit->id,
                                        'addClass' => 'unit-button me-lg-2 mb-2 mb-lg-0',
                                        'primary' => false,
                                        'buttonText' => trans('content.request_a_price')
                                    ])
                                    @include('blocks.button_block',[
                                        'addClass' => 'units-button',
                                        'primary' => false,
                                        'buttonText' => trans('content.request_a_call_back'),
                                    ])
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('blocks.unit_feedback_modal_block')
@endsection
