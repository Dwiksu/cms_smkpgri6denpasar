<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as Auth;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.pengaturan', compact('user'));
    }
}
