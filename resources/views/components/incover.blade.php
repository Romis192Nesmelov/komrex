@if ($attributes->has('label') && $attributes->get('label'))
    <label for="{{ $attributes->get('name') }}">{{ $attributes->get('label') }}</label>
@endif
<div class="form-group {{ $attributes->has('error') && $attributes->get('error') ? "error" : '' }}">
    {!! $slot !!}
    @if (($attributes->has('icon') && $attributes->get('icon')) && (!$attributes->has('label') || !$attributes->get('label')))
        <div class="form-control-feedback">
            <i class="{{ $attributes->has('error') && $attributes->get('error') ? 'text-danger-800 '.$attributes->get('icon') : $attributes->get('icon') }} text-muted"></i>
        </div>
    @endif
    @include('blocks.wrap_error_block')
</div>
