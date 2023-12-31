@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block', ['custom_key' => 'event_person'])
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_event') }}" method="post">
                @csrf
                @if (isset($event))
                    @include('blocks.hidden_id_block',['id' => $event->id])
                @endif
{{--                <div class="col-lg-3 col-md-4 col-sm-12">--}}
{{--                    @include('admin.blocks.date_block',[--}}
{{--                        'label' => trans('admin.event_date'),--}}
{{--                        'name' => 'date',--}}
{{--                        'value' => isset($event) ? $event->date : (time() + (24 * 3))--}}
{{--                    ])--}}
{{--                </div>--}}
                <div class="col-lg-12 col-md-12 col-sm-12">
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
                            @include('blocks.input_block', [
                                'label' => trans('admin.target_audience'),
                                'name' => 'target_audience',
                                'type' => 'text',
                                'max' => 255,
                                'placeholder' => trans('admin.target_audience'),
                                'value' => isset($event) ? $event->target_audience : ''
                            ])
                            @include('blocks.input_block', [
                                'label' => trans('admin.course_objectives'),
                                'name' => 'course_objectives',
                                'type' => 'text',
                                'max' => 255,
                                'placeholder' => trans('admin.course_objectives'),
                                'value' => isset($event) ? $event->course_objectives : ''
                            ])
                            @include('blocks.textarea_block',[
                                'name' => 'description',
                                'label' => trans('admin.description'),
                                'value' => isset($event) ? $event->description : '',
                                'simple' => false
                            ])
                            @include('blocks.input_block', [
                                'label' => trans('admin.duration'),
                                'name' => 'duration',
                                'type' => 'text',
                                'max' => 20,
                                'placeholder' => trans('admin.duration'),
                                'value' => isset($event) ? $event->duration : ''
                            ])
{{--                            @if ($current_sub_item == 'future')--}}
                            @include('admin.blocks.active_checkbox_block', ['checked' => isset($event) ? $event->active : true])
{{--                            @endif--}}
                            @include('admin.blocks.save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (isset($event))
        <div class="panel panel-flat">
            <div class="panel-body">
                <x-atitle>{{ trans('admin.event_persons') }}</x-atitle>
                @include('admin.blocks.data_table_block', [
                    'columns' => ['name','phone','created_at'],
                    'items' => $event->eventPersons,
                    'useEdit' => false,
                    'useDelete' => true
                ])
            </div>
        </div>
        <script>window.dtRows = 4;</script>
    @endif
@endsection
