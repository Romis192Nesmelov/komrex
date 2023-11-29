@props([
    'head' => '',
    'text' => '',
    'href' => ''
])

<div class="col-lg-4 col-sm-12">
    <div class="offer-block">
        <div class="arrow"></div>
        <div class="d-block">
            <h2><a href="{{ $href }}">{{ $head }}</a></h2>
            {{ $slot }}
        </div>
        @if ($text)
            <p>{{ $text }}</p>
        @endif
    </div>
</div>
