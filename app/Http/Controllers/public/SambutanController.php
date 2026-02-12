<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\PrincipalMessage;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    public function index()
    {
        $principal = PrincipalMessage::first();
        return view('public.sambutan.index', compact('principal'));
    }
}