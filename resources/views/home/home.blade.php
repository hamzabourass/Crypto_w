@extends('base')
@section('title','Home')

@section('content')





  <style>
      #pa {
        font-family: Geneva, Verdana, sans-serif;
        text-align: center;
        color: #ffffff;

      }
      #p {
        font-family:  Tahoma, sans-serif;
        text-align: center;
        color: #000000;
        font-size: large;
      }




        </style>

 <div class="container">

          <center><h1 id ="pa" >Crypto coins</h1></center>
          <br>
          <br>



          <div class="container-lg card" style="margin: 0 auto;">
            <div class="row mt-5">
          @foreach ($response as $currency)


          <div class="col-lg-4 col-md-4 col-sm-6 text-center  mb-3" >
            <div class="" style="width: 22rem;">


            <div class="col-md-12">
              <div class="card-title" > <h4>{{$currency['currency']}}</h4></div>
      <img  src="{{$currency['logo_url']}}" alt="Category image"  style="width: 30px; margin: 10px auto;" >
                <div class="card-text text-center" id="p" style="margin: 5px"> Price  : {{$currency['price']}} &#36;</div>

            </div>
            </div>
            <br>
          </div>
         @endforeach</div>
<style>
 @import url('https://fonts.googleapis.com/css2?family=Anonymous+Pro&display=swap');
 @import url('https://fonts.googleapis.com/css?family=Montserrat:300&display=swap');
             @import url('https://fonts.googleapis.com/css?family=Big+Shoulders+Display&display=swap');
             @import url('https://fonts.googleapis.com/css?family=Poppins:700');
body {





background: #000000;

}



body {margin:25px;}

div.polaroid {
  width: 80%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
}

div.container {
  text-align: center;
  padding: 10px 20px;
}



</style>









@endsection


