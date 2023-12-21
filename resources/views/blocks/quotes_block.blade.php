<div class="quotes-text wow animate__animated animate__slideInRight" data-wow-offset="10">
    @if ($use_quotes)
        <div class="quotes"><img src="{{ asset('images/quotes_open.svg') }}" /></div>
    @endif
    <p>{{ $text }}</p>
    @if ($use_quotes)
        <div class="quotes"><img src="{{ asset('images/quotes_close.svg') }}" /></div>
    @endif
</div>
