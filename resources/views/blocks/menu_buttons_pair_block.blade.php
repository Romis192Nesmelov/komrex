<div class="pair-buttons">
    <img class="phone-icon" src="{{ asset('images/phone_icon.svg') }}" />
    @include('blocks.button_block',[
        'addClass' => 'white',
        'primary' => false,
        'buttonText' => trans('content.get_service')
    ])
</div>
