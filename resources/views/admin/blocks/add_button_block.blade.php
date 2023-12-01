<div class="panel-body">
    <a href="{{ route('admin.'.$menu[$menu_key]['key']).'/add', }}">
        @include('blocks.button_block', [
            'primary' => true,
            'buttonType' => 'button',
            'icon' => 'icon-database-add',
            'buttonText' => trans('admin.add_'.$singular_key),
            'addClass' => (isset($addClass) ? $addClass.' ' : '').'pull-right'
        ])
    </a>
</div>
