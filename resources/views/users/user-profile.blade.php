
@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">

<aside id="column-right" class="col-right col-xs-12  col-sm-3">
    <div class="block block-account">
      <div class="block-title"><b><h4> My Account</h4></b></div>
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

                  <div class="col-sm-12">
                    <h2>Your Personal Details</h2>
                    <br>

                  </div>

                  <small style="color: red">* click side tabs to update your information.</small>
                 <div class="row" style="padding:10px;">

                    <div class="col-md-4" style="font-weight:normal;">
                      <label class="col-md-12" style="font-weight: normal;"> First Name: <b>{{$current_user->first_name}}</b></label>

                    </div>
                    <div class="col-md-4" style="font-weight:normal;">
                    <label class="col-md-12" style="font-weight: normal;"> Last Name: <b>{{$current_user->last_name}}</b></label>

                    </div>
                    <div class="col-md-4" style="font-weight:normal;">
                    <label class="col-md-12" style="font-weight: normal;">Middle Name: <b>{{$current_user->middle_name}}</b></label>

                    </div>
                  </div>

                  <div class="row" style="padding:10px;">
                    <div class="col-md-4" style="font-weight:normal;">
                      <label class="col-md-12" style="font-weight: normal;"> Mobile No.: <b>{{$current_user->mobile_no}}</b></label>
                    </div>
                    <div class="col-md-4" style="font-weight:normal;">
                      <label class="col-md-12" style="font-weight: normal;"> E-Mail Address: <b>{{$current_user->email}}</b></label>

                    </div>

                  </div>

                <br>

                  @can('isBuyer')
                      <div class="col-sm-12">
                        <h2>Delivery Address Information</h2>
                        <br>
                      </div>

                      <small style="color: red">* click side tabs to update your information.</small>
                      @foreach($delivery_info as $del)
                      <div class="row" style="padding:10px;">
                        <div class="col-md-6" style="font-weight:normal;">
                        <label class="col-md-12" style="font-weight: normal;">Address: <b>{{$del->del_address}}</b></label>

                        </div>

                        <div class="col-md-6" style="font-weight:normal;">
                        <label class="col-md-12" style="font-weight: normal;">Barangay: <b>{{$del->del_brgy,}}</b></label>

                        </div>
                      </div>

                      <div class="row" style="padding:10px;">
                        <div class="col-md-6" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;">City: <b>{{$del->del_city}}</b></label>

                        </div>
                        <div class="col-md-6" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;">State/Province: <b>{{$del->del_province}}</b></label>

                        </div>
                      </div>

                      <div class="row" style="padding:10px;">
                        <div class="col-md-4" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;">Zip Code: <b>{{$del->del_zipcode}}</b></label>

                        </div>
                        <div class="col-md-8" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;">Country: <b>{{$del->del_country}}</b></label>

                        </div>
                      </div>
                      <div class="row" style="padding:10px;">
                        <div class="col-md-12" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;">Other Billing Address Details: <b>{{$del->del_others}}</b></label>
                        </div>
                      </div>
                    @endforeach
                    <br>

                @endcan



                @can('isFarmer')
                <div class="col-sm-12">
                    <h2>My Lands</h2>
                    <br>

                  </div>

                  <small style="color: red">* click side tabs to update your information.</small>
                @foreach($user_lands as $lands)
                 <div class="row" style="padding:10px;">

                    <div class="col-md-4" style="font-weight:normal;">
                      <label class="col-md-12" style="font-weight: normal;"> Name of Land/Company: <b>{{$lands->name_of_company}}</b></label>

                    </div>
                    <div class="col-md-4" style="font-weight:normal;">
                    <label class="col-md-12" style="font-weight: normal;"> Land Address: <b>{{$lands->land_address}}</b></label>

                    </div>
                  </div>

                  <div class="row" style="padding:10px;">
                    <div class="col-md-4" style="font-weight:normal;">
                      <label class="col-md-12" style="font-weight: normal;"> Land Elevation: <b>{{$lands->land_elevation}}</b></label>
                    </div>
                    <div class="col-md-4" style="font-weight:normal;">

                    <label class="col-md-12" style="font-weight: normal;">Land Area: <b>{{$lands->land_area}}</b></label>

                    </div>

                  </div>
                  @endforeach

                <br>
                @endcan





                @endforeach
          </div>
    </div>
  </div>
    </div>
</div>
@endsection
