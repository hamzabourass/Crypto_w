<?php

namespace App\Http\Controllers;
use App\Models\Crypto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    //la page/vue home.blade.php
   public function home(Request $request)
    {
        $response=Http::get("https://api.nomics.com/v1/currencies/ticker?key=9ea7a9ef6937763e07f854110efd59b1ab739459&per-page=21&page=1&")->json();
        foreach( $response as $currency){
            $crypto1 = new crypto;
            $crypto1->name = $currency['name'];
            $crypto1->price = $currency['price'];

            $crypto1->save();


        }





        return view('home.home', ['response'=> $response]);

    }
     //la page/vue about.blade.php

    public function about()
    {
     return view('home.about');

    }
    //la page/vue dashboard.blade.php

    public function dashboard()
    {
     return view('home.dashboard');

    }

    public function search(Request $request)
{

   $search= $request->input('search');


    $response = Http::get("https://api.nomics.com/v1/currencies/ticker?key=9ea7a9ef6937763e07f854110efd59b1ab739459&per-page=100&page=1&");
    foreach( $response as $currency){
        //if($currency['name'] == '%' . $search . '%'){
       // if($search == '%' . $currency['name'] . '%')
        if($search == "")

        {
            return view('home.home', ['search'=> $search], ['response'=> $response->json()]);

          //  return view('home.home', ['response'=> $response->json()]);

        }
       else{
    return view('home.search', ['search'=> $search], ['response'=> $response->json()]);
    }
}
}


public function test()
{

 return view('home.test');

}
public function buycrypto(){
  $response = Http::get("https://api.nomics.com/v1/currencies/ticker?key=9ea7a9ef6937763e07f854110efd59b1ab739459&per-page=100&page=1&")->json();
    if (Auth::check()){
    foreach( $response as $currency){
            if($currency['rank']=1 ){
                $currencyN=$currency['name'];
                $currencyP=$currency['price'];

            DB::table('cryptos')->where('id',6)->update(['price'=>$currencyP ,]);

     return view('home.buycrypto',['currencyN'=> $currencyN],['currencyP'=> $currencyP] );

  }}
}
else{
    return redirect()->route('login');

}

}

/*
public function buyeth(){
    $response = Http::get("https://api.nomics.com/v1/currencies/ticker?key=9ea7a9ef6937763e07f854110efd59b1ab739459&per-page=100&page=1&")->json();
if (Auth::check()){
foreach( $response as $currency){
if($currency['rank']=2){
    $currencyN=$currency['name'];
    $currencyP=$currency['price'];
    DB::table('cryptos')
                ->where('id',2)
                ->update([
                'price'=>$currencyP1 ,

                    ]);

return view('home.buycrypto',['currencyN'=> $currencyN1],['currencyP'=> $currencyP1] );


  }}

}
else{
    return redirect()->route('login');

}
}*/



}
















/*public function GetPrice(){
$response = Http::get("https://api.nomics.com/v1/currencies/ticker?key=9ea7a9ef6937763e07f854110efd59b1ab739459&per-page=100&page=1&");
foreach($response as $currency){
if($currency['rank']=1 ||$currency['rank']=3 ){
$price= DB::table('cryptos')
->where('id',$currency['rank'])
->select('price')
->get();
DB::table('cryptos')
     ->where('id',$currency['rank'])
     ->update([
        'price'=>$price ,

             ]);
             return view('home.test');

}


}

}*/






    //"https://api.nomics.com/v1/currencies/ticker?key=9ea7a9ef6937763e07f854110efd59b1ab739459-here&ids=BTC,ETH,XRP&interval=1d,30d&convert=EUR&platform-currency=ETH&per-page=100&page=1"
    //https://api.nomics.com/v1/currencies/ticker?key=9ea7a9ef6937763e07f854110efd59b1ab739459



