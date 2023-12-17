@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_active_monitoring_step') }}" method="post">
                @csrf
                @if (isset($active_monitoring_step))
                    @include('blocks.hidden_id_block',['id' => $active_monitoring_step->id])
                @endif
{{--                <div class="col-lg-3 col-md-4 col-sm-12">--}}
{{--                    @include('admin.blocks.input_image_block',['image' => isset($active_monitoring_step) ? $active_monitoring_step->image : ''])--}}
{{--                </div>--}}
{{--                <div class="col-lg-9 col-md-8 col-sm-12">--}}
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.head'),
                                'name' => 'head',
                                'type' => 'text',
                                'max' => 255,
                                'placeholder' => trans('admin.head'),
                                'value' => isset($active_monitoring_step) ? $active_monitoring_step->head : ''
                            ])
                            @include('blocks.textarea_block',[
                                'name' => 'text',
                                'label' => trans('admin.text'),
                                'value' => isset($active_monitoring_step) ? $active_monitoring_step->text : '',
                                'simple' => true
                            ])
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($active_monitoring_step) ? $active_monitoring_step->active : true])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
{{--                </div>--}}
            </form>
        </div>
    </div>
@endsection
