@extends('errors.layout')

@section('code', '500')
@section('title', 'Internal Server Error')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'An unhandled server-side exception occurred while executing system code.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-red-500 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
</svg>
@endsection