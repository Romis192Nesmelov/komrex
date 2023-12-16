@if ($condition)
    <div class="col-lg-6 col-sm-12 p-3 wow animate__animated animate__slideIn{{ $position == 'Left' ? 'Left' : 'Right' }}" data-wow-offset="10">
        <img class="w-100" src="{{ asset($cFuture->image) }}" />
    </div>
@else
    <div class="col-lg-6 col-sm-12 p-3 wow animate__animated animate__slideIn{{ $position == 'Left' ? 'Left' : 'Right' }}" data-wow-offset="10">
        <h3>{{ $cFuture->head }}</h3>
        {!! $cFuture->text !!}
    </div>
@endif
