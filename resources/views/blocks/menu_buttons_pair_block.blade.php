<div class="pair">
    <img class="phone-icon" src="{{ asset('images/phone_icon_white.svg') }}" />
    @if ($mainPhone->active)
        @include('blocks.phone_block',['phone' => $mainPhone->value])
    @endif
{{--    @include('blocks.button_block',[--}}
{{--        'addClass' => 'get-a-service white',--}}
{{--        'primary' => false,--}}
{{--        'buttonText' => trans('content.get_service')--}}
{{--    ])--}}
</div>
