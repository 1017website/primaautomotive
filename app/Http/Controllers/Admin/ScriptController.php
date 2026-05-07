<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteScript;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function index()
    {
        $scripts = SiteScript::orderBy('group')->orderBy('id')->get()->groupBy('group');
        return view('admin.pages.scripts.index', compact('scripts'));
    }

    public function update(Request $request)
    {
        $items = $request->input('scripts', []);

        foreach ($items as $key => $data) {
            SiteScript::updateOrCreate(
                ['key' => $key],
                [
                    'code'      => $data['code'] ?? null,
                    'is_active' => isset($data['is_active']) && $data['is_active'] == '1',
                ]
            );
        }

        SiteScript::clearCache();

        return back()->with('success', 'Kode script berhasil disimpan.');
    }
}
