<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Custom error responses for JSON requests
        $exceptions->render(function (HttpException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => $this->getErrorTitle($e->getStatusCode()),
                    'message' => $e->getMessage() ?: $this->getErrorMessage($e->getStatusCode()),
                    'status' => $e->getStatusCode(),
                ], $e->getStatusCode());
            }
        });
        
        // Log 500 errors
        $exceptions->report(function (Throwable $e) {
            if ($e instanceof HttpException && $e->getStatusCode() >= 500) {
                \Log::error('Server error occurred: ' . $e->getMessage(), [
                    'exception' => $e
                ]);
            }
        });
        
        // Register custom error pages
        $exceptions->render(function (HttpException $e, Request $request) {
            $status = $e->getStatusCode();
            
            // Check if custom view exists
            if (view()->exists("errors.{$status}")) {
                return response()->view(
                    "errors.{$status}",
                    ['exception' => $e],
                    $status
                );
            }
        });
    })->create();

// Helper functions for error titles and messages
if (!function_exists('getErrorTitle')) {
    function getErrorTitle(int $statusCode): string
    {
        return match($statusCode) {
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            419 => 'Page Expired',
            422 => 'Validation Error',
            429 => 'Too Many Requests',
            500 => 'Internal Server Error',
            503 => 'Service Unavailable',
            default => 'Error',
        };
    }
}

if (!function_exists('getErrorMessage')) {
    function getErrorMessage(int $statusCode): string
    {
        return match($statusCode) {
            400 => 'The request was invalid or cannot be served.',
            401 => 'Authentication is required to access this resource.',
            403 => 'You do not have permission to access this resource.',
            404 => 'The requested resource could not be found.',
            405 => 'The requested method is not allowed for this resource.',
            419 => 'Your session has expired. Please refresh and try again.',
            422 => 'The request contains invalid or missing parameters.',
            429 => 'Too many requests. Please try again later.',
            500 => 'An internal server error occurred. Please try again later.',
            503 => 'The service is temporarily unavailable. Please try again later.',
            default => 'An error occurred.',
        };
    }
}