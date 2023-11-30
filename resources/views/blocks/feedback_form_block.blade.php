<form method="POST" action="{{ route('callback') }}" class="feedback-form">
    @csrf
    <h2>{{ trans('content.you_have_a_question_head') }}</h2>
    <p>{{ trans('content.you_have_a_question_text') }}</p>
    <div class="row mt-2">
        <div class="col-lg-4 col-sm-12 mb-2">
            @include('blocks.input_block',[
                'name' => 'name',
                'placeholder' => trans('content.your_name'),
                'ajax' => true
            ])
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            @include('blocks.input_block',[
                'name' => 'phone',
                'placeholder' => trans('content.phone'),
                'ajax' => true
            ])
        </div>
        <div class="col-lg-4 col-sm-12">
            @include('blocks.button_block',[
                'primary' => true,
                'buttonType' => 'submit',
                'buttonText' => trans('content.request_a_call_back'),
                'arrowIcon' => 'arrow_cir_to_right_dark.svg'
            ])
        </div>
    </div>
</form>
