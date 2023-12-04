@props([
    'name' => '',
    'error' => null,
    'label' => null,
    'ajax' => true
])

@if ($label)
    <label for="{{ $name }}">{{ $label }}</label>
@endif
<div class="form-group {{ $error ? "error" : '' }}">
    {!! $slot !!}
    @include('blocks.wrap_error_block', ['ajax' => $ajax])
</div>
