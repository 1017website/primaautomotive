@extends('admin.layouts.app')
@section('title', 'Detail Pesan')
@section('breadcrumb', 'Pesan Masuk → Detail')

@section('content')
<div class="max-w-2xl">
<div class="card p-6">
    <div class="flex items-start justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-gray-900">{{ $message->name }}</h2>
            <div class="flex gap-4 mt-1 text-sm text-gray-500">
                @if($message->phone)<span>📞 {{ $message->phone }}</span>@endif
                @if($message->email)<span>✉️ {{ $message->email }}</span>@endif
            </div>
        </div>
        <div class="text-xs text-gray-400">{{ $message->created_at->format('d M Y, H:i') }}</div>
    </div>

    <div class="bg-gray-50 rounded-xl p-5 text-gray-700 leading-relaxed border border-gray-100 mb-6">
        {{ $message->message }}
    </div>

    <div class="flex flex-wrap gap-3">
        @if($message->phone)
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}?text={{ urlencode('Halo ' . $message->name . ', terima kasih sudah menghubungi Prima Automotive. ') }}"
           target="_blank" class="btn-primary">
            <i data-lucide="message-circle" class="w-4 h-4"></i> Balas via WhatsApp
        </a>
        @endif
        @if($message->email)
        <a href="mailto:{{ $message->email }}" class="btn-secondary">
            <i data-lucide="mail" class="w-4 h-4"></i> Kirim Email
        </a>
        @endif
        <a href="{{ route('admin.messages.index') }}" class="btn-secondary">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
        </a>
        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
              onsubmit="return confirm('Hapus pesan ini?')" class="ml-auto">
            @csrf @method('DELETE')
            <button class="btn-danger"><i data-lucide="trash-2" class="w-4 h-4"></i> Hapus</button>
        </form>
    </div>
</div>
</div>
@endsection
