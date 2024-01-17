@props([
    'head' => '',
    'text' => '',
    'href' => '',
    'delay' => 1,
])

<div class="col-lg-4 col-sm-12 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ $delay }}s">
    <div class="offer-block">
        <a href="{{ $href }}"><div class="arrow"></div></a>
        <div class="d-block">
            <h2><a href="{{ $href }}">{{ $head }}</a></h2>
            {{ $slot }}
        </div>
        @if ($text)
            <p>{{ $text }}</p>
        @endif
    </div>
</div>
