<form method="POST" action="{{ route('callback') }}" class="feedback-form {{ $addClass ?? '' }} wow animate__animated animate__slideInRight">
    @csrf
    <h2>{{ trans('content.you_have_a_question_head') }}</h2>
    <p>{{ trans('content.you_have_a_question_text') }}</p>
    @include('blocks.feedback_fields_block',[
        'hiddenInputName' => $hiddenInputName,
        'hiddenId' => $hiddenId,
        'buttonAddClass' => '',
        'primary' => true,
        'button_text' => trans('content.request_a_call_back'),
        'arrowIcon' => 'arrow_cir_to_right_dark.svg'
    ])
</form>
