@extends('errors.layout')

@section('code', '405')
@section('title', 'Method Not Allowed')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'The HTTP method verb used for this request is not supported by the route endpoint.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-pink-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
</svg>
@endsection
