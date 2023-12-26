<x-smodal id="technic-feedback-modal" head="{{ trans('content.leave_application') }}">
    <form method="POST" action="{{ route('technic_feedback') }}">
        @csrf
        @include('blocks.feedback_fields_block',[
            'hiddenInputName' => 'id',
            'hiddenId' => $hiddenId ?? '',
            'buttonAddClass' => 'withArrow',
            'primary' => false,
            'button_text' => trans('content.send_application'),
            'arrowIcon' => 'arrow_cir_to_right_yellow.svg'
        ])
    </form>
</x-smodal>
