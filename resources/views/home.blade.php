@extends('master')

@section('konten')

  <!-- Slideshow  -->
  <div class="container">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="img/Slider1.jpg" class="d-block w-100 slider" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="img/Slider2.jpg" class="d-block w-100 slider" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/Slider3.jpg" class="d-block w-100 slider" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div> 
  </div>

  <!-- Search Bar -->
  <div class="d-flex justify-content-center align-items-center"> 
    <form action="/produk" method="GET">
    <div class="input-group mb-4 mt-5">
      <input type="text" class="form-control" placeholder="Search" aria-describedby="button-addon2" name="search" value="{{ old('search') }}">
      <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    </form>
  </div>
  <!-- Product -->
  <div class="container">
    <div class="row d-flex justify-content-start align-items-center">
    @foreach($produk as $key => $row)
        <div class="col-6 col-md-4 mt-3">
        <div class="card">
          <img src="{{$row->gambar}}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$row->nama}}</h5>
            <p class="card-text">{{$row->desc_produk}}</p>
            <a href="detail/{{$row->id}}" class="btn btn-primary">Show Product</a>
          </div>
         
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{ $produk->links('vendor.pagination.custom') }} 



@endsection