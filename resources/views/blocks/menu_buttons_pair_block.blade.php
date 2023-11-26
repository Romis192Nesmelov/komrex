<div class="pair-buttons">
    <img class="phone-icon" src="{{ asset('images/phone_icon.svg') }}" />
    @include('blocks.button_block',[
        'primary' => true,
        'buttonText' => trans('content.get_service')
    ])
</div>
