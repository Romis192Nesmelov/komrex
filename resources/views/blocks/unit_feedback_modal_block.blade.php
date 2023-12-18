<x-smodal id="unit-feedback-modal" head="{{ trans('content.request_a_price') }}">
    <form method="POST" action="{{ route('unit_feedback') }}">
        @csrf
        @include('blocks.feedback_fields_block',[
            'hiddenInputName' => 'id',
            'hiddenId' => $hiddenId ?? '',
            'buttonAddClass' => 'withArrow',
            'primary' => false,
            'button_text' => trans('content.write_to_the_company'),
            'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
        ])
    </form>
</x-smodal>
