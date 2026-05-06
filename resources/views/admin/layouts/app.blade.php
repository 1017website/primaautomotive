<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CMS') — Prima Automotive Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#e67e22',
                        'primary-dark': '#d35400',
                        navy: '#0a1628',
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link { @apply flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-white/10 hover:text-white transition-all; }
        .sidebar-link.active { @apply bg-primary/20 text-primary border border-primary/30; }
        .sidebar-group-label { @apply text-xs font-semibold uppercase tracking-widest text-gray-500 px-3 mb-1 mt-4; }
        .badge { @apply inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold; }
        .badge-yellow  { @apply bg-yellow-100 text-yellow-800; }
        .badge-blue    { @apply bg-blue-100 text-blue-800; }
        .badge-orange  { @apply bg-orange-100 text-orange-800; }
        .badge-purple  { @apply bg-purple-100 text-purple-800; }
        .badge-green   { @apply bg-green-100 text-green-800; }
        .badge-red     { @apply bg-red-100 text-red-800; }
        .badge-gray    { @apply bg-gray-100 text-gray-800; }
        .form-label  { @apply block text-sm font-semibold text-gray-700 mb-1.5; }
        .form-input  { @apply w-full h-10 px-3 text-sm border border-gray-200 rounded-lg outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white; }
        .form-textarea { @apply w-full px-3 py-2.5 text-sm border border-gray-200 rounded-lg outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white resize-y; }
        .form-select { @apply w-full h-10 px-3 text-sm border border-gray-200 rounded-lg outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white; }
        .btn-primary { @apply inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white font-semibold px-4 py-2.5 rounded-lg text-sm transition-colors; }
        .btn-secondary { @apply inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-4 py-2.5 rounded-lg text-sm transition-colors; }
        .btn-danger { @apply inline-flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 font-semibold px-4 py-2.5 rounded-lg text-sm transition-colors; }
        .card { @apply bg-white rounded-xl border border-gray-200 shadow-sm; }
        .table th { @apply text-left text-xs font-semibold text-gray-500 uppercase tracking-wide px-4 py-3 bg-gray-50 border-b border-gray-200; }
        .table td { @apply px-4 py-3 text-sm text-gray-700 border-b border-gray-100; }
        .table tr:last-child td { @apply border-b-0; }
        .table tr:hover td { @apply bg-gray-50; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-900">

<div class="flex h-screen overflow-hidden">

    {{-- ===== SIDEBAR ===== --}}
    <aside id="sidebar" class="w-64 flex-shrink-0 bg-navy flex flex-col overflow-y-auto transition-all duration-300">
        {{-- Logo --}}
        <div class="p-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-primary rounded-lg flex items-center justify-center flex-shrink-0">
                    <i data-lucide="car" class="w-5 h-5 text-white"></i>
                </div>
                <div>
                    <div class="font-black text-white text-sm">Prima Automotive</div>
                    <div class="text-xs text-gray-400">Admin Panel</div>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 p-3">
            {{-- Main --}}
            <div class="sidebar-group-label">Main</div>
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
            </a>
            <a href="{{ route('admin.bookings.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}">
                <i data-lucide="calendar-check" class="w-4 h-4"></i> Booking
                @php $pending = \App\Models\Booking::where('status','pending')->count(); @endphp
                @if($pending > 0)
                <span class="ml-auto badge badge-yellow">{{ $pending }}</span>
                @endif
            </a>
            <a href="{{ route('admin.messages.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                <i data-lucide="mail" class="w-4 h-4"></i> Pesan Masuk
                @php $unread = \App\Models\ContactMessage::unread()->count(); @endphp
                @if($unread > 0)
                <span class="ml-auto badge badge-red">{{ $unread }}</span>
                @endif
            </a>

            {{-- Konten --}}
            <div class="sidebar-group-label">Konten</div>
            <a href="{{ route('admin.services.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <i data-lucide="wrench" class="w-4 h-4"></i> Layanan
            </a>
            <a href="{{ route('admin.reviews.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.reviews*') ? 'active' : '' }}">
                <i data-lucide="star" class="w-4 h-4"></i> Ulasan
            </a>

            {{-- Pengaturan --}}
            <div class="sidebar-group-label">Pengaturan</div>
            @foreach([
                ['hero',     'layout-template',   'Hero'],
                ['about',    'info',               'Tentang Kami'],
                ['location', 'map-pin',            'Lokasi'],
                ['contact',  'phone',              'Kontak'],
                ['footer',   'file-text',          'Footer'],
                ['seo',      'search',             'SEO'],
                ['general',  'settings',           'Umum'],
            ] as [$group, $icon, $label])
            <a href="{{ route('admin.settings.show', $group) }}"
               class="sidebar-link {{ request()->is("admin/settings/{$group}") ? 'active' : '' }}">
                <i data-lucide="{{ $icon }}" class="w-4 h-4"></i> {{ $label }}
            </a>
            @endforeach
        </nav>

        {{-- User --}}
        <div class="p-3 border-t border-white/10">
            <div class="flex items-center gap-3 px-3 py-2">
                <div class="w-8 h-8 bg-primary/30 rounded-full flex items-center justify-center text-primary font-bold text-xs">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <div class="flex gap-2 mt-2 px-1">
                <a href="{{ route('home') }}" target="_blank"
                   class="flex-1 sidebar-link justify-center text-xs py-2">
                    <i data-lucide="external-link" class="w-3 h-3"></i> Website
                </a>
                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full sidebar-link justify-center text-xs py-2 text-red-400 hover:text-red-300">
                        <i data-lucide="log-out" class="w-3 h-3"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- ===== MAIN CONTENT ===== --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Topbar --}}
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div>
                <h1 class="text-lg font-bold text-gray-900">@yield('title', 'Dashboard')</h1>
                @hasSection('breadcrumb')
                <div class="text-xs text-gray-400 mt-0.5">@yield('breadcrumb')</div>
                @endif
            </div>
            <div class="flex items-center gap-3">
                @yield('header_actions')
            </div>
        </header>

        {{-- Flash Messages --}}
        <div class="px-6 pt-4">
            @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 text-sm mb-0" id="flash-msg">
                <i data-lucide="check-circle" class="w-4 h-4 flex-shrink-0"></i>
                {{ session('success') }}
                <button onclick="document.getElementById('flash-msg').remove()" class="ml-auto text-green-500 hover:text-green-700">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
            @endif
            @if(session('error'))
            <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm mb-0" id="flash-msg-err">
                <i data-lucide="x-circle" class="w-4 h-4 flex-shrink-0"></i>
                {{ session('error') }}
            </div>
            @endif
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm mb-0">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        {{-- Page Content --}}
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

<script>lucide.createIcons();</script>
<script>
// Auto-dismiss flash after 4s
setTimeout(() => {
    document.getElementById('flash-msg')?.remove();
}, 4000);
</script>
@stack('scripts')
</body>
</html>
