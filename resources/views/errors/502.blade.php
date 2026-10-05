@extends('errors.layout')

@section('code', '502')
@section('title', 'Bad Gateway')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'The server acting as a gateway or proxy received an invalid response from the upstream application server.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-blue-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
</svg>
@endsection
