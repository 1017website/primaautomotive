<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use App\Models\ClickEvent;
use App\Models\Booking;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        // ===== PAGE VIEWS =====
        $views = [
            'today'        => PageView::totalToday(),
            'this_month'   => PageView::totalThisMonth(),
            'all_time'     => PageView::totalAllTime(),
            'unique_today' => PageView::uniqueToday(),
            'unique_month' => PageView::uniqueThisMonth(),
        ];

        // ===== CLICK EVENTS =====
        $clicks = [
            'wa_total'    => ClickEvent::totalThisMonth('wa_chat') + ClickEvent::totalThisMonth('wa_float'),
            'wa_today'    => ClickEvent::totalToday('wa_chat') + ClickEvent::totalToday('wa_float'),
            'phone_month' => ClickEvent::totalThisMonth('phone_call'),
            'book_month'  => ClickEvent::totalThisMonth('book_appointment'),
            'maps_month'  => ClickEvent::totalThisMonth('maps_open'),
            'track_month' => ClickEvent::totalThisMonth('track_vehicle'),
            'form_month'  => ClickEvent::totalThisMonth('contact_form'),
            'breakdown'   => ClickEvent::breakdown(),
        ];

        // ===== BOOKINGS =====
        $bookings = [
            'total'      => Booking::count(),
            'this_month' => Booking::whereMonth('created_at', now()->month)->count(),
            'pending'    => Booking::where('status', 'pending')->count(),
            'done'       => Booking::where('status', 'done')->count(),
        ];

        // ===== MESSAGES =====
        $messages = [
            'total'      => ContactMessage::count(),
            'this_month' => ContactMessage::whereMonth('created_at', now()->month)->count(),
            'unread'     => ContactMessage::unread()->count(),
        ];

        // ===== CHARTS =====
        $viewsChart  = PageView::dailyChart(30);
        $clicksChart = ClickEvent::dailyChart(30);
        $deviceBreak = PageView::deviceBreakdown();
        $localeBreak = PageView::localeBreakdown();
        $topPages    = PageView::topPages(5);

        return view('admin.pages.analytics.index', compact(
            'views', 'clicks', 'bookings', 'messages',
            'viewsChart', 'clicksChart', 'deviceBreak', 'localeBreak', 'topPages'
        ));
    }

    /** API endpoint to record click events from frontend JS */
    public function recordClick(Request $request)
    {
        $data = $request->validate([
            'event' => 'required|string|max:50',
            'label' => 'nullable|string|max:100',
            'page'  => 'nullable|string|max:255',
        ]);

        ClickEvent::create([
            'event'      => $data['event'],
            'label'      => $data['label'] ?? null,
            'page'       => $data['page'] ?? $request->header('referer'),
            'ip'         => $request->ip(),
            'device'     => $this->detectDevice($request->userAgent() ?? ''),
            'clicked_at' => now(),
        ]);

        return response()->json(['ok' => true]);
    }

    private function detectDevice(string $ua): string
    {
        $ua = strtolower($ua);
        if (str_contains($ua, 'mobile') || str_contains($ua, 'iphone') || str_contains($ua, 'android')) return 'mobile';
        if (str_contains($ua, 'tablet') || str_contains($ua, 'ipad')) return 'tablet';
        return 'desktop';
    }
}
