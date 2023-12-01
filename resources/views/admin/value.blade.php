@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_value') }}" method="post">
                @csrf
                @if (isset($value))
                    @include('admin.blocks.hidden_id_block',['id' => $value->id])
                @endif
                <div class="col-lg-3 col-ms-12">
                    @include('admin.blocks.input_image_block',['image' => isset($value) ? $value->image : null])
                </div>
                <div class="col-lg-9 col-ms-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.head'),
                                'name' => 'head',
                                'type' => 'text',
                                'max' => 20,
                                'placeholder' => trans('admin.head'),
                                'value' => isset($value) ? $value->head : ''
                            ])
                            @include('admin.blocks.textarea_block',[
                                'name' => 'text',
                                'label' => trans('admin.text'),
                                'value' => isset($value) ? $value->text : '',
                                'simple' => true
                            ])
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($participant) ? $participant->active : true])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
