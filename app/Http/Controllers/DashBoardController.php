<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Portofolio;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use carbon\Carbon;

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
        $c = Category::all();
        return view('admin.article.create', ['c' => $c]);
    }

    public function store_article(Request $r)
    {
        if ($r->hasFile('thumbnail')) {
            $md5Name = md5_file($r->file('thumbnail')->getRealPath());
            $guessExtension = $r->file('thumbnail')->guessExtension();
            $file = $r->file('thumbnail')->storeAs('/public/assets/images/article', $md5Name . '.' . $guessExtension);
        }
        $c = Article::create([
            'user_id' => Auth::user()->id,
            'slug' => $r->slug,
            'title' => $r->title,
            'content' => $r->content,
            'og_image' => $md5Name . '.' . $guessExtension,
            'meta_desc' => $r->summary,
            'status' => $r->status,
        ]);

        if ($c) {
            $article = Article::findOrFail($c->id);
            $article->Category()->attach($r->category_id);
        }
        if ($c) {
            return redirect()->back()->with('success', "Data created successfully");
        } else {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        }
    }

    public function show_portofolio()
    {
        return view('admin.portofolio.show');
    }

    public function create_portofolio()
    {
        $c = Category::all();
        return view('admin.portofolio.create', ['c' => $c]);
    }

    public function store_portofolio(Request $r)
    {
        $c = Portofolio::create([
            'publish_date' => Carbon::createFromFormat('m/d/Y', $r->published_date)->format('Y-m-d'),
            'slug' => $r->slug,
            'title' => $r->project_name,
            'description' => $r->description,
            'status' => $r->status,
        ]);

        if ($c) {
            $portofolio = Portofolio::findOrFail($c->id);
            $portofolio->Category()->attach($r->category_id);
        }
        if ($c) {
            return redirect()->back()->with('success', "Data created successfully");
        } else {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        }
    }

    public function show_job_vacancy()
    {
        return view('admin.job_vacancy.show');
    }

    public function create_job_vacancy()
    {
        return view('admin.job_vacancy.create');
    }

    public function store_job_vacancy(Request $r)
    {
        if ($r->hasFile('thumbnail')) {
            $md5Name = md5_file($r->file('thumbnail')->getRealPath());
            $guessExtension = $r->file('thumbnail')->guessExtension();
            $file = $r->file('thumbnail')->storeAs('/public/assets/images/article', $md5Name . '.' . $guessExtension);
        }
        $c = JobVacancy::create([
            'title' => $r->title,
            'slug' => $r->slug,
            'photo' => $md5Name . '.' . $guessExtension,
            'description' => $r->content,
            'email' => $r->email,
            'status' => $r->status,
        ]);
        if ($c) {
            return redirect()->back()->with('success', "Data created successfully");
        } else {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        }
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

    public function show_contact()
    {
        $data = Contact::find(1);
        return view('admin.contact.show', ['data' => $data]);
    }

    public function update_contact(Request $request, $type, $id)
    {

        if ($type == 'email') {
            $contact = Contact::find($id);
            $contact->email = $request->email;
            $contact = $contact->save();

            if ($contact) {
                return redirect()->back()->with('success', "Email updated successfully");
            } else {
                return redirect()->back()->with('error', "Unable to update data, please check your form");
            }
        } else if ($type == 'instagram') {
            $contact = Contact::find($id);
            $contact->instagram = $request->instagram;
            $contact = $contact->save();

            if ($contact) {
                return redirect()->back()->with('success', "Instagram updated successfully");
            } else {
                return redirect()->back()->with('error', "Unable to update data, please check your form");
            }
        } else if ($type == 'phone_number') {
            $contact = Contact::find($id);
            $contact->phone_number = $request->phone_number;
            $contact = $contact->save();

            if ($contact) {
                return redirect()->back()->with('success', "Phone Number updated successfully");
            } else {
                return redirect()->back()->with('error', "Unable to update data, please check your form");
            }
        } else if ($type == 'address') {
            $contact = Contact::find($id);
            $contact->address = $request->address;
            $contact = $contact->save();

            if ($contact) {
                return redirect()->back()->with('success', "Address updated successfully");
            } else {
                return redirect()->back()->with('error', "Unable to update data, please check your form");
            }
        }
    }
}
