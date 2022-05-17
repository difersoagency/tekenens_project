<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('admin.dashboard.default');
    }

    public function dashboard()
    {
        return view('admin.dashboard.default');
    }

    public function show_article()
    {
        return view('admin.article.show');
    }

    public function create_article()
    {
        return view('admin.article.create');
    }

    public function show_portofolio()
    {
        return view('admin.portofolio.show');
    }
    public function show_team()
    {
        $data = Team::all();
        return view('admin.team.show', ['data' => $data]);
    }
    public function create_team()
    {
        return view('admin.team.create');
    }
    public function store_team(Request $request)
    {

        $photo_name = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->store('public');

        $data = Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'photo' => $photo_name,
            'status' => $request->status,
            'path' => $path
        ]);
        if ($data) {
            return redirect()->back()->with('success', "Data created successfully");
        } else {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        }
    }
}
