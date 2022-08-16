<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Services\EmailService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    protected $request;
     function  __construct(Request $request){
        $this->request = $request;

     }
    public function logout(){

  Auth::logout();
  return redirect()->route('login');

    }
    // verification d'existence  d'email dans la base de donnée
   public function existEmail(){

    $email = $this->request->input('email');
    $user = User::where('email',$email)
                  ->first();
    $response = "";
    //si lutilisateur existe  response pas recevoir existe sinon response va recevoir not existe
    ($user) ?  $response = "exist" :  $response = "not_exist";

     return response()->json([

        'response'=>$response


     ]);
}


public function activationCode($token)
{
    $user = User :: where('activation_token',$token)
    ->first();
    if(!$user)
    {
        return redirect()->route('login')->with('danger','This token does not match any user!');
    }

    if($this->request->isMethod('post'))
    {
       $code = $user->activation_code;

        $activation_code = $this->request->input('activation-code');
        // teste si le code saisis et different du code dans la base du donnee
        if($activation_code != $code)
        {
           return back()->with([
            'danger'=>'This code is invalid!',
            'activation_code'=>$activation_code

           ]) ;
        }
        else
        {
            DB::table('users')
            ->where('id', $user->id)
            ->update([
                'is_verified'=> 1,
                'activation_code' => '',
                'activation_token' => '',
                'email_verified_at' => new \DateTimeImmutable,
                'updated_at' =>  new \DateTimeImmutable
                     ]);

             return redirect()->route('login')->with('success','Your Account has been verified successfully!');


        }
    }
    else
    {
    return view('auth.activation_code',[
        'token'=>$token
    ]);}
}
/* verfier si l'utilisateur a deja activer son compte ou pas avant d'authentifier */
public function userChecker()
{
    $activation_token= Auth::user()->activation_token;
    $is_verified = Auth::user()->is_verified;
    if($is_verified != 1)
    {
        Auth::logout();
        return redirect()->route('app_activation_code',['token'=>$activation_token])
        ->with('warning', 'Your account is not activated yet, please check your mail-box and activate your account');

    }
    else
    {
    return redirect()->route('app_dashboard');

    }

}
public function resendActivationCode($token)
{
    $user = User :: where('activation_token',$token)
    ->first();
    $email = $user->email;
    $name = $user->name;
    $activation_token= $user->activation_token;
    $activation_code= $user->activation_code;
    $emailSend = new EmailService;
        $subject = "Account Activation";
        $message = view('mail.confirmation_email')
                  ->with([
                    'name' => $name,
                    'activation_code' => $activation_code,
                    'activation_token' => $activation_token

                  ]);
        $emailSend->sendEmail($subject, $email, $name, true, $message);
        return back()->with('success','Code is resended.');

}
public function activationAccountLink($token)
    {
        $user = User :: where('activation_token',$token)
        ->first();
        if(!$user)
    {
        return redirect()->route('login')->with('danger','This token does not match any user!');
    }

    DB::table('users')
    ->where('id', $user->id)
    ->update([
        'is_verified'=> 1,
        'activation_code' => '',
        'activation_token' => '',
        'email_verified_at' => new \DateTimeImmutable,
        'updated_at' =>  new \DateTimeImmutable
             ]);

     return redirect()->route('login')->with('success','Your Account has been verified successfully!');




    }

}
