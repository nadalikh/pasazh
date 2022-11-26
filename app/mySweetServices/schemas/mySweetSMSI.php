<?php

namespace App\mySweetServices\schemas;

interface mySweetSMSI
{
    function standardizationMobile(string $mobile) : string;
    function textSanitizer(string $text):string;
    function sendSMS():bool;
}
