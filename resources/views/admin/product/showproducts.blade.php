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
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
                <!-- button -->
                <div>
                    <a href="{{ route('admin.dashboard.addproducts') }}" class="btn btn-primary">Add Product</a>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row ">
        <div class="col-xl-12 col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-lg">
                <div class="px-6 py-6">
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
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="#!"><img src="{{ asset('storage/' . $product->image) }}" class="icon-shape icon-md"></a></td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>@if($product->approved == 1)
                                            <span class="badge bg-light-primary text-dark-primary">Active</span>
                                            @elseif($product->approved == 2)
                                            <span class="badge bg-light-warning text-dark-warning">Draft</span>
                                            @else
                                            <span class="badge bg-light-danger text-dark-danger">Inactive</span>
                                            @endif</td>
                                    <td>{{ $product->regularPrice }}</td>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M Y') }}</td>
                                    <td><div class="dropdown">
                                                <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                <li class="delete_product" pid="{{$product->id}}"><a class="dropdown-item" ><i class="bi bi-trash me-3"></i>Delete</a></li>
                                                <li class="edit_product" pid="{{$product->id}}">
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

     </div>
</div>
</div>
</div>

@endsection
