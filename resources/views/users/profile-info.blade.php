

@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">

        <aside id="column-right" class="col-right col-xs-12  col-sm-3">
            <div class="block block-account">
            <div class="block-title">My Account</div>
            <div class="block-content">
                <ul>

                    <li><a class="btn btn-info btn-block" href="{{route('buyers.prof-info')}}" class="">Profile Information</a> </li>
                    @can('isBuyer')
                    <li><a class="btn btn-info btn-block" href="{{route('buyers.delivery-add')}}" class="">Delivery Address</a> </li>
                      @endcan
                    @can('isFarmer')

                    <li><a class="btn btn-info btn-block" href="{{route('farmers.lands')}}" class="">My Lands</a> </li>
                    @endcan
                    {{-- <li><a class="btn btn-info btn-block" href="{{route('buyers.billing-add')}}" class="">Billing Address</a></li> --}}
                    <li><a class="btn btn-info btn-block" href="{{route('buyers.order-history')}}" class="">Order History</a> </li>
                    {{-- <li><a href="{{route('users.prod-stat')}}" class="">Change Password</a></li> --}}
                  </ul>
            </div>
            </div>
        </aside>

        <div id="content" class="col-sm-9">
            <div class="col-main">


              <div class="my-account">
                @foreach ($user_profile as $current_user)
                {!! Form::open(['action' => ['MyAccountController@update', $current_user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


                      <div class="col-sm-12">
                        <h2>Your Personal Details</h2>
                        <br>
                      </div>
                     <div class="row" style="padding:10px;">
                        <div class="col-md-4" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> First Name</label>
                          <div class="col-md-12">
                            {{Form::text('firstName', $current_user->first_name, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                          </div>
                        </div>
                        <div class="col-md-4" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> Last Name</label>
                          <div class="col-md-12">
                            {{Form::text('lastName', $current_user->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                          </div>
                        </div>
                        <div class="col-md-4" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;">Middle Name</label>
                          <div class="col-md-12">
                            {{Form::text('middleName', $current_user->middle_name, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
                          </div>
                        </div>
                      </div>

                      <div class="row" style="padding:10px;">
                        <div class="col-md-4" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> Mobile No.</label>
                          <div class="col-md-12">
                            {{Form::text('mobileNumber', $current_user->mobile_no, ['class' => 'form-control', 'placeholder' => 'Mobile Number'])}}
                          </div>
                        </div>
                        <div class="col-md-4" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> E-Mail Address</label>
                          <div class="col-md-12">
                            {{Form::text('emailAddress', $current_user->email, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                          </div>
                        </div>

                      </div>

                    <br>
                      <div class="form-group col-sm-12">
                          <div class="pull-right">

                            {{Form::hidden('_method', 'PUT')}}
                              {{form::submit('Update', ['class' => 'btn btn-primary'])}}

                          </div>
                      </div>
                    @endforeach
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
