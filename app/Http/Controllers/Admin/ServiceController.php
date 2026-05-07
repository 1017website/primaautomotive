<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.pages.services.form', ['service' => new Service()]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request);
        $data['features']    = $this->parseFeatures($request->input('features'));
        $data['features_en'] = $this->parseFeatures($request->input('features_en'));
        $data['is_active']   = $request->has('is_active');
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.pages.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $this->validate($request);
        $data['features']    = $this->parseFeatures($request->input('features'));
        $data['features_en'] = $this->parseFeatures($request->input('features_en'));
        $data['is_active']   = $request->has('is_active');
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Layanan berhasil dihapus.');
    }

    private function validate(Request $request): array
    {
        return $request->validate([
            'title'          => 'required|string|max:255',
            'title_en'       => 'nullable|string|max:255',
            'badge'          => 'nullable|string|max:100',
            'badge_en'       => 'nullable|string|max:100',
            'description'    => 'required|string',
            'description_en' => 'nullable|string',
            'icon'           => 'nullable|string|max:50',
            'gradient'       => 'nullable|string|max:100',
            'features'       => 'nullable|string',
            'features_en'    => 'nullable|string',
            'is_active'      => 'nullable|boolean',
            'sort_order'     => 'nullable|integer',
        ]);
    }

    private function parseFeatures(?string $raw): array
    {
        if (!$raw) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $raw))));
    }
}
