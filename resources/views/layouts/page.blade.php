@extends('adminlte::page')

{{--Base plugins--}}
@section('plugins.Sweetalert2', true)
@section('plugins.Scripts', true)
{{--===--}}

{{--Alerts--}}
@includeWhen( boolval($errors->any()), 'partials.alerts.errors', ['status' => 'complete'])
@includeWhen( session()->has('message'), 'partials.alerts.message', ['status' => 'complete'])
{{--====--}}
