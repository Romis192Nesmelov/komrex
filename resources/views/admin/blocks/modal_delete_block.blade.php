<x-modal id="{{ $modalId }}" head="{{ trans('admin.warning') }}" del_function="{{ route('admin.'.$action) }}" footer="1" yes_button="1">
    <h3>{{ $head }}</h3>
</x-modal>
