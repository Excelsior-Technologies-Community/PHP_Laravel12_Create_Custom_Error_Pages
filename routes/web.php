<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestErrorController;

// Main home page (changed from welcome to home)
Route::get('/', function () {
    return view('home');
});

// Keep the original Laravel welcome page at /welcome if needed
Route::get('/welcome', function () {
    return view('welcome');
});

// Test routes for error pages
Route::get('/test/404', function () {
    abort(404);
});

Route::get('/test/500', function () {
    abort(500);
});

Route::get('/test/403', function () {
    abort(403);
});

Route::get('/test/503', function () {
    abort(503, 'Service Unavailable');
});

// Example protected route
Route::get('/admin', function () {
    return 'Admin Dashboard';
})->middleware('auth'); // This will trigger 403 if not authenticated

// Example route that throws exception
Route::get('/exception', function () {
    throw new Exception('This is a test exception');
});

// Controller test routes
Route::get('/test/error/404', [TestErrorController::class, 'test404']);
Route::get('/test/error/500', [TestErrorController::class, 'test500']);
Route::get('/test/error/403', [TestErrorController::class, 'test403']);
Route::get('/test/error/json/404', [TestErrorController::class, 'testJson404']);
Route::get('/test/error/json/500', [TestErrorController::class, 'testJson500']);

// You can keep /home as an alternative route to home page
Route::get('/home', function () {
    return redirect('/');
});