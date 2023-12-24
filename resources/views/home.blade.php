@extends('layouts.main')

@section('content')
    <x-main_image :mainMenu="$mainMenu" :secondMenu="$secondMenu" :activeMainMenu="$activeMainMenu" :activeSecondMenu="$activeSecondMenu" :mainPhone="$mainPhone">
        <div id="head-container"><h1>{{ $contents[0]->text }}</h1></div>
        <a data-scroll="our_offers" href="#"><img class="arrow-down" src="{{ asset('images/arrow_cir_to_down_yellow.svg') }}"></a>
    </x-main_image>
    <div class="content-container">
        <h2 class="w-100 text-center pt-4">{{ $contents[1]->head }}</h2>
        @include('blocks.quotes_block',['text' => $contents[1]->text, 'use_quotes' => true])
        <div class="content wow animate__animated animate__slideInLeft" data-wow-offset="10" data-scroll-destination="our_offers">
            <h2>{{ $contents[2]->head }}</h2>
            <p class="w-60">{{ $contents[2]->text }}</p>
        </div>
        <div class="row">
            <x-offer head="{{ trans('menu.active_monitoring') }}" href="{{ route('active_monitoring') }}" text="{{ trans('content.important_tool') }}" delay=".5">
                <a href="{{ route('active_monitoring') }}">
                    @include('blocks.offer_image_block',['image' => 'images/offers/offer1.jpg'])
                </a>
            </x-offer>
            <x-offer head="{{ trans('menu.technics') }}" href="{{ route('technics') }}" delay="1">
                @include('blocks.offer_image_block',[
                    'image' => 'images/offers/offer2_1.jpg',
                    'href' => route('technics',['slug' => 'komrex']),
                    'hrefText' => trans('content.all_komrex_equipment')
                ])
                @include('blocks.offer_image_block',[
                    'image' => 'images/offers/offer2_2.jpg',
                    'href' => route('technics',['slug' => 'current-offer']),
                    'hrefText' => trans('content.current_offer')
                ])
            </x-offer>
            <x-offer head="{{ trans('menu.units_and_components') }}" href="{{ route('units_and_components') }}" text="{{ trans('content.supply_of_individual_units') }}" delay="1.5">
                <a href="{{ route('units_and_components') }}">
                    @include('blocks.offer_image_block',['image' => 'images/offers/offer3.jpg'])
                </a>
            </x-offer>
        </div>
    </div>
    @include('blocks.feedback_form_block', [
        'hiddenInputName' => 'from',
        'hiddenId' => 'page-first-form',
    ])
    <div class="content-container" data-scroll-destination="service_solutions">
        <div class="content pt-4">
            <h2 class="content wow animate__animated animate__slideInLeft" data-wow-offset="10">{{ trans('menu.service_solutions') }}</h2>
            @foreach($solutions as $k => $solution)
                <div class="row {{ !$loop->last ? 'mb-lg-5 mb-sm-1' : '' }} wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.3 }}s">
                    <div class="col-lg-4 col-sm-12 mb-4">
                        <img class="w-100" src="{{ asset($solution->image) }}" />
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <h3>{{ $solution->head }}</h3>
                        {!! $solution->text !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
{{--    @include('blocks.feedback_form_block',[--}}
{{--        'hiddenInputName' => 'from',--}}
{{--        'hiddenId' => 'page-second-form',--}}
{{--    ])--}}
    <div class="content-container">
        @include('blocks.quotes_block',['text' => $contents[3]->text, 'use_quotes' => true])
        <div class="content">
            <h2 class="mb-3 content wow animate__animated animate__slideInLeft" data-wow-offset="10">{{ $contents[4]->head }}</h2>
            <div class="row mb-3 content wow animate__animated animate__slideInRight" data-wow-offset="10">
                <div class="col-lg-6 col-sm-12">
                    <p>{{ $contents[4]->text }}</p>
                </div>
                <div class="col-lg-6 col-sm-12 d-flex justify-content-center">
                    @include('blocks.button_block',[
                        'addClass' => 'consulting-button',
                        'primary' => false,
                        'buttonText' => trans('content.order_consultation'),
                        'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
                    ])
                </div>
            </div>
            <div class="row">
                @foreach($consulting as $k => $item)
                    <div class="col-lg-4 col-sm-12 {{ !$loop->last ? 'mb-3 mb-lg-0' : '' }} wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.3 }}s">
                        <div class="consulting-block" style="background: url({{ asset($item->image) }})" slideIn="0">
                            <h3>{{ $item->head }}</h3>
                            <div class="plate">
                                <h3>{{ $item->head }}</h3>
                                {!! $item->text !!}
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
        <div class="content pt-0" data-scroll-destination="about_company">
            <h2 class="wow animate__animated animate__slideInLeft" data-wow-offset="10">{{ $contents[5]->head }}</h2>
            <div class="row">
                <div class="col-lg-6 col-sm-12 mb-3 mb-lg-0 wow animate__animated animate__slideInLeft" data-wow-offset="10">
                    <img class="w-100" src="{{ asset('images/about_company.jpg') }}" />
                </div>
                <div class="col-lg-6 col-sm-12 wow animate__animated animate__slideInRight" data-wow-offset="10">
                    <div id="about-company-block">
                        <div>
                            {!! $contents[5]->text !!}
                        </div>
                        @include('blocks.download_block',[
                            'href' => $contents[5]->pdf,
                            'icon' => 'download_yellow_icon.svg',
                            'description' => trans('content.presentation_of_the_company'),
                            'kb' => 340
                        ])
                    </div>
                </div>
            </div>
        </div>
        <div class="content pt-0">
            <h2 class="mb-4 pb-3 wow animate__animated animate__slideInLeft" data-wow-offset="10">{{ trans('content.our_values') }}</h2>
            @include('blocks.icons_block',['items' => $values, 'col' => 3])
        </div>
    </div>
    <div class="content-container pt-0 bg-white" data-scroll-destination="team">
        <div class="content">
            <h2 class="mb-4 pb-3 wow animate__animated animate__slideInLeft" data-wow-offset="10">{{ trans('content.our_team') }}</h2>
            <div id="our-team" class="owl-carousel">
                @foreach($team as $k => $person)
                    <div class="team-person wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.3 }}s">
                        <img src="{{ asset($person->image) }}" />
                        <div class="name">{{ $person->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="content-container pt-0" data-scroll-destination="our_projects">
        <div class="content">
            <h2 class="mb-4 pb-3 wow animate__animated animate__slideInLeft" data-wow-offset="10">{{ trans('content.our_projects') }}</h2>
            <div class="row mb-4 wow animate__animated animate__slideInRight" data-wow-offset="10">
                @foreach($project_types as $type)
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
                @foreach($projects_all as $k => $project)
                    @include('blocks.project_block',['image' => $project->images[0]->image, 'k' => $k])
                @endforeach
            </div>
            @foreach($project_types as $type)
                <div id="project-type-{{ $type->id }}" class="owl-carousel projects d-none">
                    @foreach($type->activeProjects as $k => $project)
                        @include('blocks.project_block',['image' => $project->images[0]->image, 'k' => $k])
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="content-container pt-0 bg-white" data-scroll-destination="partners">
        <div class="content">
            <h2 class="mb-4 pb-3 wow animate__animated animate__slideInLeft" data-wow-offset="10">{{ $contents[6]->head }}</h2>
            <p class="w-60 wow animate__animated animate__slideInRight" data-wow-offset="10">{{ $contents[6]->text }}</p>
            <div class="row w-60">
                @foreach($partners as $k => $partner)
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-3 mb-lg-0 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.3 }}s">
                        @if ($partner->href)
                            <a href="{!! $partner->href !!}" target="_blank"><img class="w-100" src="{{ asset($partner->image) }}" /></a>
                        @else
                            <img class="w-100" src="{{ asset($partner->image) }}" />
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <x-modal class="styled" id="project-modal" no_header="1">
        <img src="{{ asset('images/close_icon.svg') }}" class="close-icon" data-bs-dismiss="modal" data-dismiss="modal" />
        <h2 class="mb-0"></h2>
        <p id="date-presentation" class="small mb-2"></p>
        <div id="big-image"></div>
        <div id="small-images" class="owl-carousel w-100 mt-3 mb-3"></div>
        <div id="description"></div>
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
                <div class="col-lg-9 col-sm-12">
                    <h3>{{ $event->name }}</h3>
                    @if ($event->date)
                        <div class="date">
                            <img src="{{ asset('images/icon_clock.svg') }}" />
                            {{ date('d.m.Y',$event->date) }}
                        </div>
                    @endif
                </div>
                <div class="col-lg-3 col-sm-12 description">
                    {{ trans('content.course_description') }}
                    <img src="{{ asset('images/corner_cir_to_down_yellow.svg') }}" />
                </div>
                <div class="roll-up w-100">
                    <hr>
                    <p><b>{{ trans('content.target_audience') }}: </b>{{ $event->target_audience }}</p>
                    <p><b>{{ trans('content.course_objectives') }}: </b>{{ $event->course_objectives }}</p>
                    <p class="mb-0"><b>{{ trans('content.course_description') }}:</b></p>
                    {!! $event->description !!}
                    <p><b>{{ trans('content.duration') }}: </b>{{ $event->duration }}</p>
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
    @if ($scroll)
        <script>window.scrollAnchor = "{{ $scroll }}";</script>
    @endif
    <script> const getProjectUrl = "{{ route('get_project') }}";</script>
@endsection
