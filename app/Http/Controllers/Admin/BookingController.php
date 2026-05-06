<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('booking_code', 'like', "%{$s}%")
                  ->orWhere('customer_name', 'like', "%{$s}%")
                  ->orWhere('customer_phone', 'like', "%{$s}%")
                  ->orWhere('vehicle_brand', 'like', "%{$s}%");
            });
        }

        $bookings = $query->paginate(15)->withQueryString();
        $statuses = Booking::$statusLabels;

        return view('admin.pages.bookings.index', compact('bookings', 'statuses'));
    }

    public function create()
    {
        $statuses = Booking::$statusLabels;
        return view('admin.pages.bookings.form', ['booking' => new Booking(), 'statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name'      => 'required|string|max:150',
            'customer_phone'     => 'required|string|max:20',
            'customer_email'     => 'nullable|email|max:150',
            'vehicle_brand'      => 'required|string|max:50',
            'vehicle_model'      => 'required|string|max:100',
            'vehicle_color'      => 'nullable|string|max:50',
            'vehicle_plate'      => 'nullable|string|max:20',
            'service_type'       => 'required|string|max:100',
            'damage_description' => 'nullable|string',
            'booking_date'       => 'nullable|date',
            'status'             => 'required|in:' . implode(',', array_keys(Booking::$statusLabels)),
            'notes'              => 'nullable|string',
            'progress_note'      => 'nullable|string',
        ]);

        $data['booking_code'] = Booking::generateCode($data['vehicle_brand']);
        Booking::create($data);

        return redirect()->route('admin.bookings.index')->with('success', "Booking {$data['booking_code']} berhasil dibuat.");
    }

    public function show(Booking $booking)
    {
        return view('admin.pages.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $statuses = Booking::$statusLabels;
        return view('admin.pages.bookings.form', compact('booking', 'statuses'));
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'customer_name'      => 'required|string|max:150',
            'customer_phone'     => 'required|string|max:20',
            'customer_email'     => 'nullable|email|max:150',
            'vehicle_brand'      => 'required|string|max:50',
            'vehicle_model'      => 'required|string|max:100',
            'vehicle_color'      => 'nullable|string|max:50',
            'vehicle_plate'      => 'nullable|string|max:20',
            'service_type'       => 'required|string|max:100',
            'damage_description' => 'nullable|string',
            'booking_date'       => 'nullable|date',
            'status'             => 'required|in:' . implode(',', array_keys(Booking::$statusLabels)),
            'notes'              => 'nullable|string',
            'progress_note'      => 'nullable|string',
        ]);

        // Timestamps otomatis
        if ($data['status'] === 'confirmed' && !$booking->confirmed_at) {
            $data['confirmed_at'] = now();
        }
        if ($data['status'] === 'done' && !$booking->completed_at) {
            $data['completed_at'] = now();
        }

        $booking->update($data);

        return redirect()->route('admin.bookings.index')->with('success', "Booking {$booking->booking_code} berhasil diperbarui.");
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking berhasil dihapus.');
    }

    /** API untuk tracking dari frontend */
    public function track(Request $request)
    {
        $request->validate(['booking_code' => 'required|string']);
        $booking = Booking::where('booking_code', $request->booking_code)->first();

        if (!$booking) {
            return response()->json(['found' => false, 'message' => 'Booking tidak ditemukan.'], 404);
        }

        return response()->json([
            'found'         => true,
            'booking_code'  => $booking->booking_code,
            'customer_name' => $booking->customer_name,
            'vehicle'       => "{$booking->vehicle_brand} {$booking->vehicle_model}",
            'service_type'  => $booking->service_type,
            'status'        => $booking->status,
            'status_label'  => $booking->status_label,
            'status_color'  => $booking->status_color,
            'progress_note' => $booking->progress_note,
            'booking_date'  => $booking->booking_date?->format('d M Y'),
        ]);
    }
}
