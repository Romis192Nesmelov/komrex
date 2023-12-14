@php $id = md5($name.rand(0,10000)) @endphp
<div class="form-check form-switch">
    <input class="form-check-input" name="{{ $name }}" type="checkbox" id="{{ $id }}">
    <label class="form-check-label" for="{{ $id }}">{!! $label ?? ''  !!}</label>
    @include('blocks.wrap_error_block', ['ajax' => $ajax ?? false])
</div>
