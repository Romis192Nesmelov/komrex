@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-icon-modal','custom_key' => 'active_monitoring_icon'])
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-step-modal','custom_key' => 'active_monitoring_step'])

    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_active_monitoring') }}" method="post">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('blocks.input_block', [
                            'name' => 'content1_head',
                            'type' => 'text',
                            'max' => 255,
                            'value' => $content[0]->head
                        ])
                        @include('admin.blocks.textarea_block',[
                            'name' => 'content2_text',
                            'value' => $content[1]->text,
                            'simple' => true
                        ])
                        @include('admin.blocks.textarea_block',[
                            'name' => 'content3_text',
                            'value' => $content[2]->text,
                            'simple' => true
                        ])
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                @include('admin.blocks.input_image_block',['image' => $content[3]->image])
                            </div>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                @include('blocks.input_block', [
                                    'name' => 'content4_head',
                                    'type' => 'text',
                                    'max' => 255,
                                    'value' => $content[3]->head
                                ])
                                @include('admin.blocks.textarea_block',[
                                    'name' => 'content4_text',
                                    'value' => $content[3]->text,
                                    'simple' => false
                                ])
                            </div>
                        </div>
                        @include('admin.blocks.textarea_block',[
                            'name' => 'content5_text',
                            'value' => $content[4]->text,
                            'simple' => true
                        ])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-flat">
        <x-atitle>{{ trans('content.active_m_system_provides') }}</x-atitle>
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => ['text','','','created_at','updated_at'],
                'items' => $provides,
                'route' => 'active_monitoring_provides',
                'useEdit' => true,
                'useDelete' => false
            ])
        </div>
    </div>
    <div class="panel panel-flat">
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => ['image','head','active','created_at'],
                'items' => $icons,
                'route' => 'active_monitoring_icons',
                'deleteModal' => 'delete-icon-modal',
                'useEdit' => true,
                'useDelete' => true
            ])
            @include('admin.blocks.add_button_block', [
                'route' => 'active_monitoring_icons',
                'custom_key' => 'active_monitoring_icon'
            ])
        </div>
    </div>
    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin.how_it_works') }}</x-atitle>
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => ['image','head','text','active'],
                'items' => $steps,
                'route' => 'active_monitoring_steps',
                'deleteModal' => 'delete-step-modal',
                'useEdit' => true,
                'useDelete' => true
            ])
            @include('admin.blocks.add_button_block', [
                'route' => 'active_monitoring_steps',
                'custom_key' => 'active_monitoring_step'
            ])
        </div>
    </div>
    <script>window.dtRows = 6;</script>
@endsection
