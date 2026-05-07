<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Review;
use App\Models\SiteSetting;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $locale   = app()->getLocale();
        $settings = SiteSetting::all_flat_lang($locale);
        $services = Service::active()->get();
        $reviews  = Review::active()->get();

        return view('home.index', compact('settings', 'services', 'reviews', 'locale'));
    }

    public function track(Request $request)
    {
        $request->validate(['booking_code' => 'required|string']);
        $booking = Booking::where('booking_code', $request->booking_code)->first();

        if (!$booking) {
            return response()->json(['found' => false, 'message' => 'ID booking tidak ditemukan.'], 404);
        }

        return response()->json([
            'found'         => true,
            'booking_code'  => $booking->booking_code,
            'customer_name' => $booking->customer_name,
            'vehicle'       => "{$booking->vehicle_brand} {$booking->vehicle_model}",
            'status'        => $booking->status,
            'status_label'  => $booking->status_label,
            'status_color'  => $booking->status_color,
            'progress_note' => $booking->progress_note,
            'booking_date'  => $booking->booking_date?->format('d M Y'),
        ]);
    }

    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'nama'   => 'required|string|max:150',
            'telepon'=> 'required|string|max:20',
            'email'  => 'nullable|email|max:150',
            'pesan'  => 'required|string',
        ]);

        \App\Models\ContactMessage::create([
            'name'    => $data['nama'],
            'phone'   => $data['telepon'],
            'email'   => $data['email'] ?? null,
            'message' => $data['pesan'],
        ]);

        return response()->json(['success' => true, 'message' => 'Pesan berhasil dikirim!']);
    }
}
