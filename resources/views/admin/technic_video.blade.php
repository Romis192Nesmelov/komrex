@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_technic_video') }}" method="post">
                @csrf
                @if (isset($technic_video))
                    @include('blocks.hidden_id_block',['id' => $technic_video->id])
                @endif
                @include('blocks.hidden_id_block',[
                    'name' => 'technic_id',
                    'id' => request('parent_id')
                ])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('blocks.input_block', [
                            'label' => trans('admin.video'),
                            'name' => 'video',
                            'type' => 'text',
                            'max' => 255,
                            'placeholder' => trans('admin.video'),
                            'value' => isset($technic_video) ? $technic_video->video : ''
                        ])
                        @include('blocks.input_block', [
                            'label' => trans('admin.head'),
                            'name' => 'head',
                            'type' => 'text',
                            'max' => 255,
                            'placeholder' => trans('admin.head'),
                            'value' => isset($technic_video) ? $technic_video->head : ''
                        ])
                        @include('admin.blocks.active_checkbox_block', ['checked' => isset($technic_video) ? $technic_video->active : true])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
