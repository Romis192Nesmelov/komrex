@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <table class="table datatable-basic table-striped table-items">
                <th>{{ trans('admin.page') }}</th>
                <th>{{ trans('admin.sub_page') }}</th>
                <th>Title</th>
                <th>Description</th>
                @include('admin.blocks.th_edit_cell_block')
                @foreach ($tags as $tag)
                    <tr role="row">
                        <td><b>{{ trans('admin_menu.'.$tag->page) }}</b></td>
                        <td>{{ $tag->sub_page ? trans('admin_menu.'.$tag->sub_page) : '' }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>{{ $tag->description }}</td>
                        @include('admin.blocks.edit_cell_block', ['href' => route('admin.tags', ['id' => $tag->id])])
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>window.dtRows = 6;</script>
@endsection
