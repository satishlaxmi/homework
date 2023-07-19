

@extends('layouts.adminmain')
@section('addproduct')
    <!-- main -->
    <div class="container">
        <div class="row mb-8">
          <div class="col-md-12">
            <!-- page header -->
            <div class="d-md-flex justify-content-between align-items-center">
              <div>
                <h2>Products</h2>
                  <!-- breacrumb -->
                  <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                <a href="{{route('admin.dashboard.addproducts')}}" class="btn btn-primary">Add Product</a>
              </div>
            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row ">
          <div class="col-xl-12 col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-lg">
              <div class="px-6 py-6 ">
                <div class="row justify-content-between">
                  <!-- form -->
                  <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                    <form class="d-flex" role="search">
                      <input class="form-control" type="search" placeholder="Search Products" aria-label="Search">
                    </form>
                  </div>
                  <!-- select option -->
                  <div class="col-lg-2 col-md-4 col-12">
                    <select class="form-select">
                      <option selected>Status</option>
                      <option value="1">Active</option>
                      <option value="2">Deactive</option>
                      <option value="3">Draft</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- card body -->
              <div class="card-body p-0">
                <!-- table -->
                <div class="table-responsive">
                  <table class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                    <thead class="bg-light">
                      <tr>
                        <th>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                            <label class="form-check-label" for="checkAll">

                            </label>
                          </div>
                        </th>
                        <th>Image</th>
                        <th>Proudct Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Create at</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($productsdetails as $product)
                      <tr>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="productOne">
                            <label class="form-check-label" for="productOne">
                            </label>
                          </div>
                        </td>
                        <td>
                            <a href="#!"><img src="{{ asset('storage/' . $product->image) }}" class="icon-shape icon-md"></a>
                        </td>

                        <td><a href="#" class="text-reset">{{$product->title}}</a></td>
                        <td>{{$product->category}}</td>

                        <td>
                        @if($product->approved == 1)
                          <span class="badge bg-light-primary text-dark-primary">Active</span>
                        @elseif($product->approved == 2)
                          <span class="badge bg-light-warning text-dark-warning">Draft</span>
                        @else
                          <span class="badge bg-light-danger text-dark-danger">Inactive</span>
                        @endif

                        </td>
                        <td>{{$product->salePrice}}</td>
                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M Y') }}</td>
                        
                        <td>
                          <div class="dropdown">
                            <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="feather-icon icon-more-vertical fs-5"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li id="delete_product" pid="{{$product->id}}"><a class="dropdown-item" ><i class="bi bi-trash me-3"></i>Delete</a></li>
                              <li id="edit_product" pid="{{$product->id}}">
                                <a href="{{ route('editProducts', ['id' => $product->id]) }}" class="dropdown-item">
                                  <i class="bi bi-pencil-square me-3"></i>Edit
                                </a>
                              </li>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class=" border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                <nav class="mt-2 mt-md-0">
                {!! $productsdetails->withQueryString()->links('pagination::bootstrap-5') !!}

                </nav>
              </div>
            </div>
          </div>
        </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 $(document).ready(function() {
  // delete function starts here
  $("#delete_product").on('click', function() {
    let pid = $(this).attr('pid');
    // Store the reference to the table row
    let row = $(this).closest('tr');
    // AJAX start
    $.ajax({
      url: "{{ route('deleteproductphp') }}",
      type: "POST",
      data: {
        "_token": "{{ csrf_token() }}",
        "pid": pid
      },
      success: function(response) {
        if (response.message) {
          swalFunction(response.message);
          // Remove the table row on success
          row.remove();
        } else {
          swalFunction(response.errorMessage);
        }
      }
    });
    // AJAX end
  });
  function  swalFunction (messgae){
      Swal.fire({
      position: 'center',
      icon: 'success',
      title: messgae,
      showConfirmButton: false,
      timer: 1500
      })
    }

        // Listen for pagination link clicks
        $('#pagination-container').on('click', 'a', function(e) {
            e.preventDefault();

            // Get the URL of the next page
            var nextPageUrl = $(this).attr('href');

            // Load the next page's content using AJAX
            $.ajax({
                url: nextPageUrl,
                type: 'GET',
                dataType: 'html',
                success: function(response) {
                    // Update the content of the pagination container
                    $('#pagination-container').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


    //delete finction ends here

     //to
   


</script>  
@endsection



 
