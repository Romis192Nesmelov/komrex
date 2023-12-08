@if ($condition)
    <div class="col-lg-6 col-sm-12 p-3">
        <img class="w-100" src="{{ asset($cFuture->image) }}" />
    </div>
@else
    <div class="col-lg-6 col-sm-12 p-3">
        <h3>{{ $cFuture->head }}</h3>
        {!! $cFuture->text !!}
    </div>
@endif
