@extends('base')
@section('title','Search')

@section('content')
<br>
<br>
<br>
@foreach ($response as $currency)

@if (strtolower($currency['name'])  == $search || strtoupper($currency['name'])  == $search || $currency['name'] ==  $search  ||  $currency['currency']==  $search || strtolower($currency['currency'])==  $search || $currency['rank']== $search  )

<center>
<div class="col-lg-4 col-md-4 col-sm-6 text-center  mb-3 c" >
  <center><div class="card" style="width: 22rem;">


  <div class="col-md-12">
    <div class="card-title card-center " > <h4>{{$currency['currency']}}</h4></div>
<img  src="{{$currency['logo_url']}}" alt="Category image"  style="width: 100px; margin: 15px auto;" >
      <div class="card-text text-start" id="p" style="margin: 5px"> Name  : {{$currency['name']}} </div>
      <div class="card-text text-start" id="p" style="margin: 5px">Rank  : {{$currency['rank']}} </div>

      <div class="card-text text-start" id="p" style="margin: 5px"> Price  : {{$currency['price']}} &#36;</div>
      <div class="card-text text-start" id="p" style="margin: 5px"> Price Date : {{$currency['price_date']}} </div>
      <div class="card-text text-start" id="p" style="margin: 5px"> Price Time stamp : {{$currency['price_timestamp']}} </div>
      <div class="card-text text-start" id="p" style="margin: 5px"> Circulating Supply : {{$currency['circulating_supply']}} </div>
      <div class="card-text text-start" id="p" style="margin: 5px"> Market Cap : {{$currency['market_cap']}} </div>
      <div class="card-text text-start" id="p" style="margin: 5px"> Market Cap Dominance : {{$currency['market_cap_dominance']}} </div>

 </div>



  </div>
</center>
  </div>
  <br>
</div>


<form action="{{route('app_buycrypto') }}"   class="" role="convert"  type="get">

    @csrf

     <div class="d-grid gap-2 md-7 mt-1">
     <center> <button class="btn btn-primary btn-dark btn-ouline-light " type="submit" style="width: 200px;"> Buy </button></center>

<br><br>

    </form>









@endif

@endforeach



<style>
    body{
        background: black;
    }
</style>







</center>


@endsection


