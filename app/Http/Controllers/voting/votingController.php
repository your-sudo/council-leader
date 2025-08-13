<?php

namespace App\Http\Controllers\voting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Models\User;
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
        $user = Auth::user();
        $uservote = $user->
        $request->validate([
            'kandidat_id' => 'required|integer|exists:kandidats,id',
        ]);

        if ($user->vote_status === 'belum') {
            $kandidat->increment('jumlah_suara');
            return response()->json([
            'success' => true,
            'message' => 'Suara Anda untuk ' . $kandidat->nama . ' telah berhasil dicatat!'
            ]);
            } else {

            return response()->json([
                'success' => false,
                'message' => 'Anda sudah memberikan suara.'
            ], 403); // 403 Forbidden
        
        }
        

        $kandidat = Kandidat::find($request->kandidat_id);
        
        if (!$kandidat) {
            return response()->json(['success' => false, 'message' => 'Kandidat tidak ditemukan.'], 404);
        }

        
        

        
        
    }
}