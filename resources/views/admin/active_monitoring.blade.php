@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-icon-modal','custom_key' => 'active_monitoring_icon'])
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-tracking-modal','custom_key' => 'active_monitoring_tracking'])
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-step-modal','custom_key' => 'active_monitoring_step'])
    @include('admin.blocks.modal_delete_block', ['id' => 'delete-review-modal','custom_key' => 'review'])
{{--    <div class="panel panel-flat">--}}
{{--        <x-atitle>{{ trans('admin.image_on_the_active_m') }}</x-atitle>--}}
{{--        <div class="panel-body">--}}
{{--            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_active_monitoring_image') }}" method="post">--}}
{{--                @csrf--}}
{{--                @include('admin.blocks.input_image_block',['image' => 'images/active_m_image.jpg'])--}}
{{--                @include('admin.blocks.save_button_block')--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_active_monitoring') }}" method="post">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-body">
{{--                        @include('blocks.input_block', [--}}
{{--                            'name' => 'content1_head',--}}
{{--                            'type' => 'text',--}}
{{--                            'max' => 255,--}}
{{--                            'value' => $content[0]->head--}}
{{--                        ])--}}
                        @include('blocks.textarea_block',[
                            'name' => 'content1_text',
                            'value' => $content[0]->text,
                            'simple' => true
                        ])
                        @include('blocks.textarea_block',[
                            'name' => 'content2_text',
                            'value' => $content[1]->text,
                            'simple' => true
                        ])
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                @include('admin.blocks.input_image_block',['image' => $content[2]->image])
                            </div>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                @include('blocks.input_block', [
                                    'name' => 'content3_head',
                                    'type' => 'text',
                                    'max' => 255,
                                    'value' => $content[2]->head
                                ])
                                @include('blocks.textarea_block',[
                                    'name' => 'content3_text',
                                    'value' => $content[2]->text,
                                    'simple' => false
                                ])
                            </div>
                        </div>
                        @include('blocks.textarea_block',[
                            'name' => 'content4_text',
                            'value' => $content[3]->text,
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
        <x-atitle>{{ trans('admin.what_can_we_track') }}</x-atitle>
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => ['head','text','created_at','active'],
                'items' => $tracking,
                'route' => 'active_monitoring_trackings',
                'deleteModal' => 'delete-tracking-modal',
                'useEdit' => true,
                'useDelete' => true
            ])
            @include('admin.blocks.add_button_block', [
                'route' => 'active_monitoring_trackings',
                'custom_key' => 'active_monitoring_tracking'
            ])
        </div>
    </div>
    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin.how_it_works') }}</x-atitle>
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => ['head','text','created_at','active'],
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
    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin.reviews') }}</x-atitle>
        <div class="panel-body">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.add_review') }}" method="post">
                            @csrf
                            @include('admin.blocks.input_image_block',['head' => trans('admin.add_review')])
                            @include('admin.blocks.save_button_block')
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('admin.blocks.data_table_images_block', [
                            'items' => $reviews,
                            'deleteImageModal' => 'delete-review-modal'
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>window.dtRows = 6;</script>
@endsection
