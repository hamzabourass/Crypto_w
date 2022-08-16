@extends('base')
@section('title','Dashboard')

@section('content')
<br>


<img src="https://t3.ftcdn.net/jpg/02/15/88/20/360_F_215882061_qY754KpkJaID0DiTerV0AmwDLEnnGItx.jpg" alt="" style="width:1500px;height:700px;"> >
<div class="container" >
    <p  class="text-center text-blue mt-5"><h1 id="g" class="text-light "> </h1> <h1 id="d" > </h1>  <a id="h" href="{{route('app_home')}}" class=" btn btn-outline-dark  col-md-4 text-center "><h2> Start Now!</h2></a></p>

  </div>

<style>
     body {





background: #000000;

}
/* Container needed to position the button. Adjust the width as needed */

/* Style the button and place it in the middle of the container/image */




#h {
    position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  font-family: fantasy, Verdana, sans-serif;

        color: #807e7e;




}
#g{
    position: absolute;
  top: 50%;
  left: 32%;

  font-family: fantasy;

              color: #1B6A61;


}
#d{
    position: absolute;
  top: 90%;
  left: 50%;
  font-family: fantasy, Verdana, sans-serif ;
  color: #dbdbdb;




}

</style>








@endsection
