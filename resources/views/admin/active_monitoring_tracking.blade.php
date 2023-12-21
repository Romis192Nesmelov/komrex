@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_active_monitoring_tracking') }}" method="post">
                @csrf
                @if (isset($active_monitoring_tracking))
                    @include('blocks.hidden_id_block',['id' => $active_monitoring_tracking->id])
                @endif
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('blocks.input_block', [
                            'label' => trans('admin.head'),
                            'name' => 'head',
                            'type' => 'text',
                            'max' => 255,
                            'placeholder' => trans('admin.head'),
                            'value' => isset($active_monitoring_tracking) ? $active_monitoring_tracking->head : ''
                        ])
                        @include('blocks.textarea_block',[
                            'name' => 'text',
                            'label' => trans('admin.text'),
                            'value' => isset($active_monitoring_tracking) ? $active_monitoring_tracking->text : '',
                            'simple' => false
                        ])
                        @include('admin.blocks.active_checkbox_block', ['checked' => isset($active_monitoring_tracking) ? $active_monitoring_tracking->active : true])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
