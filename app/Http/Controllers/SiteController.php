<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\TeamType;
use App\Models\HomeStyle;
use App\Models\AppSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SiteController extends Controller
{
    public function index() {
        $homestyles = HomeStyle::where("status", 1)->get();
        $data = [];
        
        if (count($homestyles) == 0) {
            $returned = Artisan::call('db:seed', [
                '--class' => 'HomeStyelSeeder'
            ]);
            $homestyleobj  = HomeStyle::first();
            $homestyleobj->status = "1";
            $homestyleobj->save();
        }
        
        //check for homesettings 
        if (AppSetting::first() == null) {
            AppSetting::firstOrCreate(
                ['title' => 'You deserve a good design']
            );
        }
        $data['settings'] = AppSetting::first();
        $home_layout = HomeStyle::where("status", 1)->first();
        $home_style_blade = [
            "home0" => 'site.home-styles.defaultstyle',
            "home1" => 'site.home-styles.home-style-2',
            "home2" => 'site.home-styles.home-style-5',
            "home3" => 'site.home-styles.home-style-6',
            "home4" => 'site.home-styles.home-style-8',
        ];
        

        if ($home_layout) {
            if ($home_layout->home_style_title == 'home0') {
                $data['sliders'] = Slider::where('is_visible', 1)->get();
            } 
            return view($home_style_blade[$home_layout->home_style_title], $data);
        }
        abort(404);
    }

    public function about() {
        return view("site.about")
        ->with("about_info",About::where("id",1)->first())
        ->with('teamtype',TeamType::all())
        ->with("testimonial", Testimonial::all())
        ->with("settings", AppSetting::first());
    }
}
