<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Custom Error Pages Demo</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        .error-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .error-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                🚀 Custom Error Pages Demo
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                A Laravel project showcasing beautiful, responsive error pages with custom designs.
                Test different error scenarios below.
            </p>
            <div class="mt-6">
                <span class="inline-block bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">
                    Laravel {{ app()->version() }}
                </span>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-6xl mx-auto">
            <!-- Error Test Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- 404 Card -->
                <div class="error-card bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-red-500">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl font-bold text-red-600">404</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Page Not Found</h3>
                                <p class="text-gray-500">Simulate missing pages</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">
                            Test what happens when users try to access non-existent pages.
                        </p>
                        <div class="space-y-3">
                            <a href="/test/404" 
                               class="block w-full text-center bg-red-500 text-white font-semibold py-3 px-4 rounded-lg hover:bg-red-600 transition duration-200 btn-primary">
                                Test 404 Error
                            </a>
                            <a href="/test/error/404" 
                               class="block w-full text-center border border-red-300 text-red-700 font-semibold py-3 px-4 rounded-lg hover:bg-red-50 transition duration-200">
                                Test via Controller
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 500 Card -->
                <div class="error-card bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-orange-500">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl font-bold text-orange-600">500</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Server Error</h3>
                                <p class="text-gray-500">Internal server issues</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">
                            Simulate server errors and see how they're presented to users.
                        </p>
                        <div class="space-y-3">
                            <a href="/test/500" 
                               class="block w-full text-center bg-orange-500 text-white font-semibold py-3 px-4 rounded-lg hover:bg-orange-600 transition duration-200 btn-primary">
                                Test 500 Error
                            </a>
                            <a href="/test/error/500" 
                               class="block w-full text-center border border-orange-300 text-orange-700 font-semibold py-3 px-4 rounded-lg hover:bg-orange-50 transition duration-200">
                                Test via Controller
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 403 Card -->
                <div class="error-card bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-purple-500">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-2xl font-bold text-purple-600">403</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Access Denied</h3>
                                <p class="text-gray-500">Permission issues</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">
                            Test access control and permission-based error pages.
                        </p>
                        <div class="space-y-3">
                            <a href="/test/403" 
                               class="block w-full text-center bg-purple-500 text-white font-semibold py-3 px-4 rounded-lg hover:bg-purple-600 transition duration-200 btn-primary">
                                Test 403 Error
                            </a>
                            <a href="/admin" 
                               class="block w-full text-center border border-purple-300 text-purple-700 font-semibold py-3 px-4 rounded-lg hover:bg-purple-50 transition duration-200">
                                Visit Admin Area
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Test Options -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Additional Tests</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Other Error Types</h3>
                        <div class="space-y-3">
                            <a href="/test/503" class="block p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition duration-200">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-900">503 Service Unavailable</span>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Maintenance</span>
                                </div>
                            </a>
                            <a href="/exception" class="block p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition duration-200">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-900">Unhandled Exception</span>
                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Critical</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">JSON API Tests</h3>
                        <div class="space-y-3">
                            <a href="/test/error/json/404" class="block p-4 border border-blue-200 rounded-lg hover:bg-blue-50 transition duration-200">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-900">JSON 404 Response</span>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">API</span>
                                </div>
                            </a>
                            <a href="/test/error/json/500" class="block p-4 border border-blue-200 rounded-lg hover:bg-blue-50 transition duration-200">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-900">JSON 500 Response</span>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">API</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Information -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-8 text-white mb-8">
                <h2 class="text-3xl font-bold mb-4">About This Project</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Features</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Custom designed error pages
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Responsive Tailwind CSS design
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Separate API error responses
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Quick Tips</h3>
                        <ul class="space-y-2">
                            <li>• Custom error pages are in <code class="bg-white/20 px-2 py-1 rounded">resources/views/errors/</code></li>
                            <li>• Pages are automatically used by Laravel</li>
                            <li>• Add more error codes as needed</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Live Demo -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Live Error Demo</h2>
                <p class="text-gray-600 mb-6">Try visiting a non-existent page to see the 404 error page in action:</p>
                <div class="flex flex-wrap gap-4">
                    <a href="/this-page-does-not-exist" class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition duration-200">
                        Visit Non-existent Page
                    </a>
                    <a href="/another-missing-page" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200">
                        Another Missing Page
                    </a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-12 pt-8 border-t border-gray-300 text-center text-gray-600">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="font-semibold">Custom Error Pages Demo</p>
                    <p class="text-sm">Built with Laravel & Tailwind CSS</p>
                </div>
                <div class="text-sm">
                    <p>Error codes implemented: 
                        <span class="font-mono bg-gray-100 px-2 py-1 rounded">404</span>
                        <span class="font-mono bg-gray-100 px-2 py-1 rounded">403</span>
                        <span class="font-mono bg-gray-100 px-2 py-1 rounded">500</span>
                        <span class="font-mono bg-gray-100 px-2 py-1 rounded">503</span>
                        <span class="font-mono bg-gray-100 px-2 py-1 rounded">419</span>
                    </p>
                </div>
            </div>
            <div class="mt-4 text-xs text-gray-400">
                <p>Visit <a href="/welcome" class="text-blue-500 hover:text-blue-700">/welcome</a> for the default Laravel welcome page</p>
            </div>
        </footer>
    </div>

    <script>
        // Simple animation for page load
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.error-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>