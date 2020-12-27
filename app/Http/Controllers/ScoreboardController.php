<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreboardController extends Controller
{
    public function control_papan(){
        return view('scoreboard/control_papan');
    }

    public function tampilan_papan(){
        return view('scoreboard/tampilan_papan');
    }
}
