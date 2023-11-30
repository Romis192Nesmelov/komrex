<div class="row">
    <a href="{{ $href }}">
        @include('blocks.button_block', [
            'primary' => true,
            'buttonType' => 'button',
            'icon' => 'icon-database-add',
            'buttonText' => $text,
            'addClass' => (isset($addClass) ? $addClass.' ' : '').'pull-right'
        ])
    </a>
</div>
