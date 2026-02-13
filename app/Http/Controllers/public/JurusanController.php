<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function show(Major $major)
    {
        $teachers = $major->getTeacherByMajor($major->id);
        return view('public.jurusan.detail', compact('major', 'teachers'));
    }
}