<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('public.guru.index', compact('teachers'));
    }
}