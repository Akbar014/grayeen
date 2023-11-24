<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::composer('*', function ($view) {
        //     $categories  = Category::all();
        //     $view->with('categories', $categories);
        // });
        $categories = Category::all();
        view()->share('categories', $categories);
        $slider = Slider::all();
        view()->share('slider', '$slider');
        $contact = Contact::all();
        view()->share('contact', $contact);

        $yesterday_visitor = Visitor::whereDate('created_at', Carbon::yesterday())->get()->count();
        view()->share('yesterday_visitor', $yesterday_visitor);
        $today_visitor = Visitor::whereDay('created_at', '=', date('d'))->get()->count();
        view()->share('today_visitor', $today_visitor);
        $month_visitor = Visitor::whereMonth('created_at', '=', date('m'))->get()->count();
        view()->share('month_visitor', $month_visitor);
        $year_visitor = Visitor::whereYear('created_at', '=', date('Y'))->get()->count();
        view()->share('year_visitor', $year_visitor);
        $total_visitor = Visitor::get()->count();
        view()->share('total_visitor', $total_visitor);
    }
}
