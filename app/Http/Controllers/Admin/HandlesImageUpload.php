<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait HandlesImageUpload
{
    protected function uploadImage(Request $request, string $field, string $folder = 'uploads'): ?string
    {
        if (!$request->hasFile($field)) return null;

        $file     = $request->file($field);
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        return "/{$folder}/{$filename}";
    }

    protected function deleteOldImage(?string $path): void
    {
        if (!$path) return;
        $fullPath = public_path(ltrim($path, '/'));
        if (file_exists($fullPath)) {
            @unlink($fullPath);
        }
    }
}
