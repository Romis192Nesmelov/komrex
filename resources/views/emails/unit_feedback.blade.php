@extends('layouts.mail')

@section('content')
    <h2>Сообщение с сайта {{ env('APP_NAME') }}</h2>
    <p>От пользователя с именем: {{ $name }}</p>
    <p>Телефон: {{ $phone }}</p>
    <h3>Запрос цены агрегата или компонента: {{ $unit_name }}</h3>
    <p>В разделе: {{ $unit_type }}</p>
@endsection
