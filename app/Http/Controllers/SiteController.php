<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\TeamType;
use App\Models\HomeStyle;
use App\Models\ServiceBg;
use App\Models\AppSetting;
use App\Models\ContactForm;
use App\Models\ProtfolioBg;
use App\Models\Testimonial;
use App\Models\ClientsLists;
use App\Models\ProtfolioFaq;
use Illuminate\Http\Request;
use App\Models\ProtfolioItem;
use App\Models\ServiceHolder;
use App\Models\ServicesLists;
use App\Models\ProtfolioImage;
use App\Models\ProftfolioCategory;
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
    }

    public function about() {
        return view("site.about")
        ->with("about_info",About::where("id",1)->first())
        ->with('teamtype',TeamType::all())
        ->with("testimonial", Testimonial::all())
        ->with("settings", AppSetting::first());
    }

    public function protfolio() {
        // try {
         
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }

        $data = [];
        $data['Protfolios'] = ProtfolioItem::all();
        $data['Protfoliobg'] = ProtfolioBg::first();
        $data['pcate'] = ProftfolioCategory::all();
        $data['settings'] = AppSetting::first();
        return view("site.protfolio_dashboard", $data);
  
    }

    public function protfolioShow($id) {
        try {
            $data = [];
            $data['details'] = ProtfolioItem::where('id', $id)->first();
            $data['faqs'] = ProtfolioFaq::where("protfolio_item_id", $id)->get();
            $data['images'] = ProtfolioImage::where("protfolios_id", $id)->get();
            $data['settings'] = AppSetting::first();
            return view("site.single_protfolio", $data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        
    }

    public function contactUs() {
        return view("site.contact")
       ->with("contact", ContactForm::first())
       ->with("settings", AppSetting::first());
    }

    public function service() {
        return view("site.service-n")
        ->with("settings", AppSetting::first())
        ->with('serviceBg', ServiceBg::first())
        ->with('listsServices',ServicesLists::all())
        ->with("clients", ClientsLists::where('status',1)->get())
        ->with('servicesTop', ServiceHolder::all());
    }
}
