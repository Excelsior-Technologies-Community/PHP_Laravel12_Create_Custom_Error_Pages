<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('code', 'Error') - @yield('title', 'System Error') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        cyber: {
                            bg: '#0a0a12',
                            card: '#121225',
                            neon: '#00ffcc',
                            purple: '#9945FF',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Floating animations for 3D SVG graphics */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(2deg); }
        }
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.05); }
        }
        .animate-float { animation: float-slow 4s ease-in-out infinite; }
        .animate-glow { animation: pulse-glow 3s ease-in-out infinite; }

        /* Glassmorphism Styles */
        .theme-glassmorphism {
            background: radial-gradient(circle at 20% 20%, rgba(99, 102, 241, 0.25), transparent 40%),
                        radial-gradient(circle at 80% 80%, rgba(236, 72, 153, 0.25), transparent 40%),
                        linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            color: #f8fafc;
        }
        .theme-glassmorphism .error-card-box {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Midnight Dark Styles */
        .theme-dark {
            background: #090d16;
            color: #f1f5f9;
        }
        .theme-dark .error-card-box {
            background: #111827;
            border: 1px solid #1f2937;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
        }

        /* Cyberpunk Neon Styles */
        .theme-neon {
            background: #05050a;
            color: #00ffcc;
        }
        .theme-neon .error-card-box {
            background: rgba(18, 18, 37, 0.9);
            border: 1px solid #00ffcc;
            box-shadow: 0 0 25px rgba(0, 255, 204, 0.3), inset 0 0 15px rgba(153, 69, 255, 0.2);
        }

        /* Minimal Light Styles */
        .theme-minimal {
            background: #f8fafc;
            color: #0f172a;
        }
        .theme-minimal .error-card-box {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
@php
    $currentTheme = request()->query('theme') ?? session('error_theme', 'glassmorphism');
    if (!in_array($currentTheme, ['glassmorphism', 'dark', 'neon', 'minimal'])) {
        $currentTheme = 'glassmorphism';
    }
@endphp
<body class="h-full theme-{{ $currentTheme }} transition-colors duration-500 flex flex-col justify-between">

    <!-- Top Navigation Toolbar & Theme Switcher -->
    <header class="w-full max-w-7xl mx-auto px-4 py-4 flex justify-between items-center z-50">
        <a href="/" class="flex items-center gap-3 group">
            <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold shadow-lg group-hover:scale-105 transition-transform">
                <i class="fa-solid fa-shield-cat"></i>
            </div>
            <div>
                <span class="font-bold text-lg tracking-tight block leading-tight">Laravel Error Pages</span>
                <span class="text-xs opacity-70">Interactive Exception System</span>
            </div>
        </a>

        <!-- Theme Selector -->
        <div class="flex items-center gap-2 bg-black/20 p-1.5 rounded-full border border-white/10 backdrop-blur-md">
            <a href="?theme=glassmorphism" class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all {{ $currentTheme === 'glassmorphism' ? 'bg-indigo-600 text-white shadow' : 'opacity-70 hover:opacity-100' }}">
                ✨ Glass
            </a>
            <a href="?theme=dark" class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all {{ $currentTheme === 'dark' ? 'bg-slate-800 text-white shadow' : 'opacity-70 hover:opacity-100' }}">
                🌙 Midnight
            </a>
            <a href="?theme=neon" class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all {{ $currentTheme === 'neon' ? 'bg-teal-500 text-black font-bold shadow' : 'opacity-70 hover:opacity-100' }}">
                ⚡ Neon
            </a>
            <a href="?theme=minimal" class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all {{ $currentTheme === 'minimal' ? 'bg-white text-slate-900 shadow' : 'opacity-70 hover:opacity-100' }}">
                ☀️ Minimal
            </a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow flex items-center justify-center p-4 my-6">
        <div class="w-full max-w-2xl error-card-box rounded-3xl p-8 md:p-12 text-center transition-all duration-300 relative overflow-hidden">
            <!-- 3D Vector SVG Graphic Slot -->
            <div class="mb-6 flex justify-center animate-float">
                @yield('illustration')
            </div>

            <!-- Error Status Code Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-500/10 border border-red-500/20 text-red-400 font-mono text-sm font-bold mb-4">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                HTTP STATUS @yield('code', '500')
            </div>

            <!-- Error Title & Description -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                @yield('title', 'Unexpected Exception')
            </h1>
            <p class="text-base md:text-lg opacity-80 max-w-lg mx-auto mb-8 leading-relaxed">
                @yield('message', 'An error occurred while processing your request.')
            </p>

            <!-- Action Button Group -->
            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="/" class="px-6 py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold shadow-lg shadow-indigo-600/30 hover:scale-105 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-house"></i> Return Home
                </a>
                <a href="/error-sandbox" class="px-6 py-3 rounded-2xl bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/30 font-bold hover:scale-105 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-vial"></i> Error Sandbox
                </a>
                <button onclick="window.location.reload()" class="px-6 py-3 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/20 font-semibold hover:scale-105 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-rotate-right"></i> Retry Request
                </button>
            </div>

            <!-- Error Log Reference Toast Box -->
            <div class="mt-8 pt-6 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center text-xs opacity-75 gap-2">
                <span><i class="fa-solid fa-bug me-1"></i> Log Ref: <code class="font-mono px-2 py-0.5 rounded bg-black/30">ERR-{{ strtoupper(substr(md5(url()->current()), 0, 8)) }}</code></span>
                <button onclick="copyLogRef('ERR-{{ strtoupper(substr(md5(url()->current()), 0, 8)) }}')" class="hover:underline flex items-center gap-1">
                    <i class="fa-solid fa-copy"></i> Copy Error Log Ref
                </button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-7xl mx-auto px-4 py-4 text-center text-xs opacity-60">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }} · Custom Error Pages & Simulation Engine
    </footer>

    <script>
        function copyLogRef(ref) {
            navigator.clipboard.writeText(ref);
            alert('Error reference ID ' + ref + ' copied to clipboard!');
        }
    </script>
</body>
</html>