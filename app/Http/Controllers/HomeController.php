<?php

namespace App\Http\Controllers;

use App\Mail\RequestMeet;
use App\Models\Category;
use App\Models\Contact;
use App\Models\DetailPortofolio;
use App\Models\DetailPageDesc;
use App\Models\Page;
use App\Models\Portofolio;
use App\Models\Team;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function main()
    {
        $home = Page::where('page_name', 'Home')->first();
        $portofolio = Portofolio::orderBy('id', 'desc')->limit(4)->get();
        $testimoni = Testimoni::limit(5)->get();

        return view('pages.main',['home' => $home, 'portofolio' => $portofolio, 'testimoni' => $testimoni]);
    }
    public function about()
    {
        $about = DetailPageDesc::whereHas('Page', function($q){
            $q->where('page_name', 'About');
        })->first();
        $team = Team::inRandomOrder()->where('status',1)->get();
        return view('pages.about',['team'=> $team, 'about' => $about]);
    }
    public function portfolio()
    {

       // $portfolio = Portofolio::inRandomOrder()->limit(3)->get();
        $category = Category::Has('Portofolio')->inRandomOrder()->limit(3)->get();
        $detailportfolio = DetailPortofolio::inRandomOrder()->limit(6)->get();

        return view('pages.portfolio',['category'=> $category,'detailportfolio'=> $detailportfolio]);

    }
    public function portfolio_data(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if($id <= 0){
                $detailportfolio = DetailPortofolio::inRandomOrder()->limit(6)->get();
            }else{
                $p_id = array();
                $data = Portofolio::whereHas('Category',function ($q) use ($id){
                    $q->where('category_id',$id);
                })->get();

                foreach ($data as $d){
                    $p_id[] = $d->id;
                }



                $detailportfolio = DetailPortofolio::whereIN('portofolio_id',$p_id)->limit(3)->get();
            }
            return view('pages.portfolio_data',compact('detailportfolio'))->render();
        }
    }

    public function contact(){
        $data = Contact::all();
       return view('pages.contact',['data' => $data]);
    }

    public function send_request_meet(Request $request){


            $data = [
                'name' => $request->first_name .' '. $request->last_name,
                'email' => $request->email,
                'text' => $request->messages,
            ];
            $send =  Mail::to('gemosiws@gmail.com')->send(new RequestMeet($data));

                return response()->json(['data' => 'success']);


    }

    public function detail_portofolio($id){
        $data = DetailPortofolio::with('Portofolio')->find($id);
        return view('pages.detail_portfolio',['data' => $data]);
    }
}
