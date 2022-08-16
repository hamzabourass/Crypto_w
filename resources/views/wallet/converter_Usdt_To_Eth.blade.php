@extends('base')
@section('title','Converter')

@section('content')
@auth
<style>
    body {





background: #000000;

}



body {margin:25px;}
</style>
<div class="container">
<div class="row">


<div class="col-md-4 mx-auto">
<h1 class="text-center text-light mb-3 mt-5">Converter</h1>
<p class="text-center text-light mt-2">Choose what you want to convert to:  <br>
    <a  href="{{route('app_btcconverter')}}" class="col-md-6 text-end"> USDT</a> Or <a  href="{{route('app_converter')}}" class="col-md-6 text-end"> BTC</a> Or <a  href="{{route('app_converter_Usdt_To_Eth')}}" class="col-md-6 text-end"> ETH</a></p>


<br><br>



       {{--inclu des messages d'alerts--}}
       @include('alerts.alert-message')





        @error('email')

       <div class="alert alert-success text-center" role="alert">
       {{ $message }}
      </div>
       @enderror
       <form action="{{route('app_convert_To_Eth') }}"   class="" role="convert"  type="get">
        @csrf
      <center><label for="amount" class="text-light"> <img  src="https://cryptologos.cc/logos/tether-usdt-logo.png" alt="Category image"  style="width: 30px; margin: 0x auto;" >  &#160; To &#160;  <img  src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Ethereum_logo_2014.svg/1257px-Ethereum_logo_2014.svg.png" alt="Category image"  style="width: 20px; margin: 0x auto;" > </label></center>
      <br>
      <input type="double" name="convert" id="convert" class="form-control mb-3" >

       <label for="amount" class="text-light">Your total of Ethereum now is:  {{Auth::user()->eth}} ETH </label>


       </div>
       <div class="d-grid gap-2 md-6 mt-4">
       <center> <button class="btn btn-primary btn-dark btn-ouline-light " type="submit" style="width: 200px;"> Convert </button></center>

    </div>
        <center>  <label for="amount" class="text-light mt-4">You have :  {{Auth::user()->balance}} USDT </label></center>


</form>





</div>

</div>
</div>



@endauth
@endsection
