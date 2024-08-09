@extends('master')
@section('konten')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body bg-light rounded-3 p-3">
            <h1>Shopping Cart</h1>
           
            <hr>
             @if(empty($products)): 
                <div class="mt-3 d-flex justify-content-around align-items-center">
                <h5 class="text-truncate" style="width: 250px;">Keranjang Kosong</h5>
                </div>
             @else
             @foreach($products as $row)
            <div class="mt-3 d-flex justify-content-around align-items-center">
              <img src="{{$row['gambar']}}" style="width: 80px; height: 80px; object-fit: cover" alt="">
              <div class="ms-3 text-center">
                <h5 class="text-truncate" style="width: 250px;">{{$row['nama']}}</h5>
                <h6 class="text-truncate" style="width: 250px;">{{$row['desc_produk']}}</h6>
              </div>
              <div class="ms-3">
                <h5>Harga</h5>
                <h6>{{$row['harga']}}</h6>
              </div>
              <div class="ms-3 text-center">
                <h5>Jumlah</h5>
                <div class="d-flex">
                <form method="post" style="display:flex;" action="{{route('update')}}">
                  @csrf
                <input type="hidden" name="id" value="{{$row['id']}}">
                  <button type="submit" name="action" class="btn btn-primary" value="decrease"><i class="fas fa-minus"></i></button>
             </form>

             <form method="post" style="display:flex;" action="{{route('update')}}">
                  @csrf
                  <input type="hidden" name="id" value="{{$row['id']}}">
                  <input id="quantity" name="kuantiti" type="number" class="form-control text-center" style="width: 50px;" value="{{$row['quantity']}}" />
                  <button type="submit" hidden>
             </form>
             <form method="post" style="display:flex;" action="{{route('update')}}">
                  @csrf
                  <input type="hidden" name="id" value="{{$row['id']}}">
                  <button type="submit" name="action"  class="btn btn-primary" value="increase" ><i class="fas fa-plus"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <hr>
            
                 @endforeach
                 @endif
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body bg-light rounded-3 p-3">
          <form action="" method="POST">
            <h1>Summary</h1>
            <hr>
            <div class="d-flex justify-content-between">
              <h5>Total</h5>
              <h5> {{$total}}</h5>
              <input type="text" style="display: none" name="total" id="total" value="{{$total}}">
            </div>
             <!-- if($total === 0 ): 
               else:  -->
            <button name="checkout" id="checkout" type="submit"class="btn mt-3 mb-2 btn-primary w-100">Checkout</button>
             <!-- endif;  -->
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection