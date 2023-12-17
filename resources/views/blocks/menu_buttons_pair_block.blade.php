<div class="pair">
    <img class="phone-icon" src="{{ asset('images/phone_icon_white.svg') }}" />
    <div>
        @if ($mainPhone->active)
            @include('blocks.phone_block',['phone' => $mainPhone->value])
            <div class="number_for">{{ trans('content.number_for_incoming_calls') }}</div>
        @endif
    </div>
{{--    @include('blocks.button_block',[--}}
{{--        'addClass' => 'get-a-service white',--}}
{{--        'primary' => false,--}}
{{--        'buttonText' => trans('content.get_service')--}}
{{--    ])--}}
</div>
