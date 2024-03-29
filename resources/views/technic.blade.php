@extends('layouts.main')

@section('content')
    <x-main_image class="super-slim" :mainMenu="$mainMenu" :secondMenu="$secondMenu" :activeMainMenu="$activeMainMenu" :activeSecondMenu="$activeSecondMenu" :mainPhone="$mainPhone">
    </x-main_image>
    <div class="content-container pt-0">
        <div class="content">
            <div class="back-line-href mb-4 wow animate__animated animate__slideInLeft" data-wow-offset="2">
                <a href="{{ route('technics',['slug' => ($technic->komrex ? 'komrex' : 'current-offer')]) }}">
                    <img src="{{ asset('images/arrow_left_simple_dark.svg') }}" />
                    {{ trans('content.all_technics') }}
                </a>
            </div>
            <div class="row">
                <div id="big-image" class="mb-4 col-lg-8 col-md-6 col-sm-12 wow animate__animated animate__slideInLeft" data-wow-offset="10">
                    <img src="{{ asset($technic->images[0]->image) }}"/>
                    <div id="small-images" class="owl-carousel w-100 mt-3">
                        @foreach ($technic->images as $k => $image)
                            <img class="small-image image{{ $image->id }} {{ $loop->first ? 'active' : '' }} wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * .2 }}s" src="{{ asset($image->image) }}" />
                        @endforeach
                    </div>
                </div>
                <div class="specifications col-lg-4 col-md-6 col-sm-12 ps-0 ps-lg-3 wow animate__animated animate__slideInRight" data-wow-offset="10">
                    @include('blocks.h_underline_block',['h' => 1, 'addClass' => 'mt-4 mb-3 mt-lg-0 mb-lg-4', 'head' => $technic->name])
                    <div class="technic-type">{{ $technic->technicType->name }}</div>
                    <h2 class="mt-3 mt-lg-5">{!! trans('content.specifications') !!}</h2>
                    <p>{{ ($technic->technic_type_id == 4 ? trans('content.weight_in_basic_configuration') : trans('content.operating_weight')).': '.$technic->weight.trans('content.kg') }}</p>
                    <p>{{ trans('content.net_power').': '.$technic->power.trans('content.kilowatt').' ('.(round($technic->power * 1.3596)).trans('content.horse_power').')' }}</p>

                    @include('blocks.technic_params_block',['technic' => $technic])

                    <div class="w-100 d-flex justify-content-center justify-content-lg-start">
                        @include('blocks.button_block',[
                            'id' => 'technic-button',
                            'addClass' => 'mt-4 mt-lg-5',
                            'primary' => false,
                            'buttonText' => trans('content.request_a_price'),
                            'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
                        ])
                    </div>
                </div>
            </div>
            <div class="buttons row mb-4 mt-4 justify-content-center justify-content-lg-start">
                @foreach ($buttons as $k => $button)
                    @if (
                        !($k == 1 && !$technic->characteristics) &&
                        !($k == 2 && !$technic->technicVideosActive->count()) &&
                        !($k == 3 && !$technic->filesActive->count())
                    )
                        <div class="col-lg-3 col-md-12 ps-1 pe-1 mb-2 mb-lg-0 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * .2 }}s">
                            @include('blocks.button_block',[
                                'id' => 'button-stuff-'.$button,
                                'addClass' => 'white w-100 technic-stuff'.($loop->first ? ' active' : ''),
                                'primary' => false,
                                'buttonText' => trans('content.'.$button)
                            ])
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div id="stuff-content" class="content">
            <div id="stuff-content-{{ $buttons[0] }}" class="stuff-content active w-100 row">
                @foreach ($technic->constructiveFeaturesActive as $k => $cFuture)
                    @include('blocks.constructive_feature_block',['condition' => $k % 2 === 0, 'position' => 'Left'])
                    @include('blocks.constructive_feature_block',['condition' => $k % 2 !== 0, 'position' => 'Right'])
                    <hr>
                @endforeach
                <div class="col-12 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="0.5s">
                    <h3>{{ trans('content.general_description') }}</h3>
                    {!! $technic->description !!}
                </div>
            </div>
            @if ($technic->characteristics)
                <div id="stuff-content-{{ $buttons[1] }}" class="stuff-content w-100 d-none wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="0.2s">
                    <div class="big-table-container">
                        {!! $technic->characteristics !!}
                    </div>
                </div>
            @endif
            @if ($technic->technicVideosActive->count())
                <div id="stuff-content-{{ $buttons[2] }}" class="stuff-content w-100 row d-none">
                    @foreach ($technic->technicVideosActive as $k => $video)
                        <div class="col-lg-3 col-md-6 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * .2 }}s">
                            @include('blocks.video_block',['video' => $video->video])
                        </div>
                    @endforeach
                </div>
            @endif
            @if ($technic->filesActive->count())
                <div id="stuff-content-{{ $buttons[3] }}" class="stuff-content w-100 d-none wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="0.2s">
                    <table class="table table-striped w-60">
                        @foreach ($technic->filesActive as $file)
                            <tr>
                                <td class="align-middle text-start">
                                    <a href="{{ asset($file->pdf) }}" target="_blank">
                                        <img src="{{ asset('images/download_yellow_icon_simple.svg') }}" />
                                        {{ $file->name }}
                                    </a>
                                </td>
                                <td class="text-center">pdf</td>
                                <td class="text-end">{{ filesize(base_path('public/'.$file->pdf)) }}kB</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
    </div>
    @include('blocks.technic_feedback_modal_block', ['hiddenId' => $technic->id])
@endsection
