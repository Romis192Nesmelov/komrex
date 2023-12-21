@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_partner') }}" method="post">
                @csrf
                @if (isset($partner))
                    @include('blocks.hidden_id_block',['id' => $partner->id])
                @endif
                <div class="col-lg-3 col-md-4 col-sm-12">
                    @include('admin.blocks.input_image_block',['image' => isset($partner) ? $partner->image : null])
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.href'),
                                'name' => 'href',
                                'type' => 'text',
                                'placeholder' => trans('admin.href'),
                                'value' => isset($participant) ? $participant->href : ''
                            ])
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($partner) ? $partner->active : true])
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
