<x-incover
    name="{{ $name }}"
    error="{{ count($errors) && $errors->has($name) ? $errors->first($name) : '' }}"
    label="{{ isset($label) && $label ? $label : ''  }}"
>
    <input
        type="{{ isset($type) && $type ? $type : 'text' }}"
        name="{{ $name }}" {{ isset($step) ? 'step='.$step : '' }}
        value="{{ old($name, ($value ?? '')) }}"
        class="{{ isset($icon) && $icon ? 'has-icon' : '' }}@error($name) error @enderror form-control"
        placeholder="{{ isset($placeholder) && $placeholder ? $placeholder : '' }}"
        {{ isset($min) ? (!isset($type) || $type == 'text' ? 'minlength=' : 'min=').$min : '' }}
        {{ isset($max) ? (!isset($type) || $type == 'text' ? 'maxlength=' : 'max=').$max : '' }}
        {{ isset($disabled) && $disabled ? 'disabled=disabled' : '' }}
    >
    @if (isset($icon) && $icon)
        <i class="{{ $icon }}"></i>
    @endif
</x-incover>
