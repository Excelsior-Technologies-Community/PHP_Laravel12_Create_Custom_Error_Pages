<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestErrorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ErrorExportController;
use App\Http\Controllers\ErrorSimulatorController;

// Main home page (changed from welcome to home)
Route::get('/', function () {
    return view('home');
});

// Keep the original Laravel welcome page at /welcome if needed
Route::get('/welcome', function () {
    return view('welcome');
});

// Test routes for error pages
Route::get('/test/404', [TestErrorController::class, 'test404']);

Route::get('/test/500', [TestErrorController::class, 'test500']);

Route::get('/test/403', [TestErrorController::class, 'test403']);

Route::get('/test/503', function () {
    abort(503, 'Service Unavailable');
});

// Example protected route
Route::get('/admin', function () {

    abort(403, 'Admin area is restricted');

}); // This will trigger 403 if not authenticated

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

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::get('/dashboard/error/{id}', [DashboardController::class,'show'])->name('error.show');

Route::get('/dashboard/export', [ErrorExportController::class,'export'])->name('dashboard.export');

// Real-Time Interactive Error Sandbox & Simulation Studio Routes
Route::get('/error-sandbox', [ErrorSimulatorController::class, 'index'])->name('error.sandbox');
Route::get('/error-sandbox/trigger', [ErrorSimulatorController::class, 'trigger'])->name('error.sandbox.trigger');