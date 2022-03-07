<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\HomeStyle;
use App\Models\AppSetting;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Sudip\MediaUploder\Facades\MediaUploader;

class Webcontroller extends Controller
{
    public function createContactForm() {
        $contact = ContactForm::find(1);
        if ($contact == null) {
            ContactForm::firstOrCreate(['contact_heading' => 'Contact Bitmap']);
        }
        return view("admin.contact.index", ['contactInfo' => ContactForm::find(1)]);
    }

    public function storeContactForm(Request $request) {
        try {
            $contact_form_data =  ContactForm::where("id", 1)->first();
            $contactimg = "";
            if ($request->hasFile('imgfile')) {
                MediaUploader::delete('website', $contact_form_data->contact_image);
                $file = MediaUploader::imageUpload($request->imgfile, 'website', 0);
                if ($file) {
                    $contactimg = $file['name'];
                }
            } else {
                $contactimg = $contact_form_data->contact_image;
            }

            $contact_form_data->update([
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
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
       
    }


    public function showHomeStyle() {
         //check if the database is empty with any records
        $homestyles = HomeStyle::where("status", 1);
        if ($homestyles->count() == 0 || $homestyles->get() == null) {
                Artisan::call('db:seed', [
                    '--class' => 'HomeStyelSeeder'
                ]);
                $homestyleobj  = HomeStyle::first(); //update the first record so that it shows the active result 
                $homestyleobj->status = "1";
                $homestyleobj->save();
        }
        return view("admin.home_style.index", ['homestyles' => HomeStyle::where('status', 1)->first()]);
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
        return view("admin.app_setting.index", ["settinginfo" => AppSetting::find(1)]);
    }

    public function updateSettingPage(Request $request) {
        $appsettings = AppSetting::find(1);
        $logo="";
        $pavicon = "";
      
        if ($request->hasFile('logofile')) {
            MediaUploader::delete('website', $appsettings->logo);
            $file = MediaUploader::imageUpload($request->logofile, 'website', 0);
            if ($file) {
                $logo = $file['name'];
            }
        } else {
            $logo = $appsettings->logo;
        }
         

        if ($request->hasFile('feviconfile')) {
            MediaUploader::delete('website', $appsettings->fevicon);
            $file = MediaUploader::imageUpload($request->feviconfile, 'website', 0);
            if ($file) {
                $pavicon  = $file['name'];
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
