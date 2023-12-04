@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['custom_key' => 'project_image'])
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
                        @include('admin.blocks.input_file_block', ['label' => 'PDF', 'name' =>  'presentation'])
                        @include('admin.blocks.active_checkbox_block', ['checked' => isset($project) ? $project->active : true])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (isset($project))
        <div class="col-lg-3 col-ms-12">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.add_project_image') }}" method="post">
                        @csrf
                        @include('blocks.hidden_id_block',['name' => 'project_id', 'id' => $project->id])
                        @include('admin.blocks.input_image_block',['head' => trans('admin.add_project_image')])
                        @include('admin.blocks.save_button_block')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-ms-12">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <x-atitle>{{ trans('admin.images') }}</x-atitle>
                    @include('admin.blocks.data_table_block', [
                        'columns' => ['image'],
                        'items' => $project->images,
                        'useEdit' => false,
                        'useDelete' => true
                    ])
                </div>
            </div>
        </div>
        <script>window.dtRows = 2;</script>
    @endif
@endsection
