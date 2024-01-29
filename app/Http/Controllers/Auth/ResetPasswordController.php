<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
//use http\Env\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

use App\Models\Member;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function showVerificationPage(){
        return view("auth.verify");
    }

    public function sendOTP(Request $request){

        $request->validate([
            'id' => ['required'],
        ]);

        try {

            $searchTerm = $request->input('id');
            $member = Member::find($searchTerm);

            if($member){
                $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

                Session::put('s_id', $member->id);
                Session::put('otp', $otp);

                Mail::to($member->email)->send(new OtpMail($otp));

                return redirect('/reset-password/verify-otp');

            }

            else {
                Session::flash('error', 'No Member Found !!!');
                return redirect('/reset-password/verify');
            }

        } catch (Exception $e) {
            Session::flash('error', 'Something is wrong....');
            return redirect('/reset-password/verify');
        }
    }

    public function matchOTP(Request $request){

        $request->validate([
            'otp' => ['required'],
        ]);

        if (Session::has('s_id') && Session::has('otp')) {

            $searchTerm = Session::get('s_id');
            $member = Member::find($searchTerm);

            if($member){

                $stored_otp = Session::get('otp');

                $otp = $request->input('otp');

                if($otp == $stored_otp){

                    Session::forget('s_id');
                    Session::forget('otp');

                    Session::put('m_id', $member->id);

                    return redirect('/password-update');
                }

                else{
                    Session::flash('error', 'Wrong OTP !!!');
                    return redirect('/reset-password/verify-otp');
                }

            }

            else {
                Session::flash('error', 'No Member Found !!!');
                return redirect('/reset-password/verify-otp');
            }

        }

        else {
            Session::flash('error', 'Session Expired !!! Try Again.');
            return redirect('/reset-password/verify-otp');
        }

    }

    public function updatePassword(Request $request){

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Session::has('m_id')) {

            $searchTerm = Session::get('m_id');
            $user = User::find($searchTerm);

            if($user){

                $request->validate([
                    'password' => 'required',
                ]);

                $user->password = Hash::make($request->input('password'));
                $user->save();

                Session::forget('m_id');

                Session::flash('success', 'Password successfully changed. Log in now.');
                return redirect('/login');
            }

            else{
                Session::flash('error', 'Session Expired !!! Try Again.');
                return redirect('/reset-password/verify-otp');
            }
        }

        else{
            Session::flash('error', 'Session Expired !!! Try Again.');
            return redirect('/reset-password/verify-otp');
        }

    }

    public function getForVerifyOTP(){
        return view('auth.verifyOTP');
    }
    public function getForUpdatePassword(){

        $searchTerm = Session::get('m_id');
        $member = Member::find($searchTerm);

        if($member){
            return view('auth.reset');
        }
        else{
            return redirect('/login');
        }


    }

}
