@include('blocks.hidden_id_block',['name' => $hiddenInputName, 'id' => $hiddenId])
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
            'addClass' => 'w-100 '.$buttonAddClass,
            'disabled' => true,
            'primary' => $primary,
            'buttonType' => 'submit',
            'buttonText' => $button_text,
            'arrowIcon' => $arrowIcon
        ])
    </div>
    <div class="col-12 pt-3">
        @include('blocks.textarea_block',[
            'name' => 'comments',
            'placeholder' => trans('content.comments'),
            'value' => '',
            'simple' => true
        ])
    </div>
    <div class="col-12 ps-4 pt-3">
        @include('blocks.checkbox_block', [
            'name' => 'i_agree',
            'label' => trans('content.agree'),
            'ajax' => true
        ])
    </div>
</div>
