@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_content') }}" method="post">
                @csrf
                @include('blocks.hidden_id_block',['id' => $content->id])
                <div class="panel panel-flat">
                    <div class="panel-body">
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
                            'simple' => $content->id != 6
                        ])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
