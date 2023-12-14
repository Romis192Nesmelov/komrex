@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin_menu.requisites') }}</x-atitle>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_requisites') }}" method="post">
            @csrf
                @foreach($requisites as $requisite)
                    @include('blocks.input_block', [
                        'label' => $requisite->name ? ucfirst($requisite->name) : trans('admin.city'),
                        'name' => 'id_'.$requisite->id,
                        'type' => $requisite->id == 2 ? 'email' : 'text',
                        'max' => 30,
                        'placeholder' => $requisite->name ? $requisite->name : trans('admin.city'),
                        'value' => $requisite->value
                    ])
                @endforeach
                @include('admin.blocks.save_button_block')
            </form>
        </div>
    </div>
@endsection
