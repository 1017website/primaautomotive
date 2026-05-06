<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Prima Automotive CMS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
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
                        'navy-mid': '#112040',
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; }

        /* ===== SIDEBAR ===== */
        #sidebar { width: 240px; min-height: 100vh; background: #0a1628; display: flex; flex-direction: column; flex-shrink: 0; }
        .sidebar-link { display: flex; align-items: center; gap: 10px; padding: 9px 12px; border-radius: 8px; font-size: 13.5px; font-weight: 500; color: #94a3b8; text-decoration: none; transition: all 0.18s; }
        .sidebar-link:hover { background: rgba(255,255,255,0.08); color: #fff; }
        .sidebar-link.active { background: rgba(230,126,34,0.15); color: #e67e22; border: 1px solid rgba(230,126,34,0.25); }
        .sidebar-link svg { width: 16px; height: 16px; flex-shrink: 0; }
        .sidebar-group { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: #475569; padding: 0 12px; margin: 16px 0 4px; }

        /* ===== BADGES ===== */
        .badge { display: inline-flex; align-items: center; padding: 2px 8px; border-radius: 9999px; font-size: 11px; font-weight: 600; line-height: 1.5; }
        .badge-yellow { background: #fef9c3; color: #854d0e; }
        .badge-blue   { background: #dbeafe; color: #1e40af; }
        .badge-orange { background: #ffedd5; color: #9a3412; }
        .badge-purple { background: #f3e8ff; color: #6b21a8; }
        .badge-green  { background: #dcfce7; color: #166534; }
        .badge-red    { background: #fee2e2; color: #991b1b; }
        .badge-gray   { background: #f1f5f9; color: #475569; }

        /* ===== FORM ELEMENTS ===== */
        .form-label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-input { width: 100%; height: 40px; padding: 0 12px; font-size: 13.5px; border: 1.5px solid #e2e8f0; border-radius: 8px; outline: none; background: #fff; transition: border-color .18s, box-shadow .18s; }
        .form-input:focus { border-color: #e67e22; box-shadow: 0 0 0 3px rgba(230,126,34,.12); }
        .form-textarea { width: 100%; padding: 10px 12px; font-size: 13.5px; border: 1.5px solid #e2e8f0; border-radius: 8px; outline: none; background: #fff; resize: vertical; min-height: 80px; transition: border-color .18s, box-shadow .18s; font-family: inherit; }
        .form-textarea:focus { border-color: #e67e22; box-shadow: 0 0 0 3px rgba(230,126,34,.12); }
        .form-select { width: 100%; height: 40px; padding: 0 12px; font-size: 13.5px; border: 1.5px solid #e2e8f0; border-radius: 8px; outline: none; background: #fff; transition: border-color .18s; }
        .form-select:focus { border-color: #e67e22; box-shadow: 0 0 0 3px rgba(230,126,34,.12); }

        /* ===== BUTTONS ===== */
        .btn-primary   { display: inline-flex; align-items: center; gap: 7px; background: #e67e22; color: #fff; font-weight: 600; font-size: 13.5px; padding: 9px 16px; border-radius: 8px; border: none; cursor: pointer; transition: background .18s; text-decoration: none; }
        .btn-primary:hover { background: #d35400; }
        .btn-secondary { display: inline-flex; align-items: center; gap: 7px; background: #f1f5f9; color: #374151; font-weight: 600; font-size: 13.5px; padding: 9px 16px; border-radius: 8px; border: none; cursor: pointer; transition: background .18s; text-decoration: none; }
        .btn-secondary:hover { background: #e2e8f0; }
        .btn-danger    { display: inline-flex; align-items: center; gap: 7px; background: #fff1f2; color: #dc2626; font-weight: 600; font-size: 13.5px; padding: 9px 16px; border-radius: 8px; border: none; cursor: pointer; transition: background .18s; text-decoration: none; }
        .btn-danger:hover { background: #ffe4e6; }
        .btn-primary svg, .btn-secondary svg, .btn-danger svg { width: 15px; height: 15px; }

        /* ===== CARD ===== */
        .card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 1px 4px rgba(0,0,0,.05); }

        /* ===== TABLE ===== */
        .cms-table { width: 100%; border-collapse: collapse; }
        .cms-table th { text-align: left; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: #64748b; padding: 11px 16px; background: #f8fafc; border-bottom: 1.5px solid #e2e8f0; }
        .cms-table td { padding: 11px 16px; font-size: 13.5px; color: #374151; border-bottom: 1px solid #f1f5f9; }
        .cms-table tbody tr:last-child td { border-bottom: none; }
        .cms-table tbody tr:hover td { background: #f8fafc; }

        /* ===== TOPBAR ===== */
        #topbar { background: #fff; border-bottom: 1px solid #e2e8f0; padding: 14px 24px; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; }

        /* ===== FLASH ===== */
        .flash-success { display: flex; align-items: center; gap: 10px; background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; border-radius: 8px; padding: 12px 16px; font-size: 13.5px; }
        .flash-error   { display: flex; align-items: center; gap: 10px; background: #fff1f2; border: 1px solid #fecdd3; color: #dc2626; border-radius: 8px; padding: 12px 16px; font-size: 13.5px; }
    </style>
    @stack('styles')
</head>
<body>
<div style="display:flex; height:100vh; overflow:hidden;">

    {{-- ===== SIDEBAR ===== --}}
    <aside id="sidebar">

        {{-- Logo --}}
        <div style="padding:18px 16px; border-bottom:1px solid rgba(255,255,255,0.08);">
            <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:36px;height:36px;background:#e67e22;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
                </div>
                <div>
                    <div style="font-weight:800;color:#fff;font-size:13px;line-height:1.2;">Prima Automotive</div>
                    <div style="font-size:10.5px;color:#64748b;">Admin Panel</div>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav style="flex:1;padding:12px 10px;overflow-y:auto;">

            <div class="sidebar-group">Main</div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.bookings.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="m9 16 2 2 4-4"/></svg>
                Booking
                @php $pendingCount = \App\Models\Booking::where('status','pending')->count(); @endphp
                @if($pendingCount > 0)
                <span class="badge badge-yellow" style="margin-left:auto;">{{ $pendingCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.messages.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Pesan Masuk
                @php $unreadCount = \App\Models\ContactMessage::unread()->count(); @endphp
                @if($unreadCount > 0)
                <span class="badge badge-red" style="margin-left:auto;">{{ $unreadCount }}</span>
                @endif
            </a>

            <div class="sidebar-group">Konten</div>

            <a href="{{ route('admin.services.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                Layanan
            </a>

            <a href="{{ route('admin.reviews.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.reviews*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                Ulasan
            </a>

            <div class="sidebar-group">Pengaturan</div>

            @foreach([
                ['hero',     'Hero', 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ['about',    'Tentang Kami',   'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['location', 'Lokasi',         'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z'],
                ['contact',  'Kontak',         'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'],
                ['footer',   'Footer',         'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['seo',      'SEO',            'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'],
                ['general',  'Umum',           'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
            ] as [$group, $label, $iconPath])
            <a href="{{ route('admin.settings.show', $group) }}"
               class="sidebar-link {{ request()->is('admin/settings/'.$group) ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    @foreach(explode(' ', $iconPath) as $cmd)
                        @if(str_starts_with($cmd, 'M') || str_starts_with($cmd, 'L') || str_starts_with($cmd, 'C') || str_starts_with($cmd, 'Z'))
                        @endif
                    @endforeach
                    <path d="{{ $iconPath }}"/>
                </svg>
                {{ $label }}
            </a>
            @endforeach
        </nav>

        {{-- User --}}
        <div style="padding:12px 10px;border-top:1px solid rgba(255,255,255,0.08);">
            <div style="display:flex;align-items:center;gap:10px;padding:8px 10px;margin-bottom:6px;">
                <div style="width:32px;height:32px;background:rgba(230,126,34,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#e67e22;font-weight:700;font-size:12px;flex-shrink:0;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:12.5px;font-weight:600;color:#f1f5f9;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ auth()->user()->name }}</div>
                    <div style="font-size:11px;color:#64748b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <div style="display:flex;gap:6px;">
                <a href="{{ route('home') }}" target="_blank"
                   style="flex:1;display:flex;align-items:center;justify-content:center;gap:5px;padding:7px;border-radius:7px;font-size:11.5px;font-weight:500;color:#94a3b8;text-decoration:none;background:rgba(255,255,255,0.04);transition:background .18s;"
                   onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    Website
                </a>
                <form method="POST" action="{{ route('logout') }}" style="flex:1;">
                    @csrf
                    <button type="submit"
                            style="width:100%;display:flex;align-items:center;justify-content:center;gap:5px;padding:7px;border-radius:7px;font-size:11.5px;font-weight:500;color:#f87171;background:rgba(255,255,255,0.04);border:none;cursor:pointer;transition:background .18s;"
                            onmouseover="this.style.background='rgba(239,68,68,0.1)'" onmouseout="this.style.background='rgba(255,255,255,0.04)'">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- ===== MAIN ===== --}}
    <div style="flex:1;display:flex;flex-direction:column;overflow:hidden;min-width:0;">

        {{-- Topbar --}}
        <div id="topbar">
            <div>
                <h1 style="font-size:16px;font-weight:700;color:#0f172a;margin:0;">@yield('title', 'Dashboard')</h1>
                @hasSection('breadcrumb')
                <div style="font-size:12px;color:#94a3b8;margin-top:2px;">@yield('breadcrumb')</div>
                @endif
            </div>
            <div style="display:flex;align-items:center;gap:10px;">
                @yield('header_actions')
            </div>
        </div>

        {{-- Flash --}}
        <div style="padding:16px 24px 0;">
            @if(session('success'))
            <div class="flash-success" id="flash-ok">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 13.01 9 10.01"/></svg>
                {{ session('success') }}
                <button onclick="document.getElementById('flash-ok').remove()" style="margin-left:auto;background:none;border:none;cursor:pointer;color:#15803d;">✕</button>
            </div>
            @endif
            @if($errors->any())
            <div class="flash-error">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <ul style="margin:0;padding:0;list-style:none;">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
            @endif
        </div>

        {{-- Content --}}
        <main style="flex:1;overflow-y:auto;padding:20px 24px;">
            @yield('content')
        </main>
    </div>
</div>

<script>lucide.createIcons();</script>
<script>setTimeout(()=>document.getElementById('flash-ok')?.remove(), 4000);</script>
@stack('scripts')
</body>
</html>
