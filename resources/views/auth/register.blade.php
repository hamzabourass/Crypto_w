@extends('base')
@section('title','Register')
@section('content')
<style>
    body {





background: #000000;

}



body {margin:25px;}
</style>
<div class="container">


<div class="row">
<div class="col-md-5 mx-auto">
   <h1 class="text-center text-light mb-3 mt-5 ">Register</h1>
   <p class="text-center text-light mb-5">Create Your Acount If You Don't Have One </p>
   <form method="POST" action="{{route('register')}}" class="row g-3" id="form-register" >
    @csrf
    <div class="col-md-6">
        <label for="firstname" class="form-label text-light">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
        <small class="text-danger fw-bold" id="error-register-firstname"></small>
    </div>
    <div class="col-md-6">
        <label for="lastname" class="form-label text-light">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}" required autocomplete="firstname" autofocus>
        <small class="text-danger fw-bold" id="error-register-lastname"></small>


    </div>
    <div class="col-md-12">
        <label for="email" class="form-label text-light">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" url-emailExist="{{route('app_exist_email')}}" token="{{ csrf_token() }}" >
        <small class="text-danger fw-bold" id="error-register-email"></small>


    </div>
    <div class="col-md-6">
        <label for="password" class="form-label text-light">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
        <small class="text-danger fw-bold" id="error-register-password"></small>
    </div>
    <div class="col-md-6">
        <label for="password-confirm" class="form-label text-light">Password Confirmation</label>
        <input type="password" class="form-control" id="password-confirm" name="password-confirm" value="{{ old('password-confirm') }}" required autocomplete="password-confirm" autofocus>
        <small class="text-danger fw-bold" id="error-register-password-confirm"></small>
    </div>
    <div class="col-md-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="agreeTerms">
        <label class="form-check-label text-light" for="agreeTerms"> Agree To Terms</label> <br>
        <small class="text-danger fw-bold" id="error-register-agreeTerms"></small>
      </div>
    </div>

    <div class="d-grid gap-2">
        <button class="btn btn-primary btn-dark btn-ouline-light " type="button" id="register-user">Register</button>
      </div>
      {{csrf_field()}}
      <p class="text-center text-light mt-5">You already have an account?  <a  href="{{route('login')}}" class="col-md-6 text-end"> Login</a></p>

   </form>

</div>


</div>




</div>
</div>
<!--/*<script>
    $(document).ready(function(){

     $('#email').blur(function(){
      var error_email = '';
      var email = $('#email').val();
      var _token = $('input[name="_token"]').val();
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(!filter.test(email))
      {
       $('#error_email').html('<label class="text-danger">Invalid Email</label>');
       $('#email').addClass('has-error');
       $('#register').attr('disabled', 'disabled');
      }
      else
      {
       $.ajax({
        url:" }}",
        method:"POST",
        data:{email:email, _token:_token},
        success:function(result)
        {
         if(result == 'unique')
         {
          $('#error_email').html('<label class="text-success">Email Available</label>');
          $('#email').removeClass('has-error');
          $('#register').attr('disabled', false);
         }
         else
         {
          $('#error_email').html('<label class="text-danger">Email not Available</label>');
          $('#email').addClass('has-error');
          $('#register').attr('disabled', 'disabled');
         }
        }
       })
      }
     });

    });
    </script> -->










@endsection
