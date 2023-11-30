@extends('layouts.admin')

@section('content')
    @foreach($menu as $item)
        @if (!$loop->first)
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-flat">
                    <div class="panel-body text-center">
                        <div class="icon-object"><i class="{{ $item['icon'] }}"></i></div>
                        <h3 class="text-semibold">{{ $item['name'] }}</h3>
                        <p class="mb-15">{{ $item['description'] }}</p>
                        <a href="{{ route($item['href']) }}">
                            @include('blocks.button_block', [
                                'primary' => true,
                                'buttonType' => 'button',
                                'buttonText' => trans('admin.goto'),
                                'icon' => 'icon-circle-right2'
                            ])
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
