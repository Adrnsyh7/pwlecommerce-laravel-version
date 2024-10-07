<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | Toko Roti Alta Bakery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg shadow-sm" style="background-color: palegoldenrod;">
    <div class="container">
      <a class="navbar-brand fw-bold" style="color: #C15440;" href="{{route('home')}}">
        <img src="http://localhost:8000/img/logo.png" alt="Logo" width="50" class="d-inline-block align-text-center me-2">
        ALTA BAKERY
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @if (Auth::check() && Auth::user()->role == 'User')
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{route('cart')}}"><i class="fa-solid fa-cart-shopping"></i> Cart <span class="badge rounded-circle text-bg-danger">{{$count}}</span></a>
          </li>
          @else
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropbtn fw-medium" href="@if (Auth::check()) # @else {{ route('login') }} @endif ">
            <i class="fa-solid fa-user"></i> Account
            </a>
            <ul class="dropdown-menu">
            @if (Auth::check())
              <li><a class="dropdown-item fw-medium" href="{{route('profile')}}">Profile</a></li>
              @if (Auth::check() && Auth::user()->role == 'Admin')
              <li><a class="dropdown-item fw-medium" href="{{route('dashboard')}}">Dashboard</a></li>
              @else
              @endif
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item fw-medium" href="{{route('actionlogout')}}">Logout</a></li>
            @else
            @endif
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>  
  @yield('konten')
  <!-- Footer -->
  <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
        <img class="me-2" src="http://localhost:8000/img/logo.png
" width="50">
      </a>
      <span class="mb-3 mb-md-0 fw-medium">© 2024 Alta Bakery, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fa-brands fa-twitter fa-2xl"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fa-brands fa-facebook fa-2xl"></i></use></svg></a></li>
    </ul>
  </footer>
  </div>
  <script>
    $(function() {
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
        orientation: "top left"
      });
    });
  </script>
</body>
<script src="https://kit.fontawesome.com/47dcae39d3.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
</html>