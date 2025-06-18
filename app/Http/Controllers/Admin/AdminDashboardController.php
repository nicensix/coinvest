<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'wallet'])->latest()->get();

        $totalWalletBalance = $users->sum(fn ($u) => $u->wallet->balance ?? 0);
        $adminCount = $users->filter(fn ($u) => $u->hasRole('admin'))->count();
        $todaysUsers = $users->filter(fn ($u) => $u->created_at->isToday())->count();

        return view('admin.dashboard', compact(
            'users',
            'totalWalletBalance',
            'adminCount',
            'todaysUsers'
        ));
    }
}