<?php

namespace App\mySweetServices\services;
use App\mySweetServices\schemas\mySweetSMSI;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class mySweetSMS implements mySweetSMSI
{
    private $mobile;
    private $text;
    public function __construct($mobile, $text)
    {
        $this->mobile = $this->standardizationMobile($mobile);
        $this->text = $this->textSanitizer($text);
    }

    function standardizationMobile(string $mobile): string
    {
        //After generating suitable mobile format for web service.
        return $mobile;
    }

    function textSanitizer(string $text): string
    {
        //After trim and check some validation for the text we wanna send to a user
        return $text;
    }

    function sendSMS(): bool
    {
        //By guzzal or other package we can use a api to send SMS
        Log::alert("The ". $this->text ." is send to ". $this->mobile . " at ". Carbon::now()->format('y-m-d h:m:i'));
        return true;
    }
}
