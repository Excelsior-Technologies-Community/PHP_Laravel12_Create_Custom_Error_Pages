@extends('errors.layout')

@section('code', '504')
@section('title', 'Gateway Timeout')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'The server proxy timed out waiting for a response from the upstream application microservice.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-cyan-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
</svg>
@endsection
