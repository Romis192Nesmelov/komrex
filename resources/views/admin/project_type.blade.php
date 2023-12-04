@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['custom_key' => 'project'])
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_project_type') }}" method="post">
                @csrf
                @if (isset($project_type))
                    @include('blocks.hidden_id_block',['id' => $project_type->id])
                @endif
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('blocks.input_block', [
                            'label' => trans('admin.name'),
                            'name' => 'name',
                            'type' => 'text',
                            'max' => 50,
                            'placeholder' => trans('admin.name'),
                            'value' => isset($project_type) ? $project_type->name : ''
                        ])
                        @include('admin.blocks.active_checkbox_block', ['checked' => isset($project_type) ? $project_type->active : true])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (isset($project_type))
        <div class="panel panel-flat">
            <div class="panel-body">
                <x-atitle>{{ trans('admin_menu.projects') }}</x-atitle>
                @include('admin.blocks.data_table_block', [
                    'columns' => ['head','date','text','active'],
                    'items' => $project_type->projects,
                    'route' => 'projects',
                    'parent_id' => $project_type->id,
                    'useEdit' => true,
                    'useDelete' => true
                ])
            </div>
            @include('admin.blocks.add_button_block', [
                'route' => 'projects',
                'parent_id' => $project_type->id,
            ])
        </div>
        <script>window.dtRows = 6;</script>
    @endif
@endsection
