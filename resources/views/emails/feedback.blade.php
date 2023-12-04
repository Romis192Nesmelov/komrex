@extends('layouts.mail')

@section('content')
    <h2>Заявка с сайта {{ env('APP_NAME') }}</h2>
    <p>От пользователя с именем: {{ $name }}</p>
    <p>Телефон: {{ $phone }}</p>
    @if (isset($text) && $text)
        <p><b>Текст сообщения:</b></p>
        <p>{{ $text }}</p>
    @endif
@endsection
