@extends('layouts.main')

@section('content')
    <x-main_image class="active-m" :mainMenu="$mainMenu" :secondMenu="$secondMenu" :activeMainMenu="$activeMainMenu" :activeSecondMenu="$activeSecondMenu" :mainPhone="$mainPhone">
        <img id="active-m-logo" class="d-none d-lg-block" src="{{ asset('images/active_m.svg') }}"/>
        <div class="w-100 d-none d-lg-block">
            <div class="align-self-start w-60">
                @include('blocks.h_underline_block',[
                    'h' => 1,
                    'addClass' => 'align-self-lg-start mt-0 mb-5',
                    'head' => trans('menu.active_monitoring')
                ])
{{--                <p class="text-white mb-5">{{ $content[0]->head }}</p>--}}
{{--                <p class="text-white-50 fw-bolder fs-5">{{ trans('content.active_m_system_provides') }}</p>--}}
            </div>
            <div class="row">
                @foreach ($provides as $provide)
                    <div class="col-{{ round(12/count($provides)) }}">
                        <div class="provide">
                            <img src="{{ asset('images/check_icon.svg') }}" />
                            <p class="m-0 w-60">{{ $provide->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-main_image>
    <div class="content-container">
        @include('blocks.quotes_block',['text' => $content[0]->text, 'use_quotes' => false])
        @include('blocks.quotes_block',['text' => $content[1]->text, 'use_quotes' => true])
        <div class="content">
            <div class="row">
                <div class="col-lg-6 col-sm-12 wow animate__animated animate__slideInLeft" data-wow-offset="10">
                    <img class="w-100" src="{{ asset($content[2]->image) }}" />
                </div>
                <div class="col-lg-6 col-sm-12 ps-lg-5 wow animate__animated animate__slideInRight" data-wow-offset="10">
                    <h2 class="mt-4 mt-lg-0">{{ $content[2]->head }}</h2>
                    {!! $content[2]->text !!}
                </div>
            </div>
        </div>
    </div>
    <div class="content-container bg-white pt-3 pb-3">
        <div class="content">
            <p class="w-60 mb-5">{{ $content[3]->text }}</p>
            @include('blocks.icons_block',[
                'items' => $icons,
                'col' => 3,
                'addClass' => 'w-60'
            ])
        </div>
    </div>
    @include('blocks.feedback_form_block',[
        'addClass' => 'border-bottom border-white',
        'hiddenInputName' => 'from',
        'hiddenId' => 'active-monitoring-form',
    ])
    <div class="content-container">
        <div class="content">
            <h2>{{ trans('content.what_can_we_track') }}</h2>
            @foreach ($tracking as $k => $item)
                @include('blocks.accordion_block',[
                    'parentId' => 'faq',
                    'itemId' => $item->id,
                    'itemHead' => $item->head,
                    'itemText' => $item->text,
                ])
            @endforeach
            <p>{{ trans('content.the_list_of_monitored_parameters_depends') }}</p>
        </div>
    </div>
    <div class="content-container bg-white">
        <div class="content">
            <h2>{{ trans('content.how_it_works') }}</h2>
            <div class="row mb-lg-5 mb-2">
                @foreach ($steps as $k => $step)
                    <div class="col-lg-{{ 12/count($steps) }} col-md-12 col-sm-12 mb-3 mb-lg-0 position-relative wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.3 }}s">
                        <div class="step">
                            <div class="d-flex d-lg-block align-items-sm-start">
                                @if (!$loop->last)
                                    <div class="dashed-line"></div>
                                @endif
                                <div class="num me-4">{{ $k + 1 }}</div>
                                <h3 class="mt-lg-3 mt-ms-0 mb-3">{{ $step->head }}</h3>
                            </div>
                            <p class="ms-5 ms-lg-0 ps-2 ps-lg-0">{{ $step->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
