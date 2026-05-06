<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use HandlesImageUpload;

    private array $groups = ['hero', 'reviews', 'about', 'location', 'contact', 'footer', 'seo', 'general'];

    public function show(string $group)
    {
        abort_unless(in_array($group, $this->groups), 404);
        $settings = SiteSetting::group($group);
        return view("admin.pages.settings.{$group}", compact('settings'));
    }

    public function update(Request $request, string $group)
    {
        abort_unless(in_array($group, $this->groups), 404);

        $settings = SiteSetting::where('group', $group)->get();

        foreach ($settings as $setting) {
            $key = $setting->key;

            if ($setting->type === 'image') {
                if ($request->hasFile($key)) {
                    $this->deleteOldImage($setting->value);
                    $path = $this->uploadImage($request, $key, 'uploads');
                    SiteSetting::set($key, $path);
                }
                // skip jika tidak ada file baru
            } elseif ($setting->type === 'boolean') {
                SiteSetting::set($key, $request->has($key) ? '1' : '0');
            } else {
                if ($request->has($key)) {
                    SiteSetting::set($key, $request->input($key));
                }
            }
        }

        SiteSetting::clearCache();

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
