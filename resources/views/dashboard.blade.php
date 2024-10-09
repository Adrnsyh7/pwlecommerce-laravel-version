<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Alta Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <h1 href="index.php" class="mb-4">Alta Bakery</h1>
                </div>
                <ul class="sidebar-nav">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <a class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" href="#home" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                      <a class="nav-link " id="v-pills-product-tab" data-bs-toggle="pill" data-bs-target="#v-pills-product" href="#products" type="button" role="tab" aria-controls="v-pills-product" aria-selected="false">Products</a>
                      <a class="nav-link " id="v-pills-order-tab" data-bs-toggle="pill" data-bs-target="#v-pills-order" type="button" role="tab" aria-controls="v-pills-order" aria-selected="false">Orders</a>
                      <a class="nav-link" id="v-pills-customer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customer" type="button" role="tab" aria-controls="v-pills-customer" aria-selected="false">Customers</a>
                      <hr>
                      <a class="nav-link" id="v-pills-setting-tab" data-bs-toggle="pill" data-bs-target="#v-pills-setting" type="button" role="tab" aria-controls="v-pills-setting" aria-selected="false">Settings</a>
                      <a class="nav-link" href="index.php" type="button" aria-selected="false">Home</a>
                    </div>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <main class="content px-3 py-2">    
            <div class="container-fluid">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">
                        <div class="mb-3">
                            <h4>Dashboard</h4>
                        </div>                        
                    </div>
                    <div class="tab-pane" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab" tabindex="0" >
                        <div class="mb-3">
                            <h4>Product</h4>
                        </div>
                        <!-- Add Product -->
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">
                            + Add Product
                        </button>                    
                        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addProductLabel">Add Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div> 
                                <form action="{{route('actionstore')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image Product</label>
                                            <input class="form-control" type="file" id="formFile" name="gambar" required>
                                          </div>
                                          @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                          <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                          </div>
                                  
                                          <div class="mb-3">
                                            <label for="desc" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="desc" name="desc" required>
                                          </div>
                                    
                                          <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="price" name="price" required>
                                          </div>

                                          <div class="mb-3">
                                            <label for="stok" class="form-label">Stok</label>
                                            <input type="number" class="form-control" id="stok" name="stok" required>
                                          </div>
                                        </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="formsubmit" class="btn btn-primary" id="formsubmit">Save</button>
                                </div>
                            
                            </div>
                                    </form> 
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Action</th>
                              </tr> 
                            </thead>
                            <tbody>
                            <?php 
                             $no = 0 + 1
                            ?>
                            <tr>
                            @foreach($produk as $key => $row)
                            <td><?= $no ?></td>
                                <th scope="row">{{$row->item_id}}</th>
                                <td><img src="{{$row->gambar}}"style="width: 80px; height: 80px; object-fit: cover" alt=""></td>
                                <td>{{$row->nama}}</td>
                                <td>
                                    <span class="description text-truncate">{{$row->desc_produk}}</span>
                                </td>
                                <td>{{$row->harga}}</td>
                                <td>{{$row->stok}}
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#editProduct{{$row->item_id}}" href="{{$row->item_id}}/edit"><i class="fa-solid fa-pen">
                                </td>
                                <td>
                                    <!-- Edit Product -->
                                    <button type="button" class="btn btn-warning text-black" data-bs-toggle="modal" data-bs-target="#editProduct{{$row->item_id}}" href="{{$row->item_id}}/edit"><i class="fa-solid fa-pen"></i></button>
                                    <div class="modal fade" id="editProduct{{$row->item_id}}" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editProductLabel">Edit Product</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('actionUpdate', $row->item_id) }}" method="POST"  enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                     <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Image Product</label>
                                                        <input class="form-control" type="file" id="formFile" name="gambarEdit" value="{{$row->gambar}}">
                                                      </div>
                                                      <div class="mb-3">
                                                        <label for="nameEdit" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="nameEdit" name="nameEdit" value="{{$row->nama}}" required>
                                                      </div>
                                                      <div class="mb-3">
                                                        <label for="descEdit" class="form-label">Description</label>
                                                        <input type="text" class="form-control" id="descEdit" name="descEdit" value="{{$row->desc_produk}}" required>
                                                      </div>
                                                      <div class="mb-3">
                                                        <label for="priceEdit" class="form-label">Price</label>
                                                        <input type="text" class="form-control" id="priceEdit" name="priceEdit" value="{{$row->harga}}"  required>
                                                      </div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                </div>  
                                    </div>

                                    </div>
                                    <!-- Delete Product -->
                                    <button type="button" class="btn btn-danger text-black" data-bs-toggle="modal" data-bs-target="#deleteProduct{{$row->item_id}}"><i class="fa-solid fa-trash"></i></button>
                                    <div class="modal fade" id="deleteProduct{{$row->item_id}}" tabindex="-1" aria-labelledby="deleteProductLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteProductLabel">Delete Product</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Are you sure want to delete this product?</h6>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                            <form action= "{{ route('actionDelete', $row->item_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')                                        
                                            <button type="submit" class="btn btn-primary" id="submitdelete" name="submitdelete">Delete</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                             
                              </tr>
                              <?php
      $no++
            ?>
            @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab" tabindex="0">
                        <div class="mb-3">
                            <h4>Orders</h4>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Order Time</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Total</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>
                              </tr> 
                            </thead>
                            <tbody>
                            @foreach($order as $index => $row)
                            <tr>
                                <th scope="row"></th>
                                <td>{{$row->order_id}}</td>
                                <td>{{$row->order_date}}</td>
                                <td>{{$row->customer_id}}</td>
                                <td>{{$row->order_total}}</td>
                                <td>  
                                    <select class="form-select order-status" data-order-id="{{ $row->order_id }}"  {{ $row->order_status == 'completed' ? 'disabled' : '' }}>
                                        <option value="pending" {{ $row->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $row->order_status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $row->order_status == 'completed' ? 'selected' : '' }} >Completed</option>
                                        <option value="cancelled" {{ $row->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select></td>
                                <td>  
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailOrder{{$row->order_id}}"><i class="fa-solid fa-info"></i></button></td>
                                </td>
                                </tr>    
                                <div class="modal fade" id="detailOrder{{$row->order_id}}" tabindex="-1" aria-labelledby="detailOrderLabel{{$row->order_id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="detailOrderLabel{{$row->order_id}}">Detail Order</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            @foreach($row->orderDetail as $detail)
                                            <div class="mt-3 d-flex justify-content-around align-items-center">
                                            <img src="{{ $detail->menuItem->gambar}}" style="width: 80px; height: 80px; object-fit: cover" alt="">
                                            <div class="ms-3 text-center">
                                            <h5 class="text-truncate" style="width: 250px;">{{ $detail->menuItem->nama}}</h5>
                                            <h6 class="text-truncate" style="width: 250px;">{{ $detail->menuItem->desc_produk}}</h6>
                                            </div>
                                            
                                            <div class="ms-3">
                                            <h5>Harga</h5>
                                            <h6>{{ $detail->menuItem->harga}}</h6>
                                            </div>
                                            
                                            <div class="ms-3 text-center">
                                            <h5>Jumlah</h5>
                                            <h6>{{$detail->quantity}}</h5>
                                            </div>

                                            <div class="ms-3 text-center">
                                            <h5>Subtotal</h5>
                                            <h6>{{$detail->subtotal}}</h6>
                                            </div>

                                            </div>  
                                            @endforeach  
                                            </div>
                                            <div class="mt-3 d-flex justify-content-around align-items-end">
                                            <h5>Total</h5s>
                                            <h5>{{$row->order_total}}</h5>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                </div>  
                                    </div>
                                    </div>
                                    @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab" tabindex="0">
                        <div class="mb-3">
                            <h4>Customers</h4>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">USER ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date Of Birth</th>
                                <th scope="col">Last Login</th>
                              </tr> 
                            </thead>
                            <tbody>
                            @foreach($user as $key => $row)
                            <tr>
                                <th scope="row"></th>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->username}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->tgl_lahir}}</td>
                                <td>{{$row->last_login}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                   
                    </div>
                    <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab" tabindex="0">
                        <div class="mb-3">
                            <h4>Setting</h4>
                        </div>
                        <div class="container">
                            <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-underline me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Change Password</a>
                                </div>
                                <div class="tab-content w-100" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
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
                    </div>
                </div>
            </div>
            </main>
        </div>
    </div>
<script>
    const sidebarToggle = document.querySelector("#sidebar-toggle")
    sidebarToggle.addEventListener("click",function(){
        document.querySelector("#sidebar").classList.toggle("collapsed")
    })

    $(document).ready(function() {
        $('.order-status').change(function() {
            var orderId = $(this).data('order-id'); // Ambil ID order
            var newStatus = $(this).val(); // Ambil status baru

            $.ajax({
                url: "{{ route('updateStatus') }}", // Route ke fungsi yang akan mengupdate status
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}", // Token CSRF untuk keamanan
                    order_id: orderId,
                    status: newStatus
                },
                success: function(response) {
                    alert('Status berhasil diperbarui!');
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat memperbarui status.');
                }
            });
        });
    });
</script>
</body>
<script src="https://kit.fontawesome.com/47dcae39d3.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</html>