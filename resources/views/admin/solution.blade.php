@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_solution') }}" method="post">
                @csrf
                @if (isset($solution))
                    @include('blocks.hidden_id_block',['id' => $solution->id])
                @endif
                <div class="col-lg-3 col-md-4 col-sm-12">
                    @include('admin.blocks.input_image_block',['image' => isset($solution) ? $solution->image : null])
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.head'),
                                'name' => 'head',
                                'type' => 'text',
                                'max' => 50,
                                'placeholder' => trans('admin.head'),
                                'value' => isset($solution) ? $solution->head : ''
                            ])
                            @include('admin.blocks.textarea_block',[
                                'name' => 'text',
                                'label' => trans('admin.text'),
                                'value' => isset($solution) ? $solution->text : '',
                                'simple' => true
                            ])
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($solution) ? $solution->active : true])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
