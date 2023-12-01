@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_participant') }}" method="post">
                @csrf
                @if (isset($participant))
                    @include('admin.blocks.hidden_id_block',['id' => $participant->id])
                @endif
                <div class="col-lg-3 col-ms-12">
                    @include('admin.blocks.input_image_block',['image' => isset($participant) ? $participant->image : null])
                </div>
                <div class="col-lg-9 col-ms-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.man_name'),
                                'name' => 'name',
                                'type' => 'text',
                                'max' => 100,
                                'placeholder' => trans('admin.man_name'),
                                'value' => isset($participant) ? $participant->name : ''
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
