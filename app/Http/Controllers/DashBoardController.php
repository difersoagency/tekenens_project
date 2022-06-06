<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Portofolio;
use App\Models\JobVacancy;
use App\Models\Partner;
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
        $partner = Partner::all();
        return view('admin.home.show', ['partner' => $partner]);
    }

    public function show_article()
    {
        $s = Article::all();
        return view('admin.article.show', ['s' => $s]);
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
            $file = $r->file('thumbnail')->storeAs('/public/images/article', $md5Name . '.' . $guessExtension);
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

    public function edit_article($id)
    {
        $c = Category::all();
        $a = Article::find($id);
        return view('admin.article.edit', ['id' => $id, 'c' => $c, 'a' => $a]);
    }

    public function update_article($id, Request $r)
    {
        $a = Article::find($id);

        if ($r->hasFile('thumbnail')) {
            if ($r->thumbnail != $a->thumbnail) {
                unlink(storage_path('app/public/images/article/' . $a->og_image));
                $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                $guessExtension = $r->file('thumbnail')->guessExtension();
                $file = $r->file('thumbnail')->storeAs('/public/images/article', $md5Name . '.' . $guessExtension);

                $a->og_image = $md5Name . '.' . $guessExtension;
            }
        }
        $a->user_id = Auth::user()->id;
        $a->slug = $r->slug;
        $a->title = $r->title;
        $a->content = $r->content;
        $a->meta_desc = $r->summary;
        $a->status = $r->status;
        $c = $a->save();

        if ($c) {
            $article = Article::findOrFail($id);
            $article->Category()->sync($r->category_id);
        }
        if ($c) {
            return redirect()->back()->with('success', "Data updated successfully");
        } else {
            return redirect()->back()->with('error', "Unable to update data, please check your form");
        }
    }

    public function delete_article(Request $r)
    {
        $a = Article::find($r->id)->delete();
        if ($a) {
            return response()->json(['info' => 'success', 'msg' => 'Article successfully deleted']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Error on Delete the Article']);
        }
    }

    public function show_portofolio()
    {
        $s = Portofolio::all();
        return view('admin.portofolio.show', ['s' => $s]);
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
        $j = JobVacancy::all();
        return view('admin.job_vacancy.show', ['j' => $j]);
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
            $file = $r->file('thumbnail')->storeAs('/public/images/job_vacancy', $md5Name . '.' . $guessExtension);
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

    public function edit_job_vacancy($id)
    {
        $j = JobVacancy::find($id);
        return view('admin.job_vacancy.edit', ['id' => $id, 'j' => $j]);
    }

    public function update_job_vacancy(Request $r, $id)
    {
        $j = JobVacancy::find($id);

        if ($r->hasFile('thumbnail')) {
            if ($r->thumbnail != $j->thumbnail) {
                if ($j->thumbnail != "") {
                    unlink(storage_path('app/public/images/job_vacancy/' . $j->photo));
                }
                $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                $guessExtension = $r->file('thumbnail')->guessExtension();
                $file = $r->file('thumbnail')->storeAs('/public/images/job_vacancy', $md5Name . '.' . $guessExtension);

                $j->photo = $md5Name . '.' . $guessExtension;
            }
        }

        $j->title = $r->title;
        $j->slug = $r->slug;
        $j->photo = $md5Name . '.' . $guessExtension;
        $j->description = $r->content;
        $j->email = $r->email;
        $j->status = $r->status;
        $u = $j->save();

        if ($u) {
            return redirect()->back()->with('success', "Data updated successfully");
        } else {
            return redirect()->back()->with('error', "Unable to update data, please check your form");
        }
    }

    public function delete_job_vacancy(Request $r)
    {
        $a = JobVacancy::find($r->id)->delete();
        if ($a) {
            return response()->json(['info' => 'success', 'msg' => 'Job Vacancy successfully deleted']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Error on Delete the Job Vacancy']);
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
            $photo = $request->file('photo')->store('images\team');
        } else {
            $photo = NULL;
        }

        $data = Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'photo' => $photo,
            'status' => $request->status,
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

    public function store_partner(Request $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('images\partner');
        } else {
            $photo = NULL;
        }

        $data = Partner::create([
            'name' => $request->partner,
            'photo' => $photo,

        ]);
        if ($data) {
            return redirect()->back()->with('success', "Partner created successfully");
        } else {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        }
    }

    public function edit_partner($id)
    {
        $data = Partner::find($id);
        return view('admin.partner.edit_partner', ['data' => $data]);
    }

    public function update_partner(Request $request, $id)
    {

        if ($request->hasFile('photo')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $photo = $request->file('photo')->store('images\partner');
        } else {
            if ($request->old_image) {
                $photo =  $request->old_image;
            } else {
                $photo = NULL;
            }
        }
        $partner = Partner::find($id);
        $partner->name = $request->partner;
        $partner->photo = $photo;
        $partner = $partner->save();

        if ($partner) {
            return redirect()->back()->with('success', "Partner created successfully");
        } else {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        }
    }

    public function create_partner()
    {
        return view('admin.partner.create_partner');
    }

    public function delete_partner(Request $request)
    {
        $partner = Partner::find($request->id);

        if ($partner->photo != '') {
            Storage::delete($partner->photo);
        }

        $partner = $partner->delete();


        if ($partner) {
            return response()->json(['info' => 'success', 'msg' => 'Job Vacancy successfully deleted']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Error on Delete the Job Vacancy']);
        }
    }
}
