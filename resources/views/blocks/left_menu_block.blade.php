<ul>
    @foreach ($technic_types as $type)
        @if (!$hideActive || $current_id != $type->id)
            <li {{ $current_id == $type->id ? 'class=active' : '' }}>
                <a href="{{ route('technics',['slug' => $slug, 'id' => $type->id]) }}">{{ $type->name }}</a>
                @if ($current_id == $type->id)
                    <img src="{{ asset('images/arrow_cir_to_right_yellow.svg') }}" />
                @endif
            </li>
        @endif
    @endforeach
</ul>
