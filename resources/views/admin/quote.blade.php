@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        @include('admin.blocks.title_block')
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('admin.edit_quote') }}" method="post">
                @csrf
                @include('blocks.hidden_id_block',['id' => $quote->id])
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @include('admin.blocks.textarea_block',[
                            'name' => 'text',
                            'label' => trans('admin.text'),
                            'value' => $quote->text,
                            'simple' => true
                        ])
                        @include('admin.blocks.save_button_block')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
