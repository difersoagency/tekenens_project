<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.dashboard.dashboard-02');
    }

    public function show_home()
    {
        return view('admin.home.show');
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

    public function create_portofolio()
    {
        return view('admin.portofolio.create');
    }

    public function show_job_vacancy()
    {
        return view('admin.job_vacancy.show');
    }

    public function create_job_vacancy()
    {
        return view('admin.job_vacancy.create');
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

        if ($request->hasFile('photo')) {
            $photo_name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->store('public');
        } else {
            $photo_name = NULL;
            $path = NULL;
        }


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

    public function edit_team($id)
    {
        $data = Team::find($id);
        return view('admin.team.edit', ['data' => $data]);
    }
    public function update_team(Request $request, $id)
    {
        if ($request->check_image == 0) {
            $team = Team::find($id);
            $team->name = $request->name;
            $team->role = $request->role;
            $team->status = $request->status;
            $team = $team->save();
        } else if ($request->check_image == 1) {

            if ($request->hasFile('photo')) {
                $photo_name = $request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->store('public');
            } else {
                $photo_name = NULL;
                $path = NULL;
            }

            $team = Team::find($id);
            $team->name = $request->name;
            $team->role = $request->role;
            $team->photo = $photo_name;
            $team->path = $path;
            $team->status = $request->status;
            $team = $team->save();
        } else if ($request->check_image == 2) {
            $team = Team::find($id);
            $team->name = $request->name;
            $team->role = $request->role;
            $team->photo = NULL;
            $team->path = NULL;
            $team->status = $request->status;
            $team = $team->save();
        }


        if ($team) {
            return redirect()->back()->with('success', "Data updated successfully");
        } else {
            return redirect()->back()->with('error', "Unable to update data, please check your form");
        }
    }
}
