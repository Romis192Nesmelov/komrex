<div class="row justify-content-center">
    @foreach($items as $item)
        <div class="col-lg-{{ $col }} col-sm-12 mb-3 mb-lg-0">
            <div class="icon-block {{ $addClass ?? '' }}">
                <img src="{{ asset($item->image) }}">
                <h3>{{ $item->head }}</h3>
                @if (isset($item->text))
                    {{ $item->text }}
                @endif
            </div>
        </div>
    @endforeach
</div>
