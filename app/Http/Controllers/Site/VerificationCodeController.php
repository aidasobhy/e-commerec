<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationCodeRequest;
use App\Http\Services\VerificationServices;


class VerificationCodeController extends Controller
{
   public $verificationServices;
    public function __construct(VerificationServices $_verificationServices)
    {
        $this->verificationServices=$_verificationServices;
    }

    public function showVerifyForm()
    {
        return view('auth.verification');
    }

    public function verify(VerificationCodeRequest $request)
    {
       $check=$this->verificationServices->checkOTPCode($request->code);
       if(!$check){
           return redirect()->route('verify-form')->withErrors(['code'=>__('messages.error code')]);
       }else{
           $this->verificationServices->removeOTPCode($request->code);
           return redirect()->route('home');
       }
    }
}
