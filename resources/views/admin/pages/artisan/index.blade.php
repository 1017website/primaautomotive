@extends('admin.layouts.app')
@section('title', 'Artisan Commands')
@section('breadcrumb', 'Tools → Artisan Runner')

@section('content')

{{-- Status Cards --}}
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:12px;margin-bottom:20px;">

    <div class="card" style="padding:16px;">
        <div style="font-size:11px;color:#64748b;font-weight:600;margin-bottom:6px;">PHP Version</div>
        <div style="font-size:18px;font-weight:800;color:#3b82f6;">{{ $phpVersion }}</div>
    </div>

    <div class="card" style="padding:16px;">
        <div style="font-size:11px;color:#64748b;font-weight:600;margin-bottom:6px;">Laravel</div>
        <div style="font-size:18px;font-weight:800;color:#e67e22;">v{{ $laravelVersion }}</div>
    </div>

    <div class="card" style="padding:16px;">
        <div style="font-size:11px;color:#64748b;font-weight:600;margin-bottom:6px;">Environment</div>
        <div style="font-size:18px;font-weight:800;color:{{ $environment === 'production' ? '#22c55e' : '#f59e0b' }};">{{ $environment }}</div>
    </div>

    <div class="card" style="padding:16px;">
        <div style="font-size:11px;color:#64748b;font-weight:600;margin-bottom:6px;">Database</div>
        <div style="font-size:13px;font-weight:700;color:{{ $dbStatus === 'connected' ? '#22c55e' : '#ef4444' }};">
            {{ $dbStatus === 'connected' ? '✓ Connected' : '✗ Error' }}
        </div>
    </div>

    <div class="card" style="padding:16px;">
        <div style="font-size:11px;color:#64748b;font-weight:600;margin-bottom:6px;">Storage Link</div>
        <div style="font-size:13px;font-weight:700;color:{{ $storageLinked ? '#22c55e' : '#ef4444' }};">
            {{ $storageLinked ? '✓ Linked' : '✗ Not linked' }}
        </div>
    </div>

    <div class="card" style="padding:16px;">
        <div style="font-size:11px;color:#64748b;font-weight:600;margin-bottom:6px;">Pending Migrations</div>
        <div style="font-size:18px;font-weight:800;color:{{ $pendingMigrations > 0 ? '#f59e0b' : '#22c55e' }};">
            {{ $pendingMigrations }}
            @if($pendingMigrations > 0)
            <span style="font-size:11px;color:#f59e0b;">pending</span>
            @endif
        </div>
    </div>

</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;align-items:start;">

    {{-- Left: Command List --}}
    <div class="card" style="overflow:hidden;">
        <div style="padding:16px 20px;border-bottom:1px solid #f1f5f9;">
            <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0;">Pilih Command</h3>
            <p style="font-size:12px;color:#94a3b8;margin:4px 0 0;">Klik command untuk menjalankan</p>
        </div>

        {{-- Group: Cache --}}
        <div style="padding:12px 16px 4px;">
            <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:8px;">Cache & Optimasi</div>
            @foreach(['optimize:clear','cache:clear','config:clear','route:clear','view:clear','config:cache','route:cache','view:cache'] as $cmd)
            @if(isset($commands[$cmd]))
            <button onclick="prepareRun('{{ $cmd }}')"
                    class="cmd-btn" data-cmd="{{ $cmd }}"
                    style="width:100%;display:flex;align-items:center;justify-content:space-between;padding:10px 12px;border-radius:8px;border:none;background:transparent;cursor:pointer;text-align:left;transition:background .15s;margin-bottom:2px;font-family:inherit;">
                <div>
                    <div style="font-size:13px;font-weight:600;color:#374151;">{{ $commands[$cmd]['label'] }}</div>
                    <div style="font-size:11px;color:#94a3b8;">{{ $commands[$cmd]['desc'] }}</div>
                </div>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" style="flex-shrink:0;"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>
            @endif
            @endforeach
        </div>

        {{-- Group: Database --}}
        <div style="padding:4px 16px 4px;border-top:1px solid #f8fafc;">
            <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:8px;margin-top:10px;">Database</div>
            @foreach(['migrate','migrate:status','migrate:rollback','migrate:fresh','db:seed'] as $cmd)
            @if(isset($commands[$cmd]))
            @php $isDanger = isset($commands[$cmd]['danger']); @endphp
            <button onclick="prepareRun('{{ $cmd }}')"
                    class="cmd-btn" data-cmd="{{ $cmd }}"
                    style="width:100%;display:flex;align-items:center;justify-content:space-between;padding:10px 12px;border-radius:8px;border:none;background:transparent;cursor:pointer;text-align:left;transition:background .15s;margin-bottom:2px;font-family:inherit;">
                <div>
                    <div style="font-size:13px;font-weight:600;color:{{ $isDanger ? '#dc2626' : '#374151' }};">
                        @if($isDanger)<span style="font-size:11px;">⚠️</span> @endif
                        {{ $commands[$cmd]['label'] }}
                    </div>
                    <div style="font-size:11px;color:{{ $isDanger ? '#fca5a5' : '#94a3b8' }};">{{ $commands[$cmd]['desc'] }}</div>
                </div>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="{{ $isDanger ? '#dc2626' : '#94a3b8' }}" stroke-width="2" style="flex-shrink:0;"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>
            @endif
            @endforeach
        </div>

        {{-- Group: Other --}}
        <div style="padding:4px 16px 12px;border-top:1px solid #f8fafc;">
            <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:8px;margin-top:10px;">Lainnya</div>
            @foreach(['storage:link','queue:restart','about'] as $cmd)
            @if(isset($commands[$cmd]))
            <button onclick="prepareRun('{{ $cmd }}')"
                    class="cmd-btn" data-cmd="{{ $cmd }}"
                    style="width:100%;display:flex;align-items:center;justify-content:space-between;padding:10px 12px;border-radius:8px;border:none;background:transparent;cursor:pointer;text-align:left;transition:background .15s;margin-bottom:2px;font-family:inherit;">
                <div>
                    <div style="font-size:13px;font-weight:600;color:#374151;">{{ $commands[$cmd]['label'] }}</div>
                    <div style="font-size:11px;color:#94a3b8;">{{ $commands[$cmd]['desc'] }}</div>
                </div>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" style="flex-shrink:0;"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>
            @endif
            @endforeach
        </div>
    </div>

    {{-- Right: Output Terminal --}}
    <div style="position:sticky;top:80px;">
        <div class="card" style="overflow:hidden;">
            <div style="padding:14px 18px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;">
                <div>
                    <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0;">Output Terminal</h3>
                    <div style="font-size:12px;color:#94a3b8;margin-top:2px;" id="current-cmd-label">Pilih command di sebelah kiri</div>
                </div>
                <button onclick="clearOutput()" style="background:#f1f5f9;border:none;border-radius:6px;padding:6px 10px;font-size:12px;color:#64748b;cursor:pointer;font-family:inherit;">Clear</button>
            </div>

            {{-- Command preview + run button --}}
            <div style="padding:14px 18px;background:#f8fafc;border-bottom:1px solid #f1f5f9;" id="run-panel" class="hidden">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
                    <code style="flex:1;background:#0f172a;color:#e2e8f0;padding:8px 12px;border-radius:8px;font-size:13px;">php artisan <span id="cmd-preview" style="color:#fbbf24;"></span></code>
                </div>

                {{-- Danger confirm input --}}
                <div id="danger-confirm-wrap" style="display:none;margin-bottom:10px;">
                    <div style="background:#fff1f2;border:1px solid #fecdd3;border-radius:8px;padding:10px 12px;margin-bottom:8px;font-size:12.5px;color:#dc2626;">
                        ⚠️ Command ini akan <strong>menghapus semua data</strong>. Ketik <code style="background:#fecdd3;padding:1px 5px;border-radius:3px;">YES_I_UNDERSTAND</code> untuk melanjutkan.
                    </div>
                    <input type="text" id="danger-confirm-input" placeholder="Ketik YES_I_UNDERSTAND"
                           style="width:100%;height:38px;padding:0 12px;font-size:13px;border:1.5px solid #fca5a5;border-radius:8px;outline:none;font-family:monospace;">
                </div>

                <button onclick="executeCommand()" id="execute-btn"
                        style="width:100%;display:flex;align-items:center;justify-content:center;gap:8px;background:#0a1628;color:#fff;font-weight:700;font-size:13.5px;padding:11px;border-radius:8px;border:none;cursor:pointer;transition:background .18s;font-family:inherit;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                    Jalankan Command
                </button>
            </div>

            {{-- Terminal Output --}}
            <div id="output-wrap" style="background:#0f172a;min-height:300px;max-height:500px;overflow-y:auto;padding:16px 18px;font-family:'Courier New',monospace;font-size:13px;line-height:1.6;">
                <div style="color:#475569;font-style:italic;">// Output akan muncul di sini...</div>
            </div>
        </div>

        {{-- Quick actions --}}
        <div style="margin-top:12px;display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;">
            @foreach([
                ['optimize:clear', '🧹 Clear All', '#3b82f6'],
                ['migrate',        '🗄️ Migrate',   '#22c55e'],
                ['storage:link',   '🔗 Storage',   '#8b5cf6'],
            ] as [$cmd, $label, $color])
            <button onclick="prepareRun('{{ $cmd }}')"
                    style="padding:10px;border-radius:9px;border:1.5px solid {{ $color }}20;background:{{ $color }}10;color:{{ $color }};font-size:12.5px;font-weight:700;cursor:pointer;transition:all .18s;font-family:inherit;"
                    onmouseover="this.style.background='{{ $color }}20'" onmouseout="this.style.background='{{ $color }}10'">
                {{ $label }}
            </button>
            @endforeach
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
let currentCmd     = null;
let isDangerCmd    = false;
const dangerCmds   = ['migrate:fresh'];
const csrfToken    = document.querySelector('meta[name="csrf-token"]')?.content || '';

function prepareRun(cmd) {
    currentCmd = cmd;
    isDangerCmd = dangerCmds.includes(cmd);

    // Highlight selected button
    document.querySelectorAll('.cmd-btn').forEach(b => {
        b.style.background = b.dataset.cmd === cmd ? 'rgba(230,126,34,.1)' : 'transparent';
    });

    document.getElementById('cmd-preview').textContent = cmd;
    document.getElementById('current-cmd-label').textContent = 'php artisan ' + cmd;
    document.getElementById('run-panel').classList.remove('hidden');

    const dangerWrap = document.getElementById('danger-confirm-wrap');
    dangerWrap.style.display = isDangerCmd ? 'block' : 'none';
    if (isDangerCmd) {
        document.getElementById('danger-confirm-input').value = '';
        document.getElementById('execute-btn').style.background = '#dc2626';
    } else {
        document.getElementById('execute-btn').style.background = '#0a1628';
    }
}

async function executeCommand() {
    if (!currentCmd) return;

    const btn = document.getElementById('execute-btn');
    btn.disabled = true;
    btn.innerHTML = '<svg style="animation:spin 1s linear infinite" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Menjalankan...';

    const output = document.getElementById('output-wrap');
    appendOutput(`\n<span style="color:#64748b;">$ php artisan ${currentCmd}</span>\n`, false);

    const body = { command: currentCmd };
    if (isDangerCmd) {
        body.confirm = document.getElementById('danger-confirm-input').value;
    }

    try {
        const res  = await fetch('{{ route("admin.artisan.run") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify(body),
        });
        const data = await res.json();

        if (data.need_confirm) {
            appendOutput(`<span style="color:#fca5a5;">⚠ ${data.output}</span>\n`);
        } else if (data.success) {
            appendOutput(`<span style="color:#4ade80;">${escapeHtml(data.output)}</span>\n`);
        } else {
            appendOutput(`<span style="color:#f87171;">${escapeHtml(data.output)}</span>\n`);
        }
    } catch (e) {
        appendOutput(`<span style="color:#f87171;">Error: ${e.message}</span>\n`);
    }

    btn.disabled = false;
    btn.innerHTML = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg> Jalankan Command';
}

function appendOutput(html, scroll = true) {
    const wrap = document.getElementById('output-wrap');
    const existing = wrap.querySelector('div[style*="font-style:italic"]');
    if (existing) existing.remove();
    const line = document.createElement('div');
    line.innerHTML = html;
    wrap.appendChild(line);
    if (scroll) wrap.scrollTop = wrap.scrollHeight;
}

function clearOutput() {
    document.getElementById('output-wrap').innerHTML = '<div style="color:#475569;font-style:italic;">// Output akan muncul di sini...</div>';
}

function escapeHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}

// Hover effect for cmd buttons
document.querySelectorAll('.cmd-btn').forEach(b => {
    b.addEventListener('mouseover', () => { if(b.dataset.cmd !== currentCmd) b.style.background = '#f8fafc'; });
    b.addEventListener('mouseout',  () => { if(b.dataset.cmd !== currentCmd) b.style.background = 'transparent'; });
});

// Spin animation
const s = document.createElement('style');
s.textContent = '@keyframes spin{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}';
document.head.appendChild(s);
</script>
@endpush
