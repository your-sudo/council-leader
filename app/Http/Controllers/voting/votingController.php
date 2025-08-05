<?php

namespace App\Http\Controllers\voting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Kandidat;

class votingController extends Controller
{
    public function voting(request $request) {


    }

    public function kandidat(){
        $semuakandidat = Kandidat::all();
        [$caksis, $cawaksis] = $semuakandidat->partition(function ($kandidat){
            return $kandidat->calon_jabatan === 'caksis';

        });
        return view('voting.dashboard', [
            'caksis' => $caksis,
            'cawaksis'=>$cawaksis,

        ]);
    }
     public function submitVote(Request $request)
    {
        $request->validate([
            'kandidat_id'       => 'required|integer|exists:kandidats,id',
            'calon_jabatan'     => 'required|string|exists:kandidats,calon_jabatan',
        ]);

        if ($request->calon_jabatan === 'caksis' && session()->has('voted_caksis')) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah memberikan suara untuk caksis.'
            ], 403);
        }

        if ($request->calon_jabatan === 'cawaksis' && session()->has('voted_cawaksis')) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah memberikan suara untuk cawaksis.'
            ], 403);
        }

        $kandidat = Kandidat::find($request->kandidat_id);

        if (!$kandidat) {
            return response()->json(['success' => false, 'message' => 'Kandidat tidak ditemukan.'], 404);
        }

        if ($kandidat->calon_jabatan !== $request->calon_jabatan) {
             return response()->json(['success' => false, 'message' => 'Jabatan kandidat tidak sesuai.'], 400);
        }

        $kandidat->increment('jumlah_suara');
        
        if ($request->calon_jabatan === 'caksis') {
            session(['voted_caksis' => $kandidat->id]);
        } elseif ($request->calon_jabatan === 'cawaksis') {
            session(['voted_cawaksis' => $kandidat->id]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Vote Anda berhasil dihitung!'
        ]);
    }
}

