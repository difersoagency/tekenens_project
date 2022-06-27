<?php

namespace App\Http\Controllers;

use App\Mail\RequestMeet;
use App\Models\Category;
use App\Models\Contact;
use App\Models\DetailPortofolio;
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
        $about = Page::where('page_name', 'About')->first();
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
            'title' => 'Selamat datang!',
            'name' => $request->email_klien,
            'from' => $request->email_klien,
            'texr' => $request->messages,
        ];
         Mail::to('gemosiws@gmail.com')->send(new RequestMeet($data));

        // if($k){
        //     return redirect()->back()->with('error', 'Gagal mengirim hasil ke '.ucfirst($u->nama));
        // }else{
        //     $u->email_hasil = '1';
        //     $u->save();
        //     return redirect()->back()->with('success', 'Berhasil mengirim hasil ke '.ucfirst($u->nama));
        // }
    }
}
