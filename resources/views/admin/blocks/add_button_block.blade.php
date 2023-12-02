<div class="panel-body">
    @if (isset($route))
        <a href="{{ route('admin.'.$route, ['slug' => 'add', 'parent_id' => $parent_id]), }}">
    @else
        <a href="{{ route('admin.'.$menu[$menu_key]['key']).'/add', }}">
    @endif
        @include('blocks.button_block', [
            'primary' => true,
            'buttonType' => 'button',
            'icon' => 'icon-database-add',
            'buttonText' => trans('admin.add_'.$singular_key),
            'addClass' => (isset($addClass) ? $addClass.' ' : '').'pull-right'
        ])
    </a>
</div>
