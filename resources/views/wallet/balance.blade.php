@extends('base')
@section('title','Overview')

@section('content')
@auth
<style>
    body {





background: #000000;

}



body {margin:25px;}
</style>



<div class="col-md-4 mx-auto">
<h1 class="text-center text-light mb-3 mt-5">Your Cryptos</h1>
<p class="text-center text-light mt-2">
<a  href="{{route('app_wallet')}}" class="col-md-6 text-end"> Deposit
<a  href="{{route('app_buycrypto')}}" class="col-md-6 text-end"> || Buy
<a  href="{{route('app_converter')}}" class="col-md-6 text-end"> || Transfer</p>

<br>
<br>
<center>
<div class="card " style="width: 30rem;">
    <br>
    <div class="text-start"><h6> <label for="amount" class="text-dark text-start"><img  src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="Category image"  style="width: 25px; margin: 0px auto;" >Tether :  {{Auth::user()->balance}} $   </label> <br>
      <br> <label for="amount" class="text-dark  text-start"><img  src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Bitcoin.svg/1024px-Bitcoin.svg.png" alt="Category image"  style="width: 25px; margin: 0px auto;" >Bitcoin  :  {{Auth::user()->btc}} BTC ≈ {{(Auth::user()->btc)*23800}} $</label><br>
     <br>  <label for="amount" class="text-dark  text-start"><img  src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Ethereum_logo_2014.svg/1257px-Ethereum_logo_2014.svg.png" alt="Category image"  style="width: 20px; margin: 0x auto;" >Ethereum :  {{Auth::user()->eth}} ETH ≈ {{(Auth::user()->eth)*1773}} $</label><br>
  <br>
</h6>
</div></center></div>
<br>
<h4 class="text-light text-center"> Total Value(BTC) <br> ≈ {{(Auth::user()->btc) + (Auth::user()->balance)*(1/DB::table('cryptos')->select('price')->where('id',6)->first()->price) + ((Auth::user()->eth)*1773)*(1/DB::table('cryptos')->select('price')->where('id',6)->first()->price) }}</h4>




</div>

</div>




@endauth
@endsection
