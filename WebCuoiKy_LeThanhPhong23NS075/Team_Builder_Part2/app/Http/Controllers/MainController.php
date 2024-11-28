<?php

namespace App\Http\Controllers;

use App\Models\DataAnime;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $animes = DataAnime::all(); 
        return view('main', compact('animes'));
    }
}
