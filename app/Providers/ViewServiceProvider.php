<?php

namespace App\Providers;
use App\Models\TeamType;
use App\Models\Category;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['team_members.fields'], function ($view) {
            $team_typeItems = TeamType::pluck('name','id')->toArray();
            $view->with('team_typeItems', $team_typeItems);
        });
       
        //
    }
}