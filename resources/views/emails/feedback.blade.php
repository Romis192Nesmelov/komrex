@extends('layouts.mail')

@section('content')
    <h2>Заявка с сайта {{ env('APP_NAME') }}</h2>
    <h3>От пользователя с именем: {{ $name }}</h3>
    <h3>Телефон: {{ $phone }}</h3>
    @if (isset($comments) && $comments)
        <p><b>Комментарий:</b></p>
        <p>{{ $comments }}</p>
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
            'units-button' => 'кнопки «Обратный звонок на странице «Агрегаты и компоненты»',
            'footer-button' => 'кнопки «Заказать услугу» в футере',
            'active-monitoring-form' => 'формы обратной связи на странице «Актив-М»'
        ];
    @endphp
    <p>Сообщение отправлено с использованием {{ $fromMessage[$from] }}</p>
@endsection
