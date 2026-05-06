{{-- 
    Reusable settings group form
    Usage: @include('admin.partials.settings-form', ['settings' => $settings, 'group' => 'hero'])
--}}
<form method="POST" action="{{ route('admin.settings.update', $group) }}" enctype="multipart/form-data">
    @csrf
    <div class="space-y-5">
        @foreach($settings as $key => $setting)
        <div>
            <label class="form-label">{{ $setting->label ?? $setting->key }}</label>

            @if($setting->type === 'textarea')
                <textarea name="{{ $setting->key }}" rows="4" class="form-textarea">{{ old($setting->key, $setting->value) }}</textarea>

            @elseif($setting->type === 'image')
                <div class="space-y-2">
                    @if($setting->value)
                    <div class="flex items-center gap-3">
                        <img src="{{ $setting->value }}" alt="preview" class="w-24 h-16 object-cover rounded-lg border border-gray-200">
                        <span class="text-xs text-gray-400">Gambar saat ini</span>
                    </div>
                    @endif
                    <input type="file" name="{{ $setting->key }}" accept="image/*"
                           class="block text-sm text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary/10 file:text-primary file:font-semibold hover:file:bg-primary/20 transition-all">
                    <p class="text-xs text-gray-400">JPG, PNG, WebP. Maks 2MB. Kosongkan jika tidak ingin mengganti.</p>
                </div>

            @elseif($setting->type === 'boolean')
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="{{ $setting->key }}" value="1"
                           {{ old($setting->key, $setting->value) ? 'checked' : '' }}
                           class="w-4 h-4 accent-primary">
                    <span class="text-sm text-gray-600">Aktif</span>
                </label>

            @else
                <input type="text" name="{{ $setting->key }}"
                       value="{{ old($setting->key, $setting->value) }}"
                       class="form-input">
            @endif
        </div>
        @endforeach
    </div>

    <div class="flex gap-3 mt-8 pt-5 border-t border-gray-100">
        <button type="submit" class="btn-primary">
            <i data-lucide="save" class="w-4 h-4"></i> Simpan Perubahan
        </button>
    </div>
</form>
