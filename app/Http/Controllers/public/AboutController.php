<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\SchoolValue;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $schoolValues = SchoolValue::all();
        return view('public.tentang-kami.index', compact('about', 'schoolValues'));
    }
}
