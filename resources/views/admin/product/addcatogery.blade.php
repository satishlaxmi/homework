@extends('layouts.adminmain')
@section('addproduct')


                   <!-- container -->
                <div class="container">
                       <!-- row -->
                    <div class="row mb-8">
                        <div class="col-md-12">
                            <div class="d-md-flex justify-content-between align-items-center">
                                   <!-- page header -->
                                <div>
                                    <h2>Add New Category</h2>
                                       <!-- breacrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#" class="text-inherit">Categories</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div>
                                    <a href="{{route('admin.catogerylist.show')}}" class="btn btn-light">Back to Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id ="add_catogery" action="{{route('admin.catogerylist.add')}}" method="POST" enctype="multipart/formdata"></form>
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <!-- card -->
                            <div class="card mb-6 shadow border-0 p-2 d-flex justify-content-center">
                                <!-- card body -->
                    
                                    <h4 class="mb-4 h5 mt-5">Category Information</h4>

                                    <div class="row">
                                        <!-- input -->
                                        <div class="mb-3 col-lg-6">
                                            <label class="form-label">Category Name</label>
                                            <input type="text" class="form-control" placeholder="Category Name"
                                                required>
                                        </div>
                                        <div>
                                        </div>

                                        <!-- input -->
                                        <div class="mb-3 col-lg-6 ">
                                            <label class="form-label">Descriptions</label>
                                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="Product Description"></textarea>
                                        </div>

                                        <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary cat" >Create Catogery</button>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <script>
                

            </script>
@endsection