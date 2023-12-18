<div class="dropdown-active">
    <span>{{ $current_type->name }}</span>
    <img src="{{ asset('images/arrow_cir_to_down_yellow.svg') }}" />
    <div class="dropdown-list">
        @include('blocks.left_menu_block', [
            'types' => $types,
            'hideActive' => true
        ])
    </div>
</div>
