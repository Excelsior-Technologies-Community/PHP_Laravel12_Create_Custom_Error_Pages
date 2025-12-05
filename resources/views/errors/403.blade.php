<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Access Denied - 403 Error</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .error-container {
            animation: fadeIn 0.8s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="error-container max-w-2xl w-full">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="p-8 md:p-12">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <!-- Error Number -->
                    <div class="flex-shrink-0">
                        <div class="w-32 h-32 bg-purple-50 rounded-full flex items-center justify-center">
                            <span class="text-6xl font-bold text-purple-600">403</span>
                        </div>
                    </div>
                    
                    <!-- Error Content -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">
                            Access Denied
                        </h1>
                        
                        <p class="text-lg text-gray-600 mb-6">
                            You don't have permission to access this page. This area is restricted to authorized users only.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="bg-purple-50 border-l-4 border-purple-500 p-4 rounded">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-purple-700">
                                            This page requires special permissions. If you believe this is an error, please contact your administrator.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex flex-wrap gap-2 justify-center md:justify-start">
                                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    Back to Home
                                </a>
                                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Info -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="text-sm text-gray-500">
                        <p>Need access? <a href="mailto:admin@example.com" class="text-blue-600 hover:text-blue-800">Request permissions</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>