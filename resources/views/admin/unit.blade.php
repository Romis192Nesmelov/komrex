@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_unit') }}" method="post">
                @csrf
                @if (isset($unit))
                    @include('blocks.hidden_id_block',['id' => $unit->id])
                @endif
                <div class="col-lg-3 col-md-4 col-sm-12">
                    @include('admin.blocks.input_image_block',['image' => isset($unit) ? $unit->image : null])
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin.blocks.select_block',[
                                'name' => 'unit_type_id',
                                'label' => trans('admin.unit_type'),
                                'values' => $parents,
                                'option' => 'name',
                                'selected' => request('parent_id')
                            ])
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($unit) ? $unit->active : true])
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.price'),
                                'name' => 'price',
                                'type' => 'number',
                                'min' => 1,
                                'max' => 100000000,
                                'placeholder' => trans('admin.price'),
                                'value' => isset($unit) ? $unit->price : ''
                            ])
                            @include('blocks.input_block', [
                                'label' => trans('admin.name'),
                                'name' => 'name',
                                'type' => 'text',
                                'max' => 255,
                                'placeholder' => trans('admin.name'),
                                'value' => isset($unit) ? $unit->name : ''
                            ])
                            @include('blocks.textarea_block',[
                                'name' => 'description',
                                'label' => trans('admin.description'),
                                'value' => isset($unit) ? $unit->description : '',
                                'simple' => false
                            ])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
