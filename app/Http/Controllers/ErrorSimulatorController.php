<?php

namespace App\Http\Controllers;

use App\Models\ErrorVisit;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ErrorSimulatorController extends Controller
{
    /**
     * Display the Error Sandbox & Simulation Studio UI
     */
    public function index()
    {
        $errorCodes = [
            'client' => [
                ['code' => 400, 'title' => 'Bad Request', 'desc' => 'Corrupted or malformed request payload', 'color' => 'amber'],
                ['code' => 401, 'title' => 'Unauthorized', 'desc' => 'Authentication credentials missing or invalid', 'color' => 'yellow'],
                ['code' => 402, 'title' => 'Payment Required', 'desc' => 'Subscription quota or payment required', 'color' => 'emerald'],
                ['code' => 403, 'title' => 'Forbidden', 'desc' => 'Access denied due to insufficient permissions', 'color' => 'purple'],
                ['code' => 404, 'title' => 'Not Found', 'desc' => 'The requested endpoint or resource does not exist', 'color' => 'red'],
                ['code' => 405, 'title' => 'Method Not Allowed', 'desc' => 'HTTP method (GET/POST) not supported for route', 'color' => 'pink'],
                ['code' => 419, 'title' => 'Page Expired', 'desc' => 'CSRF security token expired or missing', 'color' => 'orange'],
                ['code' => 422, 'title' => 'Unprocessable Entity', 'desc' => 'Validation rules failed for input fields', 'color' => 'rose'],
                ['code' => 429, 'title' => 'Too Many Requests', 'desc' => 'Rate limit exceeded for API client', 'color' => 'indigo'],
            ],
            'server' => [
                ['code' => 500, 'title' => 'Internal Server Error', 'desc' => 'Unhandled server exception or fatal error', 'color' => 'red'],
                ['code' => 502, 'title' => 'Bad Gateway', 'desc' => 'Upstream server proxy returned invalid response', 'color' => 'blue'],
                ['code' => 503, 'title' => 'Service Unavailable', 'desc' => 'Application undergoing scheduled maintenance', 'color' => 'teal'],
                ['code' => 504, 'title' => 'Gateway Timeout', 'desc' => 'Upstream gateway failed to respond in time', 'color' => 'cyan'],
            ],
        ];

        $recentVisits = ErrorVisit::latest()->limit(10)->get();

        return view('error_sandbox.index', compact('errorCodes', 'recentVisits'));
    }

    /**
     * Trigger simulated error response
     */
    public function trigger(Request $request)
    {
        $code = (int) $request->input('code', 404);
        $customMessage = $request->input('message');
        $delay = (int) $request->input('delay', 0);
        $format = $request->input('format', 'html');
        $theme = $request->input('theme', 'glassmorphism');

        // Apply artificial network latency if specified
        if ($delay > 0) {
            sleep(min($delay, 5));
        }

        $defaultMessages = [
            400 => 'Bad Request: Malformed request syntax.',
            401 => 'Unauthorized: Authentication required to access resource.',
            402 => 'Payment Required: Upgrade your subscription plan.',
            403 => 'Forbidden: You do not have permission to view this directory.',
            404 => 'Page Not Found: The requested URL was lost in hyperspace.',
            405 => 'Method Not Allowed: HTTP method verb mismatch.',
            419 => 'Page Expired: CSRF token session mismatch.',
            422 => 'Unprocessable Entity: Form field validation failed.',
            429 => 'Too Many Requests: Rate limit limit exceeded.',
            500 => 'Internal Server Error: Unexpected exception occurred.',
            502 => 'Bad Gateway: Invalid response from upstream proxy.',
            503 => 'Service Unavailable: System under scheduled maintenance.',
            504 => 'Gateway Timeout: Server proxy response timed out.',
        ];

        $message = $customMessage ?: ($defaultMessages[$code] ?? 'An unexpected error occurred.');

        // Log error visit
        ErrorVisit::create([
            'error_code' => $code,
            'url' => $request->fullUrl(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'message' => $message,
        ]);

        // JSON Response handling
        if ($format === 'json' || $request->wantsJson()) {
            $errorTitle = function_exists('getErrorTitle') ? \getErrorTitle($code) : 'System Error';
            return response()->json([
                'status' => $code,
                'error' => $errorTitle,
                'message' => $message,
                'timestamp' => now()->toIso8601String(),
                'simulated' => true,
                'delay_applied_seconds' => $delay,
                'theme' => $theme,
            ], $code);
        }

        // HTML Error Page rendering with custom theme
        session(['error_theme' => $theme]);

        if (view()->exists("errors.{$code}")) {
            return response()->view("errors.{$code}", [
                'exception' => new HttpException($code, $message),
                'customMessage' => $message,
                'theme' => $theme,
                'code' => $code,
            ], $code);
        }

        abort($code, $message);
    }
}
