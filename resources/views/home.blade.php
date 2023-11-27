@extends('layouts.main')

@section('content')
    @include('blocks.main_image_block',['className' => 'home'])
    <div id="content-container">
        <h1 class="main">{{ $contents[0]->head }}</h1>
        <div id="head-text">
            <img class="quotes" src="{{ asset('images/quotes_open.svg') }}" />
            <p>{{ $contents[0]->text }}</p>
            <img class="quotes" src="{{ asset('images/quotes_close.svg') }}" />
        </div>
        <div class="content">
            <h1>{{ $contents[1]->head }}</h1>
            <p class="small">{{ $contents[1]->text }}</p>
        </div>
    </div>
    @if ($scroll)
        <script>window.scrollAnchor = "{{ $scroll }}";</script>
    @endif
@endsection
