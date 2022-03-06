<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProtfolioImage;
use Sudip\MediaUploder\Facades\MediaUploader;

class ProtfolioController extends Controller
{

    public function getProtfolioImages($id) {
        $images = ProtfolioImage::where('protfolios_id', $id)->paginate(5);
        return view("protfolio_image.index", ['images' => $images]);
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
                    'images' => $file['url'],
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
        if (Storage::disk('public')->exists($imges->images)) {
            Storage::disk("public")->delete($imges->images);
        }
        $imges->delete();
        return redirect()->back()->withStatus("Image has been deleted");
    }
}
