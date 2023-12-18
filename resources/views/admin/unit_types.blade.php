@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block')
{{--    <div class="panel panel-flat">--}}
{{--        <x-atitle>{{ trans('admin.image_on_the_unit_page') }}</x-atitle>--}}
{{--        <div class="panel-body">--}}
{{--            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_unit_image') }}" method="post">--}}
{{--                @csrf--}}
{{--                @include('admin.blocks.input_image_block',['image' => 'images/units_image.jpg'])--}}
{{--                @include('admin.blocks.save_button_block')--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => ['name','active','created_at'],
                'items' => $unit_types,
                'useEdit' => true,
                'useDelete' => true
            ])
        </div>
        @include('admin.blocks.add_button_block')
    </div>
    <script>window.dtRows = 5;</script>
@endsection
