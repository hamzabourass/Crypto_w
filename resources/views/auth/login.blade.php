@extends('base')
@section('title','Login')

@section('content')
<style>
    body {





background: #000000;

}



body {margin:25px;}
</style>
<div class="container">
<div class="row">
<div class="col-md-4 mx-auto">
<h1 class="text-center text-light mb-3 mt-5">Sign In</h1>
<p class="text-center text-light mb-5">Your cryptos are waiting for you!</p>
<form method="POST" action="{{route('login')}}">

        @csrf
       {{--inclu des messages d'alerts--}}
       @include('alerts.alert-message')





        @error('email')

       <div class="alert alert-danger text-center" role="alert">
       {{ $message }}
      </div>

      @enderror
      @error('password')

      <div class="alert alert-danger text-center" role="alert">
      {{ $message }}
     </div>

     @enderror

      <label for="email" class="text-light">Email</label>
      <input type="email" name="email" id="email" class="form-control mb-3 @error('email') is-invalid @enderror " value="{{ old('email') }}" required autocomplete="email" autofocus>

       <label for="password" class="text-light">Password</label>
       <input type="password" name="password" id="password" class="form-control mb-3" @error('passwordphp ') is-invalid @enderror required autocomplete="current-password" >

       <div class="row mb-3" >
        <div class="col-md-6">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="remember" name="remember" {{old('remember' ? 'cheked' : '')}} >
                <label class="form-check-label text-light" for="remember">Remember me</label>
              </div>


        </div>
        <div class="col-md-6 text-end text-light">
        </div>
       </div>
       <div class="d-grid gap-2">
        <button class="btn btn-primary btn-dark btn-ouline-light" type="submit"> Sign In</button>
    </div>
    <p class="text-center text-light mt-5">Not registred yet?  <a  href="{{route('register')}}" class="col-md-6 text-end"> Create an Account</a></p>

</form>



</div>

</div>
</div>
@endsection
