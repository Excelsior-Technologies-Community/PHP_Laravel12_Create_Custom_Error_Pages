@extends('errors.layout')

@section('code', '422')
@section('title', 'Validation Failed')

@section('message')
    {{ $customMessage ?? $exception->getMessage() ?: 'The submitted data payload contains invalid or missing required input fields.' }}
@endsection

@section('illustration')
<svg class="w-32 h-32 text-rose-400 drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
</svg>
@endsection
