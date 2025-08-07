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
        $paslon = Kandidat::all();
        return view('voting.dashboard', [
            'paslon' => $paslon,
            
        ]);
    }
     public function submitVote(Request $request)
    {
        $request->validate([
            'kandidat_id'       => 'required|integer|exists:kandidats,id',
        ]);

        

        $kandidat = Kandidat::find($request->kandidat_id);

        if (!$kandidat) {
            return response()->json(['success' => false, 'message' => 'Kandidat tidak ditemukan.'], 404);
        }

        

        $kandidat->increment('jumlah_suara');
        
        if ($request->id === 'caksis') {
            session(['voted_caksis' => $kandidat->id]);
        

        return response()->json([
            'success' => true,
            'message' => 'Vote Anda berhasil dihitung!'
        ]);
    }
}

