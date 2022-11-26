<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\mySweetServices\services\mySweetSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    private string $verification_code;
    private $preLoginRules = [
        "mobile" => "required|regex:/(09)[0-9]{9}/"
    ];
    private $loginRules = [
        "mobile" => "required|regex:/(09)[0-9]{9}/",
        "verification_code" => "required|size:5"

    ];
    public function __construct()
    {
        $this->verification_code = strval(random_int(10000, 99999));
    }

    public function preLogin(Request $req){
        $validator = Validator::make($req->all(), $this->preLoginRules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);
        $user = User::firstOrNew([
            'mobile' => $req->mobile
        ]);
        $user->OTP = $this->verification_code;
        $user->OTP_create = Carbon::now()->format('y-m-d h:m:i');
        $user->save();
        $sms = new mySweetSMS($req->mobile, $user->OTP);
        $sms->sendSMS();
        return response()->json(['msg' => 'sms is sent'], 200);
    }
    public function login(Request $req){
        $validator = Validator::make($req->all(),$this->loginRules) ;
        if($validator->fails())
            return response()->json($validator->errors(), 400);
        $user = User::whereMobile($req->mobile)->firstl();
        if(is_null($user)){
            return response()->json(["msg": ""]);
        }
        auth()->login($user);
        $token = auth()->user()->createToken('NKH')->plainTextToken;
        return response()->json(['msg' => $token]);
    }
}
