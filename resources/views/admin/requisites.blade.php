@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <x-atitle>{{ trans('admin_menu.requisites') }}</x-atitle>
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.edit_requisites') }}" method="post">
            @csrf
                @foreach($requisites as $requisite)
                    @include('blocks.input_block', [
                        'label' => ucfirst($requisite->name),
                        'name' => 'id_'.$requisite->id,
                        'type' => $requisite->id == 2 ? 'email' : 'text',
                        'max' => 30,
                        'placeholder' => $requisite->name ? $requisite->name : trans('admin.city'),
                        'value' => $requisite->value
                    ])
                @endforeach
                @include('admin.blocks.input_file_block', ['label' => 'PDF', 'name' =>  'pdf'])
                @include('admin.blocks.save_button_block')
            </form>
        </div>
    </div>
@endsection
