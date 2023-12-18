@extends('layouts.admin')

@section('content')
{{--    <div class="panel panel-flat">--}}
{{--        <x-atitle>{{ trans('admin.image_on_the_main_page') }}</x-atitle>--}}
{{--        <div class="panel-body">--}}
{{--            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_home_image') }}" method="post">--}}
{{--                @csrf--}}
{{--                @include('admin.blocks.input_image_block',['image' => 'images/main_image.png'])--}}
{{--                @include('admin.blocks.save_button_block')--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => ['head','text','created_at'],
                'items' => $contents,
                'useEdit' => true,
                'useDelete' => false
            ])
        </div>
    </div>
    <script>window.dtRows = 4;</script>
@endsection
