<table class="table datatable-basic table-striped table-items">
    <tr>
        <th class="id">id</th>
        @foreach ($columns as $column)
            @if (!$column) <th class="text-center"></th>
            @elseif ($column == 'active')
                <th class="text-center">{{ trans('admin.status') }}</th>
            @elseif ($column == 'komrex')
                <th class="text-center">{{ trans('admin.komrex_technic') }}</th>
            @else
                <th class="text-center">
                    {{ trans('admin.'.$column) }}
                    @if ($column == 'weight')
                        ({{ trans('admin.kg') }})
                    @elseif ($column == 'power')
                        ({{ trans('admin.kilowatt').'/'.trans('admin.horse_power') }})
                    @endif
                </th>
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
                @elseif ($column == 'pdf')
                    <td>
                        <i class="icon-file-pdf"></i>
                        <a href="{{ asset($item->pdf) }}" target="_blank">{{ pathinfo($item->pdf)['basename'] }}</a>
                    </td>
                @elseif ($column == 'video')
                    <td class="text-center">
                        @include('blocks.video_block',['video' => $item->video])
                    </td>
                @elseif ($column == 'text' || $column == 'description')
                    <td class="text-left">
                        @include('admin.blocks.cropped_content_block',['croppingContent' => $item[$column], 'length' => 200])
                    </td>
                @elseif ($column == 'date')
                    <td class="text-center">{{ is_int($item->date) ? date('d.m.Y',$item->date) : $item->date }}</td>
                @elseif ($column == 'active')
                    @include('admin.blocks.status_block',['status' => $item->active])
                @elseif ($column == 'komrex')
                    <td class="text-center image komrex">
                        @if ($item[$column])
                            <img src="{{ asset('images/logo_dark.svg') }}" />
                        @endif
                    </td>
                @else
                    <td class="text-center {{ $column == 'head' || $column == 'email' ? 'head' : '' }}">
                        {{ $item[$column] }}
                        @if ($column == 'weight')
                            {{ ' '.trans('admin.kg') }}
                        @elseif ($column == 'power')
                            {{ ' '.trans('admin.kilowatt').' ('.round($item[$column] * 1.3596).' '.trans('admin.horse_power').')' }}
                        @endif
                    </td>
                @endif
            @endforeach
            @if ($useEdit)
                @if (isset($route))
                    @include('admin.blocks.edit_cell_block', ['href' => route('admin.'.$route, ['id' => $item->id, 'parent_id' => ($parent_id ?? '')])])
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
