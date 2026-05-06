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
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'badge'       => 'nullable|string|max:100',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:50',
            'gradient'    => 'nullable|string|max:100',
            'features'    => 'nullable|string',
            'is_active'   => 'nullable|boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        $data['features'] = $this->parseFeatures($request->input('features'));
        $data['is_active'] = $request->has('is_active');

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.pages.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'badge'       => 'nullable|string|max:100',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:50',
            'gradient'    => 'nullable|string|max:100',
            'features'    => 'nullable|string',
            'is_active'   => 'nullable|boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        $data['features'] = $this->parseFeatures($request->input('features'));
        $data['is_active'] = $request->has('is_active');

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Layanan berhasil dihapus.');
    }

    private function parseFeatures(?string $raw): array
    {
        if (!$raw) return [];
        return array_filter(array_map('trim', explode("\n", $raw)));
    }
}
