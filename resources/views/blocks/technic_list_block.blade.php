<div class="head col-lg-4 col-sm-12 p-2">
    <h1>{{ $technic->name }}</h1>
    {{ singularName($technics->name) }}
</div>
<div class="col-lg-4 col-sm-12 p-2">
    @if ($technic->technic_type_id == 4)
        {{ trans('content.weight_in_basic_configuration') }}
    @else
        {{ trans('content.operating_weight') }}
    @endif
    <br>
    {{ $technic->weight.trans('content.kg') }}
</div>
<div class="col-lg-4 col-sm-12 p-2">
    {{ trans('content.net_power') }}<br>
    {{ $technic->power.trans('content.kilowatt').' ('.(round($technic->power * 1.3596)).trans('content.horse_power').')' }}
</div>
<div class="col-lg-4 col-sm-12 p-2">
    @include('blocks.technic_params_block',['technic' => $technic])
</div>
