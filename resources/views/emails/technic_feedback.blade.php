@extends('layouts.mail')

@section('content')
    <h2>Сообщение с сайта {{ env('APP_NAME') }}</h2>
    <p>От пользователя с именем: {{ $name }}</p>
    <p>Телефон: {{ $phone }}</p>
    <h3>Отклик на карточке техники: {{ $technic_name }}</h3>
    <p>В разделе: {{ $technic_type }}</p>
@endsection
