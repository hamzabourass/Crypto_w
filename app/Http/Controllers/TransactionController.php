<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Crypto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    protected $request;
     function  __construct(Request $request,Request $req){
        $this->request = $request;
        $this->req = $req;

     }




    public function wallet(){
        if (Auth::check()){
     return view('wallet.wallet');}
      else{
        return redirect()->route('login');
      }
    }
    public function converter(){
        if (Auth::check()){
            return view('wallet.converter');}
             else{
               return redirect()->route('login');
             }
    }
    public function btcconverter(){
        if (Auth::check()){
            return view('wallet.btcconverter');}
             else{
               return redirect()->route('login');
             }
}
public function converter_Usdt_To_Eth(){
    if (Auth::check()){
        return view('wallet.converter_Usdt_To_Eth');}
         else{
           return redirect()->route('login');
         }
}

    public function btcwallet(){
        if (Auth::check()){
            return view('wallet.btcwallet');}
             else{
               return redirect()->route('login');
             }
    }
    public function ethwallet(){
        if (Auth::check()){
            return view('wallet.ethwallet');}
             else{
               return redirect()->route('login');
             }
    }
    public function balance(){
        if (Auth::check()){
            return view('wallet.balance');}
             else{
               return redirect()->route('login');
             }}
    public function history(){
                if (Auth::check()){
                    return view('wallet.history');}
                     else{
                       return redirect()->route('login');
                     }}



/**
 *
 * Deposits
 */

//fonction envoyer USDT
    public function deposit()
           {
            $balance = Auth :: user()->wallet_balance;
            $amount= $this->req->input('amount');
            $email = $this->request->input('email');
            $user = User :: where('email',$email)
            ->first();
            $response = "";
             //si lutilisateur existe  response pas recevoir existe sinon response va recevoir not existe
            ($user) ?  $response = "exist" :  $response = "not_exist";

            if($amount<= $balance && $amount>=10 && $response=="exist" && $user!=Auth::user()  ){
                    $user->deposit($amount); // returns the wallet balance: 200.22
                    Auth::user()->withdraw($amount);
                    return redirect()->route('app_wallet')
                    ->with('success','Sended!');

            }
            else if($response=="not_exist"  ){
                return redirect()->route('app_wallet')
                    ->with('danger','User does not exist!');
            }
            else if($user==Auth::user()){
                return redirect()->route('app_wallet')
                    ->with('danger','You cant send to yourself !');

            }
            else if($amount< 10  ){
                return redirect()->route('app_wallet')
                    ->with('danger','You can not send less than 10 USDT !');
            }
            else{
                return redirect()->route('app_wallet')
                    ->with('danger', 'You do not have enough USDT to convert !');
            }
        }

 //fonction envoyer BTC

    public function depositbtc(){
    $amount= $this->req->input('amount');
    $email = $this->request->input('email');
    $user = User :: where('email',$email)
        ->first();
    $price=DB::table('cryptos')->select('price')->where('id',6)->first()->price;

    $btc = Auth :: user()->btc;
    $response = "";
    ($user) ?  $response = "exist" :  $response = "not_exist";

    if($amount<= $btc && $amount>=10/$price && $response=="exist" && $user!=Auth::user()){
    $Ubtc=$user->btc;
    Auth :: user()->btc = $btc - $amount ;
    $user->btc=$Ubtc+$amount;
    $user->update();
    Auth :: user()->update();
                return redirect()->route('app_btcwallet')
                ->with('success','Sended successfully!');


        }
        else if($user==Auth::user()){
            return redirect()->route('app_btcwallet')
                ->with('danger','You cant send to yourself !');

        }
        else if($response=="not_exist"){
            return redirect()->route('app_btcwallet')
                ->with('danger','User does not exist!');

        }
        else if($amount< 10/$price){
            return redirect()->route('app_btcwallet')
                ->with('danger','You can not send less than 10 USDT = 0.0004347826 BTC !');

        }
        else{
            return redirect()->route('app_btcwallet')
                ->with('danger', 'You do not have enough BTC to send !');
        }
            }

/** envoyer eth */

            public function depositeth(){
                $amount= $this->req->input('amount');
                $email = $this->request->input('email');
                $user = User :: where('email',$email)
                    ->first();
                $price=DB::table('cryptos')->select('price')->where('id',7)->first()->price;


                $response = "";
                ($user) ?  $response = "exist" :  $response = "not_exist";
                $eth = Auth :: user()->eth;

                if($amount<= $eth && $amount>= 10/$price && $response=="exist" && $user != Auth :: user() ){
                $Ueth= $user->eth;
                Auth :: user()->eth = $eth - $amount ;
                $user->eth=$Ueth+$amount;
                $user->update();
                Auth :: user()->update();
                            return redirect()->route('app_ethwallet')
                            ->with('success','Sended successfully!');
                    }

                    else if($response=="not_exist" ){
                        return redirect()->route('app_ethwallet')
                            ->with('danger','User does not exist !');


                    }
                    else if( $user = Auth :: user() ){
                        return redirect()->route('app_ethwallet')
                            ->with('danger','You are sending to your account !');

                    }

                    else if($amount< 10/$price){
                        return redirect()->route('app_ethwallet')
                            ->with('danger','You can not send less than 10 USDT = 0.0056365696298644 ETH !');

                    }
                    else{
                        return redirect()->route('app_ethwallet')
                            ->with('danger', 'You do not have enough ETH to send !');
                    }
                        }




/* converters */

    //convert usdt to btc

     public function  convert_To_Btc (){
                $balance = Auth :: user()->wallet_balance;
                $btc= Auth :: user()->btc;
                $amount= $this->req->input('convert');
                $price=DB::table('cryptos')->select('price')->where('id',6)->first()->price;
                if($amount<= $balance && $amount>=10 ){

                   $newAmount= $amount * (1/$price);
                   Auth::user()->withdraw($amount);
                    Auth::user()->btc=$btc + $newAmount;
                    Auth::user()->update();
                return redirect()->route('app_converter')
                        ->with('success','Converted successfully!');
                }
                else if($amount<10 ){
                    return redirect()->route('app_converter')
                        ->with('danger','You can not convert less than 10 USDT !');

                }
                else{
                    return redirect()->route('app_converter')
                        ->with('danger', 'You do not have enough USDT to convert !');
                }}

//convert btc to usdt
                public function  convert_To_Usdt (){
                    $btc = Auth :: user()->btc;
                    $amount= $this->req->input('convert');
                    $price=DB::table('cryptos')->select('price')->where('id',6)->first()->price;
                    if($amount<= $btc && $amount>= 10/$price ){

                       $newAmount= $amount * $price;
                       Auth::user()->deposit($newAmount);
                       Auth::user()->btc=$btc - $amount;
                       Auth::user()->update();
                    return redirect()->route('app_btcconverter')
                            ->with('success','Converted  successfully!');
                    }
                    else if($amount<10/$price ){
                        return redirect()->route('app_btcconverter')
                            ->with('danger','You can not convert less than 10 USDT = 0.0004347826!');

                    }
                    else{
                        return redirect()->route('app_btcconverter')
                            ->with('danger', 'You do not have enough BTC to convert !');
                    }}
 // convert usdt to eth
 public function  convert_To_Eth (){
    $balance = Auth :: user()->wallet_balance;
    $eth= Auth :: user()->eth;
    $amount= $this->req->input('convert');
    $price=DB::table('cryptos')->select('price')->where('id',7)->first()->price;
    if($amount<= $balance && $amount>=10 ){

       $newAmount= $amount * (1/$price);
       Auth::user()->withdraw($amount);
       Auth::user()->eth=$eth + $newAmount;
       Auth::user()->update();
    return redirect()->route('app_converter_Usdt_To_Eth')
            ->with('success','Converted successfully!');
    }
    else if($amount<10 ){
        return redirect()->route('app_converter_Usdt_To_Eth')
            ->with('danger','You can not convert less than 10 USDT !');

    }
    else{
        return redirect()->route('app_converter_Usdt_To_Eth')
            ->with('danger', 'You do not have enough USDT to convert !');
    }}




//function buy Cryptos

public function buyCrypto(){
  $amount= $this->request->input('amount');
  $balance = Auth :: user()->wallet_balance;
  $btc = Auth :: user()->btc;
  $stock=DB::table('cryptos')->select('stock')->where('id',6)->first()->stock;



if($amount>=0.000421061354 && ($balance/23700)>$amount){


$newAmount=$amount*23700;
Auth::user()->wallet_balance=$balance - $newAmount;
Auth::user()->btc=$btc + $amount;
Auth::user()->update();
Crypto::where('id',1)->stock=$stock-$amount;

 /*DB::table('cryptos')
    ->where('id',1)
    ->update([
             'stock'=>$stock-$amount ,

             ]);*/
    return redirect()->route('app_buycrypto')
         ->with('success','you just bought  ' . $amount . ' BTC !');


                            }
        elseif($amount< 0.000421061354){
            return redirect()->route('app_buycrypto')
                            ->with('danger','you cant buy less than 10USDT');
        }
        elseif(($balance/23700)<$amount){
            return redirect()->route('app_buycrypto')
                            ->with('danger','you dont have enought money');
        }

                            }


    public function buyCryptoE(){
      $amount= $this->request->input('amount');
      $balance = Auth :: user()->wallet_balance;
      $eth = Auth :: user()->eth;
      $stock=DB::table('cryptos')->select('stock')->where('id',7)->first()->stock;

        if($amount>=0.0056365696298644 && ($balance/1774.12870889)>$amount){
       $newAmount=$amount*1774.12870889;
       Auth::user()->wallet_balance=$balance - $newAmount;
       Auth::user()->eth=$eth + $amount;
       Auth::user()->update();
       Crypto::where('id',2)->stock=$stock-$amount;

    return redirect()->route('app_buycrypto')
     ->with('success','you just bought  ' . $amount . ' ETH ! ');


    }
    elseif($amount< 0.0056365696298644){
    return redirect()->route('app_buycrypto')
     ->with('danger','you cant buy less than 10USDT');
                                    }
    elseif(($balance/1774.12870889)<$amount){
    return redirect()->route('app_buycrypto')
    ->with('danger','you dont have enought money');
                                    }

    }
    }






