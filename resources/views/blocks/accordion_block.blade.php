<div class="tracking-item wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.1 }}s">
    <div class="tracking-header {{ $itemText ? 'clickable' : '' }}" id="tracking-header-{{ $itemId }}">
        <span>{{ $itemHead }}</span>
        @if ($itemText)
            <img class="down" src="{{ asset('images/arrow_down_yellow_simple.svg') }}" />
        @endif
    </div>
    @if ($itemText)
        <div id="tracking-body-{{ $itemId }}" class="tracking-body">{!! $itemText !!}</div>
    @endif
</div>
