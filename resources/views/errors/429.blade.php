@extends('errors.layout')

@section('code', '429')
@section('title', 'Too Many Requests')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'You have exceeded the maximum allowed request rate limit. Please pause and try again in a few moments.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-indigo-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
</svg>
@endsection
