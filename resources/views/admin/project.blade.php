@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-image-modal','custom_key' => 'project_image'])
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_project') }}" method="post">
                @csrf
                @if (isset($project))
                    @include('blocks.hidden_id_block',['id' => $project->id])
                @endif
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('admin.blocks.select_block',[
                            'name' => 'project_type_id',
                            'label' => trans('admin.project_type'),
                            'values' => $parents,
                            'option' => 'name',
                            'selected' => request('parent_id')
                        ])
                        @include('blocks.input_block', [
                            'label' => trans('admin.date'),
                            'name' => 'date',
                            'type' => 'text',
                            'max' => 15,
                            'placeholder' => trans('admin.date'),
                            'value' => isset($project) ? $project->date : ''
                        ])
                        @include('blocks.input_block', [
                            'label' => trans('admin.head'),
                            'name' => 'head',
                            'type' => 'text',
                            'max' => 255,
                            'placeholder' => trans('admin.head'),
                            'value' => isset($project) ? $project->head : ''
                        ])
                        @include('admin.blocks.textarea_block',[
                            'name' => 'text',
                            'label' => trans('admin.text'),
                            'value' => isset($project) ? $project->text : '',
                            'simple' => false
                        ])
                        @include('admin.blocks.input_file_block', ['label' => 'PDF', 'name' =>  'pdf'])
                        @include('admin.blocks.active_checkbox_block', ['checked' => isset($project) ? $project->active : true])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (isset($project))
        @include('admin.blocks.images_block',[
            'route' => 'add_project_image',
            'hiddenIdName' => 'project_id',
            'item' => $project
        ])
    @endif
@endsection
