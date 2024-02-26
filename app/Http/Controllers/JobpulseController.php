<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\Jobpulse;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class JobpulseController extends Controller
{

    function AdminLogin():View{
        return view('pages.auth.admin-login-page');
    }




function UserLogin(Request $request){
    $count=Jobpulse::where('email','=',$request->input('email'))
         ->where('password','=',$request->input('password'))
         ->select('id')->first();

    if($count!==null){
        // User Login-> JWT Token Issue
        $token=JWTToken::CreateToken($request->input('email'),$count->id);
        return response()->json([
            'status' => 'success',
            'message' => 'User Login Successful',
            'token' => $token,
        ],200)->cookie('token',$token,time()+60*24*30);
    }
    else{
        return response()->json([
            'status' => 'failed',
            'message' => 'unauthorized'
        ],200);

    }

 }

}
