

@include('layouts.main')
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 bg-dark text-white vh-100">
        <h3 class="text-center mt-3">Admin Panel</h3>
        <ul class="nav flex-column mt-4">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('admin.dashboard')}}">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Vendor
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('approved.vendor')}}">Registered</a></li>
              <li><a class="dropdown-item" href="{{route('pending.vendor')}}">Pending</a></li>
              <li><a class="dropdown-item" href="#">unapproved</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">payment</a>
          </li>
        </ul>
      </div>

      <!-- Content -->
      <div class="col-md-9">
        <div class="container  vendor mt-5 ">
        <div class="container container_card_starts mt-5">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body bg-danger">
                  <h5 class="card-title">Total Approved Vendor</h5>
                  <p class="card-text "><h2 class="text-center">{{$count}}</h2></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body bg-warning">
                  <h5 class="card-title">Total Users</h5>
                  <p class="card-text"><h2>{{$UserCount}}</h2></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body bg-primary">
                  <h5 class="card-title">Un approved vendor</h5>
                  <p class="card-text"><h2>{{$VendorunapprovedCount}}</h2></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>


