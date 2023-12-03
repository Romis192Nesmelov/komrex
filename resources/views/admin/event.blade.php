@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_event') }}" method="post">
                @csrf
                @if (isset($event))
                    @include('admin.blocks.hidden_id_block',['id' => $event->id])
                @endif
                <div class="col-lg-3 col-ms-12">
                    @include('admin.blocks.date_block',[
                        'label' => trans('admin.event_date'),
                        'name' => 'date',
                        'value' => isset($event) ? $event->date : (time() + (24 * 3))
                    ])
                </div>
                <div class="col-lg-9 col-ms-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('blocks.input_block', [
                                'label' => trans('admin.name'),
                                'name' => 'name',
                                'type' => 'text',
                                'max' => 255,
                                'placeholder' => trans('admin.name'),
                                'value' => isset($event) ? $event->name : ''
                            ])
                            @if ($current_sub_item == 'future')
                                @include('admin.blocks.active_checkbox_block', ['checked' => isset($event) ? $event->active : true])
                            @endif
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
