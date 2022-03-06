<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\HomeStyle;
use App\Models\AppSetting;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Sudip\MediaUploder\Facades\MediaUploader;

class Webcontroller extends Controller
{
    public function createContactForm() {
        $contact = ContactForm::find(1);
        if ($contact == null) {
            ContactForm::firstOrCreate(['contact_heading' => 'Contact Bitmap']);
        }
        return view("contact.index", ['contactInfo' => ContactForm::find(1)]);
    }

    public function storeContactForm(Request $request) {
      
        $contactimg = "";
        if ($request->hasFile('signature_image')) {
            $file = MediaUploader::imageUpload($request->signature_image, 'website', 1, null, [600, 600]);
            if ($file) {
                $contactimg = $file['url'];
            }
        } else {
            $contactimg = $request->input('dbimagefile');
        }

        ContactForm::where("id", 1)->update([

            'contact_heading' => $request->input('headertitle'),
            'little_description' => $request->input('description'),
            'email' => $request->input('email'),
            'cell' => $request->input('cell'),
            'website' => $request->input('website'),
            'address' => $request->input('address'),
            'go_location' => $request->input('mapadrs'),
            'note_on_go_location' => $request->input('mapnote'),
            'contact_image' => $contactimg

        ]);

        Flash::success('Updated successfully.');
        return redirect()->back();
    }


    public function showHomeStyle() {
        return view("home_style.index", ['homestyles' => HomeStyle::where('status', 1)->first()]);
    }

    public function updateHomeStyle(Request $request, $id) {
      
        if ($id == 1) 
        {
            $collections = [2,3,4,5];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }
        else if ($id == 2) {
            $collections = [1,3,4,5];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }
        else if ($id == 3) {
            $collections = [1,2,4,5];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }
        else if ($id == 4) {
             $collections = [1,2,3,5];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }
        else if ($id == 5) {
           $collections = [1,2,3,4];
            HomeStyle::whereIn("id",$collections)->update([
               "status" => "0"
            ]);
            HomeStyle::where("id",$id)->update([
               "status" => "1"
            ]);
        }

        Flash::success('Updated successfully.');
        return redirect()->back();
    }

    public function showSettingPage() {
        $settings =  AppSetting::find(1);
        if ($settings == null) {
            AppSetting::firstOrCreate(['title' => 'Bitmap :: You deserve a good design ']);
        }
        return view("app_setting.index", ["settinginfo" => AppSetting::find(1)]);
    }

    public function updateSettingPage(Request $request) {
        $appsettings = AppSetting::find(1);
        $logo="";
        $pavicon = "";
      
        if ($request->hasFile('logofile')) {
            $file = MediaUploader::imageUpload($request->logofile, 'website', 1, null, [600, 600]);
            if ($file) {
                $logo = $file['url'];
            }
        } else {
            $logo = $appsettings->logo;
        }
         

        if ($request->hasFile('feviconfile')) {
            $file = MediaUploader::imageUpload($request->logofile, 'website', 1, null, [600, 600]);
            if ($file) {
                $pavicon  = $file['url'];
            }
        } else {
            $pavicon = $appsettings->fevicon;
        }

        AppSetting::where("id", 1)->update([
            'logo'  =>  $logo,
            'fevicon'  => $pavicon,
            'title'  => $request->input('sitetitle'),
            'short_description'  =>$request->input('shortdes'),
            'address'  =>$request->input('adrs'),
            'phone'  =>$request->input('phone'),
            'email'  =>   $request->input('email'),
            'facebook'  =>$request->input('fblink'),
            'twitter'  =>$request->input('twitterlink'),
            'instagram' =>$request->input('instlink')
        ]);
        
        Flash::success('Updated successfully.');
        return redirect()->back();
    }
}
