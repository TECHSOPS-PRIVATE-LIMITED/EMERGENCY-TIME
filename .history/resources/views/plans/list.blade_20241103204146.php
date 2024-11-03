@extends('layouts.app')

@section('content')
<!-- Page Sidebar End -->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Plans </h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item">Data Tables</li>
                        <li class="breadcrumb-item active">Basic DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Subscription Plans</h3>
                        
                    </div>
                    <button class="btn btn-secondary px-xl-2 px-xxl-3" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Simple</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-toggle-wrapper"> 
                              <h4>Up to <strong class="font-danger">85% OFF</strong>, Hurry Up Online Shopping</h4>
                              <div class="modal-img"> <img src="../assets/images/gif/online-shopping.gif" alt="online-shopping"></div>
                              <p class="text-sm-center">Our difficulty in finding regular clothes that was of great quality, comfortable, and didn't impact the environment given way to Creatures of Habit.</p>
                              <button class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto" type="button" data-bs-dismiss="modal">Explore More<i class="fa-solid fa-angles-right"> </i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"><a href="#"><i class="icon-pencil-alt"></i></a></li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection

@section('scripts')

@endsection
