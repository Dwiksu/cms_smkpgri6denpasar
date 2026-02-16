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
        // dd( About::with('schoolValues')->first());
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
            'hero.title' => 'required|string|max:255',
            'hero.subtitle' => 'required|string|max:255',
            'hero.tagline' => 'nullable|string|max:255',
            'hero.cta_text' => 'required|string|max:100',
            'hero.cta_link' => 'required|string|max:255',
            'hero.background_image' => 'required|string',
        ], [
            'hero.title.required' => 'Judul harus diisi',
            'hero.subtitle.required' => 'Sub judul harus diisi',
            'hero.cta_text.required' => 'Teks tombol harus diisi',
            'hero.cta_link.required' => 'Link tombol harus diisi',
        ]);

        Hero::updateOrCreate(['id' => 1], $data['hero']);

        return back()
        ->with('success', 'Hero berhasil diubah')
        ->with('tab', 'hero');
    }

    /* ================= ABOUT ================= */
    public function updateAbout(Request $request)
    {
        $data = $request->validate([
            'about.title' => 'required|string',
            'about.description' => 'required|string',
            'about.history' => 'nullable|string',
            'about.vision' => 'required|string',
            'about.mission' => 'required|array',
            'about.mission.*' => 'required|string',
            'about.image' => 'nullable|string',
            'about.values' => 'nullable|array',
            'about.values.*.name' => 'nullable|string',
            'about.values.*.description' => 'nullable|string',
        ], [
            'about.title.required' => 'Judul harus diisi',
            'about.description.required' => 'Deskripsi harus diisi',
            'about.vision.required' => 'Visi harus diisi',
            'about.mission.required' => 'Misi harus diisi',
            'about.mission.*.required' => 'Misi harus diisi',
        ]);

        $about = About::updateOrCreate(
            ['id' => 1],
            collect($data['about'])->except('values')->toArray()
        );

        // reset values
        SchoolValue::where('about_id', $about->id)->delete();

        if (!empty($data['about']['values'])) {
            foreach ($data['about']['values'] as $value) {
                SchoolValue::create([
                    'about_id' => $about->id,
                    'name' => $value['name'],
                    'description' => $value['description'] ?? null,
                ]);
            }
        }

        return back()
        ->with('tab', 'about')
        ->with('success', 'About berhasil diubah');
    }



    /* ================= PRINCIPAL ================= */
    public function updatePrincipal(Request $request)
    {
        $data = $request->validate([
            'principal.name' => 'required|string|max:255',
            'principal.photo' => 'required|string',
            'principal.message' => 'required|string',
        ], [
            'principal.name.required' => 'Nama harus diisi',
            'principal.photo.required' => 'Foto harus diisi',
            'principal.message.required' => 'Pesan harus diisi',
        ]);

        PrincipalMessage::updateOrCreate(['id' => 1], $data['principal']);

        return back()
        ->with('tab', 'principal')
        ->with('success', 'Sambutan berhasil diubah');
    }


    /* ================= STATS ================= */
    public function updateStats(Request $request)
    {
        $data = $request->validate([
            'stats' => 'required|array',
            'stats.*.key' => 'required|string|exists:stats,key',
            'stats.*.value' => 'required|integer|min:0',
        ], [
            'stats.required' => 'Statistik harus diisi',
            'stats.*.key.required' => 'Statistik harus diisi',
            'stats.*.value.required' => 'Statistik harus diisi',
            'stats.*.value.integer' => 'Statistik harus berupa angka',
        ]);

        foreach ($data['stats'] as $statData) {
            Stat::where('key', $statData['key'])
                ->update([
                    'value' => $statData['value'],
                ]);
        }

        return back()
        ->with('tab', 'stats')
        ->with('success', 'Statistik berhasil diperbarui');
    }



    /* ================= SCHOOL INFO ================= */
    public function updateSchool(Request $request)
    {
        $data = $request->validate([
            'short_name' => 'required|string|max:100',
            'full_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'office_phone' => 'nullable|string|max:18',
            'whatsapp_phone' => 'nullable|string|max:18',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'ppdb_link' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
        ], [
            'short_name.required' => 'Nama singkat harus diisi',
            'full_name.required' => 'Nama lengkap harus diisi',
            'address.required' => 'Alamat harus diisi',
            'email.email' => 'Format email tidak valid',
            'office_phone.max' => 'Nomor telepon maksimal 18 karakter',
            'whatsapp_phone.max' => 'Nomor telepon maksimal 18 karakter',
        ]);

        School::updateOrCreate(['id' => 1], $data);

        return back()
        ->with('tab', 'info')
        ->with('success', 'Info sekolah berhasil diubah');
    }
}