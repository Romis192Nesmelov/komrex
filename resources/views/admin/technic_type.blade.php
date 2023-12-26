@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['custom_key' => 'technic'])
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_technic_type') }}" method="post">
                @csrf
                @if (isset($technic_type))
                    @include('blocks.hidden_id_block',['id' => $technic_type->id])
                @endif
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('blocks.input_block', [
                            'label' => trans('admin.name'),
                            'name' => 'name',
                            'type' => 'text',
                            'max' => 50,
                            'placeholder' => trans('admin.name'),
                            'value' => isset($technic_type) ? $technic_type->name : ''
                        ])
                        @include('admin.blocks.active_checkbox_block', ['checked' => isset($technic_type) ? $technic_type->active : true])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (isset($technic_type))
        <div class="panel panel-flat">
            <div class="panel-body">
                <x-atitle>{{ trans('admin_menu.technics') }}</x-atitle>
                @include('admin.blocks.data_table_block', [
                    'columns' => ['name','weight','power','komrex','active','created_at'],
                    'items' => $technic_type->technics,
                    'route' => 'technics',
                    'parent_id' => $technic_type->id,
                    'useEdit' => true,
                    'useDelete' => true
                ])
            </div>
            @include('admin.blocks.add_button_block', [
                'route' => 'technics',
                'custom_key' => 'technic',
                'parent_id' => $technic_type->id,
            ])
        </div>
        <script>window.dtRows = 8;</script>
    @endif
@endsection
