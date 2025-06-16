<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'wallet'])->latest()->get();
        return view('admin.dashboard', compact('users'));
    }
}