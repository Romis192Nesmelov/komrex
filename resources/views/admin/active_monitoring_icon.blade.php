@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_active_monitoring_icon') }}" method="post">
                @csrf
                @if (isset($active_monitoring_icon))
                    @include('blocks.hidden_id_block',['id' => $active_monitoring_icon->id])
                @endif
                <div class="col-lg-3 col-sm-12">
                    @include('admin.blocks.input_image_block',['image' => isset($active_monitoring_icon) ? $active_monitoring_icon->image : null])
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.head'),
                                'name' => 'head',
                                'type' => 'text',
                                'max' => 20,
                                'placeholder' => trans('admin.head'),
                                'value' => isset($active_monitoring_icon) ? $active_monitoring_icon->head : ''
                            ])
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($participant) ? $participant->active : true])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
