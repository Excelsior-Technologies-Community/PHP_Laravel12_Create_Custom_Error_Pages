@extends('errors.layout')

@section('code', '404')
@section('title', 'Page Lost In Space')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'The requested page URL could not be found or has been moved to a new destination.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-red-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
@endsection