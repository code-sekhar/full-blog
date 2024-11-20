<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UserController extends Controller
{
    //page display
    public function LoginPage():View
    {
        return view('auth.login-page');
    }
    public function RegisterPage():View
    {
        return view('auth.registration-page');
    }
    public function sendOtpPage():View
    {
        return view('auth.send-otp');
    }

    //Api Implement
    //userRegistration
    public function UserRegistration(Request $request)
    {
        try{
            User::create([
                'firstName'=>$request->input('firstName'),
                'lastName'=>$request->input('lastName'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'password'=>$request->input('password'),
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Registration Successful'
            ],200);
        }catch (Exception $exception){
            return response()->json([
                'status'=>'failed',
                'message'=>$exception->getMessage()
            ],500);
        }
    }
    //userLogin
    public function UserLogin(Request $request){
        try{
            $count = User::where('email','=',$request->input('email'))
                ->where('password','=',$request->input('password'))
                ->select('id')->first();
            if ($count!==null){
                $token = JWTToken::CreateToken($request->input('email'),$count->id);

                return response()->json([
                    'status'=>'success',
                    'message'=>'User Login Successful',
                    'token'=>$token
                ],200)->cookie('token',$token,time()+60*24*30);
            }else{
                return response()->json([
                    'status'=>'failed',
                    'message'=>'User Login Failed'
                ],404);
            }
        }catch (Exception $e){
            return response()->json([
                'status'=>'failed',
                'message'=>$e->getMessage()
            ],500);
        }

    }
    //sendOTP code
    public function SendOtpCode(Request $request)
    {
        $email = $request->input('email');
        $otp = rand(10000,999999);
        $count = User::where('email','=',$email)->count();
        if ($count==1){
            //OTP send Mail
            Mail::to($email)->send(new OtpMail($otp));
            //OTP code update table
            User::where('email','=',$email)->update(['otp'=>$otp]);
            return response()->json([
                'status'=>'success',
                'message'=>'OTP Send to your email Successful'
            ],200);
        }else{
            return response()->json([
                'status'=>'failed',
                'message'=>'User Unauthorized'
            ],404);
        }
    }
    //verifyOtp Code
    public function VerifyOtp(Request $request){
        $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email','=',$email)->where('otp','=',$otp)->count();
        if ($count==1){
            User::where('email','=',$email)->update(['otp'=>'0']);
            //Password Reset Token Issue
            $token = JWTToken::CreateTokenForSetPassword($request->input('email'));
            return response()->json([
                'status'=>'success',
                'message'=>'OTP Verify Successful',
                'token'=>$token,
            ],200)->cookie('token',$token,60*24*30);
        }else{
            return response()->json([
                'status'=>'failed',
                'message'=>'User Unauthorized'
            ],404);
        }
    }
    //Reset Password
    public function ResetPassword(Request $request){
        try{
            $email = $request->header('email');
            $password = $request->input('password');
            $chect = User::where('email','=',$email)->update(['password'=>$password]);

            if($chect){
                return response()->json([
                    'status'=>'success',
                    'message'=>'Password Reset Successful'
                ],200);
            }else{
                return response()->json([
                    'status'=>'failed',
                    'message'=>'Password Reset Failed'
                ]);
            }

        }catch (Exception $e){
            return response()->json([
                'status'=>'failed',
                'message'=>$e->getMessage()
            ],500);
        }
    }
    //UserLogout
    public function UserLogOut()
    {
        return response()->json([
            'status'=>true,
            'message'=>'User Log out successfully'
        ],200)->cookie('token','',-1);
    }

    //User Profile
    //User Profile Get
    public function userProfile(Request $request)
    {
       try{
           $email = $request->header('email');
           $getProfile = User::where('email','=',$email)->first();
           if($getProfile){
               return response()->json([
                   'status'=>'success',
                   'message'=>'User Profile Successful',
                   'data'=> $getProfile
               ],201);
           }else{
               return response()->json([
                   'status'=>'failed',
                   'message'=>'User Profile Failed',
               ],404);
           }
       }catch (Exception $e){
           return response()->json([
               'status'=>'failed',
               'message'=>'Something Went Wrong'
           ],500);
       }
    }
    //User Update Profile
    public function userProfileUpdate(Request $request){
        $email = $request->header('email');

        $data = [
            'firstName'=>$request->input('firstName'),
            'lastName'=>$request->input('lastName'),
            'mobile'=>$request->input('mobile'),
        ];
        $result = User::where('email','=',$email)->update($data);
        if($result===1){
            return response()->json([
                'status'=>'success',
                'message'=>'User Profile Update successfully',
                'data'=> $result
            ]);
        }else{
            return response()->json([
                'status'=>'failed',
                'message'=>'Something Went Wrong'
            ]);
        }
    }
}
