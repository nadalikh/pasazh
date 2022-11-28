<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class shopController extends baseController
{
    private $shopRule = [
        "shopId" => "required|unique:shops,unique_id",
        'city'=> "required",
        'state'=> "required",
        "Slogan" => "required",
        "name" => 'required'
    ];
    private $updateRule = [
        "shopId" => "required",
        'city'=> "required",
        'state'=> "required",
        "Slogan" => "required",
        "name" => 'required'
    ];
    public function create(Request $req){
        $validator = Validator::make($req->all(),$this->shopRule) ;
        if($validator->fails())
            return $this->sendError($validator->errors(), [], 400);
        $shop = new Shop();
        $shop->name = $req->name;
        $shop->city = $req->city;
        $shop->state = $req->state;
        $shop->Slogan = $req->Slogan;
        $shop->unique_id = $req->shopId;
        auth()->user()->shops()->save($shop);
        return $this->sendResponse($shop, 'shop is created');
    }
    public function update(Request $req){
        $validator = Validator::make($req->all(),$this->updateRule) ;
        if($validator->fails())
            return $this->sendError($validator->errors(), [], 400);
        $shop_id = $req->headers->get('shop_id');
        $shop = Shop::whereUniqueId($shop_id)->first();
        $shop->unique_id = $req->shopId;
        $shop->city = $req->city;
        $shop->state = $req->state;
        $shop->phone = $req->phone;
        $shop->mobile = $req->mobile;
        $shop->address = $req->address;
        $shop->description = $req->description;
        $shop->Slogan = $req->Slogan;
        $shop->update();
        return $this->sendResponse($shop, 'shop is updated');
    }
}
