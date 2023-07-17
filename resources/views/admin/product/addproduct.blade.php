@extends('layouts.adminmain')
@section('addproduct')
<div class="container">
  <!-- row -->
  @if(Session::has('success'))
                  <div   class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! session('success') !!}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
               @endif
               @if(Session::has('warning'))
                  <div   class="alert {{ Session::get('alert-warning', 'alert-warning') }}">not saved                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
               @endif

    <div class="row mb-8">
      <div class="col-md-12">
        <div class="d-md-flex justify-content-between align-items-center">
          <!-- page header -->
          <div>
            <h2>Add New Product</h2>
              <!-- breacrumb -->
              <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-inherit">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
              </ol>
            </nav>
          </div>
          <!-- button -->
          <div>
            <a href="products.html" class="btn btn-light">Back to Product</a>
          </div>
        </div>
      </div>
    </div>
  <!-- row -->
  <form id="productdata" action="{{route('admin.dashboard.add')}}" method="POST" enctype="multipart/form-data" >
  @csrf    
  <div class="row">
        <div class="col-lg-8 col-12">
            <!-- card -->
            <div class="card mb-6 card-lg">
                <!-- card body -->
                <div class="card-body p-6 ">
                    <h4 class="mb-4 h5">Product Information</h4>
                    <div class="row">
                        <!-- input -->
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Product Name" >
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif

                        </div>
                        <!-- input -->
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="category">Product Category</label>
                            <select class="form-select" id="category" name="category">
                                <option selected disabled>Select Product Category</option>
                                <option value="Dairy, Bread & Eggs">Dairy, Bread & Eggs</option>
                                <option value="Snacks & Munchies">Snacks & Munchies</option>
                                <option value="Fruits & Vegetables">Fruits & Vegetables</option>
                            </select>
                            @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                                @endif
                        </div>
                        <!-- input -->
                        <div class="mb-3 col-lg-6">
                           <label class="form-label" for="weight">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" >
                            @if ($errors->has('weight'))
                                <span class="text-danger">{{ $errors->first('weight') }}</span>
                                @endif
                        </div>
                        <!-- input -->
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="units">Units</label>
                            <select class="form-select" id="units" name="units">
                                <option selected disabled>Select Units</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            @if ($errors->has('units'))
                                <span class="text-danger">{{ $errors->first('units') }}</span>
                                @endif
                        </div>
                        <div>
                            <div class="mb-3 col-lg-12 mt-5">
                                <!-- heading -->
                                <h4 class="mb-3 h5">Product Images</h4>
                                <!-- input -->
                                <div class="fallback">
                                    <input name="image" type="file">
                                </div>

                            </div>
                        </div>
                        <!-- input -->
                        <div class="mb-3 col-lg-12 mt-5">
                            <h4 class="mb-3 h5">Product Descriptions</h4>
                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="Product Description"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <!-- card -->
            <div class="card mb-6 card-lg">
                <!-- card body -->
                <div class="card-body p-6">
                    <!-- input -->
                    <div class="form-check form-switch mb-4">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchStock" name="inStock" checked>
                        <label class="form-check-label" for="flexSwitchStock">In Stock</label>
                        @if ($errors->has('inStock'))
                                <span class="text-danger">{{ $errors->first('inStock') }}</span>
                                @endif
                    </div>
                    <!-- input -->
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="productCode">Product Code</label>
                            <input type="text" class="form-control" id="productCode" name="productCode" placeholder="Enter Product Code">
                            @if ($errors->has('productCode'))
                                <span class="text-danger">{{ $errors->first('productCode') }}</span>
                                @endif
                        </div>
                        <!-- input -->
                        <div class="mb-3">
                            <label class="form-label" for="productSKU">Product SKU</label>
                            <input type="text" class="form-control" id="productSKU" name="productSKU" placeholder="Enter Product SKU">
                            @if ($errors->has('productSKU'))
                                <span class="text-danger">{{ $errors->first('productSKU') }}</span>
                                @endif
                        </div>
                        <!-- input -->
                        <div class="mb-3">
                            <label class="form-label" for="productStatus">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="productStatus" id="inlineRadio1" value="active" checked>
                                <label class="form-check-label" for="inlineRadio1">Active</label>
                                @if ($errors->has('productStatus'))
                                <span class="text-danger">{{ $errors->first('productStatus') }}</span>
                                @endif
                            </div>
                            <!-- input -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="productStatus" id="inlineRadio2" value="disabled">
                                <label class="form-check-label" for="inlineRadio2">Disabled</label>
                                @if ($errors->has('productStatus'))
                                <span class="text-danger">{{ $errors->first('productStatus') }}</span>
                                @endif
                            </div>
                            <!-- input -->

                        </div>

                    </div>
                </div>
            </div>
            <!-- card -->
            <div class="card mb-6 card-lg">
                <!-- card body -->
                <div class="card-body p-6">
                    <h4 class="mb-4 h5">Product Price</h4>
                    <!-- input -->
                    <div class="mb-3">
                        <label class="form-label" for="regularPrice">Regular Price</label>
                        <input type="text" class="form-control" id="regularPrice" name="regularPrice" placeholder="$0.00">
                        @if ($errors->has('regularPrice'))
                                <span class="text-danger">{{ $errors->first('regularPrice') }}</span>
                                @endif
                    </div>
                    <!-- input -->
                    <div class="mb-3">
                        <label class="form-label" for="salePrice">Sale Price</label>
                        <input type="text" class="form-control" id="salePrice" name="salePrice" placeholder="$0.00">
                        @if ($errors->has('salePrice'))
                                <span class="text-danger">{{ $errors->first('salePrice') }}</span>
                                @endif
                    </div>

                </div>
            </div>
            <!-- card -->
            <div class="card mb-6 card-lg">
                <!-- card body -->
                <div class="card-body p-6">
                    <h4 class="mb-4 h5">Meta Data</h4>
                    <!-- input -->
                    <div class="mb-3">
                        <label class="form-label" for="metaTitle">Meta Title</label>
                        <input type="text" class="form-control" id="metaTitle" name="metaTitle" placeholder="Title">
                        @if ($errors->has('metaTitle'))
                                <span class="text-danger">{{ $errors->first('metaTitle') }}</span>
                                @endif
                    </div>

                    <!-- input -->
                    <div class="mb-3">
                        <label class="form-label" for="metaDescription">Meta Description</label>
                        <textarea class="form-control" rows="3" id="metaDescription" name="metaDescription" placeholder="Meta Description"></textarea>
                        @if ($errors->has('metaDescription'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                    </div>
                </div>
            </div>
            <!-- button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" >Create Product</button>
              
            </div>
        </div>
    </div>
</form>

</div>
@endsection