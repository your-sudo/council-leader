<?php

namespace App\Http\Controllers\admin;

use App\Models\Kandidat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function tambahKandidat(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5200',
            'visi' => 'required|string|max:1000',
            'misi' => 'required|string|max:1000',

        ]);
        $fotoPath = $request->file('foto')->store('kandidat', 'public');
        Kandidat::create([
            'nama' => $request->nama,
            'foto' => $fotoPath,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'jumlah_suara' => 0, 
        ]);

        dd("Kandidat added successfully!");
        return redirect()->route('manajemenkandidat');

    }

    public function editKandidat(Request $request, $id) {
        $kandidat = Kandidat::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5200',
            'visi' => 'required|string|max:1000',
            'misi' => 'required|string|max:1000',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kandidat', 'public');
            $kandidat->foto = $fotoPath;
        }

        $kandidat->nama = $request->nama;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->save();

        dd("Kandidat updated successfully!");
        
    }
    public function dashboardadmin()
    {
        $jumlahuser = \App\Models\User::count();
        $jumlahsudahvote = \App\Models\Vote::whereNotNull('user_id')->count();
        $persentase = $jumlahsudahvote / $jumlahuser * 100;
        $kandidatunggul = Kandidat::orderBy('jumlah_suara', 'desc')->select('id')->first();
        if (!empty($kandidatunggul)) {
            $kandidatunggul = $kandidatunggul->id;
        } else {
            $kandidatunggul = 0;
        }

        $paslonchart = Kandidat::orderBy('jumlah_suara', 'desc')->first();

        if(!$paslonchart) {
            $paslonchart = (object) ['nama' => 'belum ada data', 'jumlah_suara' => 0];
        }


        return view('adminPage.dashboardAdmin', [
            'jumlahuser' => $jumlahuser,
            'jumlahsudahvote' => $jumlahsudahvote,
            'persentase' => $persentase,
            'kandidatunggul' => $kandidatunggul,
            'paslonchart' => $paslonchart,
        ]);

    }

    public function tambahKandidatForm()
    {
        return view('adminPage.tambahKandidat');
        
    }
    public function showManajemenKandidat()
    {
         $paslon = Kandidat::all();
        return view('adminPage.manajemenKandidat', [
            'paslon' => $paslon,
        ]);
        
        
    }
}
