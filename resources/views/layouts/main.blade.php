<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-language" content="{{ app()->getLocale() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <title>Komrex.
{{--        {{ $content->settings->title }}--}}
    </title>
{{--    @foreach($metas as $meta => $params)--}}
{{--        @if ($content->settings[$meta])--}}
{{--            <meta {{ $params['name'] ? 'name='.$params['name'] : 'property='.$params['property'] }} content="{{ $content->settings[$meta] }}">--}}
{{--        @endif--}}
{{--    @endforeach--}}

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons//favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons//favicon-16x16.png') }}">
    {{--<link rel="manifest" href="/site.webmanifest">--}}
    <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg" color="#5bbad5') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/scrollreveal.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/feedback.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    @yield('content')
    <footer data-scroll-destination="contacts">
        <div>
            <div class="footer-block left">
                <h2>{{ trans('content.contact_information') }}</h2>
                {{ trans('content.email_address') }}
                <div class="email">
                    @include('blocks.email_block', ['email' => $mainEmail->value])
                </div>
            </div>
            <div class="footer-block right">
                @foreach($requisites as $requisite)
                    @if ($requisite->name)
                        {{ $requisite->name.': ' }}
                    @endif
                    {!! $requisite->value.(!$loop->last ? '<br>' : '') !!}
                @endforeach
                @include('blocks.download_block',[
                    'href' => '#',
                    'icon' => 'download_white_icon.svg',
                    'description' => trans('content.download_details'),
                    'kb' => 340
                ])
            </div>
        </div>
        <div id="down-line" class="w-60">
            <div class="mb-2 mb-lg-0"><a href="#">{{ trans('content.copyright') }}</a></div>
            <div class="mb-2 mb-lg-0"><a href="#">{{ trans('content.processing_of_personal_data') }}</a></div>
            <div><a href="#">{{ trans('content.terms_of_use') }}</a></div>
        </div>
    </footer>

    <x-modal id="message-modal" head="{{ trans('content.message') }}">
        <h4 class="text-center p-4">{{ session()->has('message') ? session()->get('message') : '' }}</h4>
    </x-modal>
</body>
</html>
