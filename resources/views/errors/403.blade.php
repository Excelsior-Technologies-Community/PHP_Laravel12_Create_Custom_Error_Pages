@extends('errors.layout')

@section('code', '403')
@section('title', 'Access Forbidden')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'You do not have the required role permissions to access this restricted directory or route.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-purple-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
</svg>
@endsection