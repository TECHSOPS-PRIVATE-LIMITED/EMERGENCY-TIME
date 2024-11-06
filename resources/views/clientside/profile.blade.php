@extends('clientside.layouts.app')

@section('clientside')
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6 col-12"> 
                  <h2>User Profile</h2>
                </div>
                <div class="col-sm-6 col-12">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="iconly-Home icli svg-color"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">User Profile</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="user-profile">
              <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                  <div class="card hovercard text-center">
                  <div class="cardheader profile" >
        </div>
                    <div class="user-image">
                      <div class="avatar"><img alt="" src="{{ asset('admin/assets/images/user/7.jpg')}}"></div>
                      <div class="icon-wrapper"><i class="iconly-Edit icli"></i></div>
                    </div>
                    <div class="info">
                      <div class="row">
                        <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa-solid fa-envelope"></i> Email</h6><span>{{ $patients->email ?? "" }}</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa-solid fa-calendar"></i> Birth Date</h6><span>{{ $patients->birth_date  ?? "Not Available"}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                          <div class="user-designation">
                            <div class="title"><a target="_blank" href="">{{ $patients->name }}</a></div>
                            <div class="desc">EMERGENCY TIME</div>
                            <div class="text-end mt-3">
                                <a href="{{ route('client.provider') }}" class="btn btn-primary btn-block w-100">Apply for Provider</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa-solid fa-phone"></i>   Identity No</h6><span>{{ $patients->identity_no ?? "Not Available" }}</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa-solid fa-location-arrow"></i> Home Town</h6><span>{{ $patients->country   ?? "Not Available" }}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="social-media">
                        <ul class="list-inline">
                          <li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                          <li class="list-inline-item"><a href="https://accounts.google.com/" target="_blank"><i class="fa-brands fa-google-plus-g"></i></a></li>
                          <li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                          <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                          <li class="list-inline-item"><a href="https://rss.app/" target="_blank"><i class="fa-solid fa-rss"></i></a></li>
                        </ul>
                      </div>
                      <div class="follow">
                        <div class="row">
                          <div class="col-6 text-md-end border-right">
                            <div class="follow-num counter">25869</div><span>Follower</span>
                          </div>
                          <div class="col-6 text-md-start">
                            <div class="follow-num counter">659887</div><span>Following</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- user profile first-style end-->
@endsection