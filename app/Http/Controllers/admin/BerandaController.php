<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Hero;
use App\Models\PrincipalMessage;
use App\Models\School;
use App\Models\Stat;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.konten-beranda', [
            'hero' => Hero::first(),
            'about' => About::first(),
            'principal' => PrincipalMessage::first(),
            'stats' => Stat::all(),
            'school' => School::first(),
        ]);
    }

    /* ================= HERO ================= */
    public function updateHero(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'cta_text' => 'required|string|max:100',
            'cta_link' => 'required|string|max:255',
            'background_image' => 'required|string',
        ]);

        Hero::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Hero updated');
    }

    /* ================= ABOUT ================= */
    public function updateAbout(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'mission' => 'required|string',
            'image' => 'required|string',
            'history' => 'required|string|max:255',
            'vision' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        About::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'About updated');
    }

    /* ================= PRINCIPAL ================= */
    public function updatePrincipal(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:18',
            'position' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        PrincipalMessage::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Sambutan updated');
    }

    /* ================= STATS ================= */
    public function storeStat(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|string|max:100',
            'value' => 'required|integer',
            'suffix' => 'nullable',
            'icon' => 'nullable',
        ]);

        Stat::create($data);

        return back()->with('success', 'Stat ditambahkan');
    }

    public function deleteStat(Stat $stat)
    {
        $stat->delete();
        return back()->with('success', 'Stat dihapus');
    }

    /* ================= SCHOOL INFO ================= */
    public function updateSchool(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:18',
            'email' => 'required|email|max:255',
            'website' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'map_embed' => 'nullable|string|max:255',    
        ]);

        School::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Info sekolah updated');
    }
}