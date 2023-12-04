<table class="table datatable-basic table-striped table-items">
    <tr>
        <th class="id">id</th>
        @foreach ($columns as $column)
            @if ($column == 'created_at')
                @include('admin.blocks.th_created_at_cell_block')
            @elseif ($column == 'active')
                <th class="text-center">{{ trans('admin.status') }}</th>
            @elseif ($column == 'updated_at')
                @include('admin.blocks.th_updated_at_cell_block')
            @else
                <th class="text-center">{{ trans('admin.'.$column) }}</th>
            @endif
        @endforeach
        @if ($useEdit)
            @include('admin.blocks.th_edit_cell_block')
        @endif
        @if ($useDelete)
            @include('admin.blocks.th_delete_cell_block')
        @endif
    </tr>
    @foreach ($items as $item)
        <tr role="row">
            <td class="id">{{ $item->id }}</td>
            @foreach ($columns as $column)
                @if ($column == 'image')
                    @include('admin.blocks.datatable_image_block')
                @elseif ($column == 'text')
                    <td colspan="text-left">
                        @include('admin.blocks.cropped_content_block',['croppingContent' => $item->text, 'length' => 200])
                    </td>
                @elseif ($column == 'date')
                    <td class="text-center">{{ is_int($item->date) ? date('d.m.Y',$item->date) : $item->date }}</td>
                @elseif ($column == 'active')
                    @include('admin.blocks.status_block',['status' => $item->active])
                @else
                    <td class="text-center {{ $column == 'head' || $column == 'email' ? 'head' : '' }}">{{ $item[$column] }}</td>
                @endif
            @endforeach
            @if ($useEdit)
                @if (isset($route))
                    @include('admin.blocks.edit_cell_block', ['href' => route('admin.'.$route, ['id' => $item->id, 'parent_id' => $parent_id])])
                @else
                    @include('admin.blocks.edit_cell_block', ['href' => route('admin.'.$menu[$menu_key]['key'], ['id' => $item->id])])
                @endif
            @endif
            @if ($useDelete)
                @include('admin.blocks.delete_cell_block',['id' => $item->id])
            @endif
        </tr>
    @endforeach
</table>
