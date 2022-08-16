@extends('base')
@section('title','Buy Crypto')

@section('content')
<br>


<center>
    <center><div style="width: 19rem;">@include('alerts.alert-message')</div></center>

        <div class="row mt-5">

  <center><div class="card" style="width: 22rem;">


  <div class="col-md-12">
    <div class="card-title card-center " > <h4>BTC</div>
<img  src="https://media.istockphoto.com/vectors/bitcoin-crypto-currency-blockchain-flat-logo-isolated-on-white-block-vector-id1016424332?k=20&m=1016424332&s=170667a&w=0&h=NVxABU9mp_V08-7bHTyD7Bm8LWuLLD7Lz6M6ztNTVLE=" alt="Category image"  style="width: 100px; margin: 15px auto;" >
      <div class="card-text text-start" id="p" style="margin: 5px">Name  : {{$currencyN}}  </div>
      <div class="card-text text-start" id="p" style="margin: 5px">Price  : {{$currencyP}} $ </div>

 </div>



  </div>
</center>
  </div>
  <br>
</div>


<form action="{{route('app_buyCrypto') }}"   class="" role="convert"  type="get">

    @csrf
    <center><label for="amount" class="text-light"> Amount: </label></center>
    <input type="double" name="amount" id="amount" class="form-control mb-3" style="width: 500px;" >



     </div>
     <div class="d-grid gap-2 md-7 mt-1">
     <center> <button class="btn btn-primary btn-dark btn-ouline-light " type="submit" style="width: 200px;"> Buy </button></center>
     <br>
     <center> <h6> <label for="amount" class="text-light text-center">10 USDT=  {{10/$currencyP}} BTC </label>
        <center> <h6> <label for="amount" class="text-light text-center">Your Bitcoin balance is :  {{Auth::user()->btc}} BTC </label>


<br><br><br>

    </form>

    <div class="col-lg-4 col-md-4 col-sm-6 text-center  mb-3 c" >



      <center><div class="card" style="width: 22rem;">

      <div class="col-md-12">
        <div class="card-title card-center " > <h4>ETH</div>
    <img  src="http://static1.squarespace.com/static/5f7337311939f8485ea0325f/5f970d4b96c7b33a7bdb80b9/6135efd19a810e50b5ba9cad/1630925271743/stickers_ethereum_eth_crypto_monnaie_bitcoin_logo_1.jpg?format=1500w" alt="Category image"  style="width: 100px; margin: 15px auto;" >
          <div class="card-text text-start" id="p" style="margin: 5px">Name  : Ethereum  </div>
          <div class="card-text text-start" id="p" style="margin: 5px">Price  : {{DB::table('cryptos')->select('price')->where('id',7)->first()->price}}$ </div>

     </div>



      </div>
    </center>
      </div>
      <br>
    </div>


    <form action="{{route('app_buyCryptoE') }}"   class="" role="convert"  type="get">

        @csrf
        <center><label for="amount" class="text-light"> Amount: </label></center>
        <input type="double" name="amount" id="amount" class="form-control mb-3" style="width: 500px;" >



         </div>
         <div class="d-grid gap-2 md-7 mt-1">
         <center> <button class="btn btn-primary btn-dark btn-ouline-light " type="submit" style="width: 200px;"> Buy </button></center>
         <br>
         <center> <h6> <label for="amount" class="text-light text-center">10 USDT=  {{10/1987.12870889}} ETH </label>
        <center> <h6> <label for="amount" class="text-light text-center">Your Ethereum balance is : {{Auth :: user()->eth}} ETH </label>


    <br>

        </form>












<style>
    body{
        background: black;
    }
</style>







</center>


@endsection


