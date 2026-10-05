@extends('errors.layout')

@section('code', '402')
@section('title', 'Payment Required')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'Your account quota has been reached or an active subscription upgrade is required.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-emerald-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
</svg>
@endsection
