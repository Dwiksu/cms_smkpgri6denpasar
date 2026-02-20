<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $teachers = Teacher::getProfilGuru($request);

        $majors = Major::orderBy('name')->get();

        return view('public.guru.index', compact('teachers', 'majors'));
    }
}