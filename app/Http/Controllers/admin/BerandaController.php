<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Hero;
use App\Models\PrincipalMessage;
use App\Models\School;
use App\Models\SchoolValue;
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
            'values' => SchoolValue::all(),
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
            'title' => 'required|string',
            'description' => 'required|string',
            'history' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|array',
            'mission.*' => 'required|string',
            'image' => 'nullable|string',
            'values' => 'nullable|array',
            'values.*.name' => 'required|string',
            'values.*.description' => 'nullable|string',
        ]);

        $about = About::updateOrCreate(
            ['id' => 1],
            collect($data)->except('values')->toArray()
        );

        // reset values
        SchoolValue::where('about_id', $about->id)->delete();

        if (!empty($data['values'])) {
            foreach ($data['values'] as $value) {
                SchoolValue::create([
                    'about_id' => $about->id,
                    'name' => $value['name'],
                    'description' => $value['description'] ?? null,
                ]);
            }
        }

        return back()->with('success', 'About updated');
    }



    /* ================= PRINCIPAL ================= */
    public function updatePrincipal(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:18',
            'photo' => 'required|string',
            'position' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        PrincipalMessage::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Sambutan updated');
    }


    /* ================= STATS ================= */
    public function updateStats(Request $request)
    {
        $data = $request->validate([
            'stats' => 'required|array',
            'stats.*.key' => 'required|string|exists:stats,key',
            'stats.*.value' => 'required|integer|min:0',
        ]);

        foreach ($data['stats'] as $statData) {
            Stat::where('key', $statData['key'])
                ->update([
                    'value' => $statData['value'],
                ]);
        }

        return back()->with('success', 'Statistik berhasil diperbarui');
    }



    /* ================= SCHOOL INFO ================= */
    public function updateSchool(Request $request)
    {
        $data = $request->validate([
            'short_name' => 'required|string|max:100',
            'full_name' => 'required|string|max:100',
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