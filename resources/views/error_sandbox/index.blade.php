<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error Sandbox & Simulation Studio | Laravel Error Pages</title>

    <!-- Tailwind CSS CDN & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0b0f19; color: #f3f4f6; }
        .card-glow { transition: all 0.3s ease; }
        .card-glow:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(99, 102, 241, 0.2); }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between">
    <!-- Navbar -->
    <nav class="border-b border-gray-800 bg-gray-900/60 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="/" class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-lg">
                    <i class="fa-solid fa-flask text-lg"></i>
                </a>
                <div>
                    <h1 class="text-xl font-bold tracking-tight text-white flex items-center gap-2">
                        Error Sandbox Studio <span class="bg-indigo-500/20 text-indigo-400 text-xs px-2.5 py-0.5 rounded-full border border-indigo-500/30 font-mono">v2.0</span>
                    </h1>
                    <p class="text-xs text-gray-400">Real-Time Interactive Error Dispatcher & Delay Simulator</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="/dashboard" class="px-4 py-2 rounded-xl bg-gray-800 hover:bg-gray-700 text-gray-200 text-sm font-semibold transition-all flex items-center gap-2 border border-gray-700">
                    <i class="fa-solid fa-chart-line text-indigo-400"></i> Dashboard Logs
                </a>
                <a href="/" class="px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold shadow-lg shadow-indigo-600/30 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-house"></i> Home
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow">
        
        <!-- Header Banner -->
        <div class="bg-gradient-to-r from-indigo-900/40 via-purple-900/30 to-slate-900 border border-indigo-500/20 rounded-3xl p-6 md:p-8 mb-8 shadow-2xl relative overflow-hidden">
            <div class="relative z-10 max-w-3xl">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-400 text-xs font-semibold border border-indigo-500/20 mb-3">
                    <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
                    SIMULATION ENGINE ACTIVE
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
                    Live Custom Error Sandbox & Theme Switcher
                </h2>
                <p class="text-gray-300 text-base leading-relaxed">
                    Test all 13 standard HTTP error codes, simulate artificial network latency delays (0s, 1s, 3s), inject custom exception messages, and preview responsive themes on-the-fly.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Side: Interactive Quick Trigger Grid (8 Cols) -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- Client Error Codes (4xx) -->
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <i class="fa-solid fa-user-slash text-amber-400"></i> Client Errors (4xx Status Codes)
                        </h3>
                        <span class="text-xs text-gray-400 font-mono">9 Status Codes</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($errorCodes['client'] as $err)
                            <div class="bg-gray-900/80 border border-gray-800 rounded-2xl p-5 card-glow relative flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-2xl font-black font-mono text-white">{{ $err['code'] }}</span>
                                        <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-800 text-gray-300 border border-gray-700">
                                            {{ $err['title'] }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-400 leading-relaxed mb-4">{{ $err['desc'] }}</p>
                                </div>
                                <a href="/error-sandbox/trigger?code={{ $err['code'] }}" 
                                   class="w-full py-2.5 px-4 rounded-xl bg-gray-800 hover:bg-indigo-600 text-gray-200 hover:text-white font-semibold text-xs text-center transition-all flex items-center justify-center gap-2 border border-gray-700 hover:border-indigo-500">
                                    <i class="fa-solid fa-bolt"></i> Trigger {{ $err['code'] }} Error
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Server Error Codes (5xx) -->
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <i class="fa-solid fa-server text-red-400"></i> Server Errors (5xx Status Codes)
                        </h3>
                        <span class="text-xs text-gray-400 font-mono">4 Status Codes</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($errorCodes['server'] as $err)
                            <div class="bg-gray-900/80 border border-gray-800 rounded-2xl p-5 card-glow relative flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-2xl font-black font-mono text-red-400">{{ $err['code'] }}</span>
                                        <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-950/40 text-red-300 border border-red-900/50">
                                            {{ $err['title'] }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-400 leading-relaxed mb-4">{{ $err['desc'] }}</p>
                                </div>
                                <a href="/error-sandbox/trigger?code={{ $err['code'] }}" 
                                   class="w-full py-2.5 px-4 rounded-xl bg-red-950/30 hover:bg-red-600 text-red-300 hover:text-white font-semibold text-xs text-center transition-all flex items-center justify-center gap-2 border border-red-900/50 hover:border-red-500">
                                    <i class="fa-solid fa-triangle-exclamation"></i> Trigger {{ $err['code'] }} Exception
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Right Side: Custom Exception Simulator Configurator (4 Cols) -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Custom Simulator Box -->
                <div class="bg-gray-900 border border-gray-800 rounded-3xl p-6 shadow-xl sticky top-24">
                    <h3 class="text-lg font-bold text-white mb-1 flex items-center gap-2">
                        <i class="fa-solid fa-sliders text-indigo-400"></i> Custom Error Simulator
                    </h3>
                    <p class="text-xs text-gray-400 mb-6">Inject custom exceptions with latency & themes</p>

                    <form action="/error-sandbox/trigger" method="GET" class="space-y-4">
                        <!-- Select Status Code -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">HTTP Status Code</label>
                            <select name="code" class="w-full bg-gray-800 border border-gray-700 rounded-xl px-3 py-2.5 text-sm text-white focus:outline-none focus:border-indigo-500">
                                <optgroup label="Client Errors (4xx)">
                                    <option value="400">400 Bad Request</option>
                                    <option value="401">401 Unauthorized</option>
                                    <option value="402">402 Payment Required</option>
                                    <option value="403">403 Forbidden</option>
                                    <option value="404" selected>404 Not Found</option>
                                    <option value="405">405 Method Not Allowed</option>
                                    <option value="419">419 Page Expired</option>
                                    <option value="422">422 Unprocessable Entity</option>
                                    <option value="429">429 Too Many Requests</option>
                                </optgroup>
                                <optgroup label="Server Errors (5xx)">
                                    <option value="500">500 Internal Server Error</option>
                                    <option value="502">502 Bad Gateway</option>
                                    <option value="503">503 Service Unavailable</option>
                                    <option value="504">504 Gateway Timeout</option>
                                </optgroup>
                            </select>
                        </div>

                        <!-- Custom Message Input -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Custom Exception Message</label>
                            <input type="text" name="message" placeholder="e.g. Database connection timed out in query..." class="w-full bg-gray-800 border border-gray-700 rounded-xl px-3 py-2.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500">
                        </div>

                        <!-- Simulated Network Delay -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Simulated Latency (Delay)</label>
                            <div class="grid grid-cols-3 gap-2">
                                <label class="flex items-center justify-center p-2 rounded-xl bg-gray-800 border border-gray-700 cursor-pointer text-xs font-semibold text-gray-300 hover:border-indigo-500">
                                    <input type="radio" name="delay" value="0" checked class="me-1.5 accent-indigo-500"> 0 Seconds
                                </label>
                                <label class="flex items-center justify-center p-2 rounded-xl bg-gray-800 border border-gray-700 cursor-pointer text-xs font-semibold text-gray-300 hover:border-indigo-500">
                                    <input type="radio" name="delay" value="1" class="me-1.5 accent-indigo-500"> 1 Second
                                </label>
                                <label class="flex items-center justify-center p-2 rounded-xl bg-gray-800 border border-gray-700 cursor-pointer text-xs font-semibold text-gray-300 hover:border-indigo-500">
                                    <input type="radio" name="delay" value="3" class="me-1.5 accent-indigo-500"> 3 Seconds
                                </label>
                            </div>
                        </div>

                        <!-- Response Format -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Response Type</label>
                            <select name="format" class="w-full bg-gray-800 border border-gray-700 rounded-xl px-3 py-2.5 text-sm text-white focus:outline-none focus:border-indigo-500">
                                <option value="html" selected>🌐 HTML Web Error Page</option>
                                <option value="json">⚡ JSON API Payload</option>
                            </select>
                        </div>

                        <!-- Visual Theme Selector -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-300 mb-1.5">Visual UI Theme</label>
                            <select name="theme" class="w-full bg-gray-800 border border-gray-700 rounded-xl px-3 py-2.5 text-sm text-white focus:outline-none focus:border-indigo-500">
                                <option value="glassmorphism" selected>✨ Modern Glassmorphism</option>
                                <option value="dark">🌙 Midnight Dark</option>
                                <option value="neon">⚡ Cyberpunk Neon</option>
                                <option value="minimal">☀️ Minimal Light</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-sm shadow-lg shadow-indigo-600/30 transition-all flex items-center justify-center gap-2 mt-4">
                            <i class="fa-solid fa-play"></i> Launch Error Simulation
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Recent Error Log Section -->
        <div class="mt-12 bg-gray-900 border border-gray-800 rounded-3xl p-6">
            <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <i class="fa-solid fa-clock-rotate-left text-indigo-400"></i> Recent Triggered Errors Audit Trail
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-gray-800/60 text-gray-400 uppercase font-semibold">
                        <tr>
                            <th class="p-3 rounded-l-xl">Status Code</th>
                            <th class="p-3">Exception Message</th>
                            <th class="p-3">Client IP</th>
                            <th class="p-3">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        @forelse($recentVisits as $visit)
                            <tr class="hover:bg-gray-800/40">
                                <td class="p-3 font-mono font-bold text-indigo-400">
                                    <span class="px-2 py-1 rounded bg-indigo-950/60 border border-indigo-900">{{ $visit->error_code }}</span>
                                </td>
                                <td class="p-3 text-gray-200">{{ Str::limit($visit->message, 60) }}</td>
                                <td class="p-3 font-mono text-gray-400">{{ $visit->ip_address ?? '127.0.0.1' }}</td>
                                <td class="p-3 text-gray-400">{{ $visit->created_at?->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">No error visits logged yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800 py-6 text-center text-xs text-gray-500">
        &copy; {{ date('Y') }} Laravel Error Pages · Interactive Error Simulation Studio
    </footer>
</body>
</html>
