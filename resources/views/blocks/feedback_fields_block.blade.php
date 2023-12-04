<div class="row mt-2">
    <div class="col-lg-4 col-sm-12 mb-2">
        @include('blocks.input_block',[
            'type' => 'text',
            'name' => 'name',
            'placeholder' => trans('content.your_name'),
            'ajax' => true
        ])
    </div>
    <div class="col-lg-4 col-sm-12 mb-2">
        @include('blocks.input_block',[
            'type' => 'text',
            'name' => 'phone',
            'placeholder' => trans('content.phone'),
            'ajax' => true
        ])
    </div>
    <div class="col-lg-4 col-sm-12">
        @include('blocks.button_block',[
            'addClass' => $buttonAddClass,
            'primary' => $primary,
            'buttonType' => 'submit',
            'buttonText' => $button_text,
            'arrowIcon' => $arrowIcon
        ])
    </div>
</div>
