<div class="quotes-text wow animate__animated animate__slideInRight" data-wow-offset="10">
    @if ($use_quotes) <img class="quotes" src="{{ asset('images/quotes_open.svg') }}" /> @endif
    <p>{{ $text }}</p>
    @if ($use_quotes) <img class="quotes" src="{{ asset('images/quotes_close.svg') }}" /> @endif
</div>
