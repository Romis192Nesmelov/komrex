@extends('layouts.main')

@section('content')
    <x-main_image class="super-slim" :mainMenu="$mainMenu" :secondMenu="$secondMenu" :activeMainMenu="$activeMainMenu" :activeSecondMenu="$activeSecondMenu" :mainPhone="$mainPhone">
    </x-main_image>
    <div class="content-container pt-0">
        <div class="content">
            <div class="back-line-href mb-4">
                <a href="{{ route('technics') }}">
                    <img src="{{ asset('images/arrow_left_simple_dark.svg') }}" />
                    {{ trans('content.all_technics') }}
                </a>
            </div>
            <div class="row">
                <div id="big-image" class="mb-4 col-lg-8 col-md-6 col-sm-12">
                    <img src="{{ asset($technic->images[0]->image) }}"/>
                    <div id="small-images" class="owl-carousel w-100 mt-3">
                        @foreach ($technic->images as $image)
                            <img class="image{{ $image->id }} {{ $loop->first ? 'active' : '' }}" src="{{ asset($image->image) }}" />
                        @endforeach
                    </div>
                </div>
                <div class="specifications col-lg-4 col-md-6 col-sm-12 ps-0 ps-lg-3">
                    @include('blocks.h_underline_block',['h' => 1, 'addClass' => 'mt-4 mb-3 mt-lg-0 mb-lg-4', 'head' => $technic->name])
                    <div class="technic-type">{{ $technic->technicType->name }}</div>
                    <h2 class="mt-3 mt-lg-5">{!! trans('content.specifications') !!}</h2>
                    <p>{{ trans('content.operating_weight').': '.$technic->weight.trans('content.kg') }}</p>
                    <p>{{ trans('content.net_power').': '.$technic->power.trans('content.kilowatt').' ('.(round($technic->power * 1.3596)).trans('content.horse_power').')' }}</p>
                    <p>{{ trans('content.engine_model').': '.$technic->engine_model }}</p>
                    <div class="w-100 d-flex justify-content-center justify-content-lg-start">
                        @include('blocks.button_block',[
                            'id' => 'technic-button',
                            'addClass' => 'mt-4 mt-lg-5',
                            'primary' => false,
                            'buttonText' => trans('content.write_to_the_company'),
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
                        <div class="col-lg-3 col-md-12 ps-1 pe-1 mb-2 mb-lg-0">
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
                    @include('blocks.constructive_feature_block',['condition' => $k % 2 === 0])
                    @include('blocks.constructive_feature_block',['condition' => $k % 2 !== 0])
                    <hr>
                @endforeach
                <div class="col-12">
                    <h3>{{ trans('content.general_description') }}</h3>
                    {!! $technic->description !!}
                </div>
            </div>
            @if ($technic->characteristics)
                <div id="stuff-content-{{ $buttons[1] }}" class="stuff-content w-100 d-none">
                    <div class="big-table-container">
                        {!! $technic->characteristics !!}
                    </div>
                </div>
            @endif
            @if ($technic->technicVideosActive->count())
                <div id="stuff-content-{{ $buttons[2] }}" class="stuff-content w-100 row d-none">
                    @foreach ($technic->technicVideosActive as $video)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            @include('blocks.video_block',['video' => $video->video])
                        </div>
                    @endforeach
                </div>
            @endif
            @if ($technic->filesActive->count())
                <div id="stuff-content-{{ $buttons[3] }}" class="stuff-content w-100 d-none">
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
