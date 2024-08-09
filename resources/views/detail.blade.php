@extends('master')

@section('konten')

<div class="container mt-5">
    <div class="row align-items-center">
    @foreach($produk as $row)
        <div class="col-md-6 text-end">
        <img src="{{$row->gambar}}" alt="" style="width: 450px; height: 450px; object-fit: cover;">
      </div>
      <div class="col-md-6">
        <h1>{{$row->nama}}</h1>
        <p>{{$row->desc_produk}}</p>
        <h5>{{$row->harga}}</h5>
        <form action="{{ route('addcart') }}"method="post">
        @csrf
        <input type="hidden" name="id" value="{{$row->id}}">
        <input type="number" name="quantity" value="1" >
        <button name="add" type="submit" class="btn mt-2 mb-5 btn-primary w-100">Add Cart</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>

  @endsection