<?php

namespace App\Http\Controllers;

use App\Models\ServiceBg;
use App\Models\ClientsLists;
use Illuminate\Http\Request;
use App\Models\ServiceHolder;
use App\Models\ServicesLists;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;
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

    public function storeServiceList(Request $request) {
        $Validator = Validator::make($request->all(), [
            'list_avater' => 'required',
            'list_title' => 'required',
            'short_description' => 'max:200'
        ]);

        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator, "service_list")->withInput();
        }
        
        $coverphoto = "";

        if ($request->hasFile('list_avater')) {
            $file = MediaUploader::imageUpload($request->list_avater, 'service_list', 0);
            if ($file) {
                $coverphoto = $file['name'];
            }
        }

        // if ($request->hasFile('list_avater')) {
        //     Storage::disk('public')->delete(trim($request->input("bgseimage")));
        //     $coverphoto = $request->file("list_avater")->store("ServicesList","public") ;
        // } else {
        //     $coverphoto = $request->input("bgseimage");
        // }

        ServicesLists::create([
            'list_title' => $request->input( 'list_title'),
            'short_description'=>  $request->input('short_description'),
            'img' => $coverphoto
        ]);
        return redirect()->back()->withStatus("Data has been Saved");
    }


    public function storeClientInfo(Request $request) {

        $Validator = Validator::make($request->all(), [
            'compnay_name'  => 'required',
            'client_avater' => 'required'
        ]);

        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator, "clients")->withInput();
        }

        $client_avatar = "";

        if ($request->hasFile('client_avater')) {
            $file = MediaUploader::imageUpload($request->client_avater, 'clients', 0);
            if ($file) {
                $client_avatar = $file['name'];
            }
        }

        ClientsLists::create([
            'Compnay_name'  =>  $request->input('compnay_name'),
            'phone _number' =>  $request->input('phone_number'),
            'email'         =>  $request->input('email'),
            'address'       =>  $request->input('address'),
            'avater'        =>  $client_avatar
        ]);

        return redirect()->back()->withStatus("Data has been Saved");
    }

    public function updateClientStatus($id, $status) {
        ClientsLists::where('id',$id)->update([
            'status' => $status
        ]);
        return redirect()->back()->withStatus("Client Name has been published to the website");
    }
}
