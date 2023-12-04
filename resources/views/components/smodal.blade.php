@props([
    'id' => '',
    'head' => false,
])

<x-modal class="styled" id="{{ $id }}" no_header="1">
    <img src="{{ asset('images/close_icon.svg') }}" class="close-icon" data-bs-dismiss="modal" data-dismiss="modal" />
    <h2 class="mb-4">{{ $head }}</h2>
    {{ $slot }}
</x-modal>
