<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\DetailPortofolio;
use App\Models\Portofolio;
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
        $team = Team::inRandomOrder()->where('status',1)->get();
        return view('pages.about',['team'=> $team]);
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

}
