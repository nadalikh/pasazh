<?php

namespace App\Http\Controllers\Api;

use App\Events\ProductSMSEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class productController extends baseController
{

    private $productRule = [
        'image1' => 'required|base64image|base64max:2048',
        'image2' => 'required|base64image|base64max:2048',
        'description' => "required",
        'number' => "required|numeric"
    ];
    private function uploadBase64($image_64, $prefix = "image1"){
        $extension = explode('/',
            explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',')+1);
        // find substring fro replace here eg: data:image/png;base64,
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = $prefix."_".auth()->user()->mobile . Carbon::now()->toString() .'.'. $extension;
        Storage::disk('public')->put($imageName, base64_decode($image));
        return $imageName;
    }

    public function create(Request $req){
        $validator = Validator::make($req->all(),$this->productRule) ;
        if($validator->fails())
            return $this->sendError($validator->errors(), [], 400);
        $imageName1 = $this->uploadBase64($req->image1);
        $imageName2 = $this->uploadBase64($req->image2, "image2");
        $shop = Shop::whereUniqueId(intval($req->headers->get("shop_id")))->first();

        $product = new Product([
            "description" => $req->description,
            "number" => $req->number,
            "image1" => $imageName1,
            "image2" => $imageName2
        ]);
        $shop->products()->save($product);
        event(new ProductSMSEvent($shop));

        return $this->sendResponse(new ProductResource($product), 'product is saved');
    }
    public function getAll(Request $req){
        $products = Product::whereShopId($req->headers->get('shop_id'))->get();
        return $this->sendResponse(new ProductResource($products)   ,'your products is prepared');
    }
}
