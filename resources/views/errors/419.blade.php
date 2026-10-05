@extends('errors.layout')

@section('code', '419')
@section('title', 'Page Session Expired')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'Your CSRF security session token has timed out due to inactivity. Please refresh and try again.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-orange-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
@endsection