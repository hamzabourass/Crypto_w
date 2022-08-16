@extends('base')
@section('title','Account activation')

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
<h1 class="text-center text-light mb-3 mt-5">Account activation</h1>

 {{--inclu des messages d'alerts--}}
 @include('alerts.alert-message')



<form  method="POST" action="{{route('app_activation_code',['token'=>$token])}}">
@csrf
<div class="mb-3">
<label for="activation-code"  class="form-label text-light" >  Put Your code here:</label>
<input type="text" class="form-control @if(Session::get('danger')) is-invalid @endif"  name="activation-code" id="activation-code" value="@if(Session::has('activation_code')) {{Session::get('activation_code')}} @endif">
</div>


<div class="row mb-3" >
    <div class="col-md-7 text-light">
    <a href="{{route('register')}}">Change your email adress</a>
    </div>
    <div class="col-md-5 text-end text-light">
    <a href="{{route('app_resend_activation_code', ['token'=> $token])}}">Resend the code</a>

    </div>

</div>
<div class="d-grid gap-2">
<button  class="btn btn-primary btn-dark btn-ouline-light" type="submit">Send</button>
</div>


</form>

</div>
</div>
 </div>



@endsection
