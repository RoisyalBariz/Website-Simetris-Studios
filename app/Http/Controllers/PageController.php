<?php

namespace App\Http\Controllers;

use App\Models\HairArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Menampilkan Tampilan Login
class PageController extends Controller
{
    public function home()
    {
        $artists = HairArtist::all();
        return view('homepage', ["artists" => $artists]);
    }
}
