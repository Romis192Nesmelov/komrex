@extends('layouts.auth')

@section('content')

<!-- Advanced login -->
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="panel panel-body login-form">
        <div class="text-center">
            <img width="100" src="{{ asset('images/logo_dark.svg') }}" />
            <h5 class="content-group-lg">{{ trans('auth.login_to_your_account') }} <small class="display-block">{!! trans('auth.login_head') !!}</small></h5>
        </div>
        @include('blocks.input_block',[
            'name' => 'email',
            'type' => 'email',
            'placeholder' => 'E-mail',
            'icon' => 'icon-user'
        ])
        @include('blocks.input_block',[
            'name' => 'password',
            'type' => 'password',
            'placeholder' => trans('auth.password'),
            'icon' => 'icon-lock2'
        ])

        <div class="form-group login-options">
            @include('blocks.checkbox_block', [
                'name' => 'remember',
                'checked' => true,
                'label' => trans('auth.remember_me')
            ])
        </div>

        <div class="form-group">
            @include('blocks.button_block', [
                'primary' => true,
                'buttonType' => 'submit',
                'addClass' => 'bg-warning-400 btn-block',
                'buttonText' => trans('auth.enter'),
                'icon' => 'icon-circle-right2 position-right'
            ])
        </div>
    </div>
</form>
@endsection
