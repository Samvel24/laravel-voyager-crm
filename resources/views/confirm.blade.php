@extends('adminlte::master')

@section('adminlte_css')
    @yield('css')
@stop

@section('classes_body', 'lockscreen')

@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )
@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('body')
    <div class="lockscreen-wrapper">

        {{-- Lockscreen logo --}}
        <div class="lockscreen-logo">
            <a href="{{ $dashboard_url }}">
                <img src="{{ asset(config('adminlte.logo_img')) }}" height="50">
                {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
            </a>
        </div>
        
        {{-- Lockscreen user name --}}
        <div class="lockscreen-name">
            {{ 'Gracias por registrarte ' . $lead->name }}
        </div>

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
