<ul>
    @foreach ($types as $k => $type)
        @if (!$hideActive || $current_id != $type->id)
            <li class="{{ $current_id == $type->id ? 'active' : '' }} wow animate__animated animate__fadeInUp" data-wow-offset="10" data-wow-delay="{{ ($k + 1) * 0.3 }}s">
                <a href="{{ route('technics',['slug' => $slug ?? '', 'id' => $type->id]) }}">{{ $type->name }}</a>
                @if ($current_id == $type->id)
                    <img src="{{ asset('images/arrow_cir_to_right_yellow.svg') }}" />
                @endif
            </li>
        @endif
    @endforeach
</ul>
