@extends('errors.layout')

@section('code', '503')
@section('title', 'Service Under Maintenance')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'We are performing system maintenance and updates. We will be back online shortly!' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-teal-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 4a2 2 0 114 0v1a2 2 0 01-2 2h-3a2 2 0 01-2-2V5a2 2 0 012-2zM4 11a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8z"></path>
</svg>
@endsection
