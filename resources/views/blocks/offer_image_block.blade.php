<div class="w-100">
    <img class="offer-img" src="{{ asset($image) }}" />
</div>
@if (isset($href) && isset($hrefText))
    <div class="offer-href">
        <a href="{{ $href }}">{{ $hrefText }}</a>
    </div>
@endif
