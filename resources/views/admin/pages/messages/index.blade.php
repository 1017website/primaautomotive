@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('breadcrumb', 'Main → Pesan Masuk')

@section('content')
<div class="card">
<div class="table-wrap">
    <table class="cms-table w-full">
        <thead>
            <tr>
                <th>Pengirim</th>
                <th>Pesan</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $msg)
            <tr class="{{ !$msg->is_read ? 'bg-orange-50/30' : '' }}">
                <td>
                    <div class="font-semibold text-sm {{ !$msg->is_read ? 'text-gray-900' : 'text-gray-600' }}">{{ $msg->name }}</div>
                    @if($msg->phone)<div class="text-xs text-gray-400">{{ $msg->phone }}</div>@endif
                </td>
                <td class="max-w-xs">
                    <span class="text-sm text-gray-600 {{ !$msg->is_read ? 'font-medium' : '' }}">
                        {{ Str::limit($msg->message, 80) }}
                    </span>
                </td>
                <td class="text-xs text-gray-400 whitespace-nowrap">{{ $msg->created_at->format('d M, H:i') }}</td>
                <td>
                    @if(!$msg->is_read)
                    <span class="badge badge-orange">Baru</span>
                    @else
                    <span class="badge badge-gray">Dibaca</span>
                    @endif
                </td>
                <td>
                    <div class="flex gap-1.5">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="btn-secondary py-1 px-2 text-xs">
                            <i data-lucide="eye" class="w-3 h-3"></i>
                        </a>
                        @if($msg->phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $msg->phone) }}" target="_blank"
                           class="btn-secondary py-1 px-2 text-xs text-green-600">
                            <i data-lucide="message-circle" class="w-3 h-3"></i>
                        </a>
                        @endif
                        <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}"
                              onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf @method('DELETE')
                            <button class="btn-danger py-1 px-2 text-xs"><i data-lucide="trash-2" class="w-3 h-3"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center text-gray-400 py-10">Belum ada pesan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
    @if($messages->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $messages->links() }}</div>
    @endif
</div>
@endsection
