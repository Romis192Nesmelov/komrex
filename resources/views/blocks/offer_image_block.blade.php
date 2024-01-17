@if (isset($href) && isset($hrefText))
    <div class="w-100">
        <a href="{{ $href }}"><img class="offer-img" src="{{ asset($image) }}" /></a>
    </div>
    <div class="offer-href">
        <a href="{{ $href }}">{{ $hrefText }}</a>
    </div>
@else
    <div class="w-100">
        <img class="offer-img" src="{{ asset($image) }}" />
    </div>
@endif
