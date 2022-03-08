<?php

namespace App\Http\Controllers;

use App\Models\ServiceBg;
use App\Models\ClientsLists;
use Illuminate\Http\Request;
use App\Models\ServiceHolder;
use App\Models\ServicesLists;
use Illuminate\Support\Facades\Validator;
use Sudip\MediaUploder\Facades\MediaUploader;

class ServiceController extends Controller
{
    public function index() {
        $service = ServiceBg::find(1);
        if ($service == null) {
          ServiceBg::firstOrCreate(
              ['service_headline' => 'Bitmap Services']
          );
        }

        $data = [];
        $data['bg'] = ServiceBg::find(1);
        $data['allservices'] = ServiceHolder::all();
        $data['shortservicelists'] = ServicesLists::all();
        $data['client_lists'] = ClientsLists::all();
        return view('admin.service.index', $data);
    }

    
    public function updateServiceBackground(Request $request) {
        $bg = ServiceBg::find(1);
        $bg->service_headline = $request->input("headertitle");
        $bg->service_description = $request->input("bgdescription");

        if ($request->hasFile('bgimgfile')) {
            MediaUploader::delete('website', $bg->service_bg_img);
            $file = MediaUploader::imageUpload($request->bgimgfile, 'website', 0);
            if ($file) {
                $bg->service_bg_img = $file['name'];
            }
        }
        $bg->save();
        return redirect()->back()->withStatus("Data has been updated");
    }

    public function storeWhatWeDo(Request $request) {
        $Validator = Validator::make($request->all(), [
            "service_title" => 'required',
            "service_cover_photo" => 'required|mimes:png',
        ]);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator, "what_we_do")->withInput();
        }
        $coverphoto = "";

        if ($request->hasFile('service_cover_photo')) {
            $file = MediaUploader::imageUpload($request->service_cover_photo, 'what_we_do', 0);
            if ($file) {
                $coverphoto = $file['name'];
            }
        }
        
        ServiceHolder::create([
            "service_name" => $request->input('service_title'), 
            "about_service" => $request->input('about_project'), 
            "long_about_sevice" => $request->input('pro_detail'), 
            "date_time" => $request->input('date'), 
            "price" => $request->input('price'), 
            "services_photo" => $coverphoto
        ]);
        return redirect()->back()->withStatus("Data has been Saved");
    }
}
