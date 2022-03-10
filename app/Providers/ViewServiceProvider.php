<?php

namespace App\Providers;
use View;
use App\Models\Category;
use App\Models\TeamType;

use App\Models\AppSetting;
use App\Models\ProftfolioCategory;
use Illuminate\Support\ServiceProvider;

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
        View::composer(['site.pages.pages-layout'], function ($view) {
            $view->with('settings', AppSetting::first());
        });
        //setting page end

        View::composer(['admin.protfolio_items.fields'], function ($view) {
            $proftfolio_categoryItems = ProftfolioCategory::pluck('name','id')->toArray();
            $view->with('proftfolio_categoryItems', $proftfolio_categoryItems);
        });
        View::composer(['admin.protfolios.fields'], function ($view) {
            $proftfolio_categoryItems = ProftfolioCategory::pluck('name','id')->toArray();
            $view->with('proftfolio_categoryItems', $proftfolio_categoryItems);
        });
        View::composer(['admin.team_members.fields'], function ($view) {
            $team_typeItems = TeamType::pluck('name','id')->toArray();
            $view->with('team_typeItems', $team_typeItems);
        });
       
        //
    }
}