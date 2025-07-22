<aside class="w-64 bg-primary-50 dark:bg-primary-800 border-r border-primary-200 dark:border-primary-700 min-h-screen p-4 flex flex-col">
    <!-- User Info -->
    @auth
    <div class="mb-6">
        <div class="font-bold text-lg text-primary-800 dark:text-primary-100">{{ Auth::user()->name }}</div>
        <div class="text-sm text-primary-600 dark:text-primary-200">{{ Auth::user()->email }}</div>
    </div>
    @endauth
    @guest
    <div class="mb-6">
        <div class="font-bold text-lg text-primary-800 dark:text-primary-100">Guest</div>
        <div class="text-sm text-primary-600 dark:text-primary-200">Please log in</div>
    </div>
    @endguest
    <nav class="space-y-2 flex-1">
        <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('blog.index') }}" :active="request()->routeIs('blog.*')">
            Blog
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('events.index') }}" :active="request()->routeIs('events.*')">
            Events
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('projects.index') }}" :active="request()->routeIs('projects.*')">
            Projects
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('feedback.index') }}" :active="request()->routeIs('feedback.*')">
            Feedback
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('homepage-content.index') }}" :active="request()->routeIs('homepage-content.*')">
            Homepage
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('team.index') }}" :active="request()->routeIs('team.*')">
            Team
        </x-sidebar-link>
    </nav>
    <!-- Logout -->
    @auth
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Log Out</button>
    </form>
    @endauth
</aside>
