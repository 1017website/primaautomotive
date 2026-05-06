<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('sort_order')->get();
        return view('admin.pages.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.pages.reviews.form', ['review' => new Review()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:100',
            'initials'     => 'nullable|string|max:5',
            'avatar_color' => 'nullable|string|max:100',
            'stars'        => 'required|integer|min:1|max:5',
            'content'      => 'required|string',
            'time_ago'     => 'nullable|string|max:50',
            'sort_order'   => 'nullable|integer',
        ]);
        $data['is_active'] = $request->has('is_active');
        // Auto-generate initials jika kosong
        if (empty($data['initials'])) {
            $words = explode(' ', $data['name']);
            $data['initials'] = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
        }
        Review::create($data);
        return redirect()->route('admin.reviews.index')->with('success', 'Ulasan berhasil ditambahkan.');
    }

    public function edit(Review $review)
    {
        return view('admin.pages.reviews.form', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:100',
            'initials'     => 'nullable|string|max:5',
            'avatar_color' => 'nullable|string|max:100',
            'stars'        => 'required|integer|min:1|max:5',
            'content'      => 'required|string',
            'time_ago'     => 'nullable|string|max:50',
            'sort_order'   => 'nullable|integer',
        ]);
        $data['is_active'] = $request->has('is_active');
        $review->update($data);
        return redirect()->route('admin.reviews.index')->with('success', 'Ulasan berhasil diperbarui.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}
