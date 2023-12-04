@extends('layouts.main')

@section('content')
    @include('blocks.main_image_block',['mode' => 'home'])
    <div class="content-container">
        <h2 class="w-100 text-center pt-4">{{ $contents[1]->head }}</h2>
        @include('blocks.quotes_block',['text' => $contents[1]->text])
        <div class="content" data-scroll-destination="our_offers">
            <h2>{{ $contents[2]->head }}</h2>
            <p class="small w-60">{{ $contents[2]->text }}</p>
        </div>
        <div class="row">
            <x-offer head="{{ trans('menu.active_monitoring') }}" href="#" text="{{ trans('content.important_tool') }}">
                @include('blocks.offer_image_block',['image' => 'images/offers/offer1.png'])
            </x-offer>
            <x-offer head="{{ trans('menu.technique') }}" href="#">
                @include('blocks.offer_image_block',[
                    'image' => 'images/offers/offer2_1.jpg',
                    'href' => '#',
                    'hrefText' => trans('content.all_komrex_equipment')
                ])
                @include('blocks.offer_image_block',[
                    'image' => 'images/offers/offer2_2.jpg',
                    'href' => '#',
                    'hrefText' => trans('content.current_offer')
                ])
            </x-offer>
            <x-offer head="{{ trans('menu.units_and_components') }}" href="#" text="{{ trans('content.supply_of_individual_units') }}">
                @include('blocks.offer_image_block',['image' => 'images/offers/offer3.jpg'])
            </x-offer>
        </div>
    </div>
    @include('blocks.feedback_form_block', [
        'hiddenInputName' => 'from',
        'hiddenId' => 'page-first-form',
    ])
    <div class="content-container" data-scroll-destination="service_solutions">
        <div class="content pt-4">
            <h2>{{ trans('menu.service_solutions') }}</h2>
            @foreach($solutions as $solution)
                <div class="row {{ !$loop->last ? 'mb-lg-5 mb-sm-1' : '' }}">
                    <div class="col-lg-4 col-sm-12 mb-4">
                        <img class="w-100" src="{{ asset($solution->image) }}" />
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <h3>{{ $solution->head }}</h3>
                        <p class="small">{{ $solution->text }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('blocks.feedback_form_block',[
        'hiddenInputName' => 'from',
        'hiddenId' => 'page-second-form',
    ])
    <div class="content-container">
        @include('blocks.quotes_block',['text' => $contents[3]->text])
        <div class="content">
            <h2 class="mb-3">{{ $contents[4]->head }}</h2>
            <div class="row mb-3">
                <div class="col-lg-6 col-sm-12">
                    <p class="small">{{ $contents[4]->text }}</p>
                </div>
                <div class="col-lg-6 col-sm-12 d-flex justify-content-center">
                    @include('blocks.button_block',[
                        'primary' => false,
                        'buttonText' => trans('content.order_consulting'),
                        'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
                    ])
                </div>
            </div>
            <div class="row">
                @foreach($consulting as $item)
                    <div class="col-lg-4 col-sm-12 {{ !$loop->last ? 'mb-3 mb-lg-0' : '' }}">
                        <div class="consulting-block" style="background: url({{ asset($item->image) }})" slideIn="0">
                            <h3>{{ $item->head }}</h3>
                            <div class="plate">
                                <h3>{{ $item->head }}</h3>
                                <p>{{ $item->text }}</p>
                                @include('blocks.button_block',[
                                    'addClass' => 'consulting-button-'.$item->id,
                                    'primary' => true,
                                    'buttonText' => $loop->last ? trans('content.list_of_events') : trans('content.order_service'),
                                    'arrowIcon' => 'arrow_cir_to_right_dark.svg'
                                ])
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="content joint-top" data-scroll-destination="about_company">
            <h2>{{ $contents[5]->head }}</h2>
            <div class="row">
                <div class="col-lg-6 col-sm-12 mb-3 mb-lg-0">
                    <img class="w-100" src="{{ asset('images/about_company.jpg') }}" />
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div id="about-company-block">
                        <div>
                            {!! $contents[5]->text !!}
                        </div>
                        <div>
                            <div>
                                @include('blocks.button_block',[
                                    'addClass' => 'about-company-button',
                                    'primary' => false,
                                    'buttonText' => trans('content.write_to_the_company'),
                                    'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
                                ])
                            </div>
                            @include('blocks.download_block',[
                                'href' => '#',
                                'icon' => 'download_yellow_icon.svg',
                                'description' => trans('content.presentation_of_the_company'),
                                'kb' => 340
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content joint-top">
            <h2 class="mb-4 pb-3">{{ trans('content.our_values') }}</h2>
            <div class="row">
                @foreach($values as $value)
                    <div class="col-lg-{{ 12 / count($values) }} col-sm-12 mb-3 mb-lg-0">
                        <div class="our-value">
                            <img src="{{ asset($value->image) }}">
                            <h3>{{ $value->head }}</h3>
                            {{ $value->text }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="content-container joint-top bg-white" data-scroll-destination="team">
        <div class="content">
            <h2 class="mb-4 pb-3">{{ trans('content.our_team') }}</h2>
            <div id="our-team" class="owl-carousel">
                @foreach($team as $person)
                    <div class="team-person">
                        <img src="{{ asset($person->image) }}" />
                        <div class="name">{{ $person->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="content-container joint-top" data-scroll-destination="our_projects">
        <div class="content">
            <h2 class="mb-4 pb-3">{{ trans('content.our_projects') }}</h2>
            <div class="row mb-4">
                @foreach($projects as $type)
                    <div class="col-lg-2 col-sm-12 mb-3 mb-lg-0">
                        @include('blocks.button_block',[
                            'id' => 'button-project-type-'.$type->id,
                            'addClass' => 'project-type white w-100',
                            'primary' => false,
                            'buttonText' => $type->name
                        ])
                    </div>
                @endforeach
            </div>
            <div id="projects" class="owl-carousel projects">
                @foreach($projects_all as $project)
                    @include('blocks.project_block',['image' => $project->images[0]->image])
                @endforeach
            </div>
            @foreach($projects as $type)
                <div id="project-type-{{ $type->id }}" class="owl-carousel projects d-none">
                    @foreach($type->projects as $project)
                        @foreach($project->images as $image)
                            @include('blocks.project_block',['image' => $image->image])
                        @endforeach
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="content-container joint-top bg-white" data-scroll-destination="partners">
        <div class="content">
            <h2 class="mb-4 pb-3">{{ $contents[6]->head }}</h2>
            <p class="small w-60">{{ $contents[6]->text }}</p>
            <div class="row w-60">
                @foreach($partners as $partner)
                    <div class="col-lg-6 col-sm-12 mb-3 mb-lg-0">
                        <img class="w-100" src="{{ asset($partner->image) }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <x-modal class="styled" id="project-modal" no_header="1">
        <img src="{{ asset('images/close_icon.svg') }}" class="close-icon" data-bs-dismiss="modal" data-dismiss="modal" />
        <h2 class="mb-0"></h2>
        <p id="date-presentation" class="small mb-2"></p>
        <div class="big-image"></div>
        <div class="small-images owl-carousel w-100 mb-3"></div>
        <div class="description"></div>
        @include('blocks.download_block',[
            'href' => '#',
            'icon' => 'download_yellow_icon.svg',
            'description' => trans('content.presentation_of_the_project'),
            'kb' => 1
        ])
    </x-modal>
    <x-smodal id="event-modal" head="{{ trans('content.upcoming_events') }}">
        @foreach ($events as $event)
            <div class="event-block row">
                <div class="col-lg-8 col-sm-12">
                    <h3>{{ $event->name }}</h3>
                    <div class="date">
                        <img src="{{ asset('images/icon_clock.svg') }}" />
                        {{ date('d.m.Y',$event->date) }}
                    </div>
                </div>
                <div class="sign-up col-lg-4 col-sm-12">
                    {{ trans('content.sign_up') }}
                    <img src="{{ asset('images/corner_cir_to_down_yellow.svg') }}" />
                </div>
                <div class="roll-up w-100">
                    <hr>
                    <form method="POST" action="{{ route('sign_up') }}">
                        @csrf
                        @include('blocks.feedback_fields_block',[
                            'hiddenInputName' => 'event_id',
                            'hiddenId' => $event->id,
                            'buttonAddClass' => 'withArrow ',
                            'primary' => false,
                            'button_text' => trans('content.send_request'),
                            'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
                        ])
                    </form>
                </div>
            </div>
        @endforeach
    </x-smodal>
    <x-smodal id="feedback-modal" head="{{ trans('content.write_to_the_company') }}">
        <form method="POST" action="{{ route('callback') }}">
            @csrf
            @include('blocks.feedback_fields_block',[
                'hiddenInputName' => 'from',
                'hiddenId' => '',
                'buttonAddClass' => 'withArrow ',
                'primary' => false,
                'button_text' => trans('content.send_request'),
                'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
            ])
        </form>
    </x-smodal>
    @if ($scroll)
        <script>window.scrollAnchor = "{{ $scroll }}";</script>
    @endif
    <script> const getProjectUrl = "{{ route('get_project') }}";</script>
@endsection
