@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_constructive_feature') }}" method="post">
                @csrf
                @if (isset($constructive_feature))
                    @include('blocks.hidden_id_block',['id' => $constructive_feature->id])
                @endif
                @include('blocks.hidden_id_block',[
                    'name' => 'technic_id',
                    'id' => request('parent_id')
                ])
                <div class="col-lg-3 col-sm-12">
                    @include('admin.blocks.input_image_block',['image' => isset($constructive_feature) ? $constructive_feature->image : null])
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.head'),
                                'name' => 'head',
                                'type' => 'text',
                                'max' => 20,
                                'placeholder' => trans('admin.head'),
                                'value' => isset($constructive_feature) ? $constructive_feature->head : ''
                            ])
                            @include('blocks.textarea_block',[
                                'name' => 'text',
                                'label' => trans('admin.text'),
                                'value' => isset($constructive_feature) ? $constructive_feature->text : '',
                                'simple' => false
                            ])
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($constructive_feature) ? $constructive_feature->active : true])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
