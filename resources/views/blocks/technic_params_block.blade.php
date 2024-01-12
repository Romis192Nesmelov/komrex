@foreach (['engine_model','load_capacity','traction_force','drum_static_pressure'] as $param)
    @if ($technic[$param])
        {{ trans('content.'.$param) }}<br>
        {{ $technic[$param] }}
        @if ($param == 'load_capacity')
            {{ trans('content.kg') }}
        @elseif ($param == 'traction_force')
            {{ trans('content.kilonewton') }}
        @elseif ($param == 'drum_static_pressure')
            {{ trans('content.newton_per_cm2') }}
        @endif
    @endif
@endforeach
