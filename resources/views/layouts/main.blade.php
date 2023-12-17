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

    @include('blocks.favicon_block')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
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
    <div class="footer wow animate__animated animate__fadeIn" data-scroll-destination="contacts">
        <div>
            <div class="footer-block left">
                <h2>{{ trans('content.contact_information') }}</h2>
                {{ trans('content.email_address') }}
                <div class="contacts">
                    @include('blocks.email_block', ['email' => $mainEmail->value])
                    @include('blocks.menu_buttons_pair_block', ['mainPhone' => $mainPhone])
                    @include('blocks.button_block',[
                        'addClass' => 'footer-button',
                        'primary' => true,
                        'buttonText' => trans('content.order_service'),
                        'arrowIcon' => 'arrow_cir_to_right_dark.svg'
                    ])
                </div>
            </div>
            <div class="footer-block right">
                @foreach($requisites as $requisite)
                    @if ($requisite->name)
                        {{ $requisite->name.': ' }}
                    @endif
                    {!! $requisite->value.(!$loop->last ? '<br>' : '') !!}
                @endforeach
                <a href="https://rutube.ru/channel/32381551/" target="_blank">
                    <img id="ru-tube-href" src="{{ asset('images/ru_tube.png') }}" />
                </a>
                @include('blocks.download_block',[
                    'href' => asset('pdfs/requisites.pdf'),
                    'icon' => 'download_white_icon.svg',
                    'description' => trans('content.download_details'),
                    'kb' => 340
                ])
            </div>
        </div>
        <div id="down-line" class="w-60">
            <div class="mb-2 mb-lg-0"><a href="#">{{ trans('content.copyright') }}</a></div>
            <div class="mb-2 mb-lg-0"><a href="{{ route('privacy') }}">{{ trans('content.privacy') }}</a></div>
            <div><a href="#">{{ trans('content.terms_of_use') }}</a></div>
        </div>
    </div>

    @include('blocks.message_modal_block')

    <x-smodal id="feedback-modal" head="{{ trans('content.write_to_the_company') }}">
        <form method="POST" action="{{ route('callback') }}">
            @csrf
            @include('blocks.feedback_fields_block',[
                'hiddenInputName' => 'from',
                'hiddenId' => '',
                'buttonAddClass' => 'withArrow',
                'primary' => false,
                'button_text' => trans('content.send_request'),
                'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
            ])
        </form>
    </x-smodal>

    <x-smodal id="personal-data-modal" head="{{ trans('content.transfer_and_processing_of_personal_data') }}">

    </x-smodal>

    @if ($cookieInfo)
        <x-smodal id="cookie-info-modal" head="{{ trans('content.welcome_to_komreks') }}">
            <img class="logo" src="{{ asset('images/logo_dark.svg') }}" />
            <p>Мы используем данные, собранные через файлы cookie, чтобы обеспечить вам наилучший пользовательский опыт на нашем веб-сайте, распознавать повторные посещения и предпочтения, а также измерять и анализировать трафик. Принимая все или некоторые наши файлы cookie, вы позволяете нам анализировать поведение пользователей, предоставлять функции социальных медиа и делиться этой информацией с нашими партнерами по рекламе и аналитике, что помогает представлять вам рекламу и контент, соответствующие вашим интересам. Если вы не принимаете все наши файлы cookie, мы будем использовать только строго необходимые файлы cookie, которые необходимы для функционирования веб-сайта, или те, которые вы принимаете (через вариант «управление выбором»). Вы сможете в любое время управлять предпочтениями файлов cookie. Чтобы получить дополнительную информацию об использовании файлов cookie, пожалуйста, ознакомьтесь с нашей <a href="{{ route('privacy') }}">Политикой в отношении файлов cookie.</a></p>
            <div class="w-100">
                @include('blocks.checkbox_block', [
                    'name' => 'cookie1',
                    'label' => trans('content.cookie_files1'),
                    'checked' => true,
                    'ajax' => false
                ])
                @include('blocks.checkbox_block', [
                    'name' => 'cookie2',
                    'label' => trans('content.cookie_files2'),
                    'checked' => true,
                    'ajax' => false
                ])
            </div>
            <div class="w-100 mt-3">
                @include('blocks.button_block',[
                    'dataDismiss' => true,
                    'primary' => true,
                    'buttonType' => 'button',
                    'buttonText' => trans('content.confirm_my_choice'),
                    'arrowIcon' => 'arrow_cir_to_right_dark.svg'
               ])
                @include('blocks.button_block',[
                    'id' => 'agree_all',
                    'primary' => true,
                    'buttonType' => 'button',
                    'buttonText' => trans('content.agree_all'),
                    'arrowIcon' => 'arrow_cir_to_right_dark.svg'
               ])
            </div>
        </x-smodal>
        <script>window.showCookieInfo = true;</script>
    @endif
</body>
</html>
