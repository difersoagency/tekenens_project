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
use App\Models\Page;
use App\Models\DetailPageDesc;
use App\Models\DetailPortofolio;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $portofolio = Portofolio::limit(5)->get();
        $article = Article::limit(5)->get();
        return view('admin.dashboard.show', ['p' => $portofolio, 'a' => $article]);
    }

    public function show_home()
    {
        $partner = Partner::all();
        $p = Page::where('page_name', 'Home')->first();
        $dp = DetailPageDesc::whereHas('Page', function ($q) {
            $q->where('page_name', 'Home');
        })->get();
        return view('admin.home.show', ['p' => $p, 'dp' => $dp, 'partner' => $partner]);
    }

    public function create_home_description()
    {
        return view('admin.home.description.create');
    }

    public function store_home_description(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'title' => ['required'],
            'thumbnail' => ['required','mimes:png,jpg,jpeg', 'max:5120'],
            'content' => ['required']
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        }
        else{
            $p = Page::where('page_name', '=', 'Home')->first();
            if(isset($p)) {
                if ($r->hasFile('thumbnail')) {
                    $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                    $guessExtension = $r->file('thumbnail')->guessExtension();
                    $file = $r->file('thumbnail')->storeAs('/public/images/home/', $md5Name . '.' . $guessExtension);
                }

                $c = DetailPageDesc::create([
                    'page_id' => $p->id,
                    'title' => $r->title,
                    'description' => $r->content,
                    'media' => $md5Name . '.' . $guessExtension
                ]);

                if ($c) {
                    return redirect()->back()->with('success', "Data created successfully");
                } else {
                    return redirect()->back()->with('error', "Unable to create data, please check your form");
                }
            } else {
                $c = Page::create([
                    'page_name' => 'Home'
                ]);

                if ($r->hasFile('thumbnail')) {
                    $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                    $guessExtension = $r->file('thumbnail')->guessExtension();
                    $file = $r->file('thumbnail')->storeAs('/public/images/home/', $md5Name . '.' . $guessExtension);
                }

                $cd = DetailPageDesc::create([
                    'page_id' => $c->id,
                    'title' => $r->title,
                    'description' => $r->content,
                    'media' => $md5Name . '.' . $guessExtension
                ]);

                if ($cd) {
                    return redirect()->back()->with('success', "Data created successfully");
                } else {
                    return redirect()->back()->with('error', "Unable to create data, please check your form");
                }
            }
        }
    }

    public function edit_home_description($id)
    {
        $dp = DetailPageDesc::find($id);
        return view('admin.home.description.edit', ['id' => $id, 'dp' => $dp]);
    }

    public function update_home_description(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'title' => ['required'],
            'content' => ['required']
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error', "Unable to update data, please check your form");
        }
        else{
            $dp = DetailPageDesc::find($id);
            if ($r->hasFile('thumbnail')) {
                if ($r->thumbnail != $dp->media) {
                    unlink(storage_path('app/public/images/home/' . $dp->og_image));
                    $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                    $guessExtension = $r->file('thumbnail')->guessExtension();
                    $file = $r->file('thumbnail')->storeAs('/public/images/home/', $md5Name . '.' . $guessExtension);

                    $dp->media = $md5Name . '.' . $guessExtension;
                }
            }

            $dp->title = $r->title;
            $dp->description = $r->content;
            $c = $dp->save();

            if ($c) {
                return redirect()->back()->with('success', "Data updated successfully");
            } else {
                return redirect()->back()->with('error', "Unable to update data, please check your form");
            }
        }
    }

    public function delete_home_description(Request $r)
    {
        $a = DetailPageDesc::find($r->id);
        unlink(storage_path('app/public/images/home/' . $a->og_image));
        $d = $a->delete();
        if ($d) {
            return response()->json(['info' => 'success', 'msg' => 'Description successfully deleted']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Error on Delete the Description']);
        }
    }

    public function edit_home_video()
    {
        $dp = Page::where('page_name', 'Home')->first();
        return view('admin.home.video.edit', ['dp' => $dp]);
    }

    public function update_home_video(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'video_home' => ['required','mimes:mp4,mpg', 'max:10200'],
        ]);

        if($validator->fails()){
            return redirect()->back()->with('error', "Unable to update video, please check your form");
        }
        else
        {
            $u = "";
            $pid = Page::where('page_name', '=', 'Home')->first();
            if(isset($pid)){
                $p = Page::find($pid->id);
                if ($r->hasFile('video_home')) {
                    if ($r->video_home != $pid->media) {
                        if($pid->media != NULL){
                            unlink(storage_path('app/public/images/home/' . $pid->media));
                        }

                        $md5Name = md5_file($r->file('video_home')->getRealPath());
                        $guessExtension = $r->file('video_home')->guessExtension();
                        $file = $r->file('video_home')->storeAs('/public/images/home/', $md5Name . '.' . $guessExtension);

                        $p->media = $md5Name . '.' . $guessExtension;

                    }
                }

                $u = $p->save();

                if ($u) {
                    return redirect()->back()->with('success', "Video updated successfully");
                } else {
                    return redirect()->back()->with('error', "Unable to update video, please check your form");
                }
            } else{
                if ($r->hasFile('video_home')) {
                    $md5Name = md5_file($r->file('video_home')->getRealPath());
                    $guessExtension = $r->file('video_home')->guessExtension();
                    $file = $r->file('video_home')->storeAs('/public/images/home/', $md5Name . '.' . $guessExtension);
                }
                $c = Page::create([
                    'page_name' => 'Home',
                    'media' => $md5Name . '.' . $guessExtension
                ]);

                if ($c) {
                    return redirect()->back()->with('success', "Video inserted successfully");
                } else {
                    return redirect()->back()->with('error', "Unable to insert video, please check your form");
                }
            }
        }
    }

    public function show_about(){
        $p = DetailPageDesc::whereHas('Page', function($q){
            $q->where('page_name', 'About');
        })->first();
        return view('admin.about.show', ['p' => $p]);
    }

    public function edit_about(){
        $p = DetailPageDesc::whereHas('Page', function($q){
            $q->where('page_name', 'About');
        })->first();
        return view('admin.about.edit2', ['p' => $p]);
    }

    public function update_about(Request $r)
    {
        $bool = true;
        // $validator = Validator::make($r->all(), [
        //     'summary' => ['required'],
        //     'photo' => ['required','mimes:jpg,jpeg,png', 'max:5120'],
        //     'description' => ['required'],
        // ]);

        // if($validator->fails()){
        //     return redirect()->back()->with('error', "Unable to update page, please check your form");
        // }
        // else{
            $u = "";
            $pid = Page::where('page_name', '=', 'About')->first();
            if($pid){
                $validator = Validator::make($r->all(), [
                    'summary' => ['required'],
                    'description' => ['required'],
                ]);
        
                if($validator->fails()){
                    return redirect()->back()->with('error', "Unable to update page, please check your form");
                }
                else
                {
                    $p = Page::find($pid->id);
                    if ($r->hasFile('photo')) {
                        if ($r->photo != $pid->media) {
                            if($pid->media != NULL){
                                unlink(storage_path('app/public/images/about/' . $pid->media));
                            }

                            $md5Name = md5_file($r->file('photo')->getRealPath());
                            $guessExtension = $r->file('photo')->guessExtension();
                            $file = $r->file('photo')->storeAs('/public/images/about/', $md5Name . '.' . $guessExtension);

                            $p->media = $md5Name . '.' . $guessExtension;

                        }
                    }

                    $p->meta_desc = $r->summary;
                    $u = $p->save();
                    $test = "";
                    if($u){
                        $dpd = DetailPageDesc::where('page_id', $pid->id)->first();
                        $ud = DetailPageDesc::find($dpd->id);
                        $ud->title = 'About';
                        $ud->description = $r->description;
                        $us = $ud->save();
                        if(!$us){
                            $bool = false;
                            $test = "We are unable to save the new Description.";
                        }
                    }
                    else{
                        $bool = false;
                        $test = "We are unable to Update the new Media and Summary";
                    }

                    if ($bool == true) {
                        return redirect()->back()->with('success', "About page updated successfully");
                    } else {
                        return redirect()->back()->with('error', "Unable to update About page, please check your form. ". $test);
                    }
                }
            }
            else{
                $validator = Validator::make($r->all(), [
                    'summary' => ['required'],
                    'photo' => ['required','mimes:jpg,jpeg,png', 'max:5120'],
                    'description' => ['required'],
                ]);
        
                if($validator->fails()){
                    return redirect()->back()->with('error', "Unable to update page, please check your form");
                }
                else
                {
                    if ($r->hasFile('photo')) {
                        $md5Name = md5_file($r->file('photo')->getRealPath());
                        $guessExtension = $r->file('photo')->guessExtension();
                        $file = $r->file('photo')->storeAs('/public/images/about/', $md5Name . '.' . $guessExtension);
                    }
                    $c = Page::create([
                        'page_name' => 'About',
                        'media' => $md5Name . '.' . $guessExtension,
                        'meta_desc' => $r->summary
                    ]);

                    if($c){
                        $cd = DetailPageDesc::create([
                            'page_id' => $c->id,
                            'title' => 'About',
                            'description' => $r->description,
                        ]);
                        if(!$cd){
                            $bool = false;
                        }
                    } else {
                        $bool = false;
                    }


                    if ($bool == true) {
                        return redirect()->back()->with('success', "About page created successfully");
                    } else {
                        return redirect()->back()->with('error', "Unable to create About page, please check your form");
                    }
                }
            }
        // }
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
        $validator = Validator::make($r->all(), [
            'slug' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'thumbnail' => ['required','mimes:png,jpg,jpeg', 'max:5120'],
            'summary' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        } else {
            if ($r->hasFile('thumbnail')) {
                $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                $guessExtension = $r->file('thumbnail')->guessExtension();
                $r->file('thumbnail')->storeAs('/public/images/article/', $md5Name . '.' . $guessExtension);
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
    }

    public function edit_article($id)
    {
        $c = Category::all();
        $a = Article::find($id);
        return view('admin.article.edit', ['id' => $id, 'c' => $c, 'a' => $a]);
    }

    public function update_article($id, Request $r)
    {
        $validator = Validator::make($r->all(), [
            'slug' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'summary' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        } else {
            $a = Article::find($id);

            if ($r->hasFile('thumbnail')) {
                if ($r->thumbnail != $a->thumbnail) {
                    unlink(storage_path('app/public/images/article/' . $a->og_image));
                    $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                    $guessExtension = $r->file('thumbnail')->guessExtension();
                    $file = $r->file('thumbnail')->storeAs('/public/images/article/', $md5Name . '.' . $guessExtension);

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
    }

    public function delete_article(Request $r)
    {
        $a = Article::find($r->id);
        unlink(storage_path('app/public/images/article/' . $a->og_image));
        $d = $a->delete();
        if ($d) {
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
        $t = Team::all();
        return view('admin.portofolio.create', ['c' => $c, 't' => $t]);
    }

    public function storeMedia_portofolio(Request $r)
    {
        $path = storage_path('app/public/images/tmp');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if ($file = $r->file('file')[0]) {
            $file = $r->file('file')[0];
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $ext = $file->guessExtension();

            $file->move($path, $name);
            return response()->json([
                'name'          => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        }
    }

    public function store_portofolio(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'slug' => ['required'],
            'project_name' => ['required'],
            'description' => ['required'],
            'photo.*' => ['required'],
            'published_date' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        } else {
            $bool = true;
            $c = Portofolio::create([
                'publish_date' => Carbon::createFromFormat('m/d/Y', $r->published_date)->format('Y-m-d'),
                'slug' => $r->slug,
                'title' => $r->project_name,
                'description' => $r->description,
                'status' => $r->status,
            ]);

            if ($c) {
                $count =0;
                $portofolio = Portofolio::findOrFail($c->id);
                $portofolio->Category()->attach($r->category_id);
                $portofolio->Team()->attach($r->team_id);
                foreach ($r->input('photo', []) as $file) {
                    $dp = DetailPortofolio::create(['portofolio_id' => $c->id, 'title' => $r->slug.$count, 'media' => $file]);
                    Storage::move('public/images/tmp/'.$file, 'public/images/portofolio/'.$c->id.'/'.$file);
                    if(!$dp){
                        $bool = false;
                    }
                    $count++;
                }
                Storage::deleteDirectory('public/images/tmp', true);
            }

            if ($bool == true) {
                return redirect()->back()->with('success', "Data created successfully");
            } else {
                return redirect()->back()->with('error', "Unable to create data, please check your form");
            }
        }
    }

    public function showMedia_portofolio($id){
        $value = array();
        $count = 0;
        $dp = DetailPortofolio::where('portofolio_id', '=', $id)->get();
        foreach($dp as $i){
            $value[$count]['name'] = $i->media;
            $value[$count]['size'] = Storage::size('public/images/portofolio/'.$id.'/'.$i->media);
            $value[$count]['path'] = storage_path('app/public/images/portofolio/'.$id.'/'.$i->media);
            $count++;
        }
        return response()->json(['value' => $value]);
    }

    public function edit_portofolio($id){
        $p = Portofolio::find($id);
        $c = Category::all();
        $t = Team::all();
        return view('admin.portofolio.edit', ['id' => $id, 'p' => $p, 'c' => $c, 't'=> $t]);
    }

    public function update_portofolio(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'slug' => ['required'],
            'project_name' => ['required'],
            'description' => ['required'],
            'photo.*' => ['required'],
            'published_date' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        } else {
            $p = Portofolio::find($id);
            $p->publish_date = Carbon::createFromFormat('m/d/Y', $r->published_date)->format('Y-m-d');
            $p->slug = $r->slug;
            $p->title = $r->project_name;
            $p->description = $r->description;
            $p->status = $r->status;
            $u = $p->save();

            $bool = true;

            if ($u) {
                $portofolio = Portofolio::findOrFail($id);
                $portofolio->Category()->sync($r->category_id);
                $portofolio->Team()->sync($r->team_id);

                $dp = DetailPortofolio::where('portofolio_id', $id)->get();
                if (count($dp) > 0) {
                    foreach ($dp as $media) {
                        if (!in_array($media->media, $r->input('photo', []))) {
                            $dp = DetailPortofolio::where([['portofolio_id', '=', $id], ['media', '=', $media->media]])->delete();
                            unlink(storage_path('app/public/images/portofolio/'.$id.'/'.$media->media));
                            if(!$dp){
                                $bool = false;
                            }
                        }
                    }
                }
                $count = 0;
                $media = DetailPortofolio::where('portofolio_id', $id)->pluck('media')->toArray();
                foreach ($r->input('photo', []) as $file) {
                    if (!in_array($file, $media)) {
                        $dp = DetailPortofolio::create(['portofolio_id' => $id, 'title' => $r->slug.$count, 'media' => $file]);
                        Storage::move('public/images/tmp/'.$file, 'public/images/portofolio/'.$id.'/'.$file);
                        if(!$dp){
                            $bool = false;
                        }
                        $count++;
                    }
                }
                Storage::deleteDirectory('public/images/tmp', true);
            }
            if ($bool == true) {
                return redirect()->back()->with('success', "Data created successfully");
            } else {
                return redirect()->back()->with('error', "Unable to create data, please check your form");
            }
        }
    }

    public function delete_portofolio(Request $r)
    {
        $p = "";
        $dp = DetailPortofolio::where('portofolio_id', $r->id)->delete();
        if($dp){
            Storage::deleteDirectory('public/images/portofolio/'.$r->id, true);
            $p = Portofolio::find($r->id)->delete();
        }

        if ($p) {
            return response()->json(['info' => 'success', 'msg' => 'Portofolio successfully deleted']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Error on Delete the Portofolio']);
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
        $validator = Validator::make($r->all(), [
            'slug' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'thumbnail' => ['required', 'mimes:png,jpg,jpeg', 'max:5120'],
            'email' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        } else {
            if ($r->hasFile('thumbnail')) {
                $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                $guessExtension = $r->file('thumbnail')->guessExtension();
                $file = $r->file('thumbnail')->storeAs('/public/images/job_vacancy/', $md5Name . '.' . $guessExtension);
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
    }

    public function edit_job_vacancy($id)
    {
        $j = JobVacancy::find($id);
        return view('admin.job_vacancy.edit', ['id' => $id, 'j' => $j]);
    }

    public function update_job_vacancy(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'slug' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'email' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        }else{
            $j = JobVacancy::find($id);

            if ($r->hasFile('thumbnail')) {
                if ($r->thumbnail != $j->thumbnail) {
                    if ($j->thumbnail != "") {
                        unlink(storage_path('app/public/images/job_vacancy/' . $j->photo));
                    }
                    $md5Name = md5_file($r->file('thumbnail')->getRealPath());
                    $guessExtension = $r->file('thumbnail')->guessExtension();
                    $file = $r->file('thumbnail')->storeAs('/public/images/job_vacancy/', $md5Name . '.' . $guessExtension);

                    $j->photo = $md5Name . '.' . $guessExtension;
                }
            }

            $j->title = $r->title;
            $j->slug = $r->slug;
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
    }

    public function delete_job_vacancy(Request $r)
    {
        $j = JobVacancy::find($r->id);
        unlink(storage_path('app/public/images/job_vacancy/' . $j->photo));
        $d = $j->delete();
        if ($d) {
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

        $validator = Validator::make($request->all(), [
            'photo' => ['required','mimes:png,jpg,jpeg', 'max:2048'],
            'role' => ['required'],
            'name' => ['required'],
            'status' => ['required'],

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        } else {

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
            return redirect()->back()->with('success', "Partner created successfully");
        }

    }

    public function edit_team($id)
    {
        $data = Team::find($id);
        return view('admin.team.edit', ['data' => $data]);
    }
    public function update_team(Request $request, $id)
    {

        if($request->old_image == ''){
            $validator = Validator::make($request->all(), [
                'photo' => ['required','mimes:png,jpg,jpeg', 'max:2048'],
                'role' => ['required'],
                'name' => ['required'],
                'status' => ['required'],

            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'photo' => ['mimes:png,jpg,jpeg', 'max:2048'],
                'role' => ['required'],
                'name' => ['required'],
                'status' => ['required'],

            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to update data, please check your form");
        } else {

            if ($request->hasFile('photo')) {
                if ($request->old_image) {
                    Storage::delete($request->old_image);
                }
                $photo = $request->file('photo')->store('images\team');
            } else {
                if ($request->old_image) {
                    $photo =  $request->old_image;
                } else {
                    $photo = NULL;
                }
            }

            $team = Team::find($id);
                $team->name = $request->name;
                $team->role = $request->role;
                $team->status = $request->status;
                $team->photo = $photo;
                $team = $team->save();
            return redirect()->back()->with('success', "Data updated successfully");
        }

        // if ($request->check_image == 0) {
        //     $team = Team::find($id);
        //     $team->name = $request->name;
        //     $team->role = $request->role;
        //     $team->status = $request->status;
        //     $team = $team->save();
        // } else if ($request->check_image == 1) {

        //     if ($request->hasFile('photo')) {
        //         $photo_name = $request->file('photo')->getClientOriginalName();
        //         $path = $request->file('photo')->store('public');
        //     } else {
        //         $photo_name = NULL;
        //         $path = NULL;
        //     }

        //     $team = Team::find($id);
        //     $team->name = $request->name;
        //     $team->role = $request->role;
        //     $team->photo = $photo_name;
        //     $team->path = $path;
        //     $team->status = $request->status;
        //     $team = $team->save();
        // } else if ($request->check_image == 2) {
        //     $team = Team::find($id);
        //     $team->name = $request->name;
        //     $team->role = $request->role;
        //     $team->photo = NULL;
        //     $team->path = NULL;
        //     $team->status = $request->status;
        //     $team = $team->save();
        // }


        // if ($team) {
        //     return redirect()->back()->with('success', "Data updated successfully");
        // } else {
        //     return redirect()->back()->with('error', "Unable to update data, please check your form");
        // }
    }

    public function delete_team(Request $request)
    {
        $team = Team::find($request->id);

        if ($team->photo != '') {
            Storage::delete($team->photo);
        }

        $team = $team->delete();


        if ($team) {
            return response()->json(['info' => 'success', 'msg' => 'Team successfully deleted']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Error on Delete the Team']);
        }
    }

    public function show_contact()
    {
        $data = DB::table('contact')->first();
        return view('admin.contact.show', ['data' => $data]);
    }

    public function update_contact(Request $request,$id)
    {

        $validator = Validator::make($request->all(), [
            'address' => ['required'],
            'instagram' => ['required'],
            'youtube' => ['required'],
            'whatsapp' => ['required'],
            'email' => ['required'],
            'description' => ['required']

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to update data, please check your form");
        } else {

            $contact = Contact::find($id);
            $contact->address = $request->address;
            $contact->instagram = $request->instagram;
            $contact->youtube = $request->youtube;
            $contact->whatsapp = $request->whatsapp;
            $contact->email = $request->email;
            $contact->description = $request->description;
            $contact = $contact->save();

            return redirect()->back()->with('success', "Contact update successfully");
        }



    }

    public function store_partner(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'photo' => ['required','mimes:png,jpg,jpeg', 'max:2048'],
            'partner' => ['required']

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        } else {

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo')->store('images\partner');
            } else {
                $photo = NULL;
            }

            Partner::create([
                'name' => $request->partner,
                'photo' => $photo,

            ]);
            return redirect()->back()->with('success', "Partner created successfully");
        }
    }

    public function edit_partner($id)
    {
        $data = Partner::find($id);
        return view('admin.partner.edit', ['data' => $data]);
    }

    public function update_partner(Request $request, $id)
    {

        if($request->old_image == ''){
            $validator = Validator::make($request->all(), [
                'photo' => ['required','mimes:png,jpg,jpeg', 'max:2048'],
                'partner' => ['required']

            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'photo' => ['mimes:png,jpg,jpeg', 'max:2048'],
                'partner' => ['required']

            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to update data, please check your form");
        } else {
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

            return redirect()->back()->with('success', "Partner updated successfully");
        }
    }

    public function create_partner()
    {
        return view('admin.partner.create');
    }

    public function delete_partner(Request $request)
    {
        $partner = Partner::find($request->id);

        if ($partner->photo != '') {
            Storage::delete($partner->photo);
        }

        $partner = $partner->delete();


        if ($partner) {
            return response()->json(['info' => 'success', 'msg' => 'Partner successfully deleted']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Error on Delete the Partner']);
        }
    }

    public function show_testimoni()
    {
        $data = Testimoni::all();
        return view('admin.testimoni.show',['data' => $data]);
    }
    public function create_testimoni()
    {
        return view('admin.testimoni.create');
    }

    public function store_testimoni(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'photo' => ['required','mimes:png,jpg,jpeg', 'max:2048'],
            'name' => ['required'],
            'des' => ['required']

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to create data, please check your form");
        } else {

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo')->store('images\testimoni');
            } else {
                $photo = NULL;
            }

            Testimoni::create([
                'name' => $request->name,
                'description' => $request->des,
                'photo' => $photo,

            ]);
            return redirect()->back()->with('success', "Testimoni created successfully");
        }
    }

    public function edit_testimoni($id)
    {
        $data = Testimoni::find($id);
        return view('admin.testimoni.edit',['data' => $data]);
    }



    public function update_testimoni(Request $request, $id)
    {

        if($request->old_image == ''){
            $validator = Validator::make($request->all(), [
                'photo' => ['required','mimes:png,jpg,jpeg', 'max:2048'],
                'name' => ['required'],
                'des' => ['required']

            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'photo' => ['mimes:png,jpg,jpeg', 'max:2048'],
                'name' => ['required'],
                'des' => ['required']

            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->with('error', "Unable to update data, please check your form");
        } else {

            if ($request->old_image) {
                $photo =  $request->old_image;
            } else {
                $photo = NULL;
            }

        $testimoni = Testimoni::find($id);
        $testimoni->name = $request->name;
        $testimoni->photo = $photo;
        $testimoni->description = $request->des;
        $testimoni = $testimoni->save();

            return redirect()->back()->with('success', "Testimoni updated successfully");

        }
    }

    public function delete_testimoni(Request $request)
    {
        $testimoni = Testimoni::find($request->id);

        if ($testimoni->photo != '') {
            Storage::delete($testimoni->photo);
        }

        $testimoni = $testimoni->delete();


        if ($testimoni) {
            return response()->json(['info' => 'success', 'msg' => 'Testimoni successfully deleted']);
        } else {
            return response()->json(['info' => 'error', 'msg' => 'Error on Delete the Testimoni']);
        }
    }
}
