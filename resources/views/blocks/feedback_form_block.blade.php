<form method="POST" action="{{ route('callback') }}" class="feedback-form {{ $addClass ?? '' }} wow animate__animated animate__slideInRight">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <h2>{!! trans('content.you_have_a_question_head') !!}</h2>
            <p>{!! trans('content.you_have_a_question_text') !!}</p>
        </div>
        <div class="col-lg-6 col-sm-12">
            @include('blocks.hidden_id_block',['name' => $hiddenInputName, 'id' => $hiddenId])
            <div class="mb-2">
                @include('blocks.input_block',[
                    'type' => 'text',
                    'name' => 'name',
                    'placeholder' => trans('content.your_name'),
                    'ajax' => true
                ])
            </div>
            <div class="mb-2">
                @include('blocks.input_block',[
                    'type' => 'text',
                    'name' => 'phone',
                    'placeholder' => trans('content.phone'),
                    'ajax' => true
                ])
            </div>
            <div class="mb-2">
                @include('blocks.textarea_block',[
                    'name' => 'comments',
                    'placeholder' => trans('content.comments'),
                    'value' => '',
                    'simple' => true
                ])
            </div>
            @include('blocks.checkbox_block', [
                'name' => 'i_agree',
                'label' => trans('content.agree'),
                'ajax' => true
            ])
            @include('blocks.button_block',[
                'addClass' => 'w-100 w-60',
                'disabled' => true,
                'primary' => true,
                'buttonType' => 'submit',
                'buttonText' => trans('content.order_callback'),
                'arrowIcon' => 'arrow_cir_to_right_dark.svg'
            ])
        </div>
    </div>
</form>
