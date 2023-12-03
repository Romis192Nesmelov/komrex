@extends('layouts.admin')

@section('content')
    @include('admin.blocks.modal_delete_block')
    <div class="panel panel-flat">
        <x-atitle>{{ $current_sub_item == 'future' ? trans('admin.future_events') : trans('admin.past_events') }}</x-atitle>
        <div class="panel-body">
            @include('admin.blocks.data_table_block', [
                'columns' => $current_sub_item == 'future' ? ['date','name','active','created_at'] : ['date','name','created_at'],
                'items' => $events,
                'useEdit' => true,
                'useDelete' => true
            ])
        </div>
        @include('admin.blocks.add_button_block')
    </div>
    <script>window.dtRows = parseInt("{{ $current_sub_item == 'future' ? 6 : 5 }}");</script>
@endsection
