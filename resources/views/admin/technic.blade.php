@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['custom_key' => 'constructive_feature'])
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-video-modal','custom_key' => 'technic_video'])
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-image-modal','custom_key' => 'technic_image'])
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-file-modal','custom_key' => 'technic_file'])

    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_technic') }}" method="post">
                @csrf
                @if (isset($technic))
                    @include('blocks.hidden_id_block',['id' => $technic->id])
                @endif
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin.blocks.select_block',[
                                'name' => 'technic_type_id',
                                'label' => trans('admin.technic_type'),
                                'values' => $parents,
                                'option' => 'name',
                                'selected' => request('parent_id')
                            ])
                        </div>
                    </div>
                    <div class="panel panel-flat">
                        <x-atitle>{{ trans('admin.komrex_technic') }}</x-atitle>
                        <div class="panel-body">
                            @include('admin.blocks.radio_button_block',[
                                'name' => 'komrex',
                                'values' => [
                                    ['val' => 1, 'descript' => trans('admin.yes')],
                                    ['val' => 0, 'descript' => trans('admin.no')]
                                ],
                                'activeValue' => isset($technic) ? $technic->komrex : 1
                            ])
                        </div>
                    </div>
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($technic) ? $technic->active : true])
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <div class="col-12">
                                @include('blocks.input_block', [
                                    'label' => trans('admin.name'),
                                    'name' => 'name',
                                    'type' => 'text',
                                    'max' => 255,
                                    'placeholder' => trans('admin.name'),
                                    'value' => isset($technic) ? $technic->name : ''
                                ])
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                @include('blocks.input_block', [
                                    'label' => trans('admin.engine_model'),
                                    'name' => 'engine_model',
                                    'type' => 'text',
                                    'max' => 255,
                                    'placeholder' => trans('admin.engine_model'),
                                    'value' => isset($technic) && $technic->engine_model ? $technic->engine_model : ''
                                ])
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                @include('blocks.input_block', [
                                    'label' => trans('admin.power').'('.trans('admin.kilowatt').')',
                                    'name' => 'power',
                                    'type' => 'text',
                                    'placeholder' => trans('admin.power').'('.trans('admin.kilowatt').')',
                                    'value' => isset($technic) ? $technic->power : 10000
                                ])
                            </div>

                            <div class="col-lg-6 col-sm-12">
                                @include('blocks.input_block', [
                                    'label' => trans('admin.weight').'('.trans('admin.kg').')',
                                    'name' => 'weight',
                                    'type' => 'number',
                                    'placeholder' => trans('admin.weight').'('.trans('admin.kg').')',
                                    'value' => isset($technic) ? $technic->weight : 1000
                                ])
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                @include('blocks.input_block', [
                                    'label' => trans('admin.load_capacity'),
                                    'name' => 'load_capacity',
                                    'type' => 'number',
                                    'max' => 30000,
                                    'placeholder' => trans('admin.load_capacity'),
                                    'value' => isset($technic) && $technic->load_capacity ? $technic->load_capacity : 0
                                ])
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                @include('blocks.input_block', [
                                    'label' => trans('admin.traction_force'),
                                    'name' => 'traction_force',
                                    'type' => 'number',
                                    'max' => 3000,
                                    'placeholder' => trans('admin.traction_force'),
                                    'value' => isset($technic) && $technic->traction_force ? $technic->traction_force : 0
                                ])
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                @include('blocks.input_block', [
                                    'label' => trans('admin.drum_static_pressure'),
                                    'name' => 'drum_static_pressure',
                                    'type' => 'number',
                                    'max' => 3000,
                                    'placeholder' => trans('admin.drum_static_pressure'),
                                    'value' => isset($technic) && $technic->drum_static_pressure ? $technic->drum_static_pressure : 0
                                ])
                            </div>

                            @include('admin.blocks.input_file_block', ['label' => trans('admin.upload_the_characteristics_file'), 'name' =>  'csv'])
                            @if (isset($technic) && $technic->characteristics)
                                @include('blocks.textarea_block',[
                                    'name' => 'characteristics',
                                    'label' => trans('admin.characteristics'),
                                    'value' => $technic->characteristics,
                                    'simple' => false
                                ])
                            @endif
                            @include('blocks.textarea_block',[
                                'name' => 'description',
                                'label' => trans('admin.description'),
                                'value' => isset($technic) ? $technic->description : '',
                                'simple' => false
                            ])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (isset($technic))
        <div class="panel panel-flat">
            <x-atitle>{{ trans('admin.constructive_features') }}</x-atitle>
            <div class="panel-body">
                @if ($technic->constructiveFeatures->count())
                    @include('admin.blocks.data_table_block', [
                        'columns' => ['image', 'head','text','active'],
                        'items' => $technic->constructiveFeatures,
                        'route' => 'constructive_features',
                        'parent_id' => $technic->id,
                        'useEdit' => true,
                        'useDelete' => true
                    ])
                @endif
                @include('admin.blocks.add_button_block', [
                    'route' => 'constructive_features',
                    'custom_key' => 'constructive_feature',
                    'parent_id' => $technic->id,
                ])
            </div>
        </div>
        <div class="panel panel-flat">
            <div class="panel-body">
                @include('admin.blocks.images_block',[
                    'route' => 'add_technic_image',
                    'hiddenIdName' => 'technic_id',
                    'item' => $technic
                ])
            </div>
        </div>
        <div class="panel panel-flat">
            <x-atitle>{{ trans('admin.video') }}</x-atitle>
            <div class="panel-body">
                @if ($technic->technicVideos->count())
                    @include('admin.blocks.data_table_block', [
                        'columns' => ['video', 'head','active','created_at'],
                        'items' => $technic->technicVideos,
                        'route' => 'technic_videos',
                        'parent_id' => $technic->id,
                        'deleteModal' => 'delete-video-modal',
                        'useEdit' => true,
                        'useDelete' => true
                    ])
                @endif
                @include('admin.blocks.add_button_block', [
                    'route' => 'technic_videos',
                    'custom_key' => 'technic_video',
                    'parent_id' => $technic->id,
                ])
            </div>
        </div>
        <div class="panel panel-flat">
            <x-atitle>{{ trans('admin.files') }}</x-atitle>
            <div class="panel-body">
                @include('admin.blocks.data_table_block', [
                    'columns' => ['pdf', 'name','active','created_at'],
                    'items' => $technic->files,
                    'route' => 'technic_files',
                    'parent_id' => $technic->id,
                    'deleteModal' => 'delete-file-modal',
                    'useEdit' => true,
                    'useDelete' => true
                ])
                @include('admin.blocks.add_button_block', [
                    'route' => 'technic_files',
                    'custom_key' => 'technic_file',
                    'parent_id' => $technic->id,
                ])
            </div>
        </div>
    @endif
    <script>window.dtRows = 6;</script>
@endsection
