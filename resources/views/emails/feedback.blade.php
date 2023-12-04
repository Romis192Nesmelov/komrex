@extends('layouts.mail')

@section('content')
    <h2>Заявка с сайта {{ env('APP_NAME') }}</h2>
    <p>От пользователя с именем: {{ $name }}</p>
    <p>Телефон: {{ $phone }}</p>
    @if (isset($text) && $text)
        <p><b>Текст сообщения:</b></p>
        <p>{{ $text }}</p>
    @endif
    @php
        $fromMessage = [
            'page-first-form' => 'первой формы обратной связи на странице',
            'page-second-form' => 'второй формы обратной связи на странице',
            'phone-icon' => 'иконки трубки в хедере',
            'get-a-service' => 'кнопки «Получить услугу» в хедере',
            'consulting-button' => 'кнопки «Заказать консалтинг»',
            'consulting-button-1' => 'кнопки «Заказать услугу» в первом блоке консалтинга',
            'consulting-button-2' => 'кнопки «Заказать услугу» во втором блоке консалтинга',
            'about-company-block' => 'кнопки в блоке «О компании»'
        ];
    @endphp
    <p>Сообщение отправлено с использованием {{ $fromMessage[$from] }}</p>
@endsection
