@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['custom_key' => 'unit'])
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_unit_type') }}" method="post">
                @csrf
                @if (isset($unit_type))
                    @include('blocks.hidden_id_block',['id' => $unit_type->id])
                @endif
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('blocks.input_block', [
                            'label' => trans('admin.name'),
                            'name' => 'name',
                            'type' => 'text',
                            'max' => 50,
                            'placeholder' => trans('admin.name'),
                            'value' => isset($unit_type) ? $unit_type->name : ''
                        ])
                        @include('admin.blocks.active_checkbox_block', ['checked' => isset($unit_type) ? $unit_type->active : true])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (isset($unit_type))
        <div class="panel panel-flat">
            <div class="panel-body">
                <x-atitle>{{ trans('admin_menu.units') }}</x-atitle>
                @include('admin.blocks.data_table_block', [
                    'columns' => ['image','name','description','active'],
                    'items' => $unit_type->units,
                    'route' => 'units',
                    'parent_id' => $unit_type->id,
                    'useEdit' => true,
                    'useDelete' => true
                ])
            </div>
            @include('admin.blocks.add_button_block', [
                'route' => 'units',
                'custom_key' => 'unit',
                'parent_id' => $unit_type->id,
            ])
        </div>
        <script>window.dtRows = 6;</script>
    @endif
@endsection
