@extends('layouts.adminmain')
@section('addproduct')    
<div class="container">
          <div class="row mb-8">
            <div class="col-md-12">
              <div class="d-md-flex justify-content-between align-items-center">
                <div>
                  <h2>Customers</h2>
                    <!-- breacrumb -->
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Customers</li>
                    </ol>
                  </nav>
                </div>
                <div>
                  <a href="#!" class="btn btn-primary">Add New Vendor</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-xl-12 col-12 mb-5">
              <div class="card h-100 card-lg">

                <div class="p-6">
                  <div class="row justify-content-between">
                    <div class="col-md-4 col-12">
                      <form class="d-flex" role="search">
                        <input class="form-control" type="search" placeholder="Search Customers" aria-label="Search">

                      </form>
                    </div>

                  </div>
                </div>
                <div class="card-body p-0 ">

                  <div class="table-responsive">
                  <table id="data-table">
                        <thead>
                            <tr>
                            <td>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="customerOne">
                              <label class="form-check-label" for="customerOne">

                              </label>
                            </div>
                          </td>
                          <th>Name</th>
                          <th>Email</th>
                          <th>User Status</th>
                          <th>Created date</th>
                          <th>Spent</th>
                          <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendorsInformation as $Veninfo)
                            <tr>
                                <td>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="customerOne">
                                    <label class="form-check-label" for="customerOne">

                                    </label>
                                  </div>
                                </td>

                                <td>
                                  <div class="d-flex align-items-center">
                                    <img src="../assets/images/avatar/avatar-1.jpg" alt=""
                                      class="avatar avatar-xs rounded-circle">
                                    <div class="ms-2">
                                      <a href="#" class="text-inherit">{{$Veninfo->name}}</a>
                                    </div>
                                  </div>
                                </td>
                                <td>{{$Veninfo->email}}</td>

                                <td>
                                @if($Veninfo->approved == 1)
                                    <span class="badge bg-light-primary text-dark-primary">Active</span>
                                   @else
                                     <span class="badge bg-light-danger text-dark-danger">Inactive</span>
                                  @endif</td>
  
                                <td>
                                {{ \Carbon\Carbon::parse($Veninfo->created_at)->format('d M Y') }}
                                </td>

                                <td>
                                <td><div class="dropdown">
                                                <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                <li class="delete_vendor" pid="{{$Veninfo->id}}"><a class="dropdown-item" ><i class="bi bi-trash me-3"></i>Delete</a></li>
                                                <li class="edit_vendor" pid="{{$Veninfo->id}}">
                                                    <a href="{{ route('admin.editvendorlist.show', ['vendorId' => $Veninfo->id]) }}" class="dropdown-item">
                                                    <i class="bi bi-pencil-square me-3"></i>Edit
                                                    </a>
                                                </li>
                                                </li>
                                                </ul>
                                        </div>
                                    </td>
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



 