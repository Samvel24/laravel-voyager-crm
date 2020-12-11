@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}
    
        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.lead_name') }}" autofocus 
                   minlength="3" maxlength="30" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Phone field --}}
        <div class="input-group mb-3">
            <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                   value="{{ old('phone') }}" placeholder="{{ __('adminlte::adminlte.lead_phone') }}" 
                   minlength="5" maxlength="10" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('phone'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('phone') }}</strong>
                </div>
            @endif
        </div>

        {{-- Message field --}}
        <div class="input-group mb-3">
            <input type="text" name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                   value="{{ old('message') }}" placeholder="{{ __('adminlte::adminlte.lead_message') }}" 
                   minlength="5" maxlength="255" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="far fa-comment {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('message'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('message') }}</strong>
                </div>
            @endif
        </div>

        {{-- Step value field --}}
        <div class="input-group mb-3">
            <select type="text" name="step_id" class="form-control" value="{{ old('step_id') }}" minlength="1">
                    @foreach($steps as $step)
                        <!--Mostramos el valor del step pero en realidad usamos el valor 'step_id'-->
                        <option value="{{ $step->id }}">{{ $step->value }}</option>
                    @endforeach
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-check {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>
        <!--Fuente iconos: https://fontawesome.com/icons?d=gallery-->
        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
