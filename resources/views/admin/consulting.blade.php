@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_consulting') }}" method="post">
                @csrf
                @include('admin.blocks.hidden_id_block',['id' => $consulting->id])
                <div class="col-lg-3 col-ms-12">
                    @include('admin.blocks.input_image_block',['image' => $consulting->image])
                </div>
                <div class="col-lg-9 col-ms-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.head'),
                                'name' => 'head',
                                'type' => 'text',
                                'max' => 50,
                                'placeholder' => trans('admin.head'),
                                'value' => $consulting->head
                            ])
                            @include('admin.blocks.textarea_block',[
                                'name' => 'text',
                                'label' => trans('admin.text'),
                                'value' => $consulting->text,
                                'simple' => true
                            ])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
