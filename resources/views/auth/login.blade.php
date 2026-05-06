<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Prima Automotive</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; margin: 0; }

        @keyframes fadeInUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes gradientShift { 0%,100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        @keyframes particle { 0% { transform: translateY(100vh) rotate(0deg); opacity: 0; } 10%,90% { opacity: 1; } 100% { transform: translateY(-80px) rotate(720deg); opacity: 0; } }

        .bg-animated {
            background: linear-gradient(135deg, #0a1628 0%, #1e3a5f 50%, #0d2540 100%);
            background-size: 300% 300%;
            animation: gradientShift 8s ease infinite;
        }
        .card-anim { animation: fadeInUp 0.6s ease-out both; }

        .form-input {
            width: 100%; height: 46px; padding: 0 44px 0 14px;
            font-size: 14px; border: 1.5px solid #e2e8f0; border-radius: 10px;
            outline: none; background: #fff; transition: border-color .2s, box-shadow .2s;
            font-family: 'Inter', sans-serif;
        }
        .form-input:focus { border-color: #e67e22; box-shadow: 0 0 0 3px rgba(230,126,34,.15); }

        .btn-login {
            width: 100%; height: 48px; background: #e67e22; color: #fff;
            font-weight: 700; font-size: 15px; border: none; border-radius: 10px;
            cursor: pointer; transition: background .2s, transform .15s, box-shadow .2s;
            font-family: 'Inter', sans-serif; display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-login:hover { background: #d35400; transform: translateY(-2px); box-shadow: 0 8px 25px rgba(230,126,34,.4); }
        .btn-login:active { transform: translateY(0); }

        .particle { position: absolute; border-radius: 50%; background: rgba(230,126,34,.35); animation: particle linear infinite; }
    </style>
</head>
<body>
<div class="bg-animated" style="min-height:100vh;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;">

    {{-- Particles --}}
    <div id="particles" style="position:absolute;inset:0;pointer-events:none;"></div>

    {{-- Decorative circles --}}
    <div style="position:absolute;top:-80px;right:-80px;width:400px;height:400px;border-radius:50%;border:1px solid rgba(255,255,255,0.05);"></div>
    <div style="position:absolute;bottom:-60px;left:-60px;width:300px;height:300px;border-radius:50%;border:1px solid rgba(230,126,34,0.08);"></div>
    <div style="position:absolute;top:30%;left:10%;width:6px;height:6px;border-radius:50%;background:rgba(230,126,34,0.5);animation:float 4s ease-in-out infinite;"></div>
    <div style="position:absolute;bottom:25%;right:12%;width:4px;height:4px;border-radius:50%;background:rgba(255,255,255,0.3);animation:float 5s ease-in-out infinite;animation-delay:.8s;"></div>

    {{-- Card --}}
    <div class="card-anim" style="width:100%;max-width:420px;margin:24px;position:relative;z-index:10;">

        {{-- Logo area --}}
        <div style="text-align:center;margin-bottom:28px;">
            <div style="width:60px;height:60px;background:linear-gradient(135deg,#e67e22,#d35400);border-radius:16px;display:inline-flex;align-items:center;justify-content:center;margin-bottom:14px;box-shadow:0 12px 30px rgba(230,126,34,.4);">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                    <circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/>
                </svg>
            </div>
            <div style="font-size:22px;font-weight:800;color:#fff;letter-spacing:-.3px;">Prima Automotive</div>
            <div style="font-size:13px;color:#94a3b8;margin-top:4px;">Admin Panel — Masuk untuk melanjutkan</div>
        </div>

        {{-- Form card --}}
        <div style="background:rgba(255,255,255,0.97);backdrop-filter:blur(20px);border-radius:18px;padding:32px;box-shadow:0 25px 60px rgba(0,0,0,0.3);">

            {{-- Session Error --}}
            @if ($errors->any())
            <div style="background:#fff1f2;border:1px solid #fecdd3;border-radius:8px;padding:12px 14px;margin-bottom:18px;display:flex;align-items:center;gap:8px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span style="font-size:13px;color:#dc2626;font-weight:500;">Email atau password salah.</span>
            </div>
            @endif

            @if (session('status'))
            <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;padding:12px 14px;margin-bottom:18px;">
                <span style="font-size:13px;color:#15803d;">{{ session('status') }}</span>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Email</label>
                    <div style="position:relative;">
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-input" placeholder="admin@primaautomotive.id"
                               autocomplete="username" required autofocus>
                        <svg style="position:absolute;right:14px;top:50%;transform:translateY(-50%);color:#94a3b8;"
                             width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                </div>

                {{-- Password --}}
                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Password</label>
                    <div style="position:relative;">
                        <input type="password" name="password" id="password-field"
                               class="form-input" placeholder="••••••••"
                               autocomplete="current-password" required>
                        <button type="button" onclick="togglePassword()"
                                style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#94a3b8;padding:2px;">
                            <svg id="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Remember --}}
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:22px;">
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">
                        <input type="checkbox" name="remember" style="width:15px;height:15px;accent-color:#e67e22;">
                        <span style="font-size:13px;color:#6b7280;">Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="font-size:13px;color:#e67e22;text-decoration:none;font-weight:500;">Lupa password?</a>
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-login">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/>
                    </svg>
                    Masuk ke Panel Admin
                </button>
            </form>
        </div>

        {{-- Back to website --}}
        <div style="text-align:center;margin-top:18px;">
            <a href="{{ route('home') }}" style="font-size:12.5px;color:#64748b;text-decoration:none;display:inline-flex;align-items:center;gap:5px;transition:color .2s;"
               onmouseover="this.style.color='#94a3b8'" onmouseout="this.style.color='#64748b'">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke website
            </a>
        </div>
    </div>
</div>

<script>
// Particles
(function() {
    const c = document.getElementById('particles');
    for (let i = 0; i < 15; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        const size = Math.random() * 5 + 3;
        p.style.cssText = `width:${size}px;height:${size}px;left:${Math.random()*100}%;animation-duration:${Math.random()*15+10}s;animation-delay:${Math.random()*8}s;opacity:${Math.random()*.4+.1};`;
        c.appendChild(p);
    }
})();

// Toggle password visibility
function togglePassword() {
    const f = document.getElementById('password-field');
    const isText = f.type === 'text';
    f.type = isText ? 'password' : 'text';
    document.getElementById('eye-icon').innerHTML = isText
        ? '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>'
        : '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
}
</script>
</body>
</html>
