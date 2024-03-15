<?php
namespace App\Http\Controllers;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use App\Models\Candidate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CandidateController extends Controller
{


    function LoginSelection():View{
        return view('pages.auth.login-page-selection');
    }
    function CandidateLoginPage():View{
        return view('pages.auth.login-page-candidate');
    }
    //Route::get('/candidateLogin',[CandidateController::class,'CandidateLoginPage']);

    function CandidateLogin(Request $request){
        $count=Candidate::where('email','=',$request->input('email'))
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
                'message' => 'unauthorize for this candidate'
            ],200);

        }

        //Route::post('/candidate-login',[CandidateController::class,'CandidateLogin']);

     }

    function CandidateRegistrationPage():View{
        return view('pages.auth.registration-page-candidate');
    }
    function CandidateSendOtpPage():View{
        return view('pages.auth.send-otp-page-candidate');
    }
    function CandidateVerifyOTPPage():View{
        return view('pages.auth.verify-otp-page-candidate');
    }

    function CandidateResetPasswordPage():View{
        return view('pages.auth.reset-pass-page-candidate');
    }

    function ProfilePage():View{
        return view('pages.dashboard.profile-page');
    }



    function CandidateRegistration(Request $request){
        try {
            Candidate::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Candidate Registration Successfully',
                'moon'=>'Round shape'
            ],200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Candidate Registration Failed'
            ],200);

        }
    }



    function CandidateSendOTPCode(Request $request){

        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count= Candidate::where('email','=',$email)->count();

        if($count==1){
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTO Code Table Update
            Candidate::where('email','=',$email)->update(['otp'=>$otp]);

            return response()->json([
                'status' => 'success',
                'message' => '4 Digit OTP Code has been send to your email !'
            ],200);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ]);
        }
    }

    function CandidateVerifyOTP(Request $request){
        $email=$request->input('email');
        $otp=$request->input('otp');
        $count= Candidate::where('email','=',$email)
            ->where('otp','=',$otp)->count();

        if($count==1){
            // Database OTP Update
            Candidate::where('email','=',$email)->update(['otp'=>'0']);

            // Pass Reset Token Issue
            $token=JWTToken::CreateTokenForSetPassword($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verification Successful',
            ],200)->cookie('token',$token,60*24*30);

        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ],200);
        }
    }

    function CandidateResetPassword(Request $request){
        try{
            $email=$request->header('email');
            $password=$request->input('password');
            Candidate::where('email','=',$email)->update(['password'=>$password]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }

    function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }


    function UserProfile(Request $request){
        $email=$request->header('email');
        $user= Candidate::where('email','=',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $user
        ],200);
    }

    function UpdateProfile(Request $request){
        try{
            $email=$request->header('email');
            $firstName=$request->input('firstName');
            $lastName=$request->input('lastName');
            $mobile=$request->input('mobile');
            $password=$request->input('password');
            Candidate::where('email','=',$email)->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'mobile'=>$mobile,
                'password'=>$password
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }

}
