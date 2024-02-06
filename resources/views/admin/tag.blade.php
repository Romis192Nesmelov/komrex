@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_tag') }}" method="post">
                @csrf
                @include('blocks.hidden_id_block',['id' => $tag->id])
                <div class="panel panel-flat">
                    <x-atitle>
                        {{ trans('admin_menu.'.$tag->page) }}
                        @if ($tag->sub_page)<small><b>{{ trans('admin.sub_page').': '.trans('admin_menu.'.$tag->sub_page) }}</b></small>@endif
                    </x-atitle>
                    <div class="panel-body">
                        @include('blocks.input_block', [
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'max' => 255,
                            'placeholder' => 'Title',
                            'value' => $tag->title
                        ])
                        @include('blocks.textarea_block',[
                            'name' => 'description',
                            'label' => 'Description',
                            'value' => $tag->description,
                            'simple' => true
                        ])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
