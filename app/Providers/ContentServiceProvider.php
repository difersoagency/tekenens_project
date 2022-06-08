<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public $data;
    public $date;
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->data = DB::table('contact')->first();
        $this->date = Carbon::now()->format('Y');

        View()->composer('layouts.front-website.footer', function($view)
        {
            $view->with(['data'=> $this->data,'date' => $this->date]);
        });
    }
}
