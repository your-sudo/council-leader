<?php

namespace App\Http\Controllers\voting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandidat;
// It's good practice to import the Auth facade if you plan to use user-based voting
use Illuminate\Support\Facades\Auth;

class votingController extends Controller
{
    /**
     * Display the voting dashboard with all candidates.
     */
    public function kandidat()
    {
        $paslon = Kandidat::all();
        return view('voting.dashboard', [
            'paslon' => $paslon,
        ]);
    }

    /**
     * Handle the submission of a vote.
     */
    public function submitVote(Request $request)
    {
        $request->validate([
            'kandidat_id' => 'required|integer|exists:kandidats,id',
        ]);

        if ($request->session()->has('voted_paslon')) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah memberikan suara untuk pemilihan ini.'
            ], 403); 
        }

        $kandidat = Kandidat::find($request->kandidat_id);
        
        if (!$kandidat) {
            return response()->json(['success' => false, 'message' => 'Kandidat tidak ditemukan.'], 404);
        }

        $kandidat->increment('jumlah_suara');
        
        $request->session()->put('voted_paslon', $kandidat->id);

        return response()->json([
            'success' => true,
            'message' => 'Suara Anda untuk ' . $kandidat->nama . ' telah berhasil dicatat!'
        ]);
    }
}