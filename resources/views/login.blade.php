<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Toko Roti Alta Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row min-vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6 d-none d-md-block"  style="background-color: palegoldenrod;">
          <div class="min-vh-100 d-flex justify-content-center align-items-center">
            <img class="img-fluid" style="width: 60%;" src="{{ asset('img/logo.png') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="container p-5">
              <h1 style="text-align: center; margin-bottom: 20px; font-weight: bold;">Sign In</h1>
              @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
              <form action="{{ route('actionlogin') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control rounded-pill" name="username" id="username" required />
                </div>
                <div class="mb-2">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control rounded-pill" name="password" id="password" required />
                </div>
                <p class="mb-3" style="cursor:pointer;" onclick="showPassword()"><span class="field-icon fa fa-fw fa-eye toggle-password"></span> Show Password</p>
                <button name="submit" type="submit" class="btn btn-primary rounded-pill mb-3 w-100">Sign In</button>
                <p style="text-align: center;">Dont have an account? <a href="signup.php" style="color: black; font-weight: 500;">Sign Up</a></p>
              </form>  
         
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://kit.fontawesome.com/47dcae39d3.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  </html>