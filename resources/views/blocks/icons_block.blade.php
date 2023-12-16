<div class="row justify-content-center">
    @foreach($items as $k => $item)
        <div class="col-lg-{{ $col }} col-sm-12 mb-3 mb-lg-0 wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.3 }}s">
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
