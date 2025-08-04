<?php

namespace App\Http\Controllers\voting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vote;
use App\Models\Kandidat;

class votingController extends Controller
{
    public function voting(request $request) {


    }

    public function kandidat(){
        $semuakandidat = Kandidat::all();
        [$caksis, $cawaksis] = $semuakandidat->partition(function ($kandidat){
            return $kandidat->calon_jabaran === 'caksis';

        });
        return view('voting.dashboard', [
            'caksis' => $caksis,
            'cawaksis'=>$cawaksis,

        ]);
    }

}

