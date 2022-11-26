<?php

namespace App\Http\Controllers;

use App\Events\updateShopEvent;
use App\Http\Requests\editShopRequest;
use App\Http\Requests\shopCreateRequest;
use App\Models\Shop;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function makingShopRedirect(){
        return view('shop');
    }

    public function updateShopRedirect($unique_id){
        $shop = Shop::whereUniqueId($unique_id)->first();
        return view('editShop', compact('shop'));
    }

    public function create(shopCreateRequest $req){
        $shop = new Shop();
        $shop->name = $req->name;
        $shop->city = $req->city;
        $shop->state = $req->state;
        $shop->Slogan = $req->Slogan;
        $shop->unique_id = $req->shopId;
        auth()->user()->shops()->save($shop);
        return redirect('editShop/'.$shop->unique_id);
    }

    public function updateShop(editShopRequest $req){
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
        event(new updateShopEvent($shop));
        return redirect('editShop/'. $shop->unique_id);
    }

}
