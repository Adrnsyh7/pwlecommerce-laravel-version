@extends('master')
@section('title')
Checkout
@endsection
@section('konten')
 <!-- Transaction -->

 <br>
 <br>
 <div class="container d-flex justify-content-center mt-5">
    <div class="text-center">
      @foreach ($order as $order_id => $orders)            
      <h6 class="mb-2">Order ID : {{$orders['order_id']}}</h6>
      <h1 class="mb-5">Your Order Has Been Placed</h1>
      <p class="mb-5">Thank you for ordering with us!</p>
      @endforeach
    </div>
  </div>

@endsection