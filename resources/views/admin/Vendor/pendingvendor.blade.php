@include('layouts.main')
<div class="row">

    <div class="col-md-2 bg-dark text-white">
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
            <a class="nav-link text-white" href="#">Payments</a>
          </li>
        </ul>
      </div>
    <!-- pending-vendors.blade.php -->
    
    <div class="col-md-9">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-success">Approve</button>
                        <button class="btn btn-danger">Unapprove</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

