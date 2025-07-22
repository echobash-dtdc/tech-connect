<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blue Dashboard Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-400 via-blue-200 to-blue-100 flex items-center justify-center">
    <div class="w-full max-w-2xl mx-auto">
        <div class="relative bg-white dark:bg-blue-900 rounded-3xl shadow-2xl p-10 flex flex-col items-center text-center overflow-hidden">
            <div class="absolute -top-10 -right-10 opacity-20 animate-pulse">
                <svg width="120" height="120" fill="none" viewBox="0 0 120 120">
                    <circle cx="60" cy="60" r="50" stroke="#3B82F6" stroke-width="10" fill="none" />
                </svg>
            </div>
            <div class="absolute -bottom-10 -left-10 opacity-10 animate-spin-slow">
                <svg width="120" height="120" fill="none" viewBox="0 0 120 120">
                    <rect x="20" y="20" width="80" height="80" rx="20" stroke="#1E40AF" stroke-width="10" fill="none" />
                </svg>
            </div>
            <div class="z-10">
                <h1 class="text-3xl font-extrabold mb-4 text-blue-700 dark:text-blue-200 drop-shadow">Welcome to the Blue Dashboard Demo!</h1>
                <p class="text-lg text-blue-800 dark:text-blue-100 mb-8">This is a modern, interactive, and eye-catching UI template using Tailwind CSS and SVG animation.</p>
                <form method="POST" action="#" class="space-y-6">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input type="text" name="demo" placeholder="Type something..." class="w-full px-4 py-2 rounded-lg border border-blue-200 dark:border-blue-700 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none bg-blue-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100" />
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="px-8 py-3 rounded-lg bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        @keyframes spin-slow { 100% { transform: rotate(360deg); } }
        .animate-spin-slow { animation: spin-slow 8s linear infinite; }
    </style>
</body>
</html>
