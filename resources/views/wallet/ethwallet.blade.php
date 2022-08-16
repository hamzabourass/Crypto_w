@extends('base')
@section('title','Deposit')

@section('content')
@auth
<script>
    function clicked(e)
    {
        if(!confirm('Are you sure?')) {
            e.preventDefault();
        }
    }
    </script>
<style>
    body {





background: #000000;

}



body {margin:25px;}
</style>

<div class="col-md-4 mx-auto">
<h1 class="text-center text-light mb-3 mt-5">Deposit ETH</h1>
<p class="text-center text-light mt-2">Choose the crypto you want to send  <br>
    <a  href="{{route('app_wallet')}}" class="col-md-6 text-end"> USDT</a> Or <a  href="{{route('app_btcwallet')}}" class="col-md-6 text-end"> BTC</a> Or <a  href="{{route('app_ethwallet')}}" class="col-md-6 text-end"> ETH</a></p>




       {{--inclu des messages d'alerts--}}
       @include('alerts.alert-message')





        @error('email')

       <div class="alert alert-success text-center" role="alert">
       {{ $message }}
      </div>
       @enderror
       <form action="{{route('app_depositeth') }}"   class="" role="depositeth"  type="get">
        @csrf
      <label for="email" class="text-light">Email's User</label>
      <input type="email" name="email" id="email" class="form-control mb-3 @error('email') is-invalid @enderror " value="{{ old('email') }}" required autocomplete="email" autofocus>

       <label for="amount" class="text-light">Amount of ETH</label>
       <input type="float" name="amount" id="amount" class="form-control mb-3">

       </div>
       <div class="d-grid gap-2 md-6">
       <center> <button class="btn btn-primary btn-dark btn-ouline-light " type="submit" style="width: 200px;" onclick="clicked(event)"> Send </button></center>
       {{csrf_field()}}


    </div>
    <h6 class="text-center text-light   mb-3 mt-5">Your total of Ethereum is : {{Auth::user()->eth}} ETH </h6>

 <h5><p class="text-center text-light mt-2">Convert your money  <a  href="{{route('app_converter')}}" class="col-md-6 text-end"> from here</a> </p></h5>
</form>





</div>

</div>
</div>



@endauth
@endsection
