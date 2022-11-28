<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\preLoginRequest;
use App\Models\User;
use App\mySweetServices\services\mySweetSMS;
use Illuminate\Support\Carbon;

class userController extends Controller
{
    private string $verification_code;

    public function __construct()
    {
        $this->verification_code = strval(random_int(10000, 99999));
    }
    public function preLogin(preLoginRequest $req){

        $user = User::firstOrNew([
            'mobile' => $req->mobile
        ]);
        $user->OTP = $this->verification_code;
        $user->OTP_create = Carbon::now()->format('y-m-d h:m:i');
        $user->save();
        $sms = new mySweetSMS($req->mobile, $user->OTP);
        $sms->sendSMS();
        return redirect('/')->with('success', 'OTP sent to your mobile')->with('sent', $req->mobile);
    }

    public function login(loginRequest $req){
        $user = User::whereMobile($req->mobile)->first();
        if($user->OTP == $req->verification_code) {
            $user->activation = true;
            auth()->login($user);
            return redirect("makingShop");
        }
        return redirect('/')->withErrors(['wrong verification code']);
    }
}
