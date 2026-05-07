<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Only track successful GET requests for HTML pages
        if ($request->isMethod('GET') &&
            $response->getStatusCode() === 200 &&
            !$request->ajax() &&
            !$request->wantsJson()) {
            try {
                PageView::record($request);
            } catch (\Exception $e) {
                // Fail silently — never block the page
            }
        }

        return $response;
    }
}
