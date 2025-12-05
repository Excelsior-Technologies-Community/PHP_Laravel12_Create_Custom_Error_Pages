<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CustomExceptionHandler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Throwable $exception): Response|JsonResponse
    {
        // Custom handling for specific exceptions
        if ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();
            
            // JSON response for API requests
            if ($request->expectsJson()) {
                return $this->renderJsonError($exception, $statusCode);
            }
            
            // Log 500 errors
            if ($statusCode == 500) {
                $this->logServerError($request, $exception);
            }
            
            // Custom view for specific status codes
            if ($this->hasCustomView($statusCode)) {
                return $this->renderCustomErrorView($statusCode);
            }
        }
        
        // Handle other exceptions
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'Server Error',
                'message' => $exception->getMessage(),
                'code' => 500
            ], 500);
        }
        
        return parent::render($request, $exception);
    }
    
    /**
     * Render JSON error response.
     */
    private function renderJsonError(HttpException $exception, int $statusCode): JsonResponse
    {
        $response = [
            'error' => $this->getErrorTitle($statusCode),
            'message' => $exception->getMessage() ?: $this->getErrorMessage($statusCode),
            'status' => $statusCode,
            'timestamp' => now()->toISOString(),
        ];
        
        // Add trace only in development
        if (config('app.debug')) {
            $response['debug'] = [
                'exception' => get_class($exception),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTrace(),
            ];
        }
        
        return response()->json($response, $statusCode);
    }
    
    /**
     * Log server errors with details.
     */
    private function logServerError($request, Throwable $exception): void
    {
        \Log::error('500 Error occurred', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'error' => $exception->getMessage(),
            'exception' => get_class($exception),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString()
        ]);
    }
    
    /**
     * Check if custom view exists for status code.
     */
    private function hasCustomView(int $statusCode): bool
    {
        return view()->exists("errors.{$statusCode}");
    }
    
    /**
     * Render custom error view.
     */
    private function renderCustomErrorView(int $statusCode): Response
    {
        return response()->view(
            "errors.{$statusCode}",
            ['exception' => new HttpException($statusCode)],
            $statusCode
        );
    }
    
    /**
     * Get error title based on status code.
     */
    private function getErrorTitle(int $statusCode): string
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
    
    /**
     * Get default error message based on status code.
     */
    private function getErrorMessage(int $statusCode): string
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
    
    /**
     * Report the exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception): void
    {
        // Report to external services (Sentry, Bugsnag, etc.)
        if ($this->shouldReport($exception)) {
            // Example: Report critical errors to external service
            if ($exception instanceof HttpException && $exception->getStatusCode() >= 500) {
                // Report to external monitoring service
                // $this->reportToExternalService($exception);
            }
        }
        
        parent::report($exception);
    }
}