<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function fetch(Request $request)
    {
        $user = Auth::user();
        $today = now()->format('Y-m-d');

        $perPage = 8;
        $page = $request->get('page', 1);

        $notifications = $user->unreadNotifications()
            ->whereDate('created_at', $today)
            ->latest()
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get()
            ->map(function ($notif) {
                return [
                    'title' => $notif->data['title'],
                    'icon' => $notif->data['icon'],
                    'time' => $notif->created_at->diffForHumans(),
                ];
            });

        $total = $user->unreadNotifications()->whereDate('created_at', $today)->count();

        return response()->json([
            'count' => $total,
            'notifications' => $notifications,
        ]);
    }
}
