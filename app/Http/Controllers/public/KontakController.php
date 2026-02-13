<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $info = School::firstOrFail();
        return view('public.kontak.index', $info);
    }
}