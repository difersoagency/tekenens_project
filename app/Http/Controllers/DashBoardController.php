<?php

namespace App\Http\Controllers;

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
        return view('dashboard.home');
    }

    public function dashboard()
    {
        return view('admin.dashboard.default');
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

}
