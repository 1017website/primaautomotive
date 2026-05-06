<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\Review;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'bookings_total'   => Booking::count(),
            'bookings_pending' => Booking::where('status', 'pending')->count(),
            'bookings_done'    => Booking::where('status', 'done')->count(),
            'messages_unread'  => ContactMessage::unread()->count(),
            'reviews_total'    => Review::count(),
            'services_total'   => Service::count(),
        ];

        $recent_bookings = Booking::latest()->limit(5)->get();
        $recent_messages = ContactMessage::latest()->limit(5)->get();

        return view('admin.pages.dashboard', compact('stats', 'recent_bookings', 'recent_messages'));
    }
}
