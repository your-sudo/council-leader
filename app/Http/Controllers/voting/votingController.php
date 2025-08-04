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
        $kandidat = Kandidat::all();
        dd($kandidat);


    }

}

