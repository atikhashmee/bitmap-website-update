<?php

namespace App\Http\Controllers;

use App\Models\ProtfolioBg;
use Illuminate\Http\Request;
use App\Models\ProtfolioImage;
use Sudip\MediaUploder\Facades\MediaUploader;

class ProtfolioController extends Controller
{

    public function getProtfolioImages($id) {
        $images = ProtfolioImage::where('protfolios_id', $id)->paginate(5);
        return view("admin.protfolio_image.index", ['images' => $images]);
    }
    
    public function saveImages(Request $request) {
        $request->validate([
            'protfolio_id' => 'required|integer|exists:protfolio_items,id',
            //"images" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); 

        $images = [];
        if (count($request->file('images')) > 0) {
            foreach ($request->file('images') as $image) {
                $file = MediaUploader::imageUpload($image, 'protfolio_image', 0);
                $images[] = [
                    'images' => $file['name'],
                    "protfolios_id" => $request->protfolio_id,
                ];
            }
        }

        if (count($images) > 0) {
            ProtfolioImage::insert($images);
        }
        return redirect()->back()->withStatus("Images has been saved");
    }

    public function deleteImages($id) {

        $imges = ProtfolioImage::find($id);
        MediaUploader::delete('protfolio_image', $imges->images);
        $imges->delete();
        return redirect()->back()->withStatus("Image has been deleted");
    }


    public function updateBackgroundInfo(Request $request) {
        $bgimage = "";
        $protfoliobg = ProtfolioBg::find(1);
        if ($request->hasFile('bgimgfile')) {
            MediaUploader::delete('website', $protfoliobg->bg_image);
            $file = MediaUploader::imageUpload($request->bgimgfile, 'website', 0);
            if ($file) {
                $bgimage = $file['name'];
            }
        } else {
            $bgimage = $protfoliobg->bg_image;
        }

        ProtfolioBg::where('id', 1)->update([
            'bg_title' => $request->input("headertitle"),
            'bg_description' => $request->input("bgdescription"),
            'bg_image' => $bgimage
        ]);
       return redirect()->back()->withStatus("Background information has been updated");
    }
}
