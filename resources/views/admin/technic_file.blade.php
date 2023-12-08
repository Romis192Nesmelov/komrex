@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data"  action="{{ route('admin.edit_technic_file') }}" method="post">
                @csrf
                @if (isset($technic_file))
                    @include('blocks.hidden_id_block',['id' => $technic_file->id])
                @endif
                @include('blocks.hidden_id_block',[
                    'name' => 'technic_id',
                    'id' => request('parent_id')
                ])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('admin.blocks.input_file_block', ['label' => 'PDF', 'name' =>  'pdf'])
                        @include('blocks.input_block', [
                            'label' => trans('admin.name'),
                            'name' => 'name',
                            'type' => 'text',
                            'max' => 255,
                            'placeholder' => trans('admin.name'),
                            'value' => isset($technic_file) ? $technic_file->name : ''
                        ])
                        @include('admin.blocks.active_checkbox_block', ['checked' => isset($technic_files) ? $technic_files->active : true])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
