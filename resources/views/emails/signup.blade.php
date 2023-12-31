@extends('layouts.mail')

@section('content')
    <h2>Сообщение с сайта {{ env('APP_NAME') }}</h2>
    <p>От пользователя с именем: {{ $name }}</p>
    <p>Телефон: {{ $phone }}</p>
    <h3>Запись на мероприятие «{{ $event_name }}»</h3>
    @if ($event_date)
        <p>Дата мероприятия: {{ $event_date }}</p>
    @endif
@endsection
