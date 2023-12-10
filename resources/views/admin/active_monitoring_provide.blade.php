@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_active_monitoring_provide') }}" method="post">
                @csrf
                @include('blocks.hidden_id_block',['id' => $active_monitoring_provide->id])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('blocks.input_block', [
                            'label' => trans('admin.text'),
                            'name' => 'text',
                            'type' => 'text',
                            'max' => 255,
                            'placeholder' => trans('admin.text'),
                            'value' => $active_monitoring_provide->text
                        ])
                        @include('admin.blocks.active_checkbox_block', ['checked' => $active_monitoring_provide->active])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
