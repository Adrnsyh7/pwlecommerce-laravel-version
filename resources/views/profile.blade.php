@extends('master')

@section('konten')


<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex align-items-start">
          <div class="nav flex-column nav-underline me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
            <a class="nav-link" id="v-pills-transaction-tab" data-bs-toggle="pill" data-bs-target="#v-pills-transaction" type="button" role="tab" aria-controls="v-pills-transaction" aria-selected="false">Transaction</a>
            <a class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false">Change Password</a>
          </div>
          <div class="tab-content w-100" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
            @foreach($user as $key => $row)
                <form action="" method="POST">
                  <fieldset disabled>
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{$row->username}}">
                  </div>
                  </fieldset>
                  <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$row->name}}" required>
                  </div>
                  <fieldset disabled>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value=" {{$row->email}} " >
                  </div>
                  </fieldset>
                  <div class="mb-3 form-group">
                    <label for="date" class="form-label">Date of Birth</label>
                    <div class="input-group date" id="datepicker">
                      <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                      </span>
                      <input type="text" class="form-control" name="date" id="date" value = " {{$row->tgl_lahir}}" readonly>
                    </div>          
                  </div>
                  <button type="submit" class="btn btn-primary mb-3" name="change_data" id="change_data">Save</button>
                </form>  
                @endforeach
            </div>
            <div class="tab-pane fade" id="v-pills-transaction" role="tabpanel" aria-labelledby="v-pills-transaction-tab" tabindex="0">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Order Id</th>
                    <th scope="col">Order Time</th>
                    <th scope="col">Total</th>
                  </tr> 
                </thead>
                <tbody>

                  <tr>
                    <th scope="row"></th>
                    <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                       
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab" tabindex="0">
              <form action="" method="POST">
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password1" id="password1" required />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password2" id="password2" required />
              </div>
              <button name="change_password" id="change_password" type="submit" class="btn btn-primary mb-3">Confirm</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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
  @endsection