<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class BookingPageController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all_flat();
        return view('booking.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_type'       => 'required|string|max:100',
            'damage_description' => 'nullable|string|max:1000',
            'vehicle_brand'      => 'required|string|max:50',
            'vehicle_model'      => 'required|string|max:100',
            'vehicle_color'      => 'nullable|string|max:50',
            'vehicle_plate'      => 'nullable|string|max:20',
            'vehicle_year'       => 'nullable|string|max:4',
            'customer_name'      => 'required|string|max:150',
            'customer_phone'     => 'required|string|max:20',
            'customer_email'     => 'nullable|email|max:150',
            'booking_date'       => 'nullable|date|after_or_equal:today',
            'notes'              => 'nullable|string|max:500',
        ]);

        $booking = Booking::create([
            'booking_code'       => Booking::generateCode($data['vehicle_brand']),
            'customer_name'      => $data['customer_name'],
            'customer_phone'     => $data['customer_phone'],
            'customer_email'     => $data['customer_email'] ?? null,
            'vehicle_brand'      => $data['vehicle_brand'],
            'vehicle_model'      => $data['vehicle_model'],
            'vehicle_color'      => $data['vehicle_color'] ?? null,
            'vehicle_plate'      => $data['vehicle_plate'] ?? null,
            'service_type'       => $data['service_type'],
            'damage_description' => $data['damage_description'] ?? null,
            'booking_date'       => $data['booking_date'] ?? null,
            'status'             => 'pending',
            'progress_note'      => 'Booking diterima, menunggu konfirmasi dari tim kami.',
            'notes'              => $data['notes'] ?? null,
        ]);

        // Track click event
        try {
            \App\Models\ClickEvent::create([
                'event'      => 'book_appointment',
                'label'      => $data['service_type'],
                'page'       => '/booking',
                'ip'         => $request->ip(),
                'device'     => str_contains(strtolower($request->userAgent() ?? ''), 'mobile') ? 'mobile' : 'desktop',
                'clicked_at' => now(),
            ]);
        } catch (\Exception $e) {}

        return response()->json([
            'success'      => true,
            'booking_code' => $booking->booking_code,
            'message'      => 'Booking berhasil! Tim kami akan menghubungi Anda dalam 1x24 jam.',
            'wa_url'       => 'https://wa.me/' . SiteSetting::get('contact_whatsapp', '6287853722011')
                              . '?text=' . urlencode("Halo, saya baru saja membuat booking dengan kode *{$booking->booking_code}*. Mohon konfirmasinya. Terima kasih!"),
        ]);
    }
}
