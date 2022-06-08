<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main()
    {
        return view('pages.main');
    }
    public function about()
    {
        $team = Team::inRandomOrder()->get();
        return view('pages.about',['team'=> $team]);
    }
}
