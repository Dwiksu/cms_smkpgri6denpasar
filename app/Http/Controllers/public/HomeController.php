<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::firstOrFail();
        return view('public.home.index', compact('hero'));
    }    
}