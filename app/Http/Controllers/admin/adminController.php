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
            'program_kerja' => 'required|string|max:1000',

        ]);
        $fotoPath = $request->file('foto')->store('kandidat', 'public');
        Kandidat::create([
            'nama' => $request->nama,
            'foto' => $fotoPath,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'program_kerja' => $request->program_kerja,
            'jumlah_suara' => 0,
        ]);

        return redirect()->route('manajemenkandidat');

    }

public function showManajemenSiswa()
{
    $siswa = \App\Models\User::all();
    return view('adminPage.manajemenSiswa', [
        'siswa' => $siswa,
    ]);
}

public function deletePaslon($id)
{
    $kandidat = Kandidat::findOrFail($id);
    $kandidat->delete();

    return redirect()->route('manajemenkandidat')->with('success', 'Kandidat deleted successfully!');
}

    public function editKandidat(Request $request, $id) {
        $kandidat = Kandidat::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5200',
            'visi' => 'required|string|max:1000',
            'misi' => 'required|string|max:1000',
            'program_kerja' => 'required|string|max:1000',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kandidat', 'public');
            $kandidat->foto = $fotoPath;
        }

        $kandidat->nama = $request->nama;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->jumlah_suara = $kandidat->jumlah_suara;
        $kandidat->program_kerja = $request->program_kerja;
        $kandidat->save();

        dd("Kandidat updated successfully!");
        
    }
    public function showEditKandidatForm($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return view('adminPage.editKandidat', [
            'kandidat' => $kandidat,
        ]);
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
