@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_consulting') }}" method="post">
                @csrf
                @include('blocks.input_block', [
                    'label' => trans('admin.head'),
                    'name' => 'head',
                    'type' => 'text',
                    'max' => 50,
                    'placeholder' => trans('admin.head'),
                    'value' => $content->head
                ])
                @include('admin.blocks.textarea_block',[
                    'name' => 'text',
                    'label' => trans('admin.text'),
                    'value' => $content->text,
                    'simple' => true
                ])
                @include('admin.blocks.save_button_block')
            </form>
        </div>
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => ['image','head','text','created_at'],
                'items' => $consultings,
                'useDelete' => false
            ])
        </div>
    </div>
    <script>window.dtRows = 6;</script>
@endsection
