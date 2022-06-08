<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Team;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main()
    {
        $testimoni = Testimoni::limit(5)->get();
        return view('pages.main',['testimoni' => $testimoni]);
    }
    public function about()
    {
        $team = Team::inRandomOrder()->get();
        return view('pages.about',['team'=> $team]);
    }
}
